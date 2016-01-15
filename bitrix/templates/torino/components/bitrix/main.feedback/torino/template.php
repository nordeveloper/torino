<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form class="well form-horizontal" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
<fieldset>
    <legend>Связаться с нами</legend>
	<div class="form-group">
		<label class="col-md-4 control-label">
			<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</label>
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input  name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="Имя Пользователя" class="form-control"  type="text">
			</div>
		</div>
	</div>


	<div class="form-group">
		<label class="col-md-4 control-label">
			<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</label>
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="E-Mail Address" class="form-control"  type="text">
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">
			<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</label>
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<textarea rows="5" cols="40" class="form-control" name="MESSAGE" placeholder="Текст Сообщения"><?=$arResult["MESSAGE"]?></textarea>
			</div>
		</div>
	</div>


	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>

	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">

	<div class="form-group">
		<label class="col-md-4 control-label"></label>
		<div class="col-md-8">
			<button  type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="btn btn-warning" >Отправить <span class="glyphicon glyphicon-send"></span></button>
		</div>
	</div>
</fieldset>
</form>
</div>