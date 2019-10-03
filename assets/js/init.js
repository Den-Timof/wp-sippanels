$(document).ready(function () {

	// Асинхронная загрузка CSS
	// Font Awesome CSS
	$("head").append("<link rel='stylesheet' type='text/css' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' />");
	// Font Roboto
	$("head").append("<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i' />");
	// // Libs CSS
	// $("head").prepend("<link rel='stylesheet' type='text/css' href='//xn--e1afgbdfngdou.xn--p1ai/wp-content/themes/sippanels/assets/css/libs.min.css' />");
	// // Bootstrap miltiselect CSS
  $("head").prepend("<link rel='stylesheet' type='text/css' href='//xn--e1afgbdfngdou.xn--p1ai/wp-content/themes/sippanels/assets/plugins/bootstrap-multiselect-master/bootstrap-multiselect.css' />");
	// // Style
  // $("head").prepend("<link rel='stylesheet' type='text/css' href='//xn--e1afgbdfngdou.xn--p1ai/wp-content/themes/sippanels/assets/css/style.css' />");
	
	// Плавный переход между элементами меню
	$(function(){
		$.scrollIt({
			upKey: 38,             // key code to navigate to the next section
			downKey: 40,           // key code to navigate to the previous section
		});
	});
	// 

	// Эффект параллакса на фоновом изображении
	if(window.matchMedia('(max-height: 1080px) and (min-width: 576px)').matches) {
		$(function(){
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 40
			});
		}); 
	}
	// 

	// Анимация при появлении на экране
	new WOW().init();
	// 

	// Полоска под элементами меню
	$('#menu-top-menu').lavalamp({
		easing: 'easeOutBack'
	});
	// 

	// Установка атрибутов для элементов меню
	function setAttrLinkMenu() {
		// var top_menu_link =	$('#menu-top-menu .menu-item a');
		// top_menu_link

		$('.menu-nav-list .menu-item a').each(function() {
			var top_menu_href = $(this).attr('href');
			top_menu_href = top_menu_href.replace(/\D/g,'');
			$(this).attr('data-scroll-nav', top_menu_href);
			$(this).attr('href', '');
		})
	}
	setAttrLinkMenu();
	// 

	// Удаление первого элемента меню в мобильной версии
	function deleteFirstLinkMobileMenu() {
		var menu_top_menu_1_item = $.makeArray($('#menu-top-menu-1 li'));
		menu_top_menu_1_item = menu_top_menu_1_item.splice(0,1)
		menu_top_menu_1_item[0].remove();
		
	}
	deleteFirstLinkMobileMenu();
	// 

	// Сброс всех форм, чекбоксов и радио-кнопок
	$('input[type=checkbox]').prop('checked', false);
	$('input[type=radio]').prop('checked', false);
	$('form').trigger('reset');
	//

	$('#myModal .personal-data-text').click(function() {
		$('#myModal .close').trigger('click');
		$('body').addClass('modal-open2');
	});
	$('#myModal2 .personal-data-text').click(function() {
		$('#myModal2 .close').trigger('click');
		$('body').addClass('modal-open2');
	});
	$('#myModal2-table .personal-data-text').click(function() {
		$('#myModal2-table .close').trigger('click');
		$('body').addClass('modal-open2');
	});
	$('#myModal4 .personal-data-text').click(function() {
		$('#myModal4 .close').trigger('click');
		$('body').addClass('modal-open2');
	});

	$('#myModal2 .send-message-text').click(function() {
		$('#myModal2 .close').trigger('click');
		$('body').addClass('modal-open2');
	});
	$('#myModal2-table .send-message-text').click(function() {
		$('#myModal2-table .close').trigger('click');
		$('body').addClass('modal-open2');
	});

	// $(document).mouseup(function (e){ // событие клика по веб-документу
	// 	var div = $("#myModal .modal-content"); // тут указываем ID элемента
	// 	if (!div.is(e.target) // если клик был не по нашему блоку
	// 	    && div.has(e.target).length === 0) { // и не по его дочерним элементам
	// 		$('body').removeClass('modal-open2'); // скрываем его
	// 	}
	// });
	// $(document).mouseup(function (e){ // событие клика по веб-документу
	// 	var div2 = $("#myModal2 .modal-content"); // тут указываем ID элемента
	// 	if (!div2.is(e.target) // если клик был не по нашему блоку
	// 	    && div2.has(e.target).length === 0) { // и не по его дочерним элементам
	// 		$('body').removeClass('modal-open2'); // скрываем его
	// 	}
	// });


	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".modal.show .modal-content"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
				&& div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('body').removeClass('modal-open2'); // скрываем его
		}
	});


	$('.modal .close').click(function() {
		$('body').removeClass('modal-open2'); // скрываем его
	});
	

	// Клик по чекбоксам форм
	$('form .check').click(function () {
		var lab_check = $(this);
		var inp_id = $(this).siblings('.wpcf7-form-control-wrap').children('.wpcf7-checkbox');
		var mailpoetcheck = $(this).siblings('.wpcf7-form-control-wrap').children('.wpcf7-mailpoetsignup').children('.wpcf7-list-label').children('input');
		$(this).toggleClass('onClick');
		if (lab_check.attr('for') == inp_id.attr('id')) {
			inp_id.children('.wpcf7-list-item').children('input').trigger('click');
		}
		if (lab_check.attr('for') == mailpoetcheck.attr('id')) {
			mailpoetcheck.trigger('click');
		}
	});
	//

	// Вкладки. Наведение на вкладку.
	if(window.matchMedia('(min-width: 576px)').matches) {
		$('.mini-circle').mouseover(function() {
			var mini_circle_img = $(this).children('.mini-circle-img');
			var mini_circle = mini_circle_img.parent('.mini-circle');
			var mini_circle_id = mini_circle.attr('id');
			var circle = mini_circle_id.replace('#', '');

			$('.mini-circle').removeClass('active');

			if(!mini_circle.hasClass('active')) {
				mini_circle.addClass('active');
			}
			$('.circle-text').hide();
			$('.'+circle).css('display', 'flex');
		});
		$('.mini-circle').mouseout(function() {
			var mini_circle_img = $(this).children('.mini-circle-img');
			var mini_circle = mini_circle_img.parent('.mini-circle');
			var mini_circle_id = mini_circle.attr('id');
			var circle = mini_circle_id.replace('#', '');

			$('.circle-text').hide();
			$('.'+circle).css('display', 'flex');
		});
		//
		$('.mini-circle-108').addClass('active');
		$('.circle-108').css('display', 'flex');
	};



	// Настройка телефона и электронной почты
	$('a[href="tel:+"]').each(function (i, e) {
		var element = $(e).html().replace(/\D+/g, "");
		$(this).attr('href', 'tel:+' + element);
	});
	$('a[href="mailto:"]').each(function (i, e) {
		var element = $(e).html();
		$(this).attr('href', 'mailto:' + element);
	});
	//

	// Клик по элементу списка в мобильном меню
	$('#navbarSupportedContent .menu-item a').click(function() {
		$('.mobile-navigation_header-sip .navbar-toggler').trigger('click');
	});
	//

	// Работа с Яндекс.Картами
	function loadYmaps() {
		
		// Создание обработчика для события window.onLoad
		ymaps.ready(function() {
			// Создание экземпляра карты и его привязка к созданному контейнеру
			var myMap = new ymaps.Map('map', { 
				center: [0, 0], 
				zoom: 900 
			});
	
			var address = $('#address').html().replace('<br>', ',');
			// console.log(address);
			
	
			var coorCity;
	
			var destinations = {};
			destinations.City = '';
	
			var menuContainer = $('#address');
	
			for (var item in destinations) {
	
				ymaps.geocode(address, { results: 1 }).then(function (res) {
					coorCity = res.geoObjects.get(0).geometry.getCoordinates();
					destinations.City = coorCity;
					// console.log(destinations.City);
		
					// Используем замыкание, чтобы работать с конкретным свойством объекта
					(function (title, geoPoint) {
						// Создаем обработчик по щелчку на ссылке
						$('#address').bind('click', function() {
							
							// Перемещаем карту
							myMap.panTo(coorCity, {flying: true});
							return false;
						}).end().appendTo(menuContainer);
					})(item, destinations.City)
	
					// Центрируем карту на городе
					ymaps.geocode(destinations.City, { results: 1 }).then(function (res) {
						var firstGeoObject  = res.geoObjects.get(0);
						var bounds          = firstGeoObject.properties.get('boundedBy');
		
						myMap.geoObjects.add(firstGeoObject);
						myMap.setBounds(bounds, { checkZoomRange: true });
					});
				});
			};

		});
	}
	
	// Появление iframe в видимой области экрана
	function isVisible(tag) {
		var t = $(tag);
		var w = $(window);
		var wt = w.scrollTop();
		var tt = t.offset().top;
		var tb = tt + t.height();
		return ((tb <= wt + w.height()) && (tt >= wt));
	}
	$(function () {
		$(window).scroll(function () {
			var b = $("#map");
			if (!b.prop("shown") && isVisible(b)) {
				b.prop("shown", true);
				loadYmaps()
			}
		});
	});
	//

	// Количество штук в форме
		jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up noselect"><img src="//xn--e1afgbdfngdou.xn--p1ai/wp-content/themes/sippanels/assets/img/quantity-up.png"></div><div class="quantity-button quantity-down noselect"><img src="//xn--e1afgbdfngdou.xn--p1ai/wp-content/themes/sippanels/assets/img/quantity-down.png"></div></div>').insertAfter('.quantity input');

		function setQuantity() {
			jQuery('.quantity').each(function() {
				var spinner = jQuery(this),
					input = spinner.find('input[type="number"]'),
					btnUp = spinner.find('.quantity-up'),
					btnDown = spinner.find('.quantity-down'),
					min = input.attr('min'),
					max = input.attr('max');
	
					
				// input.keypress(function(v) {
				// 	if(v.which == 38) {
				// 		console.log('Событие keypress у input[type="number"]');
						
				// 		v.preventDefault();
				// 	}
				// })
	
				btnUp.click(function() {
					var oldValue = parseFloat(input.val());
					
					if (oldValue >= max) {
						var newVal = oldValue;
					} else {
						var newVal = oldValue + 1;
					}
					spinner.find("input").val(newVal);
					spinner.find("input").trigger("change");
	
					if(input.val().length == 2 && !$('.quantity').hasClass('step-2') ) {
						$('.quantity').removeClass().addClass('quantity');
						$('.quantity').addClass('step-2');
					} else if(input.val().length == 3 && !$('.quantity').hasClass('step-3')) {
						$('.quantity').removeClass().addClass('quantity');
						$('.quantity').addClass('step-3');
					}
				});
	
				btnDown.click(function() {
					var oldValue = parseFloat(input.val());
	
					if (oldValue <= min) {
						var newVal = oldValue;
					} else {
						var newVal = oldValue - 1;
					}
					spinner.find("input").val(newVal);
					spinner.find("input").trigger("change");
	
					if(input.val().length == 2 && !$('.quantity').hasClass('step-2')) {
						$('.quantity').removeClass().addClass('quantity');
						$('.quantity').addClass('step-2');
					} else if(input.val().length == 1 && !$('.quantity').hasClass('step-1')) {
						$('.quantity').removeClass().addClass('quantity');
						$('.quantity').addClass('step-1');
					}
				});
	
				// console.log($('.quantity input[type="number"]').attr('disabled') == 'disabled');
				// if($('.quantity input[type="number"]').attr('disabled') == 'disabled') {
					
				// 	$('.quantity-up').click(function(e) {
				// 		e.preventDefault();
				// 	})
				// 	$('.quantity-down').click(function(e) {
				// 		e.preventDefault();
				// 	})
				// }
			});

		}
		setQuantity();


	// Появление модального окна при клике на картинку
	$('.img-sip-block').click(function() {
		$(this).siblings('.btn-sip-block').trigger('click');
	});
	// 

	// Добавляем обработчики событий
	var button_sip_block = $('.sip-block .btn-sip-block');
	button_sip_block.on('click', processOrderForm);
	var image_sio_block = $('.sip-block .img-sip-block');
	image_sio_block.on('click', processOrderForm);
	// 

	// Удаление класса onClick c элемента .check
	var clearCheck = function() {
		setTimeout(function(){
			if($('.modal').find('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
				// $('.modal').find('.check').removeClass('onClick');
				$('.modal').find('.close').trigger('click');
			}
		}, 2000);
	};
	$('.modal').find('.btn-sip').on('click', clearCheck);

	// Сброс форм при клике на кнопки "Обратный звонок" и "Отправить запрос"
	$('.button-feedback').click(function() {
		$($(this).attr('data-target')).find('form').trigger('reset');
		$($(this).attr('data-target')).find('.wpcf7-not-valid-tip').remove();
		$($(this).attr('data-target')).find('.wpcf7-response-output').hide();
		$($(this).attr('data-target')).find('.check').removeClass('onClick');
	});
	$('.send-message-text').click(function() {
		$($(this).attr('data-target')).find('form').trigger('reset');
		$($(this).attr('data-target')).find('.wpcf7-not-valid-tip').remove();
		$($(this).attr('data-target')).find('.wpcf7-response-output').hide();
		$($(this).attr('data-target')).find('.check').removeClass('onClick');
	});
	$('.fifth-container .btn-sip').click(function() {
		$($(this).attr('data-target')).find('form').trigger('reset');
		$($(this).attr('data-target')).find('.wpcf7-not-valid-tip').remove();
		$($(this).attr('data-target')).find('.wpcf7-response-output').hide();
		$($(this).attr('data-target')).find('.check').removeClass('onClick');
	});


	/**
	 * Обработка формы заказа
	 */
	function processOrderForm() {

		$('.sip-block .btn-sip-block').click(function() {

			let sip_block 		= $(this).parent('.sip-block'),				// Родительский блок
					btn_sip_block = sip_block.find('.btn-sip'),			// Кнопка блока
					id_modal 			= btn_sip_block.attr('data-target');	// Идентификатор попап-окна
			
			let title_sip_block_text 	= sip_block.find('.title-sip-block').text(),	// Заголовок блока
					text_sip_block_text 	= sip_block.find('.text-sip-block').text(),		// Описание блока
					img_sip_block_src 		= sip_block.find('.img-sip-block').attr('src');	// Путь изображения блока

			let sip_blocks_data_size = sip_block.children('.data-size'); // Мета-данные блока
			let sip_blocks_data_thead = sip_block.children('.data-thead').children().clone(); // Заголовки мета-данных блока
			
			$(id_modal).find('.thead-row').find('.size-column').remove();
			$(id_modal).find('.thead-row').prepend(sip_blocks_data_thead); // Добавляем заголовки в форму
			
			// Рассчёт ширины ячейки "Сумма всех выбранных товаров" засчёт количества заголовков таблицы
			var thead_column_length = $(id_modal).find('.thead-row .table-column').length;
			thead_column_length = Number(thead_column_length);
			var new_class = 'col-md-' + (8 - (6 - thead_column_length )*2 );
			$(id_modal).find('.total-price').removeClass('col-md-8');
			$(id_modal).find('.total-price').addClass(new_class);
			
			// Задаём заголовок форме
			$(id_modal).find('.modal-title').text(title_sip_block_text);
			$(id_modal).find('#input-modal-title').attr('value', title_sip_block_text);
			// Задаём описание форме
			$(id_modal).find('.modal-text').text(text_sip_block_text);
			// Задаём изображение товара форме
			$(id_modal).find('.form-modal2-block-img').children('img').attr('src', img_sip_block_src);
			$(id_modal).find('#input-modal-img').attr('value', img_sip_block_src);
			// Событие click
			$(id_modal).find('.btn-sip').unbind('submit').submit()
			
			// Выбираем массив "размеры панелей" в разметке (!)
			let array_size_blocks;
			if( sip_blocks_data_size.hasClass('table-version') ) {
				array_size_blocks = sip_blocks_data_size.children('.table-row');
			} else {
				array_size_blocks = sip_blocks_data_size.children('.size-block');
			}

			// Выбираем массив "цена размера панели"
			var array_name_size = array_size_blocks.children('.name-size');

			// Настройка перед появлением
			$(id_modal).find('form').trigger('reset');
			$(id_modal).find('.wpcf7-not-valid-tip').remove();
			$(id_modal).find('.wpcf7-response-output').hide();
			$(id_modal).find('.check').removeClass('onClick');
			$('.number-640 input').val(1);

			$(id_modal).find('#size-select').siblings('.btn-group').children('button.multiselect').removeClass('disabled');
			$(id_modal).find('#size-select').siblings('.btn-group').children('button.multiselect').removeAttr('disabled');
			$(id_modal).find('select').removeAttr('disabled');
			
			$(id_modal).find('input[type="number"]').attr('onkeypress', '');
			$(id_modal).find('input[type="number"]').siblings('.quantity-nav').show();
			$(id_modal).find('input[type="number"]').removeClass('disabled');
			
			$(id_modal).find('.btn-sip').unbind('click', stopSubmit);

			if($(id_modal).find('#size-select').siblings().is('.btn-group')) {
				$(id_modal).find('.multiselect-container').empty();
				$(id_modal).find('#size-select').children('option').each(function(g,h) {
					var wrap_elem_multi_cont = '' +
						'<li>' + 
							'<a tabindex="0">' +
								'<label class="radio" title="'+ $(h).text() +'">' + 
									'<input value="' + $(h).text() + '" type="radio">' +
									$(h).text() + 
								'</label>' +  
							'</a>' + 
						'</li>' +
					'';
					$(id_modal).find('.multiselect-container').append( wrap_elem_multi_cont );
				});
			}
			
			// Проверка на содержание дочерних элементов
			if(array_size_blocks.length === 0) {
				$(id_modal).find('select').attr('disabled', 'disabled');
				$(id_modal).find('#size-select').siblings('.btn-group').children('button.multiselect').addClass('disabled');
				$(id_modal).find('#size-select').siblings('.btn-group').children('button.multiselect').attr('disabled');

				$(id_modal).find('input[type="number"]').addClass('disabled');
				$(id_modal).find('input[type="number"]').attr('onkeypress', 'return false');
				$(id_modal).find('input[type="number"]').val(0);
				$(id_modal).find('input[type="number"]').siblings('.quantity-nav').hide();
				
				$(id_modal).find('select').children('option:selected').text('Размеров нет');
				$(id_modal).find('select').children('option:selected').attr('value', 'Размеров нет');
				$(id_modal).find('.form-modal2-total-price').children('p').children('b').children('span').text(0);

				var stopSubmit = function(e) {
						e.preventDefault();
				};
				$(id_modal).find('.btn-sip').on('click', stopSubmit);

				var wrap_elem_size_option = '<option value="Размеров нет">Размеров нет</option>';
				$('#size-select').append( wrap_elem_size_option );
			}
			//
			
			// Заполнение попап-окна значениями товара
			if( sip_blocks_data_size.hasClass('table-version') ) {
				$(id_modal).find('.tbody-wrapper').html( sip_blocks_data_size.html() );
				$(id_modal).find('input[type="number"]').val(0);

				$(id_modal).find('input[type="number"]').each(function() {
					$(this).insertAfter( $(this).siblings('.quantity-nav').find('.quantity-up') );
				})

				$(id_modal).find('.quantity-nav .quantity-button').each(function(i,e) {
					$(e).find('img').remove();
					if( $(e).hasClass('quantity-up') ) $(e).text('+');
					if( $(e).hasClass('quantity-down') ) $(e).text('-');
				});

				setQuantity();
				setNameMobileThead();
			
			} else {
				// В select подставляются размеры панелей
				var array_name_size = array_size_blocks.children('.name-size');
				$('#size-select').empty();
	
				array_name_size.each(function(a,b) {
					var wrap_elem_size_option = '' + 
						'<option value="' + $(b).text() + '">' + 
							$(b).text() + 
						'</option>' + 
					'';
					$('#size-select').append( wrap_elem_size_option );
				});
				//
			}
			// 


			var size_option_selected_text = $(id_modal).find('#size-select').children('option:selected').text();
			
			// var checked_option_selected = $(id_modal).find('#size-select').children('option:selected').prop('checked');
			// console.log(checked_option_selected);
			
			var size_multiselect_selected = $(id_modal).find('#size-select').siblings('.btn-group').children('button.multiselect').children('.multiselect-selected-text');
			size_multiselect_selected.text(size_option_selected_text);

			$(id_modal).find('#size-select').siblings('.btn-group').children('.multiselect-container').find('input[type="radio"]').each(function() {
				if( $(this).attr('value') == size_option_selected_text ) {
					$(this).prop('checked', true);
				}
			});



			// устанавливаем пробел после каждой третьей цифры с конца
			function setPriceStringWithSpaces(price) {
				
				price = Array.from(price)
				price.reverse();
				
				var arr = [];
				var count = 0;
				for (let index = 0; index < price.length; index++) {
					const element = price[index];
					
					if( element == '.' ) {
						count = 0;
						arr.push(element);
					} else {
						count++;
						arr.push(element);
					}
					// console.log(element);

					
					if( (count != 0) && (count % 3 == 0) && !(index == (price.length - 1)) ) {
						arr.push( ' ' );
					}
				}
				arr.reverse();
				price = arr;
				price = price.join('');
				// console.log(price);
				
				return price;
			}

			// устанавливаем пробел после каждой третьей цифры с конца
			function setPriceStringWithoutSpaces(price) {
				
				price = Array.from(price)
				
				var arr = [];
				for (let index = 0; index < price.length; index++) {
					const element = price[index];
					
					if( element == ' ' ) {
						continue;
					} else {
						arr.push( element );
					}
				}
				price = arr;
				price = price.join('');
				price = parseFloat(price);
				// console.log(price);
				
				return price;
			}
			

			// Задаём стартовую "итоговую сумму" форме
			function setTotalAmount() {

				if( sip_blocks_data_size.hasClass('table-version') ) {
					
					var	modal_tbody = $(id_modal).find('.tbody-wrapper'),
							tbody_rows = modal_tbody.find('.table-row');

					setPriceInRowTbody(); // установка значения "Итоговой цены" в строке таблицы
					function setPriceInRowTbody() {
						tbody_rows.each(function(i,e) {
							var tbody_row = $(e),
									columns_in_row = tbody_row.find('.table-column');

							var price_text, quantity_val, totalPrice_text

							columns_in_row.each(function(i,e) {
								var column_in_row = $(e);

								if( column_in_row.hasClass('price-column') )
									price_text = column_in_row.find('p').text().replace(/[^0-9\.]/gi, '');
								if( column_in_row.hasClass('quantity-column') )
									quantity_val 	= column_in_row.find('input[type="number"]').val();
									quantity_val = parseInt(quantity_val);


								if( column_in_row.hasClass('totalPrice-column') ) {
									totalPrice_text = parseFloat(price_text) * quantity_val;
									// totalPrice_text = price_text.match(/[\d\.]+/g) * quantity_val;
									
									// console.log( parseFloat(price_text) );
									
									
									totalPrice_text = setPriceStringWithSpaces( String(totalPrice_text) );
									column_in_row.find('p').text(totalPrice_text + ' руб.');
								}
									
							});

								
						});
					}
					
					setTotalQuantity(); // установка значения "Итогового количества"
					function setTotalQuantity() {
						var totalQuantity = 0;
						var totalQuantityTable =  $(id_modal).find('.totalQuantity-column');

						var quantity_columns = $(id_modal).find('.quantity-column');
						quantity_columns.each(function(i,e) {
							var val_quantity_column = $(e).find('input[type="number"]').val();
							val_quantity_column = parseInt(val_quantity_column);
							totalQuantity = totalQuantity + val_quantity_column;

							
						});
						
						totalQuantityTable.text( totalQuantity );
					}
					
					setTotalPrice(); // установка значения "Итоговой суммы" во всей таблице
					function setTotalPrice() {
						var totalPrice = 0;
						var totalPriceTable =  $(id_modal).find('.totalPriceTable-column');

						var totalPrice_columns = $(id_modal).find('.totalPrice-column');
						totalPrice_columns.each(function(i,e) {
							var totalPrice_column = $(e).find('p').text().replace(/[^0-9\.\,]/gi, '');
							// console.log('totalPrice_column - ' + setPriceStringWithoutSpaces(totalPrice_column));
							
							totalPrice = totalPrice + parseFloat(totalPrice_column);
						});
						// console.log('\n\n');
						
						
						totalPrice = setPriceStringWithSpaces( String(totalPrice) );
						totalPriceTable.text( totalPrice + ' руб.' );
					}

					setTextareaFormModal();
					function setTextareaFormModal() {
						var textarea_form_modal = '';
						var count = 0;

						// var totalQuantity_column = $(id_modal).find('.totalQuantity-column').text();
						// var totalPriceTable_column = $(id_modal).find('.totalPriceTable-column').text();
						
						tbody_rows.each(function(i,e) {
							var tbody_row = $(e),
									tbody_index_row = i,
									columns_in_row = tbody_row.find('.table-column');
	
							// Переносим данные таблицы в форму
							// var length_column_in_row 			= tbody_row.find('.length-column p').text();
							// length_column_in_row = parseFloat(length_column_in_row);
							// length_column_in_row = String(length_column_in_row);
							// var width_column_in_row 			= tbody_row.find('.width-column p').text();
							// width_column_in_row = parseFloat(width_column_in_row);
							// width_column_in_row = String(width_column_in_row);
							// var thickness_column_in_row 	= tbody_row.find('.thickness-column p').text();
							// thickness_column_in_row = parseFloat(thickness_column_in_row);
							// thickness_column_in_row = String(thickness_column_in_row);
							
							var price_column_in_row 			= tbody_row.find('.price-column p').text();
							var quantity_column_in_row 		= tbody_row.find('.quantity-column input[type="number"]').val();
							var totalPrice_column_in_row 	= tbody_row.find('.totalPrice-column').text();

							var size_column_in_row_text = '';
							var size_column_in_row = tbody_row.find('.size-column p').each(function() {
								size_column_in_row_text += String( parseFloat( $(this).text() ) );
								size_column_in_row_text += 'x';
							});

							// console.log( size_column_in_row_text.slice(-1) == 'x' );
							// console.log( size_column_in_row_text.substring(0, size_column_in_row_text.length - 1) );
							
							if( size_column_in_row_text.slice(-1) == 'x' ) {
								size_column_in_row_text = size_column_in_row_text.substring(0, size_column_in_row_text.length - 1)
							}


							columns_in_row.each(function(i,e) {
								var column_in_row = $(e);
	
								if( (column_in_row.hasClass('quantity-column')) && (column_in_row.find('input[type="number"]').val() > 0) ) {
									// console.log(tbody_row);

									textarea_form_modal = textarea_form_modal + 
									(++count) +'. ' + size_column_in_row_text 
										+ ' - ' + price_column_in_row + ' - ' + quantity_column_in_row + ' шт.' + ' - ' + 'Итого: ' + totalPrice_column_in_row +';\n';
								}
							});
						});

						// textarea_form_modal = textarea_form_modal + '\n' +
						// 'Общее количество: ' + totalQuantity_column + ' шт.;\n' + 
						// 'Общая сумма: ' + totalPriceTable_column + ';\n';

						// console.log(textarea_form_modal);
						// console.log('\n');
						
						

						$(id_modal).find('#input-modal-textarea').text(textarea_form_modal);
					}
					

					var totalQuantity_text = $(id_modal).find('.totalQuantity-column').text();
					$(id_modal).find('#input-modal-quantity').attr('value', totalQuantity_text + ' шт.');
					
					var totalPriceTable_text = $(id_modal).find('.totalPriceTable-column').text();
					$(id_modal).find('#input-modal-totalPrice').attr('value', totalPriceTable_text);

				} else {
					
					var size_option_text 	= $('#size-select option:selected').text(), // Выбирается selected
							array_size_blocks 		= sip_block.children('.data-size').children('.size-block'), // Выббираем массив "размеры панелей" в разметке (!)
							array_name_size 			= array_size_blocks.children('.name-size'), // Выбираем массив "цена размера панели"
							array_price_size 			= array_size_blocks.children('.price-size'); // Выббираем массив "размеры панелей"
	
					// Проход по элементам массива "размеры панелей"
					array_price_size.each(function(t,y) {
						// Проход по элементам массива "цена размера панели"
						array_name_size.each(function(u,o) {
							// Если индексы двух массивов равны, а также элемент массива равен значению selected
							if(t == u && size_option_text == $(o).text()) {
	
								// Значение "цены" у элемента "размер панели"
								var price_text = $(y).text().replace(/\D+/g, "");
								// Значение "количества"
								var value_type_number = $('input[type="number"].input-form-number').val();
								
								// Считаем "итоговую сумму"
								var new_value_price;
								new_value_price = value_type_number * price_text;
								
								// Записываем полученную сумму в разметку
								var form_modal2_total_price_span = $(id_modal).find('.form-modal2-total-price').children('p').children('b').children('span');
								if(new_value_price > 0) {
									form_modal2_total_price_span.text(new_value_price);
								} else {
									form_modal2_total_price_span.text(0);
								}
	
								// Обработка полученной суммы
								var form_price_text = form_modal2_total_price_span.text();
								var arr_form_price_1 = form_price_text.split('');
								var arr_form_price_2 = [];
								var arr_form_price_3 = [];
								
								for(var count = 0; count < arr_form_price_1.length; count++) {
									arr_form_price_2.push(arr_form_price_1[count])
								}
								arr_form_price_2.reverse()
								// console.log(arr_form_price_2);
								
								for(var count = 0; count < arr_form_price_2.length; count++) {
									if(arr_form_price_2.length > 3) {
	
										if( (count > 0) & (count % 3 == 0) ) {
											arr_form_price_3.push(' ');
											arr_form_price_3.push(arr_form_price_2[count])
										} else {
											arr_form_price_3.push(arr_form_price_2[count])
										}
									} else if(arr_form_price_2.length <= 3) {
										arr_form_price_3.push(arr_form_price_2[count])
									};
								}
								var string_arr_form_price_3 = arr_form_price_3.reverse().join().replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
	
								
								form_modal2_total_price_span.text(string_arr_form_price_3);
								// console.log(form_modal2_total_price_span.text());
	
								$('#input-total-price').attr('value', form_modal2_total_price_span.text());
								
	
								new_value_price = 0;
							}
						});
					});
				}

			}
			setTotalAmount();

			// Событие keypress у элемента input[type="number"]
			$(id_modal).find('input[type="number"]').keypress(function(m) {
				if(m.keyCode == 13 || m.keyCode == 38 || m.keyCode == 40) {
					m.preventDefault();
				}
			});
			// 

			// Bootstrap multiselect
			$('#size-select').multiselect();
			//

			// Событие change у элемента select в форме
			$('#size-select').change(function() {
				setTotalAmount();
			});
			// 
			// Событие change у элемента input[type="number"] в форме
			$('input[type="number"].input-form-number').change(function() {
				setTotalAmount();
			});
			//

			// Закрытие формы при отправке
			var clearNumber = function() {
				setTimeout(function(){
					if($(id_modal).find('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
						$(id_modal).find('.close').trigger('click');
					}
				}, 2000);
			};
			$(id_modal).find('.btn-sip').on('click', clearNumber);

		});

		jQuery(document).on('click', '.wpcf7-submit', function(e){
			if( jQuery('.ajax-loader').hasClass('is-active') ) {
				e.preventDefault();
				return false;
			}
		});
		jQuery(document).on('click', '.wpcf7-submit', function(e){
			if (jQuery('img', jQuery(this).closest('div')).css('visibility') === 'visible') {
				e.preventDefault(); 
				return false;
			}
		});
		
	}
	processOrderForm()
	//

	function setNameMobileThead() {

		
		let table_form 			= $('#myModal2-table .table-wrap'),
				thead_columns 	= table_form.find('.thead-row .table-column p'),
				tbody_rows 			= table_form.find('.tbody-wrapper .table-row');
				
		tbody_rows.each(function(i,e) {
			let tbody_row = $(e);
			let tbody_columns		=	tbody_row.find('.table-column');
				
			// console.log( 'tbody_row - ' + ++i );
			
			tbody_columns.each(function(i,e) {
				let tbody_column = $(e),
				tbody_column_index = i,
				tbody_column_html = $(e).html();

				// console.log( 'tbody_column - ' + ++i );
				
				if( $(e).find('input[type="number"]').length > 0 ) {
					$(e).find('input[type="number"]').insertAfter( $(e).find('.quantity-up') );
				}
				
				thead_columns.each(function(i,e) {
					let thead_column 				= $(e),
					thead_column_index 	= i,
					thead_column_text 	= $(e).text();
					
					if( (window.matchMedia('(max-width: 767.98px)').matches) ) {
						if( thead_column_index == tbody_column_index ) {
							if( tbody_column.find('span').length > 0 ) {
								return false;
							} else {
								$(tbody_column).prepend('<span style="font-weight: bold;">' + thead_column_text + ' : </span>');
							}
						}
					} else if( (window.matchMedia('(min-width: 768px)').matches) ) {
						if( thead_column_index == tbody_column_index ) {
							if( tbody_column.find('span').length > 0 ) {
								tbody_column.find('span').remove();
							}
						}
					}
	
				});
			})
		});
	}
	setNameMobileThead();

	$(window).resize(function() {
		setNameMobileThead();
	});

});