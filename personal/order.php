<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Torino: Оформление заказа");
?><?
if (!CUser::IsAuthorized()):
?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"torino",
	Array(
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	)
);?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	".default",
		Array(
			"SHOW_FIELDS" => array(),
			"REQUIRED_FIELDS" => array(),
			"AUTH" => "Y",
			"USE_BACKURL" => "Y",
			"SUCCESS_PAGE" => "/personal/order.php",
			"SET_TITLE" => "Y",
			"USER_PROPERTY" => array(),
			"USER_PROPERTY_NAME" => ""
		)
	);?>
<?
else:
?>
<div id="registrationpanel" class="container">
    <br/>
    <p>
        <strong>Оформление заказа</strong>
         для пользователя
        <strong>
            <a class="headinga" href="/auth/index.php"><? echo trim(CUser::GetFullName())?></a>
        </strong>.
        Вы можете перейти в
        <strong>
            <a class="headinga" href="/personal/basket.php">Корзину</a>
        </strong>.
    </p>
    <div class="row"><hr/></div>
</div>


<?endif;?>



<?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax",
	"torino",
	Array(
		"PAY_FROM_ACCOUNT" => "Y",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"COUNT_DELIVERY_TAX" => "N",
		"ALLOW_AUTO_REGISTER" => "Y",
		"SEND_NEW_USER_NOTIFY" => "N",
		"DELIVERY_NO_AJAX" => "Y",
		"DELIVERY_NO_SESSION" => "N",
		"TEMPLATE_LOCATION" => ".default",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"USE_PREPAYMENT" => "N",
		"ALLOW_NEW_PROFILE" => "Y",
		"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "N",
		"PATH_TO_BASKET" => "basket.php",
		"PATH_TO_PERSONAL" => "index.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_AUTH" => "/personal/signupin.php",
		"SET_TITLE" => "Y",
		"DISABLE_BASKET_REDIRECT" => "N",
		"PRODUCT_COLUMNS" => array(),
		"PROP_1" => array()
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>