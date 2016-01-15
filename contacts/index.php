<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");?>

<div class="row">
    <h2 class="sechead supersechead text-right">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            Array(
                "AREA_FILE_SHOW" => "file",
                "COMPONENT_TEMPLATE" => ".default",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_DIR."included/contacts/conhead.php"
            )
        );?>
    </h2>
</div>

<div class="divider"></div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <p class="htext">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "COMPONENT_TEMPLATE" => ".default",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."included/contacts/conttext.php"
                )
            );?>
        </p>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <?$APPLICATION->IncludeComponent("bitrix:main.feedback", "torino", Array(
            "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
                "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
                "EMAIL_TO" => "torinopizza@gmail.com",	// E-mail, на который будет отправлено письмо
                "REQUIRED_FIELDS" => "MESSAGE",	// Обязательные поля для заполнения
                "EVENT_MESSAGE_ID" => "5",	// Почтовые шаблоны для отправки письма
            ),
            false
        );?>
    </div>
</div>

<div class="row">
    <?$APPLICATION->IncludeComponent(
        "bitrix:map.yandex.view",
        "cntcmap",
        array(
            "COMPONENT_TEMPLATE" => "cntcmap",
            "INIT_MAP_TYPE" => "PUBLIC_HYBRID",
            "MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:42.973214089165346;s:10:\"yandex_lon\";d:47.509923396592086;s:12:\"yandex_scale\";i:17;}",
            "MAP_WIDTH" => "600",
            "MAP_HEIGHT" => "500",
            "CONTROLS" => array(
                0 => "SMALLZOOM",
            ),
            "OPTIONS" => array(
                0 => "ENABLE_SCROLL_ZOOM",
                1 => "ENABLE_DBLCLICK_ZOOM",
                2 => "ENABLE_DRAGGING",
            ),
            "MAP_ID" => ""
        ),
        false
    );?>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>