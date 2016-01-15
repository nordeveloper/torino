<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0)
	LocalRedirect($backurl);


$APPLICATION->SetTitle("Авторизация");
?>
<div class="fullwidth"><div class="centered"><div class="bx-auth wrkdiv" id="registrationpanel" style="padding-top: 40px !important; width:100%; ">
<p style="width:100%; text-align: center;">Вы зарегистрированы и успешно авторизовались.</p>
 
<?//<p style="text-align: justify;">Используйте административную панель в верхней части экрана для быстрого доступа к функциям управления структурой и информационным наполнением сайта. Набор кнопок верхней панели отличается для различных разделов сайта. Так отдельные наборы действий предусмотрены для управления статическим содержимым страниц, динамическими публикациями (новостями, каталогом, фотогалереей) и т.п.</p> ?>

<p style="width:100%; text-align: center;"><a href="/personal/index.php"><strong>Личные данные</strong></a></p>

<p style="width:100%; text-align: center;"><a href="/personal/basket.php"><strong>Моя корзина</strong></a></p>

<p style="width:100%; text-align: center;"><a href="<?=SITE_DIR?>"><strong>Вернуться на главную страницу</strong></a></p>

</div></div></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>