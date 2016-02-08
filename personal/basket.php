<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Torino: Корзина пользователя");
?>



<div id="registrationpanel" class="container">
    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"torino", 
	array(
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DELETE",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "PROPERTY_CONSIST",
			5 => "PROPERTY_NUTRITION",
			6 => "PROPERTY_CALORIES",
			7 => "PROPERTY_4",
		),
		"PATH_TO_ORDER" => "/personal/order.php",
		"HIDE_COUPON" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"ACTION_VARIABLE" => "action",
		"COMPONENT_TEMPLATE" => "torino"
	),
	false
);?>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>