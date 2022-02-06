<?php

// STYLE
function ms_add_theme_scripts() {
	// CSS
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . "/assets/css/owl.carousel.min.css", false, '1.0' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . "/assets/css/main.min.css", false, '1.0' );
	
	// JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.min.js", ['jquery'], '1.0', true );
	wp_enqueue_script( 'owl-js', get_template_directory_uri() . "/assets/js/owl.carousel.min.js", ['jquery'], '1.0', true );
	wp_enqueue_script( 'gallery-js', get_template_directory_uri() . "/assets/js/gallery.js", ['jquery', 'owl-js'], '1.0', true );
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

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maps_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right Sidebar', 'maps' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'maps' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'maps_widgets_init' );

// init widgets
require get_template_directory() . '/includes/widgets.php';


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

/**
 * 
 */
function get_product_info() {
  global $post;
  
  $terms = get_the_terms( $post->ID, 'product_cat' );
  $grade = get_post_meta( $post->ID, 'grade', $single=true );
  $guia = get_post_meta( $post->ID, 'guia', $single=true );

  $info = [
    'guida_medidas' => 'guiaMedidas',
    'como_medir' => 'comoMedir',
    'slug' => '',
  ];

  if ( !empty($terms[0]->slug) && $terms[0]->slug ) {
    $slug = $terms[0]->slug;
    $info = [
      'slug' => $terms[0]->slug,
      'guida_medidas' => $info['guida_medidas'] . $slug,
      'como_medir' => $info['como_medir'] . $slug,
      'grade' => $grade,
      'guia' => $guia,
    ];
  }

  return $info;
}


add_filter('woocommerce_product_tabs', 'maps_rename_additional_info_tab');
function maps_rename_additional_info_tab( $tabs ) {
	$tabs['additional_information']['title'] = 'Informações';
	return $tabs;
}

// TODO Move
add_action('woocommerce_after_single_product_summary', function(){

$info = get_product_info();

$img_guia = !empty($info['grade']) ? $info['grade'] : "/wp-content/themes/maps/assets/img/grade-medida-lg-" . $info['slug'] . ".jpg";
$img_medir = !empty($info['guia']) ? $info['guia'] : "/wp-content/themes/maps/assets/img/como-medir-" . $info['slug'] . ".jpg";
?>

<!-- Modal -->
<div class="modal fade" id="<?= $info['guida_medidas']; ?>" tabindex="-1" aria-labelledby="guiaMedidasLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="guiaMedidasLabel">Guia de Medidas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= $img_guia; ?>" alt="Guida de medidas" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="<?= $info['como_medir']; ?>" tabindex="-1" aria-labelledby="comoMediaLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comoMediaLabel">Como se medir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= $img_medir; ?>" alt="Como se medir" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
    <?php
}, 12);


add_action('woocommerce_after_single_product', function(){
    if ( is_front_page() || is_home() ) {
      return;
    }

    $imgs = [
        "/wp-content/themes/maps/assets/img/gallery/calca-perfil-lado-camisa-vermelha-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/close-up-etiqueta-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/close-up-frente-partial-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/corpo-inteiro-bota-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/corpo-inteiro-converse-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/esticando-perna-salto-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/foco-calca-jeans-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/perfi-del-lado-saldo-salto-tigrado-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/perfil-de-lado-salto-alto-sm.jpg",
        "/wp-content/themes/maps/assets/img/gallery/perna-direita-para-frente-sm.jpg",
        // "/wp-content/themes/maps/assets/img/gallery/perna-pra-cima-de-salto.jpg",
        // "/wp-content/themes/maps/assets/img/gallery/sentada-de-perna-para-cima.jpg",
    ];
?>

<section class="content-area mt-5">
    <div class="owl-carousel one-by-one owl-theme">
        <?php foreach ($imgs as $img) { ?>
            <div class="item text-center">
                <img src="<?= $img ?>" class="img align-middle" alt="" />
            </div>
        <?php } ?>
    </div>
</section>
<?php
}, 12);

add_action('woocommerce_before_single_variation', function(){
  $info = get_product_info();
?>
    <div class="row mb-4">
        <div class="col-6 col-lg-5">
            <span class="guia-medida-icon"></span><a class="link-guia-medida" href="#" data-toggle="modal" data-target="#<?= $info['guida_medidas']; ?>">Guia de Medidas</a>
        </div>
        <div class="col-6">
            <span class="como-medir-icon"></span><a class="link-como-medir" href="#" data-toggle="modal" data-target="#<?= $info['como_medir']; ?>">Como se medir</a>
        </div>
    </div>
<?php
}, 29);

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


add_filter( 'woocommerce_shipping_calculator_enable_city', function(){
  return false;
}, 1);

add_filter( 'woocommerce_shipping_calculator_enable_state', function(){
  return true;
}, 1);


function maps_excerpt_length( $length ) {
	return 5;
}
add_filter( 'excerpt_length', 'maps_excerpt_length' );

function maps_continue_reading_link() {
	return '<br/><a class="read-more btn btn-primary mt-3 d-inline-block" href="'. get_permalink() . '">ver mais</a>';
}

function maps_auto_excerpt_more( $more ) {
	return ' &hellip;' . maps_continue_reading_link();
}
add_filter( 'excerpt_more', 'maps_auto_excerpt_more' );
