<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
CJSCore::Init(array("popup"));
$itemnum = 1; //active element counter

if (!empty($arResult['ITEMS'])) {
    $templateLibrary = array('popup');
    $currencyList = '';
    if (!empty($arResult['CURRENCIES']))
    {
        $templateLibrary[] = 'currency';
        $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
    }
    $templateData = array(
        'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
        'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
        'TEMPLATE_LIBRARY' => $templateLibrary,
        'CURRENCIES' => $currencyList
    );
    unset($currencyList, $templateLibrary);

    $strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
    $strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
    $arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
    ?>

    <script type="text/javascript">
        if (!basketItems)
            var basketItems = [];
    </script>

    <div class="row">
        <div class="carousel slide" id="myCarousel<?=$arResult["ID"]?>">
            <div class="carousel-inner">
            <?foreach ($arResult['ITEMS'] as $key => $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                $strMainID = $this->GetEditAreaId($arItem['ID']);
                $arItemIDs = array(
                    'ID' => $strMainID,
                    'PICT' => $strMainID.'_pict',
                    'SECOND_PICT' => $strMainID.'_secondpict',
                    'STICKER_ID' => $strMainID.'_sticker',
                    'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
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
                    'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
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

                $itemPrice = CPrice::GetBasePrice($arItem['ID'])["PRICE"];

                if ($itemnum == 1) { $itemclass = "item active"; $itemnum = 0; }
                else { $itemclass = "item"; }
                ?>


                <div class="<?=$itemclass?>" id="<? echo $strMainID; ?>">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <a id="<? echo $arItemIDs['PICT']; ?>" href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><img alt="<?= $imgTitle; ?>" title="<?= $imgTitle; ?>" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" class="img-responsive img-thumbnail"></a>
                            <div class="caption">
                                <h3 class="text-center"><?= $arItem["NAME"]?></h3>
                                <p class="text-justify">
                                    <?= $arItem["PREVIEW_TEXT"]?>
                                </p>
                                <div class="pricer table-responsive">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
                                        <p id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>">
<!--                                            <a href="#" class="btn btn-primary addtocart" role="button">Заказать</a>-->
                                            <a id="<? echo $arItemIDs['BUY_LINK']; ?>" role="button" class="btn btn-primary addtocart" href="javascript:void(0)" rel="nofollow" data-item-id="<? echo $arItem['ID'] ?>">Заказать</a>
                                        <!--<div id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" class="bx_catalog_item_controls_blocktwo">-->
                                            <!--<a id="<? echo $arItemIDs['BUY_LINK']; ?>" class="bx_bt_button bx_medium" href="javascript:void(0)" rel="nofollow">
                                            Заказать
                                            </a>-->
                                            <!--<div>-->
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right" >
                                        <h4 id="<? echo $arItemIDs['PRICE']; ?>"><?=$itemPrice?></h4>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                <?
                                    $arJSParams = array(
                                        'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
                                        'SHOW_QUANTITY' => ($arParams['USE_PRODUCT_QUANTITY'] == 'Y'),
                                        'SHOW_ADD_BASKET_BTN' => false,
                                        'SHOW_BUY_BTN' => true,
                                        'SHOW_ABSENT' => true,
                                        'SHOW_SKU_PROPS' => $arItem['OFFERS_PROPS_DISPLAY'],
                                        'SECOND_PICT' => $arItem['SECOND_PICT'],
                                        'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
                                        'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
                                        'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
                                        'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
                                        'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
                                        'DEFAULT_PICTURE' => array(
                                            'PICTURE' => $arItem['PRODUCT_PREVIEW'],
                                            'PICTURE_SECOND' => $arItem['PRODUCT_PREVIEW_SECOND']
                                        ),
                                        'VISUAL' => array(
                                            'ID' => $arItemIDs['ID'],
                                            'PICT_ID' => $arItemIDs['PICT'],
                                            'SECOND_PICT_ID' => $arItemIDs['SECOND_PICT'],
                                            'QUANTITY_ID' => $arItemIDs['QUANTITY'],
                                            'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
                                            'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
                                            'QUANTITY_MEASURE' => $arItemIDs['QUANTITY_MEASURE'],
                                            'PRICE_ID' => $arItemIDs['PRICE'],
                                            'TREE_ID' => $arItemIDs['PROP_DIV'],
                                            'TREE_ITEM_ID' => $arItemIDs['PROP'],
                                            'BUY_ID' => $arItemIDs['BUY_LINK'],
                                            'ADD_BASKET_ID' => $arItemIDs['ADD_BASKET_ID'],
                                            'DSC_PERC' => $arItemIDs['DSC_PERC'],
                                            'SECOND_DSC_PERC' => $arItemIDs['SECOND_DSC_PERC'],
                                            'DISPLAY_PROP_DIV' => $arItemIDs['DISPLAY_PROP_DIV'],
                                            'BASKET_ACTIONS_ID' => $arItemIDs['BASKET_ACTIONS'],
                                            'NOT_AVAILABLE_MESS' => $arItemIDs['NOT_AVAILABLE_MESS'],
                                            'COMPARE_LINK_ID' => $arItemIDs['COMPARE_LINK']
                                        ),
                                        'BASKET' => array(
                                            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                                            'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
                                            'SKU_PROPS' => $arItem['OFFERS_PROP_CODES'],
                                            'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
                                            'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
                                        ),
                                        'PRODUCT' => array(
                                            'ID' => $arItem['ID'],
                                            'NAME' => $productTitle,
                                            'CAN_BUY' => $arItem["CAN_BUY"],
                                            'PICT' => ('Y' == $arItem['SECOND_PICT'] ? $arItem['PREVIEW_PICTURE_SECOND'] : $arItem['PREVIEW_PICTURE']),
                                            'BASIS_PRICE' => $arItem['MIN_BASIS_PRICE']

                                        ),
                                        'OFFERS' => $arItem['JS_OFFERS'],
                                        'OFFER_SELECTED' => $arItem['OFFERS_SELECTED'],
                                        'TREE_PROPS' => $arSkuProps,
                                        'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
                                    );
                                ?>

                                //var <? echo $strObName; ?> = new JCCatalogSection(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);

                                basketItems.push(
                                        <? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>
                                    );
                            </script>

                        </div>
                    </div>
                </div>
            <?};?>
            </div>
            <a class="left carousel-control" href="#myCarousel<?=$arResult["ID"]?>" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a class="right carousel-control" href="#myCarousel<?=$arResult["ID"]?>" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>


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


    <?
    /*if ($arParams["DISPLAY_BOTTOM_PAGER"])
    {?>
        <? echo $arResult["NAV_STRING"]; ?>
        <?
    }*/
}
?>


