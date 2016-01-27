<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<? $APPLICATION->SetTitle("Torino: Личный кабинет"); ?>



<div id="registrationpanel" class="container">
    <br/><p>
        Приветствуем на сайте <strong>Torino Pizza</strong>!
        Вы вошли как
        <strong>
            <a class="headinga" href="/auth/index.php"><? echo CUser::GetFullName()?></a>
        </strong>.
        Вы можете перейти в
        <strong>
            <a class="headinga" href="/personal/basket.php">Корзину</a>
        </strong>.
    </p>


    <div class="row">
        <hr/>
        <h2 class="hed text-center" id="us_params">
            <a href="javascript:void(0)" onclick="SectionClick('usrparams')">
                <strong>Параметры учетной записи</strong>
                &nbsp;<span class="small glyphicon glyphicon-chevron-down"></span>
            </a>
        </h2>
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.profile",
            "torino",
            Array()
        );?>
    </div>
    <br/>

    <div class="row">



    <script type="text/javascript">
        /*
        function removeElement(arr, sElement)
        {
            var tmp = new Array();
            for (var i = 0; i<arr.length; i++) if (arr[i] != sElement) tmp[tmp.length] = arr[i];
            arr=null;
            arr=new Array();
            for (var i = 0; i<tmp.length; i++) arr[i] = tmp[i];
            tmp = null;
            return arr;
        }

        function SectionClick(id)
        {
            var div = document.getElementById('user_div_'+id);
            if (div.className == "profile-block-hidden")
            {
                opened_sections[opened_sections.length]=id;
            }
            else
            {
                opened_sections = removeElement(opened_sections, id);
            }

            document.cookie = cookie_prefix + "_user_profile_open=" + opened_sections.join(",") + "; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
            div.className = div.className == 'profile-block-hidden' ? 'profile-block-shown' : 'profile-block-hidden';
        }

        var opened_sections = [<?
            $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
            $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
            if (strlen($arResult["opened"]) > 0)
            {
            echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
            }
            else
            {
            /*$arResult["opened"] = "reg";
            echo "'reg'";*/
            }
            ?>];

        var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
        */
    </script>


    <div class="bx-auth registrationpanel" id="" style="padding-top: 0px !important; width:100%; max-width: 100% !important;">
        <h2 class="hed text-center" id="us_buys">
            <a href="javascript:void(0)" onclick="SectionClick('usrbuys')">
                <strong>Параметры ваших заказов</strong>
                &nbsp;<span class="small glyphicon glyphicon-chevron-down"></span>
            </a>
        </h2>

        <div
            class="profile-block-<?=strpos($arResult["opened"], "usrbuys") === false ? "hidden" : "shown"?>"
            id="user_div_usrbuys">

            <?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "persOrder", Array(	),false);?>

        </div>

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