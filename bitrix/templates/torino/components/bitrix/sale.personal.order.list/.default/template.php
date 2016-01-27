<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult['ERRORS']['FATAL'])):?>

	<?foreach($arResult['ERRORS']['FATAL'] as $error):?>
		<?=ShowError($error)?>
	<?endforeach?>

<?else:?>

	<?if(!empty($arResult['ERRORS']['NONFATAL'])):?>

		<?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
			<?=ShowError($error)?>
		<?endforeach?>

	<?endif?>

	<div class="bx_my_order_switch text-center">
        <br/>
            <?$nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]);?>

            <?if($nothing || isset($_REQUEST["filter_history"])):?>
                <h4><a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?show_all=Y">
                    <?=GetMessage('SPOL_ORDERS_ALL')?>
                </a></h4>
            <?endif?>

            <?if($_REQUEST["filter_history"] == 'Y' || $_REQUEST["show_all"] == 'Y'):?>
                <h4><a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N">
                    <?=GetMessage('SPOL_CUR_ORDERS')?>
                </a></h4>
            <?endif?>

            <?if($nothing || $_REQUEST["filter_history"] == 'N' || $_REQUEST["show_all"] == 'Y'):?>
                <h4><a class="bx_mo_link" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y">
                    <?=GetMessage('SPOL_ORDERS_HISTORY')?>
                </a></h4>
            <?endif?>
        </h4><br/>
	</div>

	<?if(!empty($arResult['ORDERS'])):?>

		<?foreach($arResult["ORDER_BY_STATUS"] as $key => $group):?>

			<?foreach($group as $k => $order):?>

				<?if(!$k):?>

					<div class="bx_my_order_status_desc">

						<h2><?=GetMessage("SPOL_STATUS")?> "<?=$arResult["INFO"]["STATUS"][$key]["NAME"] ?>"</h2>
						<div class="bx_mos_desc"><?=$arResult["INFO"]["STATUS"][$key]["DESCRIPTION"] ?></div>

					</div>

				<?endif?>

				<div class="bx_my_order">
					
					<table class="bx_my_order_table">
						<thead>
							<tr>
								<td>
									<?=GetMessage('SPOL_ORDER')?> <?=GetMessage('SPOL_NUM_SIGN')?><?=$order["ORDER"]["ACCOUNT_NUMBER"]?>
									<?if(strlen($order["ORDER"]["DATE_INSERT_FORMATED"])):?>
										<?=GetMessage('SPOL_FROM')?> <?=$order["ORDER"]["DATE_INSERT_FORMATED"];?>
									<?endif?>
								</td>
								<td style="text-align: right;">
									<a class="headinga2" href="<?=$order["ORDER"]["URL_TO_DETAIL"]?>">
                                        <?=GetMessage('SPOL_ORDER_DETAIL')?>
                                    </a>
<?/*=======
									<a href="<?=$order["ORDER"]["URL_TO_DETAIL"]?>"><?=GetMessage('SPOL_ORDER_DETAIL')?></a>
>>>>>>> origin/deploy*/?>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<strong><?=GetMessage('SPOL_PAY_SUM')?>:</strong> <?=$order["ORDER"]["FORMATED_PRICE"]?> <br />

									<strong><?=GetMessage('SPOL_PAYED')?>:</strong> <?=GetMessage('SPOL_'.($order["ORDER"]["PAYED"] == "Y" ? 'YES' : 'NO'))?> <br />

									<? // PAY SYSTEM ?>
									<?if(intval($order["ORDER"]["PAY_SYSTEM_ID"])):?>
										<strong><?=GetMessage('SPOL_PAYSYSTEM')?>:</strong> <?=$arResult["INFO"]["PAY_SYSTEM"][$order["ORDER"]["PAY_SYSTEM_ID"]]["NAME"]?> <br />
									<?endif?>

									<? // DELIVERY SYSTEM ?>
									<?if($order['HAS_DELIVERY']):?>

										<strong><?=GetMessage('SPOL_DELIVERY')?>:</strong>

										<?if(intval($order["ORDER"]["DELIVERY_ID"])):?>
										
											<?=$arResult["INFO"]["DELIVERY"][$order["ORDER"]["DELIVERY_ID"]]["NAME"]?> <br />
										
										<?elseif(strpos($order["ORDER"]["DELIVERY_ID"], ":") !== false):?>
										
											<?$arId = explode(":", $order["ORDER"]["DELIVERY_ID"])?>
											<?=$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["NAME"]?> (<?=$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["PROFILES"][$arId[1]]["TITLE"]?>) <br />

										<?endif?>

									<?endif?>

									<strong><?=GetMessage('SPOL_BASKET')?>:</strong>
									<ul class="bx_item_list">

										<?foreach ($order["BASKET_ITEMS"] as $item):?>

											<li>
												<?if(strlen($item["DETAIL_PAGE_URL"])):?>
													<a href="<?=$item["DETAIL_PAGE_URL"]?>" target="_blank">
												<?endif?>
													<?=$item['NAME']?>
												<?if(strlen($item["DETAIL_PAGE_URL"])):?>
													</a> 
												<?endif?>
												<nobr>&nbsp;&mdash; <?=$item['QUANTITY']?> <?=(isset($item["MEASURE_NAME"]) ? $item["MEASURE_NAME"] : GetMessage('SPOL_SHT'))?></nobr>
											</li>

										<?endforeach?>

									</ul>

								</td>
								<td class="bx_my_order_table_manag">
									<p style="text-align: right; font-size: 16px !important;"><?=$order["ORDER"]["DATE_STATUS_FORMATED"];?></p>
									<div class="bx_my_order_status <?=$arResult["INFO"]["STATUS"][$key]['COLOR']?><?/*yellow*/ /*red*/ /*green*/ /*gray*/?>"><?=$arResult["INFO"]["STATUS"][$key]["NAME"]?></div>
                                    <div class="bx_my_order_butts">
                                        <?//old classes 4 buttons: bx_big bx_bt_button_type_2 bx_cart bx_order_action?>
                                        <a class="btn btn-lg btn-success" href="<?=$order["ORDER"]["URL_TO_COPY"]?>">
                                            <span class="glyphicon glyphicon-refresh"></span>&nbsp;
                                            <?=GetMessage('SPOL_REPEAT_ORDER')?>
                                        </a>
                                        <?if($order["ORDER"]["CANCELED"] != "Y"):?>
                                            &nbsp&nbsp&nbsp&nbsp&nbsp
                                            <a class="btn btn-lg btn-danger" href="<?=$order["ORDER"]["URL_TO_CANCEL"]?>">
                                                <span class="glyphicon glyphicon-remove">&nbsp;
                                                    Отменить<?//=GetMessage('SPOL_CANCEL_ORDER')?>
                                            </a>
                                        <?endif?>
                                    </div>
<?/*=======
								<td>
									<?=$order["ORDER"]["DATE_STATUS_FORMATED"];?>
									<div class="bx_my_order_status <?=$arResult["INFO"]["STATUS"][$key]['COLOR']?><?/*yellow*/ /*red*/ /*green*/ /*gray* /?>"><?=$arResult["INFO"]["STATUS"][$key]["NAME"]?></div>

									<?/*if($order["ORDER"]["CANCELED"] != "Y"):?>
										<a href="<?=$order["ORDER"]["URL_TO_CANCEL"]?>" style="min-width:140px"class="bx_big bx_bt_button_type_2 bx_cart bx_order_action"><?=GetMessage('SPOL_CANCEL_ORDER')?></a>
									<?endif?>

									<a href="<?=$order["ORDER"]["URL_TO_COPY"]?>" style="min-width:140px"class="bx_big bx_bt_button_type_2 bx_cart bx_order_action"><?=GetMessage('SPOL_REPEAT_ORDER')?></a>
>>>>>>> origin/deploy */?>
								</td>
							</tr>
						</tbody>
					</table>

				</div>

			<?endforeach?>

		<?endforeach?>

		<?if(strlen($arResult['NAV_STRING'])):?>
			<?=$arResult['NAV_STRING']?>
		<?endif?>

	<?else:?>
        <p class="text-center">
		    <font style="color:#B41A26; padding-bottom: 45px; font-size:2em; font-weight:bold;"><?=GetMessage('SPOL_NO_ORDERS')?></font>
        </p>
<?/*=======
		<?=GetMessage('SPOL_NO_ORDERS')?>
>>>>>>> origin/deploy*/?>
	<?endif?>

<?endif?>