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
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"istorino", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "rand",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilterPizza",
		"HIDE_NOT_AVAILABLE" => "N",
		"ELEMENT_COUNT" => "3",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "CONSIST",
			1 => "PORTION",
			2 => "",
		),
		"OFFERS_LIMIT" => "5",
		"VIEW_MODE" => "SECTION",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"DETAIL_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#CODE#/",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"COMPONENT_TEMPLATE" => "istorino",
		"SEF_MODE" => "N"
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
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"istorino", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "rand",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilterAll",
		"HIDE_NOT_AVAILABLE" => "N",
		"ELEMENT_COUNT" => "6",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"VIEW_MODE" => "SECTION",
		"TEMPLATE_THEME" => "alldishes",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"DETAIL_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#CODE#/",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"COMPONENT_TEMPLATE" => "istorino",
		"SEF_MODE" => "N"
	),
	false
);?>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
