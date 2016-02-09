<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
echo ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
?>
<div id="basket_items_list">
	<div class="bx_ordercart_order_table_container">
		<table id="basket_items" class="table-responsive col-md-12">
			<thead class="hidden-sm hidden-xs">
				<tr>
                    <?/*<td class="itemphoto hidden-sm hidden-xs"></td>*/?>

					<td class="item" colspan="2" id="col_Name">
                        Наименование блюда
                    </td>

                    <td id="col_Price">Цена</td>

                    <td id="col_Quant">Количество</td>

                    <td id="col_SumPrice">Стоимость</td>

                    <td id="col_Controls"></td>

				</tr>
			</thead>

			<tbody>
            <?foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
                if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):?>
                    <tr id="<?=$arItem["ID"]?>">

                        <td class="itemphoto col-lg-2 col-md-2 hidden-sm hidden-xs">

                            <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
                                    <? if (isset($arItem["PREVIEW_PICTURE_SRC"]) && ($arItem["PREVIEW_PICTURE_SRC"] != ""))  { ?>
                                        <img src="<?=$arItem["PREVIEW_PICTURE_SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive img-thumbnail" />
                                    <? } else { ?>
                                        <img src="<?=SITE_TEMPLATE_PATH?>\images\logos700x700.png" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive img-thumbnail" />
                                    <? } ?>
                                <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                            </a><?endif;?>
                        </td>

                        <td class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <h2 class="bx_ordercart_itemtitle">
                                <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
                                    <?=$arItem["NAME"]?>
                                    <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?>
                                </a><?endif;?>
                            </h2>

                            <?if (isset($arItem["PROPERTY_CONSIST_VALUE"]) && ($arItem["PROPERTY_CONSIST_VALUE"] != "")):?>
                                <p class="description">
                                    <b>Ингридиенты:</b> <?=$arItem["PROPERTY_CONSIST_VALUE"]?>.
                                </p>
                            <?endif;?>

                            <?if (isset($arItem["PROPERTY_NUTRITION_VALUE"]) && ($arItem["PROPERTY_NUTRITION_VALUE"] != "")):?>
                                <p class="nutrition">
                                    <b>Белки/Жиры/Углеводы (на 100 гр.):</b> <?=$arItem["PROPERTY_NUTRITION_VALUE"]?>.
                                </p>
                            <?endif;?>

                            <?if (isset($arItem["PROPERTY_CALORIES_VALUE"]) && ($arItem["PROPERTY_CALORIES_VALUE"] != "")):?>
                                <p class="nutrition">
                                    <b>Калорийность (на 100 гр.):</b> <?=$arItem["PROPERTY_CALORIES_VALUE"]?>.
                                </p>
                            <?endif;?>
                        </td>

                        <td  class="price text-center  col-lg-1 col-md-1 hidden-sm hidden-xs">
                            <?=$arItem["FULL_PRICE"]?>&nbsp;р.
                            <input name="<?echo $arItem['ID'];?>_priceperitem" id="<?echo $arItem['ID'];?>_priceperitem" type="hidden" value=" <?=$arItem["FULL_PRICE"]?>"/>
                            <input class="_itemfullprice" name="<?echo $arItem['ID'];?>_itemfullprice" id="<?echo $arItem['ID'];?>_itemfullprice" type="hidden"
                                   value=" <?=$arItem["PRICE"]*$arItem["QUANTITY"]?>"/>
                        </td>

                        <td  class="quantity text-center  col-lg-2 col-md-2 hidden-sm hidden-xs">
                            <? $quantID = $arItem["ID"]+"_quantity"; ?>

                            <div style="display: inline-block;position: relative;">
                                <div class="input-group">
                                    <input class="form-control text-center spinner" id="<? echo $quantID; ?>" type="text" name="<? echo $quantID; ?>" value="<?=$arItem["QUANTITY"]?>">
                                </div>
                                <script>
                                    function refreshBill(){
                                        var newBill = 0;
                                        $("input._itemfullprice").each(function() {
                                            newBill+= parseFloat(this.value);
                                        });
                                        $("#fullbillprice").html(newBill.toFixed(2).toString()+" р.");
                                    }

                                    $("input[name='<? echo $quantID; ?>']").TouchSpin({
                                        min: 1,
                                        max: 100,
                                        decimals: 0,
                                        step: 1
                                    });

                                    $( "input[name='<? echo $quantID; ?>']" ).on("change", function() {
                                        var prc =  $("#<?echo $arItem['ID'];?>_priceperitem")[0].value;
                                        $("#<?echo $arItem['ID'];?>_itemfullprice")[0].value = this.value*prc;
                                        $("#<?echo $quantID;?>_price").html((this.value*prc).toFixed(2).toString()+" р.");

                                        refreshBill();
                                    });

                                </script>
                            </div>


                        </td>

                        <td id="<?echo $quantID;?>_price" class="sumprice text-center  col-lg-2 col-md-2 col-sm-2 col-xs-3">
                            <?=$arItem["SUM"]?>
                        </td>

						<td class="control text-center col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" class="btn btn-danger btn-lg">
								<span class="glyphicon glyphicon-remove"></span>
                                &nbsp;Удалить
							</a>
						</td>

                <? endif;
            endforeach;?>


			</tbody>
		</table>
	</div>
	<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>" />
	<input type="hidden" id="count_discount_4_all_quantity" value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="coupon_approved" value="N" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />

	<div class="bx_ordercart_order_pay">

		<div class="bx_ordercart_order_pay_left">
			<div class="bx_ordercart_coupon">
				<?
				if ($arParams["HIDE_COUPON"] != "Y"):

					$couponClass = "";
					if (array_key_exists('VALID_COUPON', $arResult))
					{
						$couponClass = ($arResult["VALID_COUPON"] === true) ? "good" : "bad";
					}
					elseif (array_key_exists('COUPON', $arResult) && !empty($arResult["COUPON"]))
					{
						$couponClass = "good";
					}

				?>
					<span><?=GetMessage("STB_COUPON_PROMT")?></span>
					<input type="text" id="coupon" name="COUPON" value="<?=$arResult["COUPON"]?>" onchange="enterCoupon();" size="21" class="<?=$couponClass?>">
				<?else:?>
					&nbsp;
				<?endif;?>
			</div>
		</div>

		<div class="bx_ordercart_order_pay_right">
			<table class="bx_ordercart_order_sum table-responsive">
				<?if ($bWeightColumn):?>
					<tr>
						<td class="custom_t1"><?=GetMessage("SALE_TOTAL_WEIGHT")?></td>
						<td class="custom_t2" id="allWeight_FORMATED">
                            <?=$arResult["allWeight_FORMATED"]?>
                        </td>
					</tr>
				<?endif;?>
				<?if ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y"):?>
					<tr>
						<td><?echo GetMessage('SALE_VAT_EXCLUDED')?></td>
						<td id="allSum_wVAT_FORMATED">
                            <?=$arResult["allSum_wVAT_FORMATED"]?>
                        </td>
					</tr>
					<tr>
						<td><?echo GetMessage('SALE_VAT_INCLUDED')?></td>
						<td id="allVATSum_FORMATED">
                            <?=$arResult["allVATSum_FORMATED"]?>
                        </td>
					</tr>
				<?endif;?>

					<tr>
						<td class="fwb">
                            <h2>
                                <?=GetMessage("SALE_TOTAL")?>&nbsp;&nbsp;
                            </h2>
                        </td>
						<td class="fwb" id="allSum_FORMATED">
                            <h2>
                                <?//=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?>
                                <span id="fullbillprice">
                                    <?=str_replace(",", "", number_format($arResult["allSum"], 2))?>
                                    р.
                                </span>
                                <input name="finalbillprice" id="finalbillprice" type="hidden" value="<?=$arResult["allSum"]?>"/>
                            </h2>
                        </td>
					</tr>
					<tr>
						<td class="custom_t1"></td>
						<td class="custom_t2" style="text-decoration:line-through; color:#828282;" id="PRICE_WITHOUT_DISCOUNT">
							<?if (floatval($arResult["DISCOUNT_PRICE_ALL"]) > 0):?>
								<?=$arResult["PRICE_WITHOUT_DISCOUNT"]?>
							<?endif;?>
						</td>
					</tr>

			</table>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
        <br><br>
		<div class="bx_ordercart_order_pay_center text-center">

			<?if ($arParams["USE_PREPAYMENT"] == "Y" && strlen($arResult["PREPAY_BUTTON"]) > 0):?>
				<?=$arResult["PREPAY_BUTTON"]?>
				<span><?=GetMessage("SALE_OR")?></span>
			<?endif;?>

			<a href="javascript:void(0)" onclick="checkOut();" class="checkout btn btn-lg btn-success">
                <span class="glyphicon glyphicon-ok"></span>
                <?=GetMessage("SALE_ORDER")?>
            </a>
		</div>
        <br><br>
	</div>
</div>
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td colspan="<?=$numCells?>" style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;
?>