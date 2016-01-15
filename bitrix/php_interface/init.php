<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/



function test_dump($v) {
    global $USER;
    if ($USER -> isAdmin()) {
        echo "<pre>";
        var_dump($v);
        echo "</pre>";
    }
}

function Trace($object)
{
    if ($fp = @fopen(LOG_FILENAME, "ab+"))
    {
        if (flock($fp, LOCK_EX))
        {
            @fwrite($fp,print_r($object,true));
            @fwrite($fp, "\r\n----------\r\n");
            @fflush($fp);
            @flock($fp, LOCK_UN);
            @fclose($fp);
        }
    }
}


function Test()
{
    //include($_SERVER["DOCUMENT_ROOT"]."/helpers/BitrixHelpers.php");
    //Trace(BitrixHelpers::GetOrderPropId("ORDER_PHONE"));
}





$res = AddEventHandler("main","OnBeforeUserAdd",array("EventHandlers","OnBeforeUserAddHandler"),100,$_SERVER["DOCUMENT_ROOT"]."/helpers/eventhandlers.php");
AddEventHandler("sale","OnSaleCalculateOrderProps",array("EventHandlers","OnSaleCalculateOrderPropsHandler"),100,$_SERVER["DOCUMENT_ROOT"]."/helpers/eventhandlers.php");
AddEventHandler("sale","OnSaleComponentOrderOneStepProcess",array("EventHandlers","OnSaleComponentOrderOneStepProcessHandler"),100,$_SERVER["DOCUMENT_ROOT"]."/helpers/eventhandlers.php");
//Trace($res);



?>