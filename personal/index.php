<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<? $APPLICATION->SetTitle("Torino: Личный кабинет"); ?>

<div id="registrationpanel" class="container">
    <br/><p>
        Приветствуем на сайте <strong>Torino Pizza</strong>!
        Вы вошли как
        <strong>
            <a class="headinga" href="/auth/index.php"><? echo CUser::GetFullName() ?></a>
        </strong>.
    </p>


    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
        <hr/>
        <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
            <h2 class="hed text-center" id="us_params"><strong>Параметры учетной записи</strong></h2>
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
    <h2 class="hed text-center"><strong>Параметры ваших заказов</strong></h2>
         <?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "persOrder", Array(
	
	),
	false
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



</div>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>