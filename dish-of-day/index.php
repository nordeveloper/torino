<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Блюдо дня");
?>
<?
$dayNames = array(1=>"Понедельник","Вторник","Среда","Четверг","Пятница","Суббота","Воскресенье");
$arrFilterPizza = array("PROPERTY_day_dish_VALUE"=>$dayNames[Date("w")],  "SECTION_ID"=>1);
$arrFilterAll   = array("PROPERTY_day_dish_VALUE"=>$dayNames[Date("w")], "!SECTION_ID"=>1);
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"torino",
	Array(
	)
);?>


<!-- PIZZA OF DAY HEAD -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-xs text-left">
        <h2 class="sechead">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."included/pizzadayhead.php",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );?>
        </h2>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
        <h3 class="sechead text-uppercase">
            <a href="/catalog/pizza/">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."included/allpizzas.php",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                );?>
            </a>
        </h3>
    </div>
</div>


<!-- PIZZA OF DAY  -->
<div class="row">
<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "istorino", Array(
    "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
    "IBLOCK_ID" => "1",	// Инфоблок
    "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
    "ELEMENT_SORT_ORDER" => "rand",//"asc",	// Порядок сортировки элементов
    "ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
    "ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
    "FILTER_NAME" => "arrFilterPizza",	// Имя массива со значениями фильтра для фильтрации элементов
    "HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
    "ELEMENT_COUNT" => "3",	// Количество выводимых элементов
    "LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
    "PROPERTY_CODE" => array(	// Свойства
        0 => "",
        1 => "",
    ),
    "OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
    "VIEW_MODE" => "SECTION",	// Показ элементов
    "TEMPLATE_THEME" => "blue",	// Цветовая тема
    "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
    "LABEL_PROP" => "-",	// Свойство меток товара
    "SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
    "SHOW_OLD_PRICE" => "N",	// Показывать старую цену
    "SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
    "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
    "MESS_BTN_COMPARE" => "Сравнить",	// Текст кнопки "Сравнить"
    "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
    "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
    "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
    "PRICE_CODE" => array(	// Тип цены
        0 => "BASE",
    ),
    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
    "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
    "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
    "PRODUCT_PROPERTIES" => "",	// Характеристики товара
    "ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
    "DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
),
    false
);?>
</div>


<div class="divider"></div>



<!-- DISH OF DAY HEAD -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-xs text-left">
        <h2 class="sechead">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."included/dishofhead.php",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );?>
        </h2>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
        <h3 class="sechead text-uppercase">
            <a href="/catalog/">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."included/allmenu.php",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                );?>
            </a>
        </h3>
    </div>
</div>


<!-- DISH OF DAY  -->
<div class="row">
<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "istorino", Array(
    "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
    "IBLOCK_ID" => "1",	// Инфоблок
    "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
    "ELEMENT_SORT_ORDER" => "rand",//"asc",	// Порядок сортировки элементов
    "ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
    "ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
    "FILTER_NAME" => "arrFilterAll",	// Имя массива со значениями фильтра для фильтрации элементов
    "HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
    "ELEMENT_COUNT" => "6",	// Количество выводимых элементов
    "LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
    "PROPERTY_CODE" => array(	// Свойства
        0 => "",
        1 => "",
    ),
    "OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
    "VIEW_MODE" => "SECTION",	// Показ элементов
    "TEMPLATE_THEME" => "alldishes",	// Цветовая тема
    "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
    "LABEL_PROP" => "-",	// Свойство меток товара
    "SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
    "SHOW_OLD_PRICE" => "N",	// Показывать старую цену
    "SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
    "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
    "MESS_BTN_COMPARE" => "Сравнить",	// Текст кнопки "Сравнить"
    "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
    "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
    "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
    "PRICE_CODE" => array(	// Тип цены
        0 => "BASE",
    ),
    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
    "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
    "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
    "PRODUCT_PROPERTIES" => "",	// Характеристики товара
    "ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
    "DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
),
    false
);?>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
