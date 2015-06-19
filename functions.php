<?php

//Woo

//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main"><div class="content-wrap">
    <section class="content">
      <div class="inner-wrapper"><article class="page-single">';
}

function my_theme_wrapper_end() {
  echo '</article></div></section></div></section>';
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Woocommerce Order 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );



function custom_styles() {

	wp_register_style( 'style-normalize', get_template_directory_uri() . '/css/normalize.css', false, false, 'all' );
	wp_enqueue_style( 'style-normalize' );

	wp_register_style( 'style-opensans', 'http://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,300', false, false );
	wp_enqueue_style( 'style-opensans' );

  wp_register_style( 'style-quickand', 'http://fonts.googleapis.com/css?family=Quicksand:400,700', false, false );
  wp_enqueue_style( 'style-quickand' );

	wp_register_script( 'html5shiv', get_template_directory_uri() . '/scripts/html5shiv.js', false, false );
	wp_enqueue_script( 'html5shiv' );

  wp_register_script( 'jssporslider', get_template_directory_uri() . '/scripts/jssor.slider.mini.js', array( 'jquery' ) );
  wp_enqueue_script( 'jssporslider' );
}

add_action( 'wp_enqueue_scripts', 'holi_theme_enqueue_styles', 15 );
function holi_theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Register jQuery if not admin.

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'custom_styles' );

//featured images

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 400);
  add_image_size( 'homepage-events', 400); 
}

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 536, 356, array( 'center', 'center' ) ); 
  add_image_size( 'article-list', 536, 356, array( 'center', 'center' ) );
}

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1340, 500, array( 'center', 'center' ) ); 
  add_image_size( 'single-post', 1340, 500, array( 'center', 'center' ) ); 
}

//Nav basket addition
function modify_nav_menu_items( $items, $args ) {

  global $woocommerce;
  // get cart quantity
  $qty = $woocommerce->cart->get_cart_contents_count();

  // get cart total
  $total = $woocommerce->cart->get_cart_total();

  // get cart url
  $cart_url = $woocommerce->cart->get_cart_url();


  $cartitems = $woocommerce->cart->get_cart();



    $templateurl = get_bloginfo('template_url');
    if ($args->theme_location == 'header-menu') {
      if($qty>1) {
        $items .= '
        <li id="nav-blue-basket nav-basket" class="nav-blue-basket nav-basket"><a href="/basket/"><img src="' .get_template_directory_uri().'/images/basket.png"></a>

        <ul class="navigation-basket">
          <div class="nav-basket-image">
            <img class="large-basket" src="' .get_template_directory_uri().'/images/basket-large.png">
          </div>
          <li class="nav-blue-basket">';

          foreach($cartitems as $cartitem => $values) {

                 $_product = $values['data']->post;
                 $items .= $_product->post_title;
                 $_amount = $values['quantity'];
                 $items .= " - x" . $_amount;
                 $items .= "<br>";  
           } 
        $items .= '</li>
          <li class="nav-blue-basket">'.$qty.' products | '.$total.'</li>
          <li class="nav-blue-basket no-underline view-basket"><a class="view-basket" href="/basket/">View Basket</a></li>
          <div style="clear:both"></div>
        </ul>
        ';
      }

      elseif($qty==1){
        $items .= '
        <li id="nav-blue-basket nav-basket" class="nav-blue-basket nav-basket"><a href="/basket/"><img src="' .get_template_directory_uri().'/images/basket.png"></a>

        <ul class="navigation-basket">
          <div class="nav-basket-image">
            <img class="large-basket" src="' .get_template_directory_uri().'/images/basket-large.png">
          </div>
          <li class="nav-blue-basket">';

          foreach($cartitems as $cartitem => $values) {

                 $_product = $values['data']->post;
                 $items .= $_product->post_title;
                 $_amount = $values['quantity'];
                 $items .= " - x" . $_amount;
                 $items .= "<br>";  
           } 
        $items .= '</li>
          <li class="nav-blue-basket">'.$qty.' product | '.$total.'</li>
          <li class="nav-blue-basket no-underline view-basket"><a class="view-basket" href="/basket/">View Basket</a></li>
          <div style="clear:both"></div>
        </ul>
        ';
      }
      else {
         $items .= '
        <li id="nav-blue-basket nav-basket" class="nav-blue-basket nav-basket"><a href="/basket/"><img src="' .get_template_directory_uri().'/images/basket.png"></a>

        <ul class="navigation-basket">
          <div class="nav-basket-image">
            <img class="large-basket" src="' .get_template_directory_uri().'/images/basket-large.png">
          </div>
          <li class="nav-blue-basket no-underline view-basket"><a class="view-basket" href="/shop/">View our Shop</a></li>
          <div style="clear:both"></div>
        </ul>
        ';
      }
    }
    if ($args->theme_location == 'mobile-menu') {
      $items .= '
          <li class="nav-blue-basket no-underline view-basket"><a class="view-basket" href="/basket/">View Basket</a></li>
        ';
    }



    return $items;
}

add_filter( 'wp_nav_menu_items', 'modify_nav_menu_items', 10, 2 );

// Register Menus.

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'mobile-menu' => __( 'Mobile Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  ); 
}
add_action( 'init', 'register_my_menus' );

//homepage title hack

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

// holi login logo
function holi_login_logo() { 
  $template = get_template_directory_uri();
  $template .= '/images/logo/holi-login.png';

    ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url( <?php echo $template; ?> );
            background-size: 300px auto;
            height: 144px;
            width: 300px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'holi_login_logo' );

//Holi Admin

function holi_admin_theme_style() {
    $template = get_template_directory_uri();
    $template .= '/admin/admin.css';
    wp_enqueue_style('holi-admin-theme', $template);
}
add_action('admin_enqueue_scripts', 'holi_admin_theme_style');
add_action('login_enqueue_scripts', 'holi_admin_theme_style');
add_action( 'wp_enqueue_scripts', 'holi_admin_theme_style' );

add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '<p>Website Design and Development by <a href="http://pixellocker.co.uk" title="Pixel Locker"> Pixel Locker.</a></p>';
    return $text;
}

//Hide Holi Admin widgets
remove_action( 'welcome_panel', 'wp_welcome_panel' );

function disable_dashboard_widgets() {  
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
    //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}  
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');

// Add Widget

function pixel_locker_info_widget() {

  wp_add_dashboard_widget(
                 'pixel_locker_info_widget',         // Widget slug.
                 'HoliParty Support and Information',         // Title.
                 'pixel_locker_info_widget_function' // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'pixel_locker_info_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function pixel_locker_info_widget_function() {

  // Display whatever it is you want to show.
  echo "<h2>Email Access:</h2>";
  echo '<a href="http://email.holiparty.co.uk/"> Access Email</a>';
  echo "<h2>HoliParty Cpanel Area:</h2>";
  echo "(manage email accounts, FTP access, subdomains, etc.)<br>";
  echo '<a href="http://holiparty.co.uk/cpanel"> Login to Cpanel</a>';
  echo "<h2>Support & Development:</h2>";
  echo "Pixel Locker is happy to help you with your website or web hosting*<br>";
  echo '<a href="http://pixellocker.co.uk/contact/"> Pixel Locker Support</a>';
}

?>
