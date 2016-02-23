<?php
function resize_iframe() {
	wp_enqueue_script( 'resize-iframe', '/wp-content/themes/sne-child-theme/resize-iframe.js' );
}
function custom_rewrite_basic() {
	add_rewrite_rule('^event/(.+)/?', 'index.php?page_id=1320&eventname=$matches[1]', 'top');
	add_rewrite_tag('%eventname%', '([^&]+)');
}

#add_action('wp_enqueue_scripts', 'my_scripts_method');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action('init', 'custom_rewrite_basic');
add_action('wp_enqueue_scripts', 'resize_iframe');
?>
