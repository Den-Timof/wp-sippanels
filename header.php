<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sippanels
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<?php  wp_head(); ?>

	</head>
	<body data-scroll-index="0">
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-close.png' ?>" alt="" aria-hidden="true"></button>
						<?php 
							$post_id_113 = get_post( 113 );
							$title_id_113 = $post_id_113->post_title;
							$content_id_113 = $post_id_113->post_content;
						?>
						<h4 class="modal-title"><?php echo $title_id_113 ?></h4>
						<div class="modal-text"><?php echo wpautop($content_id_113) ?></div>

					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-close.png' ?>" alt="" aria-hidden="true"></button>

						<?php echo do_shortcode('[contact-form-7 id="126" title="Оформите заказ" html_class="form-modal"]') ?>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal2-table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-close.png' ?>" alt="" aria-hidden="true">
						</button>

						<?php echo do_shortcode('[contact-form-7 id="482" title="Оформите заказ (таблицы)" html_class="form-modal"]') ?>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-close.png' ?>" alt="" aria-hidden="true"></button>
						<?php echo do_shortcode('[contact-form-7 id="127" title="Запрос на прайс-лист" html_class="form-modal form-sip"]') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri() .  '/assets/img/icon-close.png' ?>" alt="" aria-hidden="true"></button>
						<!-- <form class="form-modal form-sip" action="">
							<h4 class="modal-title" id="myModalLabel">Менеджер Вам перезвонит</h4>
							<div class="form-body">
								<input class="input-form-sip" type="text" placeholder="Имя">
								<input class="input-form-sip" type="text" placeholder="Телефон">
							</div>
							<button class="btn-modal btn-sip" type="button">Отправить</button>
						</form> -->
						<?php echo do_shortcode('[contact-form-7 id="61" title="Менеджер Вам перезвонит" html_class="form-modal form-sip"]') ?>
					</div>
				</div>
			</div>
		</div>

		<header class="header">
			<div class="layer-white-bg"></div>
			<div class="container">
				<div class="row header-wrap">
					<div class="col-4 col-sm-2 col-md-2 col-xl-3 div logo_header-sip d-none d-md-flex">
						<a href="" class="logo_image_block" data-scroll-goto="0">
							<!-- <img class="logo_image" src="<?php // echo get_template_directory_uri() .  '/assets/img/Logo_SipComplekt.png' ?>" alt=""> -->
							<img class="logo_image" src="<?php echo get_theme_mod("logo_image") ?>" alt="">
						</a>
					</div>
					<div class="col-sm-6 col-md-7 col-xl-7 menu_header-sip d-none d-md-flex">
						<div class="menu-title">
							<p class="menu-title-text">
								<?php echo get_theme_mod("title_header") ?>
							</p>
						</div>
						<div class="menu-navigation-sip d-none d-md-block">
							<!-- <ul class="menu-nav-list" id="navlist">
								<li class="menu-nav-list-item"><a href=""></a></li>
								<li class="menu-nav-list-item"><a class="menu-nav-list-item-link" href="" data-scroll-nav="1">О нас</a></li>
								<li class="menu-nav-list-item"><a class="menu-nav-list-item-link" href="" data-scroll-nav="2">Прайс-лист</a></li>
								<li class="menu-nav-list-item"><a class="menu-nav-list-item-link" href="" data-scroll-nav="3">Типы панелей</a></li>
								<li class="menu-nav-list-item"><a class="menu-nav-list-item-link" href="" data-scroll-nav="4">Дилерам</a></li>
								<li class="menu-nav-list-item"><a class="menu-nav-list-item-link" href="" data-scroll-nav="5">Контакты</a></li>
							</ul> -->
							<?php
								wp_nav_menu( array(
									'theme_location'  => '',
									'menu'            => 'top-menu', 
									'container'       => 'div', 
									'container_class' => '', 
									'container_id'    => '',
									'menu_class'      => 'menu-nav-list', 
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => '',
								) );
							?>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-2 div feedback_header-sip d-none d-md-flex">
						<a class="phone-feedback" href="tel:+">
							<?php echo get_theme_mod("phone_sip") ?>
						</a>
						<button class="button-feedback btn-sip" type="button" data-toggle="modal" data-target="#myModal">Обратный звонок</button>
					</div>
					<nav class="col-12 navbar navbar-expand-lg navbar-light mobile-navigation_header-sip d-md-none">
						<div class="col-2 div logo_header-sip">
							<a href="" data-scroll-goto="0">
								<!-- <img class="logo_image" src="<?php // echo get_template_directory_uri() .  '/assets/img/Logo_SipComplekt.png' ?>" alt=""> -->
								<img class="logo_image" src="<?php echo get_theme_mod("logo_image") ?>" alt="">

							</a>
							<?php // the_custom_logo(); ?>
						</div>
						<div class="col-sm-5 menu_header-sip d-none d-sm-flex">
							<div class="menu-title">
								<p class="menu-title-text">
									<?php echo get_theme_mod("title_header") ?>
								</p>
							</div>
						</div>
						<div class="col-sm-4 div feedback_header-sip d-none d-sm-flex">
							<a class="phone-feedback" href="tel:+">
								<?php echo get_theme_mod("phone_sip") ?>
							</a>
							<button class="button-feedback btn-sip" type="button" data-toggle="modal" data-target="#myModal">Обратный звонок</button>
						</div>
						<div class="col-6 mobile-feedback_header-sip d-sm-none">
							<!-- <a class="phone-feedback" href="tel:+">8 (495) <span class="phone-span">12-34-56</span> -->
							<a class="phone-feedback" href="tel:+">
								<?php echo get_theme_mod("phone_sip") ?>
							</a>
						</div>
						<div class="col-2 col-sm-1 navbar-toggler-wrap">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img class="navbar-toggler-img" src="<?php echo get_template_directory_uri() .  '/assets/img/icon-navbar.png' ?>" alt=""></button>
						</div>
						<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto menu-nav-list">
								<li class="nav-item menu-nav-list-item"><a class="nav-link menu-nav-list-item-link" href="" data-scroll-nav="1">О нас</a></li>
								<li class="nav-item menu-nav-list-item"><a class="nav-link menu-nav-list-item-link" href="" data-scroll-nav="2">Прайс-лист</a></li>
								<li class="nav-item menu-nav-list-item"><a class="nav-link menu-nav-list-item-link" href="" data-scroll-nav="3">Типы панелей</a></li>
								<li class="nav-item menu-nav-list-item"><a class="nav-link menu-nav-list-item-link" href="" data-scroll-nav="4">Дилерам</a></li>
								<li class="nav-item menu-nav-list-item"><a class="nav-link menu-nav-list-item-link" href="" data-scroll-nav="5">Контакты</a></li>
							</ul>
						</div> -->
						<?php
								wp_nav_menu( array(
									'theme_location'  => '',
									'menu'            => 'top-menu', 
									'container'       => 'div', 
									'container_class' => 'collapse navbar-collapse', 
									'container_id'    => 'navbarSupportedContent',
									'menu_class'      => 'navbar-nav mr-auto menu-nav-list', 
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => '',
								) );
							?>
					</nav>
				</div>
			</div>
		</header>