<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="fullwidth"><div class="centered"><div class="bx-auth wrkdiv" id="registrationpanel" style="margin-top:0; padding-top: 0px !important; width:100%; max-width: 100% !important;">

<div class="bx_my_order_cancel" style="margin-top:0;">
<?/*=======
<a href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SALE_RECORDS_LIST")?></a>

<div class="bx_my_order_cancel">
>>>>>>> origin/deploy*/?>
	<?if(strlen($arResult["ERROR_MESSAGE"])<=0):?>
		<form method="post" action="<?=POST_FORM_ACTION_URI?>">
			
			<input type="hidden" name="CANCEL" value="Y">
			<?=bitrix_sessid_post()?>
			<input type="hidden" name="ID" value="<?=$arResult["ID"]?>">
			
			<?=GetMessage("SALE_CANCEL_ORDER1") ?>
			
			<a class="headinga3" href="<?=$arResult["URL_TO_DETAIL"]?>"><?=GetMessage("SALE_CANCEL_ORDER2")?> #<?=$arResult["ACCOUNT_NUMBER"]?></a>?
            <br /><b>Внимание!</b> <?= GetMessage("SALE_CANCEL_ORDER3") ?><br />
			<?= GetMessage("SALE_CANCEL_ORDER4") ?>:<br />
			
			<textarea cols="70" rows="7" name="REASON_CANCELED"></textarea><br /><br />
            <a class="headinga3" style="font-size:22px;" href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SALE_RECORDS_LIST")?></a>
            <input id="canceller" style="" type="submit" name="action" value="<?=GetMessage("SALE_CANCEL_ORDER_BTN") ?>">
<?/*=======
			<a href="<?=$arResult["URL_TO_DETAIL"]?>"><?=GetMessage("SALE_CANCEL_ORDER2")?> #<?=$arResult["ACCOUNT_NUMBER"]?></a>?
			<b><?= GetMessage("SALE_CANCEL_ORDER3") ?></b><br /><br />
			<?= GetMessage("SALE_CANCEL_ORDER4") ?>:<br />
			
			<textarea name="REASON_CANCELED"></textarea><br /><br />
			<input type="submit" name="action" value="<?=GetMessage("SALE_CANCEL_ORDER_BTN") ?>">

>>>>>>> origin/deploy */?>
		</form>
	<?else:?>
		<?=ShowError($arResult["ERROR_MESSAGE"]);?>
	<?endif;?>

</div>
</div></div></div>
<?/*=======
</div>
>>>>>>> origin/deploy*/?>
