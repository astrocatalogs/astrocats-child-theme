<?php
$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
function resize_iframe() {
	wp_enqueue_script( 'resize-iframe', '/wp-content/themes/sne-child-theme/resize-iframe.js' );
}
function custom_rewrite_basic() {
	add_rewrite_rule('^event/(.+)/?', 'index.php?page_id=1320&eventname=$matches[1]', 'top');
	add_rewrite_rule('^sne/(.+)/?', 'index.php?page_id=1320&eventname=$matches[1]', 'top');
	add_rewrite_tag('%eventname%', '([^&]+)');
}
function event_title( $title ) {
	global $wp_query;
    if ( is_page_template( 'event.php' ) ) {
        return $wp_query->query_vars['eventname'] . ' - The Open Supernova Catalog';
    }
    return $title;
}
function theme_enqueue_styles() {
	if ( $template_name = 'event.php' ) {
		wp_enqueue_style( 'bokeh-css', "https://cdn.pydata.org/bokeh/release/bokeh-0.11.0.min.css");
		wp_enqueue_script( 'bokeh-js', "https://cdn.pydata.org/bokeh/release/bokeh-0.11.0.min.js");
		wp_enqueue_style( 'event', get_stylesheet_directory_uri() . '/event.css' );
	}
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

#add_action('wp_enqueue_scripts', 'my_scripts_method');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('init', 'custom_rewrite_basic');
add_action('wp_enqueue_scripts', 'resize_iframe');
add_filter('pre_get_document_title', 'event_title', 10, 3 );
?>
