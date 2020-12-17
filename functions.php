<?php

// STYLE
function ms_add_theme_scripts() {
	// CSS
	wp_enqueue_style( 'main-style', get_template_directory_uri() . "/assets/css/main.min.css", false, '1.0' );
	
	// JS
	wp_enqueue_script( 'collapse-js', get_template_directory_uri() . "/assets/js/collapse.js", ['jquery'], '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ms_add_theme_scripts' );

add_action( 'init', function()
{
    $locations = [
        'main' => 'Navegacao Principal',
        'footer' => 'Navegacao Footer',
    ];
    register_nav_menus( $locations );
});


// Extensions
add_theme_support( 'title-tag' );

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1568, 9999 );

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


function ms_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ms_add_woocommerce_support' );


// HEADER CLEAN UP
function ms_remove_version() {
	return '';
}
add_filter('the_generator', 'ms_remove_version');

remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0); 
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

function ms_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'ms_remove_wp_block_library_css' );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// REMOVE EMBED
function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// DISABLE XMLRPC
add_filter('xmlrpc_enabled', '__return_false');


// DISABLE ADMIN BAR
add_filter('show_admin_bar', '__return_false');


/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
add_shortcode ('woo_cart_icon', 'woo_cart_icon' );
function woo_cart_icon() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count;
        $cart_url = wc_get_cart_url(); 
        // $cart_count = 0;
        // $cart_url = "#"; 
        ?>
        <li class="nav-item cart-contents"><a href="<?php echo $cart_url; ?>" title="My Basket">
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        </a></li>
        <?php
	        
    return ob_get_clean();
 
}

$location_settings = [
                'main' => [
                    'items_wrap' => '<ul class="%2$s navbar-nav">%3$s</ul>',
                    'links_class' => 'class="nav-link" ',
                    'list_class' => 'nav-item',
                ],
                'footer' => [
                    'items_wrap' => '<ul class="%2$s text-small">%3$s</ul>',
                    'links_class' => 'class="text-muted" ',
                    'list_class' => 'item',
                ],
            ];
/**
 * Render menu from a specific location in the theme.
 *
 * @param string $location Location of the menu set in the theme template.
 * @return string The rendered menu from location
 */
function render_menu($location)
{
    global $location_settings;

    if ( !isset($location_settings[$location]) ) {
        return "";
    }

    $params = [
            'theme_location' => $location,
            'container' => false,
            'echo' => false,
            'menu_class' => 'list-unstyled',
            'items_wrap' => $location_settings[$location]['items_wrap']
        ];

    $nav = wp_nav_menu( $params );
    
    return str_replace('<a ', '<a ' . $location_settings[$location]['links_class'], $nav);
}


/**
 * Customize css classes for menu item
 *
 * @param  array $classes Array with all the css classes
 * @param  object $item Object with all menu item attributes
 * @param  object $args Arguments used for rendering menu.
 * @return array $classes Array with list of css classes.
 */
function menu_item_classes($classes, $item, $args)
{
    global $location_settings;

    if ( !empty($location_settings[$args->theme_location]) ) {
        $classes = [$location_settings[$args->theme_location]['list_class']];
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'menu_item_classes', 1, 3);
