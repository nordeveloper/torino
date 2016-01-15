<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//file_put_contents("test.txt",print_r($_SERVER,true));


$action=strtoupper($_REQUEST["action"]);
$id=intval($_REQUEST["id"]);
$backurl =$_REQUEST["backurl"];
$quantity= doubleval($_REQUEST["quantity"]);
$delay=strtoupper($_REQUEST["delay"])=="Y"?true:false;
if ($quantity<=0)
    $quantity=1;

if (CModule::IncludeModule("catalog"))
{
    if (($action == "ADD2BASKET" || $action == "BUY") && $id>0)
    {
        $r_id=Add2BasketByProductID(
            $id,
            $quantity,
            array()
        );

        if($delay)
            CSaleBasket::Update($r_id, array("DELAY"=>"Y"));


        // if ajax return some info about cart
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            /* special ajax here */
            //header('Content-Type: application/json');

            $cntBasketItems = CSaleBasket::GetList(
                array(),
                array(
                    "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                    "LID" => SITE_ID,
                    "ORDER_ID" => "NULL"
                ),
                array()
            );

            echo "{'id': $r_id , 'count': $cntBasketItems}";
            exit(0);
        }

        if ($action == "BUY")
            LocalRedirect("/personal/cart");




        if ($backurl)
            LocalRedirect($backurl);
        elseif ($_SERVER["HTTP_REFERER"])
            LocalRedirect($_SERVER["HTTP_REFERER"]);
        else
            LocalRedirect("/personal/cart");
    }
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>