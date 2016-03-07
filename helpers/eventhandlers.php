<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/BitrixHelpers.php");

class EventHandlers
{
    public static $userPhone;

    public static function OnBeforeUserAddHandler(&$arArgs)
    {
//        Trace("OnBeforeUserAddHandler");
//        Trace(self::$userPhone);
//        Trace($arArgs);

        // 'no@mail.net' is default value in 'Магазин - Свойства заказа - Список свойств - Email'
        // nonempty email is required (by Bitrix core) for login autogeneration when non-registered user is making an order
        if ($arArgs["EMAIL"]=="no@mail.net")
            $arArgs["EMAIL"] = "";

        if (!empty(self::$userPhone))
            $arArgs["LOGIN"]=self::$userPhone;
    }

    public static function OnSaleCalculateOrderPropsHandler(&$arOrder)
    {
        $id = BitrixHelpers::GetOrderPropId("ORDER_PHONE");
        self::$userPhone = $arOrder["ORDER_PROP"][$id];
        //Trace("OnSaleCalculateOrderPropsHandler");
        //Trace($arOrder);
    }

    public static function OnSaleComponentOrderOneStepProcessHandler(&$arResult,&$arUserResult,&$arParams)
    {
        //Trace("OnSaleComponentOrderOneStepProcessHandler");
        //Trace($arResult);
        //Trace($arUserResult);
        //Trace($arParams);
        //$arResult["ERROR"][] = 'Такой пользователь существует';
    }

    public static function OnOrderAddHandler($id, $arFields)
    {
//        Trace("OnOrderAddHandler");
//        Trace($id);
//        Trace($arFields);
    }

    public static function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
    {
        if ($event == "SALE_NEW_ORDER")
        {
            $orderId = $arFields['ORDER_ID'];

            $dbOrderProps = CSaleOrderPropsValue::GetList(
                array("CODE" => "ASC"),
                array("ORDER_ID" => $orderId, "CODE"=>array("ORDER_PHONE","ORDER_ADDRESS","ORDER_COMMENTS"))
            );

            while ($arOrderProps = $dbOrderProps->GetNext()) {
                $arFields[$arOrderProps['CODE']] = $arOrderProps['~VALUE'];
            }
        }
    }


}