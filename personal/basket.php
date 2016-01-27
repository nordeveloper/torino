<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Torino: Корзина пользователя");
?>



<div id="registrationpanel" class="container">
    <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "torino", Array(
        "COLUMNS_LIST" => array(	// Выводимые колонки
            0 => "NAME",
            1 => "DELETE",
            2 => "PRICE",
            3 => "QUANTITY",
        ),
        "PATH_TO_ORDER" => "/personal/order.php",	// Страница оформления заказа
        "HIDE_COUPON" => "Y",	// Спрятать поле ввода купона
        "PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",	// Рассчитывать скидку для каждой позиции (на все количество товара)
        "USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
        "QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
        "ACTION_VARIABLE" => "action",	// Название переменной действия
    ),
        false
    );?>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>