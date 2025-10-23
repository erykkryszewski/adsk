<?php

$global_phone_number = get_field("global_phone_number", "options");
$global_logo = get_field("global_logo", "options");
$global_email = get_field("global_email", "options");
$global_address = get_field("global_address", "options");
$global_social_media = get_field("global_social_media", "options");
$newsletter_shortcode = get_field("newsletter_shortcode", "options");
$cookies_text = get_field("cookies_text", "options");
$google_analytics_code = get_field("google_analytics_code", "options");
$popup = get_field("popup", "options");

$footer_second_column_content = get_field("footer_second_column_content", "options");
$footer_third_column_content = get_field("footer_third_column_content", "options");

?>

<?php if(!empty($popup == 'true')):?>
            <div class="popup popup--promotion">
                <div class="popup__wrapper popup__wrapper--promotion">
                    <button class="popup__close popup__close--promotion" id="popup-close-promotion">×</button>
                    <div class="popup__content popup__content--promotion">
                        <h2 class="popup__title popup__title--promotion">Tylko teraz <span>zapoznaj się z naszą ofertą<span></h2>
                        <p>Największe promocje, które już niedługo się kończą!</p>
                        <a href="/oferta/" class="button popup__button">Zobacz ofertę</a>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <footer class="footer <?php if(is_front_page()) { echo 'footer--homepage'; } ?>">
            <div class="bottom-bar">
                <div class="container">
                    <div class="bottom-bar__wrapper">
                        <p>
                            <?php _e('Copyright', 'ercodingtheme');?>
                            © <?php echo date("Y"); ?>&nbsp;<?php _e('ADSK', 'ercodingtheme');?>
                        </p>
                        <p>
                            Strona stworzona przez
                            <a href="https://ercoding.pl/" target="_blank">Ercoding</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <?php if($google_analytics_code): ?> <?php echo wp_kses($google_analytics_code, ['script' => ['async' => [], 'src' => []]]);?> <?php endif; ?>
    </body>
</html>
<?php wp_footer(); ?>
