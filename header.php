<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php bloginfo( 'name' ); ?><?php if ( ! is_front_page() ) {
			echo ' | ';
			wp_title( '' );
		} ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="container">
        <nav class="menu">
            <div id="logo"> Buildwithiqra.</div>

            <!-- Hamburger Menu (Mobile) -->
            <div id="hamburger">
                <span class=""></span>
                <span class=""></span>
            </div>

            <!-- Main Menu -->
            <div id="main-menu" class="">
				<?php
				wp_nav_menu( array(
					'menu'           => "main-menu",
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => false
				) );
				?>
            </div>

            <!-- CTA / Right Menu -->
            <div class="right-menu">
				<?php
				wp_nav_menu( array(
					'menu'        => 'right-menu',
					'container'   => false,
					'fallback_cb' => false
				) );
				?>
            </div>
        </nav>

        <!-- Mobile Menu (Dropdown) -->
        <div id="mobile-menu" class="">
			<?php
			wp_nav_menu( array(
				'menu'        => 'mobile-menu',
				'container'   => false,
				'menu_class'  => '',
				'fallback_cb' => false
			) );
			?>
        </div>
    </div>
</header>


<style>

</style>