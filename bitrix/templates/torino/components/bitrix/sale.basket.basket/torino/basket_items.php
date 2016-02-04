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
			<thead>
				<tr>
					<td class="itemphoto xs-invisible"></td>

					<td class="item" id="col_Name">
                        Наименование блюда
                    </td>

                    <td id="col_Controls"></td>

                    <td id="col_Price">Цена</td>

                    <td id="col_Quant">Количество</td>

                    <td id="col_SumPrice">Стоимость</td>

				</tr>
			</thead>

			<tbody>
            <?foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
                if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):?>
                    <tr id="<?=$arItem["ID"]?>">


                        <td class="itemphoto"></td>

                        <td class="item" colspan="" class="item">
                            <h2 class="bx_ordercart_itemtitle">
                                <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
                                    <?=$arItem["NAME"]?>
                                    <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
                            </h2>

                            <?if (isset($arItem["PROPERTY_CONSIST_VALUE"]) && ($arItem["PROPERTY_CONSIST_VALUE"] != "")):?>
                                <p class="description">
                                    <?=$arItem["PROPERTY_CONSIST_VALUE"]?>.
                                </p>
                            <?endif;?>

                            <?if (isset($arItem["PROPERTY_NUTRITION_VALUE"]) && ($arItem["PROPERTY_NUTRITION_VALUE"] != "")):?>
                                <p class="nutrition">
                                    Сведения о пищевой ценности (на 100 гр.): <?=$arItem["PROPERTY_NUTRITION_VALUE"]?>.
                                </p>
                            <?endif;?>

                            <?if (isset($arItem["PROPERTY_CALORIES_VALUE"]) && ($arItem["PROPERTY_CALORIES_VALUE"] != "")):?>
                                <p class="nutrition">
                                    Калорийность (на 100 гр.): <?=$arItem["PROPERTY_CALORIES_VALUE"]?>.
                                </p>
                            <?endif;?>

                            <?//test_dump($arItem)?>
                        </td>

                        <td class="control">
                            <a href="#" class="btn btn-danger btn-lg">
                                <span class="glyphicon glyphicon-remove"></span> Удалить
                            </a>
                        </td>

                        <td  class="price">
                            <?=$arItem["FULL_PRICE_FORMATED"]?>
                        </td>

                        <td  class="quantity">
                            <?=$arItem["QUANTITY"]?>
                        </td>

                        <td  class="sumprice">
                            <?=$arItem["SUM"]?>
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
			<table class="bx_ordercart_order_sum">
				<?if ($bWeightColumn):?>
					<tr>
						<td class="custom_t1"><?=GetMessage("SALE_TOTAL_WEIGHT")?></td>
						<td class="custom_t2" id="allWeight_FORMATED"><?=$arResult["allWeight_FORMATED"]?></td>
					</tr>
				<?endif;?>
				<?if ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y"):?>
					<tr>
						<td><?echo GetMessage('SALE_VAT_EXCLUDED')?></td>
						<td id="allSum_wVAT_FORMATED"><?=$arResult["allSum_wVAT_FORMATED"]?></td>
					</tr>
					<tr>
						<td><?echo GetMessage('SALE_VAT_INCLUDED')?></td>
						<td id="allVATSum_FORMATED"><?=$arResult["allVATSum_FORMATED"]?></td>
					</tr>
				<?endif;?>

					<tr>
						<td class="fwb"><?=GetMessage("SALE_TOTAL")?></td>
						<td class="fwb" id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></td>
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

		<div class="bx_ordercart_order_pay_center">

			<?if ($arParams["USE_PREPAYMENT"] == "Y" && strlen($arResult["PREPAY_BUTTON"]) > 0):?>
				<?=$arResult["PREPAY_BUTTON"]?>
				<span><?=GetMessage("SALE_OR")?></span>
			<?endif;?>

			<a href="javascript:void(0)" onclick="checkOut();" class="checkout"><?=GetMessage("SALE_ORDER")?></a>
		</div>
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