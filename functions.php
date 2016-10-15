<?php
$tt = explode("\n", file_get_contents(__DIR__ . '/tt.dat'));
$stem = trim($tt[0]);
$modu = trim($tt[1]);
$pid = trim($tt[2]);

function resize_iframe() {
	wp_enqueue_script( 'resize-iframe', '/wp-content/themes/astrocats-child-theme/resize-iframe.js' );
}
function custom_rewrite_basic() {
	global $stem, $pid;
	add_rewrite_rule('^event/(.+)/?', 'index.php?page_id=' . $pid . '&eventname=$matches[1]', 'top');
	add_rewrite_rule('^' . $stem . '/(.+)/?', 'index.php?page_id=' . $pid . '&eventname=$matches[1]', 'top');
	add_rewrite_tag('%eventname%', '([^&]+)');
}
function event_title( $title ) {
	global $wp_query;
    if ( is_page_template( 'event.php' ) ) {
        return $wp_query->query_vars['eventname'] . ' - The Open TDE Catalog';
    }
    return $title;
}
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

#add_action('wp_enqueue_scripts', 'my_scripts_method');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('init', 'custom_rewrite_basic');
add_action('wp_enqueue_scripts', 'resize_iframe');
add_filter('pre_get_document_title', 'event_title', 10, 3 );
function astrocats_scripts() {
    if (is_page()) {
        wp_enqueue_style( 'event-page', '/wp-content/themes/astrocats-child-theme/event-page.css', array() );
    }
}
add_action( 'wp_enqueue_scripts', 'astrocats_scripts' );
?>
