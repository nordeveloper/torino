<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<HTML lang="ru">
	<HEAD>
		<?$APPLICATION->ShowHead();?>
        <meta charset="utf-8"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link href="/favicon.ico" rel="icon" type="image/x-icon"><link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <title>Torino: Самая быстрая пицца!</title>

        <!-- Bootstrap -->
        <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSSes -->
        <link href="<?=SITE_TEMPLATE_PATH?>/css/trnstyles.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/font-awesome.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap-social.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

		<title><?$APPLICATION->ShowTitle();?></title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script type="text/javascript" src="/cart/cart.js"></script>
		<script type="text/javascript" src="/js/jquery-ui-1.11.3.custom/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="/js/jquery-ui-1.11.3.custom/jquery-ui.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/js/tango/skin.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/js/tango/mskin.css" media="handheld" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.3.0/ekko-lightbox.min.css" rel="stylesheet">

        <!--Spin Edit -->
        <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/jquery.bootstrap-touchspin.css" />
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bootstrap-touchspin.js"></script>

        <!-- My Small Tools -->
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/mytools.js"></script>

        <!-- Google Analytics -- >
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->


	</HEAD>

	<BODY>

    <!-- Admin Pane -->
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>


    <!-- TopNave -->
    <nav id="topnav" class="navbar navbar-static-top-top">
        <div class="container">

            <div class="navbar-header" id="toppest">
                <span id="menutoggler" class="top-left visible-xs">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                        <a><span class="glyphicon glyphicon-th-list"></span>&nbsp;Меню</a>
                    </button>
                </span>
            </div>

            <div id="navbar">
                <ul class="nav navbar-nav navbar-right">

                    <li class="active">
                        <a href="#" onmouseover="$(this).children('img')[0].src='<?=SITE_TEMPLATE_PATH?>/images/Pizza-02-128l.png';" onmouseout="$(this).children('img')[0].src='<?=SITE_TEMPLATE_PATH?>/images/Pizza-02-128.png'">
                            <img class="img-responsive top-ico2 " alt="Личный кабинет" title="Личный кабинет"
                                 src="<?=SITE_TEMPLATE_PATH?>/images/Pizza-02-128.png"/>

                            <span class="signin">
                                <?if ($USER->IsAuthorized()) {
                                    $userData = CUser::GetByID($_SESSION['SESS_AUTH']['USER_ID'])->Fetch();
                                    if ((isset($userData["LAST_NAME"]) && ($userData["LAST_NAME"] != "")) || (isset($userData["NAME"]) && ($userData["NAME"] != "")))
                                    {   echo $userData["LAST_NAME"]." ".$userData["NAME"];    }
                                    else
                                    {   echo $userData["LOGIN"];    }
                                }   else {  ?>
                                    Войти
                                <?}?>
                            </span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="<?SITE_DIR?>/personal/basket.php" onmouseover="$(this).children('img')[0].src='<?=SITE_TEMPLATE_PATH?>/images/cart512l.png';" onmouseout="$(this).children('img')[0].src='<?=SITE_TEMPLATE_PATH?>/images/cart512.png'">
                            <img class="img-responsive top-ico2" alt="Моя Корзина" title="Моя Корзина"
                                 src="<?=SITE_TEMPLATE_PATH?>/images/cart512.png"/>

                            <span id="buycart">Корзина</span>
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- End TopNave -->

    <!-- Login dialog -->
    <div id="login_dialog" style="display: none" title="Вход">
        <?$APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            "torino",
            array(
                "FORGOT_PASSWORD_URL" => "/auth/index.php",
                "SHOW_ERRORS" => "Y",
                "REGISTER_URL" => "/auth/index.php",
                "PROFILE_URL" => ""
            ),
            false
        );?>
    </div>
    <script type="text/javascript">
        (function(){
            var login_dialog;
            login_dialog = $("#login_dialog").dialog({
                autoOpen: false,
                height: 380,
                width: 310,
                modal: true,
                closeOnEscape: true

            });
            $("span.signin").on('click',function(){
                console.log("lesg");
                login_dialog.dialog("open");
            });
        })();
    </script>
    <!-- /Login dialog -->




    <!-- Hat -->
    <div class="container-fluid" id="hat">
        <div class="container" >
            <div class="pull-left" id="logo">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/torin_03.png" alt="Torino" class="img-responsive" />
            </div>
            <div class="pull-left" id="hatspace"></div>
            <div class="pull-right" id="freedelivery">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/torin_06.png" alt="Torino" class="img-responsive" />
            </div>
        </div>
    </div>
    <!-- End Hat -->


    <!-- Main Menu -->
    <div class="container-fluid" id="mmenu">
        <div class="container">
            <div class="masthead">

                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "torino",
                    array(
                        "ROOT_MENU_TYPE" => "top",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "top",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
    <!-- End Main Menu -->



    <!-- Main Slider -->
    <div class="container-fluid" id="mslider">
        <div class="container">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/torin_10.jpg" alt="При заказе на 1000 р пицца с курицей в подарок!" class="img-responsive" />
        </div>
    </div>
    <!-- End Main Slider -->


    <!-- Main Content -->
    <div class="container-fluid">
        <div class="container" id="maincontent">