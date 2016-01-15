
    <? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

    <div class="fullwidth"><div class="centered"><div class="bx-auth wrkdiv" id="registrationpanel" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">

    <? $APPLICATION->SetTitle("Личный кабинет"); ?>

    Приветствуем на нашем сайте! Вы зашли как <strong><a class="headinga" href="#us_params"><? echo CUser::GetFullName() ?></a></strong>.


    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
        <hr/>
        <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
            <p class="hed" id="us_params"><strong>Параметры учетной записи</strong></p>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.profile",
                "torino",
                Array()
            );?>
        </div>
    </div>

    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
    <hr/>
    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
    <p class="hed"><strong>Ваши заказы</strong></p>
         <?$APPLICATION->IncludeComponent(
            "bitrix:sale.personal.order",
            "",
            Array()
         );?>
    </div></div>



    <?/*<div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
    <hr/>
    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
    <p class="hed"><strong>Редактирование профиля</strong></p>
     <?$APPLICATION->IncludeComponent(
        "bitrix:sale.personal.profile",
        "",
        Array()
    );?>
    </div></div> */?>

</div></div></div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>