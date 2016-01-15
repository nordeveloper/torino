<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult)):?>
    <nav class="collapse navbar-collapse" id="mainmenu">
        <ul class="nav nav-justified">
            <?for ($i=0; $i < count($arResult); $i++) {
                $arItem = $arResult[$i];
                //if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                //	continue;
                if($arItem["SELECTED"]):?>
                    <li class="active"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?else:?>
                    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endif?>
            <? } ?>
        </ul>
    </nav>
<? endif?>