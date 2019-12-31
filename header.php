<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package emk_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
			<nav class="navbar navbar-expand-lg navbar-inverse bg-inverse">
				<a id="nav-icon" class="navbar-brand" href="/">
					<div class="svg-wrap">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 33.1 23.5" style="enable-background:new 0 0 33.1 23.5;" xml:space="preserve">
						<g>
							<g class="st0">
								<polygon class="st1" points="9.3,14.4 9.7,13 0,10.6 6.2,19.8 6.9,17.2 4.3,13.2 		"/>
								<polygon class="st1" points="11.3,14.9 16.6,16.1 15.8,14.5 11.6,13.5 		"/>
							</g>
							<polygon id="XMLID_57_" class="st2" points="15.5,21.7 16.6,21.2 16.6,22.6 	"/>
							<g id="XMLID_52_">
								<polygon id="XMLID_56_" class="st1" points="13.6,6.3 13,8.4 16.6,16.1 24.8,17.2 27.9,15.8 17.3,14.4 		"/>
								<polygon id="XMLID_55_" class="st1" points="11.6,0.4 13.2,0.7 7.8,20 6.2,19.8 		"/>
								<polygon id="XMLID_54_" class="st1" points="32.8,15.3 32.8,17 19.4,23.1 19.4,21.4 		"/>
								<polygon id="XMLID_53_" class="st1" points="16.6,20.9 19.4,21.4 19.4,23.1 16.6,22.6 		"/>
							</g>
							<path id="XMLID_38_" class="st3" d="M13.2,0.7"/>
						</g>
						</svg>
					</div>
					<p id="name">Mohamad “Em” Karimifar</p>
					<!-- <div id="typedtext"></div> -->
				</a>
				
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" name="Toggle navigation">
                    <span class="navbar-toggler-icon"><k class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'		=> true,
						'items_wrap'	=> '%3$s',
					) );
					?>

                </div>
			</nav>
		</header>

	<div id="content" class="site-content">
