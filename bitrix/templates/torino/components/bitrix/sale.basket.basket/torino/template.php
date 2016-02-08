<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arUrls = Array(
	"delete" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=delete&id=#ID#",
	"delay" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=delay&id=#ID#",
	"add" => $APPLICATION->GetCurPage()."?".$arParams["ACTION_VARIABLE"]."=add&id=#ID#",
);

$arBasketJSParams = array(
	'SALE_DELETE' => GetMessage("SALE_DELETE"),
	'SALE_DELAY' => GetMessage("SALE_DELAY"),
	'SALE_TYPE' => GetMessage("SALE_TYPE"),
	'TEMPLATE_FOLDER' => $templateFolder,
	'DELETE_URL' => $arUrls["delete"],
	'DELAY_URL' => $arUrls["delay"],
	'ADD_URL' => $arUrls["add"]
);
?>
<script type="text/javascript">
	var basketJSParams = <?=CUtil::PhpToJSObject($arBasketJSParams);?>
</script>
<?
$APPLICATION->AddHeadScript($templateFolder."/script.js");

if (strlen($arResult["ERROR_MESSAGE"]) <= 0)
{
	?>
	<div id="warning_message">
		<?
		if (is_array($arResult["WARNING_MESSAGE"]) && !empty($arResult["WARNING_MESSAGE"]))
		{
			foreach ($arResult["WARNING_MESSAGE"] as $v)
				echo ShowError($v);
		}
		?>
	</div>
	<?

	$normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
	$normalHidden = ($normalCount == 0) ? "style=\"display:none\"" : "";

	$delayCount = count($arResult["ITEMS"]["DelDelCanBuy"]);
	$delayHidden = ($delayCount == 0) ? "style=\"display:none\"" : "";

	$subscribeCount = count($arResult["ITEMS"]["ProdSubscribe"]);
	$subscribeHidden = ($subscribeCount == 0) ? "style=\"display:none\"" : "";

	$naCount = count($arResult["ITEMS"]["nAnCanBuy"]);
	$naHidden = ($naCount == 0) ? "style=\"display:none\"" : "";

	?>

    <div class="container" id="userbasket">
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
                <div class="panel panel-primary box-shadow--8dp" id="basket_form_container">
                    <div class="panel-heading" id="baskethead">
                        <h3 class="panel-title">
                            <span class="hidden-xs hidden-sm">
                                Корзина пользователя &nbsp;&nbsp;
                            </span>
                            <span class="hidden-xs">
							    <strong><a id="usname" href="/personal/index.php"><? echo CUser::GetFullName() ?></a></strong><?//=GetMessage("SALE_ITEMS")?>
                            </span> &nbsp;
                        </h3>
                        <span class="pull-right">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" id="basket_toolbar_button" class="ordbutts current" onclick="showBasketItemsList()"><?=GetMessage("SALE_BASKET_ITEMS")?><div id="normal_count" class="flat" style="display:none">&nbsp;(<?=$normalCount?>)</div></a></li>
                                <li><a href="#tab2" data-toggle="tab" id="basket_toolbar_button_delayed" class="ordbutts" onclick="showBasketItemsList(2)" <?=$delayHidden?>><?=GetMessage("SALE_BASKET_ITEMS_DELAYED")?><div id="delay_count" class="flat">&nbsp;(<?=$delayCount?>)</div></a></li>
                                <li><a href="#tab3" data-toggle="tab" id="basket_toolbar_button_subscribed" class="ordbutts" onclick="showBasketItemsList(3)" <?=$subscribeHidden?>><?=GetMessage("SALE_BASKET_ITEMS_SUBSCRIBED")?><div id="subscribe_count" class="flat">&nbsp;(<?=$subscribeCount?>)</div></a></li>
                                <li><a href="#tab4" data-toggle="tab" id="basket_toolbar_button_not_available" class="ordbutts" onclick="showBasketItemsList(4)" <?=$naHidden?>><?=GetMessage("SALE_BASKET_ITEMS_NOT_AVAILABLE")?><div id="not_available_count" class="flat">&nbsp;(<?=$naCount?>)</div></a></li>
                            </ul>
                        </span>
                    </div>
                    <div class="panel-body" id="basketbody">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");?>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_delayed.php");?>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_subscribed.php");?>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_not_available.php");?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="BasketOrder" value="BasketOrder" />
                    <!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
                </div>
            </form>
            </div>
        </div>
    </div>


<?/*
	<div class="row" id="basketbasket">
		<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
			<div id="basket_form_container">
				<div class="bx_ordercart">
					<div class="bx_sort_container" id="baskethead">
						<span>
                            Корзина пользователя &nbsp;&nbsp;
							<strong><a id="usname" href="/personal/index.php"><? echo CUser::GetFullName() ?></a></strong>:
                            <?//=GetMessage("SALE_ITEMS")?>
                        </span>
						<a href="javascript:void(0)" id="basket_toolbar_button" class="ordbutts current" onclick="showBasketItemsList()"><?=GetMessage("SALE_BASKET_ITEMS")?><div id="normal_count" class="flat" style="display:none">&nbsp;(<?=$normalCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_delayed" class="ordbutts" onclick="showBasketItemsList(2)" <?=$delayHidden?>><?=GetMessage("SALE_BASKET_ITEMS_DELAYED")?><div id="delay_count" class="flat">&nbsp;(<?=$delayCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_subscribed" class="ordbutts" onclick="showBasketItemsList(3)" <?=$subscribeHidden?>><?=GetMessage("SALE_BASKET_ITEMS_SUBSCRIBED")?><div id="subscribe_count" class="flat">&nbsp;(<?=$subscribeCount?>)</div></a>
						<a href="javascript:void(0)" id="basket_toolbar_button_not_available" class="ordbutts" onclick="showBasketItemsList(4)" <?=$naHidden?>><?=GetMessage("SALE_BASKET_ITEMS_NOT_AVAILABLE")?><div id="not_available_count" class="flat">&nbsp;(<?=$naCount?>)</div></a>
					</div>
                    <div class="bx_sort_container" id="basketbody">
                        <?
                        include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
                        include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_delayed.php");
                        include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_subscribed.php");
                        include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_not_available.php");
                        ?>
                    </div>
				</div>
			</div>
			<input type="hidden" name="BasketOrder" value="BasketOrder" />
			<!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
		</form>
    </div>
*/?>



<?} else {?>
    <div class="row">
        <br><h2 class="hed text-center">
            <b><?=ShowError($arResult["ERROR_MESSAGE"]);?></b>
        </h2><br>
    </div>
<?}?>

