<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/BitrixHelpers.php");

class EventHandlers
{
    public static $userPhone;

    public static function OnBeforeUserAddHandler(&$arArgs)
    {
        Trace(self::$userPhone);
        Trace($arArgs);
        $arArgs["LOGIN"]=self::$userPhone;
    }

    public static function OnSaleCalculateOrderPropsHandler(&$arOrder)
    {
        $id = BitrixHelpers::GetOrderPropId("ORDER_PHONE");
        self::$userPhone = $arOrder["ORDER_PROP"][$id];

        //Trace($arOrder);
    }

    public static function OnSaleComponentOrderOneStepProcessHandler(&$arResult,&$arUserResult,&$arParams)
    {
        $arResult["ERROR"][] = 'Такой пользователь существует';
    }
}