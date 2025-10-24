<?php

$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

// remove custom filtration and add new one
remove_action("woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30);

// add filtration
function addShopFiltration()
{
    get_template_part("template-parts/shop-filtration");
}

if (strpos($url, "produkt/") == false) {
    add_action("woocommerce_before_main_content", "addShopFiltration", 30);
}

// hide one category on general shop page
add_action("pre_get_posts", "exclude_category_from_shop_page");

function exclude_category_from_shop_page($query)
{
    if (is_shop() && $query->is_main_query() && !is_admin()) {
        $tax_query = [
            [
                "taxonomy" => "product_cat",
                "field" => "slug",
                "terms" => "wspolpraca",
                "operator" => "NOT IN",
            ],
        ];
        $query->set("tax_query", $tax_query);
    }
}

// redirect only shop archive and category pages
add_action("template_redirect", function () {
    if (is_admin()) {
        return;
    }
    if (function_exists("wp_doing_ajax") && wp_doing_ajax()) {
        return;
    }
    if (defined("REST_REQUEST") && REST_REQUEST) {
        return;
    }

    if (is_shop() || is_post_type_archive("product") || is_product_category()) {
        wp_safe_redirect("/produkt/adsk-imo-plyta-fizyczna/", 301);
        exit();
    }
});
