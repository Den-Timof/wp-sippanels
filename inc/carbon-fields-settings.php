<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {


	/**
	 * Типы панелей
	 */
	Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_fields( array(

			Field::make( 'separator', 'crb_separator_1', 'Типы панелей' ),
			
			Field::make( 'checkbox', 'crb_show_table_version', 'Использовать версию панелей с таблицами' ),
			Field::make( 'complex', 'size_panel_table_attr', 'Список используемых атрибутов для панелей' )
				->set_layout( 'tabbed-vertical' )
				->setup_labels( array(
					'plural_name'	=>	'атрибуты',
					'singular_name'	=>	'атрибут'
				) )
				->set_conditional_logic( array(
					array(
						'field' => 'crb_show_table_version',
						'value' => true,
					)
				))
				->add_fields( array(
					Field::make( 'text', 'size_panel_attr_title', 'Название атрибута' )->set_width(50)->set_required(true),
					Field::make( 'text', 'size_panel_attr_slug', 'Ярлык атрибута' )->set_width(50)->set_required(true),
				))->set_header_template( '<% if (size_panel_attr_title) { %>
					<%- $_index+1 %> : <%- size_panel_attr_title %>
				<% } %>' ),

			Field::make( 'separator', 'crb_separator_2', 'Преимущества' ),

			Field::make( 'complex', 'crb_complex_advantages', 'Список преимуществ' )
				->set_layout( 'tabbed-horizontal' )
				->setup_labels( array(
					'plural_name'	=>	'преимущества',
					'singular_name'	=>	'преимущество'
				) )
				->add_fields( array(
					Field::make( 'text', 'preimushhestva_title_text', 'Заголовок преимущества' ),
					Field::make( 'textarea', 'preimushhestva_textarea_content', 'Текст преимущества' ),
					Field::make( 'image', 'preimushhestva_standart_img', 'Стандартная картинка' )
						->set_width(30)
						->set_value_type('url'),
					Field::make( 'image', 'preimushhestva_active_img', 'Активная картинка' )
						->set_width(30)
						->set_value_type('url'),
				)),

			Field::make( 'separator', 'crb_separator_3', 'Сертификаты' ),

			Field::make( 'media_gallery', 'crb_media_gallery_sertificates', 'Галерея сертификатов' )
				->set_type( array( 'image' ) )
		) );

	/**
	 * Записи рубрики "Типы панелей"
	 */
	Container::make( 'post_meta', 'Price panels' )
		->show_on_category('tipy-panelej')
		->add_fields( array(
			Field::make( 'text', 'tipy_panelej_price', '' )->set_required(true),
		) )
		->set_context('side')
		->set_priority('default');



	$fields_attr_panel = array();

	$names_attr_panel = array();
	$fieldmake_attr_panel = array();

	$should_define = carbon_get_theme_option( 'crb_show_table_version' ) === false;
	$size_panel_table_attr = carbon_get_theme_option( 'size_panel_table_attr' );

	if( !empty($size_panel_table_attr) ) {
		foreach( $size_panel_table_attr as $attr ) {
			
			$slug = $attr['size_panel_attr_slug'];
			$title = $attr['size_panel_attr_title'];

			$fieldmake_attr_panel[] = Field::make( 'text', 'size_panel_table_'.$slug, $title )
				->set_required(true)
				->set_conditional_logic( array(array(
					'field' => 'parent.list_attr_panel',
					'value' => $slug,
					'compare' => 'INCLUDES',
				)));
			
			$names_attr_panel[$slug] = $title;
		}

		$fieldmake_attr_panel[] = Field::make( 'text', 'size_panel_table_price', 'Стоимость' )->set_required(true);
	}

	$post_meta_fields = array();

	if ( $should_define ) {
		$post_meta_fields[] = Field::make( 'complex', 'sizes_panel', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'plural_name'	=>	'размеры',
				'singular_name'	=>	'размер'
			) )
			->add_fields( array(

				Field::make( 'text', 'size_panel_attr', 'Атрибуты размера' )->set_required(true),
				Field::make( 'text', 'size_panel_price', 'Цена размера' )->set_required(true),

			))->set_header_template( '<% if (size_panel_attr) { %>
				<%- $_index+1 %> : <%- size_panel_attr %>
			<% } %>' );
		;
	} else {
		$post_meta_fields[] = Field::make( 'set', 'list_attr_panel', 'Список атрибутов' )
		->add_options( $names_attr_panel )
		->set_help_text( 'Выбирать не более трёх пунктов' );
		$post_meta_fields[] = Field::make( 'complex', 'sizes_panel_table', 'Список размеров' )
			->set_help_text('Версия с таблицами')
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'plural_name'	=>	'размеры',
				'singular_name'	=>	'размер'
			) )
			->add_fields( $fieldmake_attr_panel)->set_header_template( '<% if (size_panel_table_price) { %>
				<%- $_index+1 %> : <%- size_panel_table_price %>
			<% } %>' );
		;

	}

	// Container::make( 'post_meta', 'Атрибуты панели' )
	// 	->show_on_category('tipy-panelej')
	// 	->add_fields( array(

	// 	) );
	
	Container::make( 'post_meta', 'Размеры панели' )
		->show_on_category('tipy-panelej')
		->add_fields( $post_meta_fields );

}