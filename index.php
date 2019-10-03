<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sippanels
 */

get_header();
?>

		<!-- begin section First screen -->
		<div style="background-image:url('<?php echo get_theme_mod("background_image_first") ?>');" class="first-screen section-padding-top" id="first-screen" data-stellar-background-ratio="0.5">
			<div class="layer-first-screen"></div>
			<div class="container">
				<div class="row first-wrap">
					<div class="col col-sm-5 col-md-6 column-left-first">
						<div class="caption-column-left">
							<p class="caption">
								<?php echo get_theme_mod("title_first") ?>
							</p>
						</div>
						<div class="text-column-left">
							<p class="text">
								<?php echo get_theme_mod("subtitle_first") ?>
								<span class="text-link">Гарантия качества</span>
								<!-- <a class="text-link" href="<?php // echo get_theme_mod("hrefLink_first") ?>">
									<?php // echo get_theme_mod("textLink_first") ?>
								</a> -->
							</p>
						</div>
					</div>
					<div class="col-sm-7 col-md-6 column-right-first d-none d-sm-flex">
						<!-- <form class="form-sip">
							<p class="title-form">Есть вопросы?<br><span class="title-subtext-form">Менеджер перезвонит Вам</span></p>
							<input class="input-form-sip" type="text" placeholder="Имя">
							<input class="input-form-sip" type="text" placeholder="Телефон">
							<button class="btn-sip">Отправить</button>
						</form> -->
						<?php echo do_shortcode('[contact-form-7 id="60" title="Есть вопросы?" html_class="form-sip"]') ?>
					</div>
				</div>
			</div>
		</div>
		<!-- end section First screen -->

		<!-- begin Second screen -->
		<div class="second-screen section-padding-top" data-scroll-index="1">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 second-wrap">
						<div class="circle-wrap">
							<div class="circle-container d-none d-sm-block">
								<div class="circle-block">
									<div class="circle-insert">
										<div class="circle-text-center"> 
											<?php
												$array_advantages = carbon_get_theme_option('crb_complex_advantages');
												foreach( $array_advantages as $index => $advantage ) {
													$content = $advantage['preimushhestva_textarea_content'];
													$index++;
												?>
													<div class="circle-<?php echo $index; ?> circle-text">
														<?php echo $content; ?>
													</div>
												<?php
												}
											?>
										</div>
									</div>
								</div>
							</div>
							<?php
								$array_advantages = carbon_get_theme_option('crb_complex_advantages');
								foreach( $array_advantages as $index => $advantage ) {
									$index++;
							?>
								<div class="mini-circle-<?php echo $index; ?> mini-circle" id="circle-<?php echo $index; ?>">
									<div class="mini-circle-img">
										<?php ?>
										<img class="img-base" src="<?php echo $advantage['preimushhestva_standart_img']; ?>" alt="">
										<img class="img-white" src="<?php echo $advantage['preimushhestva_active_img']; ?>" alt="">
									</div>
									<div class="mini-circle-cont">
										<p class="mini-circle-text">
											<?php echo $advantage['preimushhestva_title_text']; ?>
										</p>
										<div class="mini-circle-subtext">
											<?php echo $advantage['preimushhestva_textarea_content']; ?>
										</div>
									</div>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end Second screen -->

		<!-- begin Third screen -->
		<div data-scroll-index="2"></div>
		<div style="background-image:url('<?php echo get_theme_mod("background_image_third") ?>');"  class="third-screen" data-stellar-background-ratio="0.5">
			<div class="layer-second-screen"></div>
			<div class="container">
				<div class="row third-wrap">
					<div class="col-sm-12 third-container">
						<p class="title-third">
							<?php echo get_theme_mod("title_third") ?>
						</p>
						<p class="text-third">
							<?php echo get_theme_mod("subtitle_third") ?>
						</p>
						<a href="<?php echo get_theme_mod("file_third") ?>" download class="btn-sip file-btn-sip">Скачать прайс-лист <span class="btn-span-sip">PDF.</span></a>
					</div>
				</div>
			</div>
			<div style="background-image:url('<?php echo get_theme_mod("background_image_third") ?>');" class="third-screen delta_line delta_line_1 position-absolute wow slideInDown" data-wow-delay="0s" data-wow-duration="1s">
				<div class="layer-second-screen"></div>
			</div>
			<div style="background-image:url('<?php echo get_theme_mod("background_image_third") ?>');" class="third-screen delta_line delta_line_2 position-absolute wow slideInDown" data-wow-delay="0.5s" data-wow-duration="1s">
				<div class="layer-second-screen"></div>
			</div>
		</div>
		<!-- end Third screen -->

		<!-- begin Fourth screen -->
		<div class="fourth-screen section-padding-top" data-scroll-index="3">
			<div class="container fourth-container">
				<div class="row">
					<?php
						global $post;
						$myposts = get_posts('order=ASC&posts_per_page=-1&category=3&orderby=menu_order');
						foreach( $myposts as $post ) {
							setup_postdata( $post );
							?>
								<div class="col-sm-6 col-md-4 sip-block">
									<img class="img-sip-block" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
									<p class="title-sip-block"><?php the_title() ?></p>
									<div class="text-sip-block"><?php the_content() ?></div>
									<p class="price-sip-block"><?php echo carbon_get_the_post_meta('tipy_panelej_price') ?></p>
									
									<?php
										echo '$post->ID - ';
										echo $post->ID;
										// $size_panels = CFS()->get('размер_панели');
										$crb_show_table_version = carbon_get_theme_option('crb_show_table_version');
										$sizes_panel = carbon_get_post_meta( $post->ID, 'sizes_panel');
										if( !$crb_show_table_version ) {
											echo '<button class="btn-sip-block btn-sip" type="button" data-toggle="modal" data-target="#myModal2">Заказать</button>';
											echo '<div style="display: none;" class="data-size">';
											foreach ($sizes_panel as $size) {
												echo '<div class="size-block">';
												echo '<p class="name-size">'.$size["size_panel_attr"].'</p>';
												echo '<p class="price-size">'.$size["size_panel_price"].'</p>';
												echo '</div>';
											}
											echo '</div>';
										} else {
											// $size_panels = CFS()->get('таблица_размер_панели');
											$sizes_panel_table = carbon_get_post_meta( $post->ID, 'sizes_panel_table');
											$list_attr_panel = carbon_get_post_meta( $post->ID, 'list_attr_panel' );

											echo '<button class="btn-sip-block btn-sip" type="button" data-toggle="modal" data-target="#myModal2-table">Заказать</button>';
											
											echo '<div style="display: none;" class="table-version data-thead">';
											if( !empty($list_attr_panel) ) {
												foreach( $list_attr_panel as $key => $attr ) {
													if( !empty($attr) ) {
														$array = carbon_get_theme_option('size_panel_table_attr');
														foreach( $array as $elem ) {
															if( $elem['size_panel_attr_slug'] == $attr ) {
																echo '<div class="col-12 col-md-2 size-column table-column"><p>' . $elem['size_panel_attr_title'] . '</p></div>';
																break;
															}
														}
													}
												}
											}
											echo '</div>';
											
											
											echo '<div style="display: none;" class="table-version data-size">';

											if( !empty($sizes_panel_table) ) {
												foreach ($sizes_panel_table as $size) {
													echo '<div class="row table-row ">';

													// var_dump($list_attr_panel);
													
													if( !empty($list_attr_panel) ) {
														foreach( $list_attr_panel as $key => $attr ) {
															$slug = $attr;
															if( !empty($size["size_panel_table_".$slug]) ) echo '<div class="col-12 col-md-2 size-column table-column"><p>'.$size["size_panel_table_".$slug].'</p></div>';
														}
													}
													
													echo '<div class="col-12 col-md-2 table-column price-column"><p>'.$size["size_panel_table_price"].'</p></div>';
													echo '<div class="col-12 col-md-2 table-column quantity-column input-number pl-0 pr-0"><div class="quantity"><input type="number" min="0" max="99" class="input-form-number"></div></div>';
													echo '<div class="col-12 col-md-2 table-column totalPrice-column"><p>-</p></div>';
													echo '</div>';
												}
											} else {
												echo '<div class="row table-row ">';
													echo '<div class="col-12 table-column">Данные не были внесены</div>';
													echo '</div>';
											}
											echo '</div>';
										}
									?>
								</div>
							<?php
						}
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
		<!-- end Fourth screen -->

		<!-- begin Fifth screen -->
		<div data-scroll-index="4"></div>
		<div style="background-image:url('<?php echo get_theme_mod("background_image_fifth") ?>');"  class="fifth-screen" data-stellar-background-ratio="0.5">
			<div class="layer-second-screen"></div>
			<div class="container">
				<div class="row fifth-wrap">
					<div class="col-sm-12 fifth-container">
						<p class="title-fifth">
							<?php echo get_theme_mod("title_fifth") ?>
						</p>
						<p class="text-fifth">
							<?php echo get_theme_mod("text_fifth") ?>
						</p>
						<button class="btn-sip" type="button" data-toggle="modal" data-target="#myModal">Узнать условия сотрудничества</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end Fifth screen -->

		<!-- begin section screen -->
		<div class="section bg-image pt-5">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<p style="font-size:27px;color:black;" class="title_section_sert">
							<?php echo get_theme_mod("title_section_sert") ?>
						</p>
					</div>
					<?php
						$crb_media_gallery_sertificates = carbon_get_theme_option('crb_media_gallery_sertificates');
						foreach( $crb_media_gallery_sertificates as $index => $sertificate ) {
							?>
								<div class="col-12 col-sm-6 col-lg-3 mb-3">
									<img class="w-100" src="<?php echo wp_get_attachment_url($sertificate); ?>" alt="">
								</div>
							<?php
						}
					?>
				</div>
			</div>
		</div>
		<!-- end section screen -->

		<!-- begin Sixth screen -->
		<div class="sixth-screen" data-scroll-index="5">
			<div class="sixth-wrap">
				<div class="map-sixth" id="map">
					<!-- <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab2bc29e5280a913f11b4fbf99f9e46207d39cee2fec7e378593d65f469f9934e&amp;amp;source=constructor" width="100%" height="400" frameborder="0"></iframe> -->
				</div>
				<div class="row contacts-sixth">
					<ul class="col-12 col-sm-6 contacts-list">
						<li class="contacts-item">Телефон<br>
						<a class="contacts-item-link contacts-item-link-number" href="tel:+">
							<?php echo get_theme_mod("phone_sip") ?>
						</a></li>
						<li class="contacts-item">Email<br>
							<a class="contacts-item-link contacts-item-link-email" href="mailto:">
								<?php echo get_theme_mod("email_sip") ?>
							</a>
						</li>
						<li class="contacts-item">Адрес<br>
							<span id="address" class="contacts-item-link contacts-item-link-address" href="">
								<?php echo get_theme_mod("address_sip") ?>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end Sixth screen -->

<?php
// get_sidebar();
get_footer();
