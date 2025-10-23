<?php
$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$section_id = get_field("section_id");
$background = get_field("background");

$cards = get_field("cards");
$cards_count = !empty($cards) ? count($cards) : 0;

// Determine column classes based on card count
$col_class = "col-12 col-md-6"; // default for 2 cards
if ($cards_count === 3) {
    $col_class = "col-12 col-lg-4";
} elseif ($cards_count === 4) {
    $col_class = "col-12 col-lg-3";
}

// Determine BEM modifier based on card count
$count_modifier = "";
switch ($cards_count) {
    case 2:
        $count_modifier = "two-items";
        break;
    case 3:
        $count_modifier = "three-items";
        break;
    case 4:
        $count_modifier = "four-items";
        break;
    default:
        $count_modifier = "multiple-items";
}

?>

<?php if(!empty($cards)): ?>
<div class="flip-cards flip-cards--<?php echo esc_attr($count_modifier); ?> <?php if($background == 'true') { echo 'flip-cards--background';}?>">
    <?php if(!empty($section_id)):?>
    <div class="section-id" id="<?php echo esc_html($section_id);?>"></div>
    <?php endif;?>
    <div class="container">
        <div class="flip-cards__wrapper flip-cards__wrapper--<?php echo esc_attr($count_modifier); ?>">
            <div class="row">
                <?php foreach($cards as $key => $item): ?>
                <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="flip-cards__column flip-cards__column--<?php echo esc_attr($count_modifier); ?>">
                        <div class="flip-cards__item flip-cards__item--<?php echo esc_attr($count_modifier); ?> <?php if(!empty($item['flip_image'])) { echo 'flip-cards__item--has-flip';}?>">
                            <?php if(!empty($item['link'])):?>
                            <a class="cover" href="<?php echo esc_url_raw($item['link']['url']);?>"></a>
                            <?php endif;?> <?php if(!empty($item['small_info'])):?>
                            <div class="flip-cards__small-info flip-cards__small-info--<?php echo esc_attr($count_modifier); ?>"><?php echo esc_html($item['small_info']);?></div>
                            <?php endif;?> <?php if(!empty($item['image'])): ?>
                            <div class="flip-cards__image flip-cards__image--<?php echo esc_attr($count_modifier); ?> <?php if(!empty($item['flip_image'])) { echo 'flip-cards__image--has-flip';}?>">
                                <?php echo wp_get_attachment_image($item['image'], 'large', '', ['class' => 'object-fit-cover']); ?> <?php if(!empty($item['flip_image'])): ?> <?php echo wp_get_attachment_image($item['flip_image'], 'large', '', ['class' => 'object-fit-cover flip-image']); ?> <?php endif;?>
                            </div>
                            <?php endif;?>

                            <div class="flip-cards__content flip-cards__content--<?php echo esc_attr($count_modifier); ?>"><?php echo apply_filters('the_title', $item['content']);?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
