<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>	
<!doctype html>
<html lang="ru">
	<head>
		<?php
			use Bitrix\Main\Page\Asset;
			// Пример подключения JS
			Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.6.0.min.js');
			// Пример подключения CSS
			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap-grid.min.css');
			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');
			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/template_styles.css');
			$APPLICATION->ShowHead();
		?>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title><? $APPLICATION->ShowTitle() ?></title>
	</head>

	<body>
		<? $APPLICATION->ShowPanel();?>

		<div class="container">
			<div class="header">
				<div class="header_logo">
					<a href="/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="">
					</a>
				</div>

				<div class="header_content">
					<div class="row">
						<span>Вязанные игрушки: <i>ручной работы</i></span>
					</div>
					<div class="row">
						<?// Поиск по заголовкам
							$APPLICATION->IncludeComponent("bitrix:search.title", "main_search", Array(
								"NUM_CATEGORIES" => "1",	// Количество категорий поиска
								"TOP_COUNT" => "5",	// Количество результатов в каждой категории
								"ORDER" => "date",	// Сортировка результатов
								"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
								"CHECK_DATES" => "N",	// Искать только в активных по дате документах
								"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
								"PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
								"CATEGORY_0_TITLE" => "",	// Название категории
								"CATEGORY_0" => array(	// Ограничение области поиска
									0 => "iblock_knit_shop",
								),
								"COMPONENT_TEMPLATE" => ".default",
								"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
								"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
								"CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
								"CATEGORY_0_iblock_knit_shop" => array(	// Искать в информационных блоках типа "iblock_knit_shop"
									0 => "4",
								)
							),
							false
						);?>
					</div>
					<div class="row">
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "N"
							), 
							false
						);?>
					</div>
				</div>

				<div class="header_cart">
					<a class="header_cart_auth" href="#">
						<svg>
							<use xlink:href="#power-button"></use>
						</svg>
						Войти
					</a>
					<?// Ссылка на корзину
						$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "small_basket", Array(
							"COMPONENT_TEMPLATE" => ".default",
								"PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
								"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",	// Страница оформления заказа
								"SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
								"SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
								"SHOW_EMPTY_VALUES" => "Y",	// Выводить нулевые значения в пустой корзине
								"SHOW_PERSONAL_LINK" => "Y",	// Отображать персональный раздел
								"PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
								"SHOW_AUTHOR" => "N",	// Добавить возможность авторизации
								"PATH_TO_AUTHORIZE" => "",	// Страница авторизации
								"SHOW_REGISTRATION" => "Y",	// Добавить возможность регистрации
								"PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
								"PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
								"SHOW_PRODUCTS" => "N",	// Показывать список товаров
								"POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
								"HIDE_ON_BASKET_PAGES" => "N",	// Не показывать на страницах корзины и оформления заказа
							),
							false
						);
					?>
				</div>
			</div>
		</div>
