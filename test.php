<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>

<?

if(CModule::IncludeModule("imaginweb.sms")) {
	$phone = "8 (903) 482-45-30";
	/*
	CIWebSMS::Send($phone,"Test message",array(
		'GATE' 		=> 'am4u.ru',
		'LOGIN'		=> 'smsdagxml',
		'PASSWORD'	=> 'tor2tor',
		'ORIGINATOR'	=> 'Torino'
	));*/
}

?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>