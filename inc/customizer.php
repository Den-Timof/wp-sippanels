<?php
/**
 * sippanels Theme Customizer
 *
 * @package sippanels
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// function addNewTextFieldInTheCustomizer($name_section, $name_setting, $label_control, $selector_partial, $default_setting ) {
// 	$wp_customize->add_setting( $name_setting, 
// 		array(
// 			'default'     		=> __('', $default_setting),
// 			'transport'   		=> 'refresh',
// 	));
// 	$wp_customize->add_control(
// 		$name_setting,
// 		array(
// 			'label'    => __( $label_control, 'sippanels' ),
// 			'section'  => $name_section,
// 			'type'     => 'text',
// 		)
// 	);
// 	$wp_customize->selective_refresh->add_partial($name_setting, array(
// 		'selector' 				=> $selector_partial,
// 		'render_callback' 		=> 'sippanels_customize_partials_'+ $name_setting,
// 	));
// }

function sippanels_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sippanels_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sippanels_customize_partial_blogdescription',
		));
	}

	$wp_customize->add_panel( 'settings_sippanels', array(
		'title' => __( 'Настройка лэндинга СипКомплект' ),
		'priority' => 201
	));

	// Основные настройки лэндинга **********************************************
		$wp_customize->add_section( 'general_settings_landing', array(
			'title'      => __( 'Основные настройки лэндинга', 'sippanels' ),
			'panel' => 'settings_sippanels',
		));

			// logo_image ( Логотип )
				$wp_customize->add_setting( 'logo_image' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
				));
				$wp_customize->add_control(
					new WP_Customize_Image_Control(	$wp_customize, 'logo', array(
								'label'      => __( 'Загрузить логотип', 'sippanels' ),
								'section'    => 'general_settings_landing',
								'settings'   => 'logo_image',
								'context'    => 'your_setting_context'
						)
					)
				);
				$wp_customize->selective_refresh->add_partial('logo_image', array(
					'selector' 				=> ['.logo_image_block'],
					'render_callback' 		=> 'sippanels_customize_partials_logo_image',
				));
			//

			// title_header ( Заголовок шапки )
				$wp_customize->add_setting( 'title_header' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
				));
				$wp_customize->add_control('title_header',	array(
					'label'    => __( 'Заголовок шапки', 'sippanels' ),
					'section'  => 'general_settings_landing',
					'type'     => 'text',
				));
				$wp_customize->selective_refresh->add_partial('title_header', array(
					'selector' 				=> ['.menu-title-text'],
					'render_callback' 		=> 'sippanels_customize_partials_title_header',
				));
			//

			// phone_sip ( Телефон )
				$wp_customize->add_setting( 'phone_sip' , array(
						'default'     		=> __('', 'sippanels'),
						'transport'   		=> 'refresh',
				));
				$wp_customize->add_control('phone_sip',	array(
						'label'    => __( 'Телефон', 'sippanels' ),
						'section'  => 'general_settings_landing',
						'type'     => 'text',
				));
				$wp_customize->selective_refresh->add_partial('phone_sip', array(
					'selector' 				=> ['.phone-feedback', '.contacts-item-link-number'],
					'render_callback' 		=> 'sippanels_customize_partials_phone_sip',
				));
			//

			// email_sip ( Электронная почта )
				$wp_customize->add_setting( 'email_sip' , array(
						'default'     		=> __('', 'sippanels'),
						'transport'   		=> 'refresh',
				));
				$wp_customize->add_control('email_sip',	array(
						'label'    => __( 'Электронная почта', 'sippanels' ),
						'section'  => 'general_settings_landing',
						'type'     => 'text',
				));
				$wp_customize->selective_refresh->add_partial('email_sip', array(
					'selector' 				=> ['.contacts-item-link-email'],
					'render_callback' 		=> 'sippanels_customize_partials_email_sip',
				));
			//

			// address_sip ( Адрес )
				$wp_customize->add_setting( 'address_sip' , array(
						'default'     		=> __('', 'sippanels'),
						'transport'   		=> 'refresh',
				));
				$wp_customize->add_control('address_sip',	array(
						'label'    => __( 'Адрес', 'sippanels' ),
						'section'  => 'general_settings_landing',
						'type'     => 'text',
				));
				$wp_customize->selective_refresh->add_partial('address_sip', array(
					'selector' 				=> ['.contacts-item-link-address'],
					'render_callback' 		=> 'sippanels_customize_partials_address_sip',
				));
			//



	// *********************************************************

	// Настройка первой секции лэндинга **********************************************
		$wp_customize->add_section( 'first_section', array(
				'title'      => __( 'Первая секция', 'sippanels' ),
				'panel' => 'settings_sippanels',
		)); 

			// title_first ( Заголовок первой секции )
				$wp_customize->add_setting( 'title_first' , 
					array(
						'default'     		=> __('', 'sippanels'),
						'transport'   		=> 'refresh',
				));
				$wp_customize->add_control(
					'title_first',
					array(
						'label'    => __( 'Заголовок первого секции', 'sippanels' ),
						'section'  => 'first_section',
						'type'     => 'text',
					)
				);
				$wp_customize->selective_refresh->add_partial('title_first', array(
					'selector' 				=> '.caption-column-left .caption',
					'render_callback' 		=> 'sippanels_customize_partials_title_first',
				));
			//
			
			// subtitle_first ( Подзаголовок первой секции )
				$wp_customize->add_setting( 'subtitle_first' , 
					array(
						'default'     		=> __('Подзаголовок', 'sippanels'),
						'transport'   		=> 'refresh',
				));
				$wp_customize->add_control(
					'subtitle_first',
					array(
						'label'    => __( 'Подзаголовок первой секции', 'sippanels' ),
						'section'  => 'first_section',
						'type'     => 'text',
					)
				);
				$wp_customize->selective_refresh->add_partial('subtitle_first', array(
					'selector' 				=> '.text-column-left .text',
					'render_callback' 		=> 'sippanels_customize_partials_subtitle_first',
				));
			//

			// textLink_first ( Текст ссылки )
				// $wp_customize->add_setting( 'textLink_first' , 
				// 	array(
				// 		'default'     		=> __('Текст', 'sippanels'),
				// 		'transport'   		=> 'refresh',
				// ));
				// $wp_customize->add_control(
				// 	'textLink_first',
				// 	array(
				// 		'label'    => __( 'Текст ссылки', 'sippanels' ),
				// 		'section'  => 'first_section',
				// 		'type'     => 'text',
				// 	)
				// );
				// $wp_customize->selective_refresh->add_partial('textLink_first', array(
				// 	'selector' 				=> '.text-column-left .text-link',
				// 	'render_callback' 		=> 'sippanels_customize_partials_textLink_first',
				// ));
			//

			// hrefLink_first ( Ссылка )
				// $wp_customize->add_setting( 'hrefLink_first' , 
				// 	array(
				// 		'default'     		=> __('#', 'sippanels'),
				// 		'transport'   		=> 'refresh',
				// ));
				// $wp_customize->add_control(
				// 	'hrefLink_first',
				// 	array(
				// 		'label'    => __( 'Ссылка', 'sippanels' ),
				// 		'section'  => 'first_section',
				// 		'type'     => 'text',
				// 	)
				// );
				// $wp_customize->selective_refresh->add_partial('hrefLink_first', array(
				// 	'selector' 				=> '.text-column-left .text-link',
				// 	'render_callback' 		=> 'sippanels_customize_partials_hrefLink_first',
				// ));
			//

			// background_image_first ( Фоновое изображение )
				$wp_customize->add_setting( 'background_image_first' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
				));
				$wp_customize->add_control(
					new WP_Customize_Image_Control(	$wp_customize, 'background_image_first', array(
								'label'      => __( 'Загрузить фоновое изображение', 'sippanels' ),
								'section'    => 'first_section',
								'settings'   => 'background_image_first',
								'context'    => ''
						)
					)
				);
				$wp_customize->selective_refresh->add_partial('background_image_first', array(
					'selector' 				=> ['.first-screen'],
					'render_callback' 		=> 'sippanels_customize_partials_background_image_first',
				));
			//



			// addNewTextFieldInTheCustomizer( 'first_section', 'setting1', 'Новая настройка', '.title-form', 'Текст по умолчанию' );
	// *********************************************************

	// Настройка третьей секции лэндинга **********************************************
	$wp_customize->add_section( 'third_section' , array(
			'title'      => __( 'Третья секция', 'sippanels' ),
			'panel' => 'settings_sippanels',
	)); 
	
		// title_third ( Заголовок третьей секции )
			$wp_customize->add_setting( 'title_third' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(	'title_third',	array(
					'label'    => __( 'Заголовок третьей секции', 'sippanels' ),
					'section'  => 'third_section',
					'type'     => 'text',
				)
			);
			$wp_customize->selective_refresh->add_partial('title_third', array(
				'selector' 				=> '.title-third',
				'render_callback' 		=> 'sippanels_customize_partials_title_third',
			));
		//

		// subtitle_third ( Заголовок третьей секции )
			$wp_customize->add_setting( 'subtitle_third' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(	'subtitle_third',	array(
					'label'    => __( 'Подзаголовок третьей секции', 'sippanels' ),
					'section'  => 'third_section',
					'type'     => 'textarea',
				)
			);
			$wp_customize->selective_refresh->add_partial('subtitle_third', array(
				'selector' 				=> '.text-third',
				'render_callback' 		=> 'sippanels_customize_partials_'.'subtitle_third',
			));
		//

		// file_third ( Файл третьей секции )
			$wp_customize->add_setting( 'file_third' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control( 
				new WP_Customize_Upload_Control( $wp_customize, 'file_third', array(
					'label'      => __( 'Загрузить файл', 'sippanels' ),
					'section'    => 'third_section',
					'settings'   => 'file_third',
				))
			);
			$wp_customize->selective_refresh->add_partial('file_third', array(
				'selector' 				=> '.file-btn-sip',
				'render_callback' 		=> 'sippanels_customize_partials_'.'file_third',
			));
		//

		// background_image_third ( Фоновое изображение )
			$wp_customize->add_setting( 'background_image_third' , array(
				'default'     		=> __('', 'sippanels'),
				'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(
				new WP_Customize_Image_Control(	$wp_customize, 'background_image_third', array(
							'label'      => __( 'Загрузить фоновое изображение', 'sippanels' ),
							'section'    => 'third_section',
							'settings'   => 'background_image_third',
							'context'    => ''
					)
				)
			);
			$wp_customize->selective_refresh->add_partial('background_image_third', array(
				'selector' 				=> ['.third-screen'],
				'render_callback' 		=> 'sippanels_customize_partials_background_image_third',
			));
		//
	// *********************************************************

	// Настройка пятой секции лэндинга **********************************************
	$wp_customize->add_section( 'fifth_section' , array(
		'title'      => __( 'Пятая секция', 'sippanels' ),
		'panel' => 'settings_sippanels',
	));

		// title_fifth ( Заголовок пятой секции )
			$wp_customize->add_setting( 'title_fifth' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(	'title_fifth',	array(
					'label'    => __( 'Заголовок пятой секции', 'sippanels' ),
					'section'  => 'fifth_section',
					'type'     => 'text',
				)
			);
			$wp_customize->selective_refresh->add_partial('title_fifth', array(
				'selector' 				=> '.title-fifth',
				'render_callback' 		=> 'sippanels_customize_partials_title_fifth',
			));
		//

		// text_fifth ( Текст пятой секции )
			$wp_customize->add_setting( 'text_fifth' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(	'text_fifth',	array(
					'label'    => __( 'Текст пятой секции', 'sippanels' ),
					'section'  => 'fifth_section',
					'type'     => 'textarea',
				)
			);
			$wp_customize->selective_refresh->add_partial('text_fifth', array(
				'selector' 				=> '.text-fifth',
				'render_callback' 		=> 'sippanels_customize_partials_'.'text_fifth',
			));
		//

		
		// background_image_fifth ( Фоновое изображение )
			$wp_customize->add_setting( 'background_image_fifth' , array(
				'default'     		=> __('', 'sippanels'),
				'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(
				new WP_Customize_Image_Control(	$wp_customize, 'background_image_fifth', array(
							'label'      => __( 'Загрузить фоновое изображение', 'sippanels' ),
							'section'    => 'fifth_section',
							'settings'   => 'background_image_fifth',
							'context'    => ''
					)
				)
			);
			$wp_customize->selective_refresh->add_partial('background_image_fifth', array(
				'selector' 				=> ['.fifth-screen'],
				'render_callback' 		=> 'sippanels_customize_partials_background_image_fifth',
			));
		//

	// *********************************************************

	// Настройка секции "Сертификаты" **********************************************
	$wp_customize->add_section( 'sert_section' , array(
			'title'      => __( 'Секция "Сертификаты"', 'sippanels' ),
			'panel' => 'settings_sippanels',
	)); 

		// title_section_sert ( Заголовок первой секции )
			$wp_customize->add_setting( 'title_section_sert' , array(
					'default'     		=> __('', 'sippanels'),
					'transport'   		=> 'refresh',
			));
			$wp_customize->add_control(	'title_section_sert',	array(
					'label'    => __( 'Заголовок секции', 'sippanels' ),
					'section'  => 'sert_section',
					'type'     => 'text',
				)
			);
			$wp_customize->selective_refresh->add_partial('title_section_sert', array(
				'selector' 				=> '.title_section_sert',
				'render_callback' 		=> 'sippanels_customize_partials_title_section_sert',
			));
		//

	// *********************************************************


}
add_action( 'customize_register', 'sippanels_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sippanels_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sippanels_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sippanels_customize_preview_js() {
	wp_enqueue_script( 'sippanels-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sippanels_customize_preview_js' );
