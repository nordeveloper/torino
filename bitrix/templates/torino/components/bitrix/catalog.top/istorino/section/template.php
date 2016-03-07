<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var string $strElementEdit */
/** @var string $strElementDelete */
/** @var array $arElementDeleteParams */
/** @var array $arSkuTemplate */
/** @var array $templateData */
global $APPLICATION;
?>
<?/*<div class="bx_catalog_top_home col< ? echo $arParams['LINE_ELEMENT_COUNT']; ?> ">*/?>


<?if (!empty($arResult["ITEMS"])) { ?>

<?foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);

	$arItemIDs = array(
		'ID' => $strMainID,
		'PICT' => $strMainID.'_pict',
		'SECOND_PICT' => $strMainID.'_secondpict',
		'MAIN_PROPS' => $strMainID.'_main_props',

		'QUANTITY' => $strMainID.'_quantity',
		'QUANTITY_DOWN' => $strMainID.'_quant_down',
		'QUANTITY_UP' => $strMainID.'_quant_up',
		'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
		'BUY_LINK' => $strMainID.'_buy_link',
		'BASKET_ACTIONS' => $strMainID.'_basket_actions',
		'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
		'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
		'COMPARE_LINK' => $strMainID.'_compare_link',

		'PRICE' => $strMainID.'_price',
		'DSC_PERC' => $strMainID.'_dsc_perc',
		'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',

		'PROP_DIV' => $strMainID.'_sku_tree',
		'PROP' => $strMainID.'_prop_',
		'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
		'BASKET_PROP_DIV' => $strMainID.'_basket_prop'
	);

	$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
	$productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
		: $arItem['NAME']
	);
	$imgTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
		: $arItem['NAME']
	);
?>
    <div class="col-md-4 col-sm-6 col-xs-12 <?echo $templateData['TEMPLATE_CLASS'];?>">
        <div class="thumbnail bx_catalog_item_container">
            <a id="<? echo $arItemIDs['PICT']; ?>" href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><img alt="<?= $imgTitle; ?>" title="<?= $imgTitle; ?>" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" class="img-responsive img-thumbnail"></a>
            <div class="caption">
                <h3 class="text-center iteminfohead">
                    <a id="<? echo $arItemIDs['PICT']; ?>" href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                        <?= $arItem["NAME"]?>
                    </a>
                </h3>
                <p class="text-justify iteminfo2">
                    <?= $arItem["PREVIEW_TEXT"]?>
                </p>
                <div class="pricer table-responsive">

                    <div class="bx_catalog_item_controls">
                        <?if ($arItem['CAN_BUY']) {?>
                            <div class="bx_catalog_item_controls_blockone">
                                <div style="display: inline-block;position: relative;" class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <input class="form-control text-center spinner" id="<? echo $arItemIDs['QUANTITY']; ?>" type="text" name="<? echo $arItemIDs['QUANTITY']; ?>" value="1">
                                    </div>
                                    <script>
                                        $("input[name='<? echo $arItemIDs['QUANTITY']; ?>']").TouchSpin({
                                            postfix: "<? echo $arItem['CATALOG_MEASURE_NAME']; ?>",
                                            min: 1,
                                            max: 100,
                                            decimals: 0,
                                            step: 1
                                        });

                                        $( "input[name='<? echo $arItemIDs['QUANTITY']; ?>']" ).on( "change", function() {
                                            var prc =  $("#<?echo $arItemIDs['ID'];?>_priceperitem")[0].value;
                                            $("#<?echo $arItemIDs['ID'];?>_price").html((this.value*prc).toFixed(2).toString()+" р.");
                                        });

                                    </script>
                                </div>
                                <div style="display: inline-block;position: relative;" class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="bx_catalog_item_price cata3_price">
                                        <div id="<? echo $arItemIDs['PRICE']; ?>" class="bx_price">
                                            <?if (!empty($arItem['MIN_PRICE']))
                                            {
                                                if ('N' == $arParams['PRODUCT_DISPLAY_MODE'] && isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
                                                {
                                                    echo GetMessage(
                                                        'CT_BCS_TPL_MESS_PRICE_SIMPLE_MODE',
                                                        array(
                                                            '#PRICE#' => $arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'],
                                                            '#MEASURE#' => GetMessage(
                                                                'CT_BCS_TPL_MESS_MEASURE_SIMPLE_MODE',
                                                                array(
                                                                    '#VALUE#' => $arItem['MIN_PRICE']['CATALOG_MEASURE_RATIO'],
                                                                    '#UNIT#' => $arItem['MIN_PRICE']['CATALOG_MEASURE_NAME']
                                                                )
                                                            )
                                                        )
                                                    );
                                                }
                                                else
                                                {
                                                    echo $arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];
                                                    $priceperitem = $arItem['MIN_PRICE']['DISCOUNT_VALUE_NOVAT'];
                                                }
                                                if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arItem['MIN_PRICE']['DISCOUNT_VALUE'] < $arItem['MIN_PRICE']['VALUE'])
                                                {?>
                                                    <span><? echo $arItem['MIN_PRICE']['PRINT_VALUE']; ?></span>
                                                    <?$priceperitem = $arItem['MIN_PRICE']['VALUE_NOVAT'];
                                                }
                                            }?>
                                        </div>
                                        <input name="<?echo $arItemIDs['ID'];?>_priceperitem" id="<?echo $arItemIDs['ID'];?>_priceperitem" type="hidden" value="<?=$priceperitem;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" class="bx_catalog_item_controls_blocktwo text-center">
                                <a class="bx_bt_button bx_medium btn btn-darkredbutton addtocart" role="button"
                                   id="<? echo $arItemIDs['BUY_LINK']; ?>"  href="javascript:void(0)" rel="nofollow"
                                   data-item-id="<? echo $arItem['ID'] ?>" data-item-quantity="<? echo $arItemIDs['QUANTITY']; ?>">
                                    <?if ($arParams['ADD_TO_BASKET_ACTION'] == 'BUY')
                                    {
                                        echo ('' != $arParams['MESS_BTN_BUY'] ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCS_TPL_MESS_BTN_BUY'));
                                    }
                                    else
                                    {
                                        echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? $arParams['MESS_BTN_ADD_TO_BASKET'] : GetMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET'));
                                    }
                                    ?></a>
                            </div>
                            <?
                            if ($arParams['DISPLAY_COMPARE'])
                            {
                                ?>
                                <div class="bx_catalog_item_controls_blocktwo">
                                <a id="<? echo $arItemIDs['COMPARE_LINK']; ?>" class="bx_bt_button_type_2 bx_medium" href="javascript:void(0)"><? echo $compareBtnMessage; ?></a>
                                </div><?
                            }
                        }
                        else
                        {
                            ?><div id="<? echo $arItemIDs['NOT_AVAILABLE_MESS']; ?>" class="bx_catalog_item_controls_blockone"><span class="bx_notavailable"><?
                                echo ('' != $arParams['MESS_NOT_AVAILABLE'] ? $arParams['MESS_NOT_AVAILABLE'] : GetMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE'));
                                ?></span></div><?
                            if ($arParams['DISPLAY_COMPARE'] || $showSubscribeBtn)
                            {
                                ?>
                                <div class="bx_catalog_item_controls_blocktwo"><?
                                    if ($arParams['DISPLAY_COMPARE'])
                                    {
                                        ?><a id="<? echo $arItemIDs['COMPARE_LINK']; ?>" class="bx_bt_button_type_2 bx_medium" href="javascript:void(0)"><? echo $compareBtnMessage; ?></a><?
                                    }
                                    if ($showSubscribeBtn) { ?>
                                        <a id="<? echo $arItemIDs['SUBSCRIBE_LINK']; ?>" class="bx_bt_button_type_2 bx_medium" href="javascript:void(0)"><?
                                            echo ('' != $arParams['MESS_BTN_SUBSCRIBE'] ? $arParams['MESS_BTN_SUBSCRIBE'] : GetMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE'));?>
                                        </a>
                                    <?}?>
                                </div>
                            <?}
                        }?>
                        <div style="clear: both;"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?}?>
    <div style="clear: both;"></div>

    <script type="text/javascript">
        BX.message({
            BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
            BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
            ADD_TO_BASKET_OK: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
            TITLE_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
            TITLE_BASKET_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
            TITLE_SUCCESSFUL: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
            BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
            BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
            BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
            BTN_MESSAGE_CLOSE_POPUP: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP'); ?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
            COMPARE_MESSAGE_OK: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
            COMPARE_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
            COMPARE_TITLE: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
            SITE_ID: '<? echo SITE_ID; ?>'
        });
        $(function(){
        });
    </script>


<?}?>
<?//</div>?>