<!Doctype HTML>

<html lang="en-gb">

<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	<script type="text/javascript">
	var UA = navigator.userAgent;
var html = document.documentElement;
if (UA.indexOf("IEMobile") === -1) {
    if ((UA.indexOf("rv:11.") !== -1) && (!html.classList.contains('ie11')) && window.navigator.msPointerEnabled) {
        html.classList.add("ie11");
    } else if ((UA.indexOf("MSIE 10.") !== -1) && (!html.classList.contains('ie10')) && window.navigator.msPointerEnabled) {
        html.classList.add("ie10");
    }
}</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mask"></div>

<nav id="mobile" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'menu-mobile' ) ); ?>
</nav>

<header id="header-main" role="banner">
	<div class="inner-wrapper group">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="HoliParty">
			<img class="header-holi-logo" src="<?php bloginfo('template_url'); ?>/images/logo/holi-logo-header.png" alt="Holi Party Logo">
		</a>

		<a href="#" id="mobile-button" title="Mobile Menu">Menu</a>

        <a id="mobile-basket" href="/basket/"><img src="<?php bloginfo('template_url'); ?>/images/basket.png"></a>

		<nav id="main" role="navigation">
            <?php 
            wp_nav_menu( array( 'theme_location' => 'header-menu', 'sub_menu' => true, 'menu_class' => 'menu-header', 'depth' => 2, ) );              
            ?>

        </nav>
	</div>
</header>

