<?
class BitrixHelpers
{
    public static function GetOrderPropId($code)
    {
        $id = 0;
        if (CModule::IncludeModule('sale'))
        {

            $db_props = CSaleOrderProps::GetList(
                array("SORT" => "ASC"),
                array(
                    "CODE" => $code
                ),
                false,
                false,
                array("ID")
            );

            if ($props = $db_props->Fetch())
            {
                $id = $props["ID"];
            }

        }
        else
        {
            Trace("Error: can't include module sale");
        }

        return $id;
    }
}
?>