<?

/**
 * 
 *
 *
 *
 *
 * @return mixed 
 *
 * @static
 * @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/index.php
 * @author Bitrix
 */
class CAllSaleLocation
{

	
	/**
	* <p>Функция возвращает языконезависимые параметры страны с кодом ID </p>
	*
	*
	*
	*
	* @param int $ID  Код страны.
	*
	*
	*
	* @return array <p>Возвращается ассоциативный массив с ключами:</p> <table class="tnormal"
	* width="100%"> <tr> <th width="15%">Ключ</th> <th>Описание</th> </tr> <tr> <td>ID</td> <td>Код
	* страны.</td> </tr> <tr> <td>NAME</td> <td>Языконезависимое название страны.</td>
	* </tr> <tr> <td>SHORT_NAME</td> <td>Языконезависимое короткое название страны.</td>
	* </tr> </table> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__getcountrybyid.bc803b85.php
	* @author Bitrix
	*/
	public static function GetCountryByID($ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strSql =
			"SELECT * ".
			"FROM b_sale_location_country ".
			"WHERE ID = ".$ID." ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}

	
	/**
	* <p>Функция возвращает языкозависимые параметры страны по ее коду ID и языку strLang</p>
	*
	*
	*
	*
	* @param int $ID  Код страны.
	*
	*
	*
	* @param string $strLang = LANGUAGE_ID Язык. По умолчанию берется текущий язык.
	*
	*
	*
	* @return array <p>Возвращается ассоциативный массив с ключами:</p> <table class="tnormal"
	* width="100%"> <tr> <th width="15%">Ключ</th> <th>Описание</th> </tr> <tr> <td>ID</td> <td>Код
	* записи.</td> </tr> <tr> <td>COUNTRY_ID</td> <td>Код страны.</td> </tr> <tr> <td>LID</td>
	* <td>Язык.</td> </tr> <tr> <td>NAME</td> <td>Языкозависимое название страны.</td> </tr>
	* <tr> <td>SHORT_NAME</td> <td>Языкозависимое короткое название страны.</td> </tr>
	* </table> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__getcountrylangbyid.aef8761b.php
	* @author Bitrix
	*/
	public static function GetCountryLangByID($ID, $strLang = LANGUAGE_ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strLang = Trim($strLang);

		$strSql =
			"SELECT * ".
			"FROM b_sale_location_country_lang ".
			"WHERE COUNTRY_ID = ".$ID." ".
			"	AND LID = '".$DB->ForSql($strLang, 2)."' ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}

	
	/**
	* <p>Функция возвращает языконезависимые параметры города с кодом ID </p>
	*
	*
	*
	*
	* @param int $ID  Код города.
	*
	*
	*
	* @return array <p>Возвращается ассоциативный массив с ключами:</p> <table class="tnormal"
	* width="100%"> <tr> <th width="15%">Ключ</th> <th>Описание</th> </tr> <tr> <td>ID</td> <td>Код
	* города.</td> </tr> <tr> <td>NAME</td> <td>Языконезависимое название города.</td>
	* </tr> <tr> <td>SHORT_NAME</td> <td>Языконезависимое короткое название города.</td>
	* </tr> <tr> <td>REGION_ID</td> <td>Код региона.</td> </tr> </table> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__getcitybyid.fb724f2b.php
	* @author Bitrix
	*/
	public static function GetCityByID($ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strSql =
			"SELECT * ".
			"FROM b_sale_location_city ".
			"WHERE ID = ".$ID." ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}

	
	/**
	* <p>Функция возвращает языкозависимые параметры города по его коду ID и языку strLang </p>
	*
	*
	*
	*
	* @param int $ID  Код города.
	*
	*
	*
	* @param string $strLang = LANGUAGE_ID Язык. По умолчанию равен текущему языку.
	*
	*
	*
	* @return array <p>Возвращается ассоциативный массив с ключами:</p> <table class="tnormal"
	* width="100%"> <tr> <th width="15%">Ключ</th> <th>Описание</th> </tr> <tr> <td>ID</td> <td>Код
	* записи.</td> </tr> <tr> <td>CITY_ID</td> <td>Код города.</td> </tr> <tr> <td>LID</td> <td>Язык.</td>
	* </tr> <tr> <td>NAME</td> <td>Языкозависимое название города.</td> </tr> <tr>
	* <td>SHORT_NAME</td> <td>Языкозависимое короткое название города.</td> </tr> </table>
	* <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__getcitylangbyid.f2bc091a.php
	* @author Bitrix
	*/
	public static function GetCityLangByID($ID, $strLang = LANGUAGE_ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strLang = Trim($strLang);

		$strSql =
			"SELECT * ".
			"FROM b_sale_location_city_lang ".
			"WHERE CITY_ID = ".$ID." ".
			"	AND LID = '".$DB->ForSql($strLang, 2)."' ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}


	/**
	* The function returns the languages parameters for region
	* @param int $ID region code
	* @param string $strLang the current language
	* @return array $res region parameters
	*/
	public static function GetRegionLangByID($ID, $strLang = LANGUAGE_ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strLang = Trim($strLang);

		$strSql =
			"SELECT * ".
			"FROM b_sale_location_region_lang ".
			"WHERE REGION_ID = ".$ID." ".
			" AND LID = '".$DB->ForSql($strLang, 2)."' ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}

	/**
	* The function returns parameters for region
	* @param int $ID region code
	* @return array $res region parameters
	*/
	public static function GetRegionByID($ID)
	{
		global $DB;

		$ID = IntVal($ID);
		$strSql =
			"SELECT * ".
			"FROM b_sale_location_region ".
			"WHERE ID = ".$ID." ";
		$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		if ($res = $db_res->Fetch())
		{
			return $res;
		}
		return False;
	}

	public static function GetLocationString($locationId, $siteId = SITE_ID, $langId = LANGUAGE_ID)
	{
		$locationString = '';

		if(!\Bitrix\Sale\SalesZone::checkLocationId($locationId, $siteId))
			$locationId = 0;

		$countryId = $regionId = $cityId = 0;
		if ($locationId > 0)
		{
			if ($arLocation = CSaleLocation::GetByID($locationId))
			{
				$countryId = $arLocation["COUNTRY_ID"];
				$regionId = $arLocation["REGION_ID"];
				$cityId = $arLocation["CITY_ID"];
			}
		}

		//check in location city
		$bEmptyCity = "N";
		$arCityFilter = array("!CITY_ID" => "NULL", ">CITY_ID" => "0");
		if ($countryId > 0)
			$arCityFilter["COUNTRY_ID"] = $countryId;
		$rsLocCount = CSaleLocation::GetList(array(), $arCityFilter, false, false, array("ID"));
		if (!$rsLocCount->Fetch())
			$bEmptyCity = "Y";

		//check in location region
		$bEmptyRegion = "N";
		$arRegionFilter = array("!REGION_ID" => "NULL", ">REGION_ID" => "0");
		if ($countryId > 0 && $regionId > 0)
			$arRegionFilter["COUNTRY_ID"] = $countryId;
		if ($regionId > 0)
			$arRegionFilter["REGION_ID"] = $regionId;
		$rsLocCount = CSaleLocation::GetList(array(), $arRegionFilter, false, false, array("ID"));
		if (!$rsLocCount->Fetch())
			$bEmptyRegion = "Y";

		//check if exist another city
		if ($bEmptyCity == "Y" && $bEmptyRegion == "Y")
		{
			$arCityFilter = array("!CITY_ID" => "NULL", ">CITY_ID" => "0");
			$rsLocCount = CSaleLocation::GetList(array(), $arCityFilter, false, false, array("ID"));
			if ($rsLocCount->Fetch())
				$bEmptyCity = "N";
		}

		//location value
		if ($locationId > 0 )
		{
			if ($arLocation = CSaleLocation::GetByID($locationId))
			{
				if ($bEmptyRegion == "Y" && $bEmptyCity == "Y")
					$countryId = $locationId;
				else
					$countryId = $arLocation["COUNTRY_ID"];

				if ($bEmptyCity == "Y")
					$regionId = $arLocation["ID"];
				else
					$regionId = $arLocation["REGION_ID"];

				$cityId = $locationId;
			}
		}

		//select country
		$arCountryList = array();

		if ($bEmptyRegion == "Y" && $bEmptyCity == "Y")
			$rsCountryList = CSaleLocation::GetList(array("SORT" => "ASC", "NAME_LANG" => "ASC"), array("LID" => $langId), false, false, array("ID", "COUNTRY_ID", "COUNTRY_NAME_LANG"));
		else
			$rsCountryList = CSaleLocation::GetCountryList(array("SORT" => "ASC", "NAME_LANG" => "ASC"));

		while ($arCountry = $rsCountryList->GetNext())
		{
			if(!\Bitrix\Sale\SalesZone::checkCountryId($arCountry["ID"], $siteId))
				continue;

			if ($bEmptyRegion == "Y" && $bEmptyCity == "Y")
				$arCountry["NAME_LANG"] = $arCountry["COUNTRY_NAME_LANG"];

			$arCountryList[] = $arCountry;
			if ($arCountry["ID"] == $countryId && strlen($arCountry["NAME_LANG"]) > 0)
				$locationString .= $arCountry["NAME_LANG"];
		}

		if (count($arCountryList) <= 0)
			$arCountryList = array();
		elseif (count($arCountryList) == 1)
			$countryId = $arCountryList[0]["ID"];

		//select region
		$arRegionList = array();
		if ($countryId > 0 || count($arCountryList) <= 0)
		{
			$arRegionFilter = array("LID" => $langId, "!REGION_ID" => "NULL", "!REGION_ID" => "0");
			if ($countryId > 0)
				$arRegionFilter["COUNTRY_ID"] = IntVal($countryId);

			if ($bEmptyCity == "Y")
				$rsRegionList = CSaleLocation::GetList(array("SORT" => "ASC", "NAME_LANG" => "ASC"), $arRegionFilter, false, false, array("ID", "REGION_ID", "REGION_NAME_LANG"));
			else
				$rsRegionList = CSaleLocation::GetRegionList(array("SORT" => "ASC", "NAME_LANG" => "ASC"), $arRegionFilter);

			while ($arRegion = $rsRegionList->GetNext())
			{
				if(!\Bitrix\Sale\SalesZone::checkRegionId($arRegion["ID"], $siteId))
					continue;

				if ($bEmptyCity == "Y")
					$arRegion["NAME_LANG"] = $arRegion["REGION_NAME_LANG"];

				$arRegionList[] = $arRegion;
				if ($arRegion["ID"] == $regionId && strlen($arRegion["NAME_LANG"]) > 0)
					$locationString = $arRegion["NAME_LANG"].", ".$locationString;
			}
		}
		if (count($arRegionList) <= 0)
			$arRegionList = array();
		elseif (count($arRegionList) == 1)
			$regionId = $arRegionList[0]["ID"];

		//select city
		$arCityList = array();
		if (
			$bEmptyCity == "N"
			&& ((count($arCountryList) > 0 && count($arRegionList) > 0 && $countryId > 0 && $regionId > 0)
				|| (count($arCountryList) <= 0 && count($arRegionList) > 0 && $regionId > 0)
				|| (count($arCountryList) > 0 && count($arRegionList) <= 0 && $countryId > 0)
				|| (count($arCountryList) <= 0 && count($arRegionList) <= 0))
		)
		{
			$arCityFilter = array("LID" => $langId);
			if ($countryId > 0)
				$arCityFilter["COUNTRY_ID"] = $countryId;
			if ($regionId > 0)
				$arCityFilter["REGION_ID"] = $regionId;

			$rsLocationsList = CSaleLocation::GetList(
				array(
					"SORT" => "ASC",
					"COUNTRY_NAME_LANG" => "ASC",
					"CITY_NAME_LANG" => "ASC"
				),
				$arCityFilter,
				false,
				false,
				array(
					"ID", "CITY_ID", "CITY_NAME"
				)
			);

			while ($arCity = $rsLocationsList->GetNext())
			{
				if(!\Bitrix\Sale\SalesZone::checkCityId($arCity["CITY_ID"], $siteId))
					continue;

				$arCityList[] = array(
					"ID" => $arCity["ID"],
					"CITY_ID" => $arCity['CITY_ID'],
					"CITY_NAME" => $arCity["CITY_NAME"],
				);
				if ($arCity["ID"] == $cityId)
					$locationString = (strlen($arCity["CITY_NAME"]) > 0 ? $arCity["CITY_NAME"].", " : "").$locationString;
			}//end while
		}

		return $locationString;
	}


	// COUNTRY
	public static function CountryCheckFields($ACTION, &$arFields)
	{
		global $DB;

		if ((is_set($arFields, "NAME") || $ACTION=="ADD") && strlen($arFields["NAME"])<=0) return false;

		/*
		$db_lang = CLangAdmin::GetList(($b="sort"), ($o="asc"), array("ACTIVE" => "Y"));
		while ($arLang = $db_lang->Fetch())
		{
			if ((is_set($arFields[$arLang["LID"]], "NAME") || $ACTION=="ADD") && strlen($arFields[$arLang["LID"]]["NAME"])<=0) return false;
		}
		*/

		return True;
	}

	
	/**
	* <p>Функция изменяет параметры страны с кодом ID на новые параметры из массива arFields </p>
	*
	*
	*
	*
	* @param int $ID  Код страны.
	*
	*
	*
	* @param array $arFields  Массив с параметрами страны должен содержать ключи: <ul> <li> <b>NAME</b> -
	* название страны (не зависящее от языка);</li> <li> <b>SHORT_NAME</b> -
	* сокращенное название страны - абревиатура (не зависящее от
	* языка);</li> <li> <b>&lt;код языка&gt;</b> - ключем является код языка, а
	* значением ассоциативный массив вида <pre class="syntax">array("LID" =&gt; "код
	* языка", "NAME" =&gt; "название страны на этом языке", "SHORT_NAME" =&gt;
	* "сокращенное название страны (аббревиатура) на этом языке")</pre> Эта
	* пара ключ-значение должна присутствовать для каждого языка
	* системы.</li> </ul>
	*
	*
	*
	* @return int <p>Возвращается код измененной страны или <i>false</i> у случае
	* ошибки.</p> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__updatecountry.d8fa5b90.php
	* @author Bitrix
	*/
	public static function UpdateCountry($ID, $arFields)
	{
		global $DB;

		$ID = intval($ID);

		if ($ID <= 0 || !CSaleLocation::CountryCheckFields("UPDATE", $arFields))
			return false;

		foreach (GetModuleEvents("sale", "OnBeforeCountryUpdate", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID, &$arFields))===false)
				return false;

		$strUpdate = $DB->PrepareUpdate("b_sale_location_country", $arFields);
		$strSql = "UPDATE b_sale_location_country SET ".$strUpdate." WHERE ID = ".$ID."";
		$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		$db_lang = CLangAdmin::GetList(($b="sort"), ($o="asc"), array("ACTIVE" => "Y"));
		while ($arLang = $db_lang->Fetch())
		{
			if ($arCntLang = CSaleLocation::GetCountryLangByID($ID, $arLang["LID"]))
			{
				$strUpdate = $DB->PrepareUpdate("b_sale_location_country_lang", $arFields[$arLang["LID"]]);
				$strSql = "UPDATE b_sale_location_country_lang SET ".$strUpdate." WHERE ID = ".$arCntLang["ID"]."";
			}
			else
			{
				$arInsert = $DB->PrepareInsert("b_sale_location_country_lang", $arFields[$arLang["LID"]]);
				$strSql =
					"INSERT INTO b_sale_location_country_lang(COUNTRY_ID, ".$arInsert[0].") ".
					"VALUES(".$ID.", ".$arInsert[1].")";
			}
			$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
		}

		foreach (GetModuleEvents("sale", "OnCountryUpdate", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID, $arFields));

		return $ID;
	}

	
	/**
	* <p>Функция удаляет страну с кодом ID. Связаные с этой страной местоположения не изменяются. </p>
	*
	*
	*
	*
	* @param int $ID  Код страны.
	*
	*
	*
	* @return bool <p>Функция возвращает <i>true</i> в случае успешного удаления
	* местоположения и <i>false</i> - в противном случае.</p> <a name="examples"></a>
	*
	*
	* <h4>Example</h4> 
	* <pre>
	* &lt;?
	* if (!CSaleLocation::DeleteCountry(12))
	*    echo "Ошибка удаления страны";<br>?&gt;
	* </pre>
	*
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__deletecountry.e37a14ed.php
	* @author Bitrix
	*/
	public static function DeleteCountry($ID)
	{
		global $DB;
		$ID = IntVal($ID);

		foreach (GetModuleEvents("sale", "OnBeforeCountryDelete", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID))===false)
				return false;

		$DB->Query("DELETE FROM b_sale_location_country_lang WHERE COUNTRY_ID = ".$ID."", true);
		$bDelete = $DB->Query("DELETE FROM b_sale_location_country WHERE ID = ".$ID."", true);

		foreach (GetModuleEvents("sale", "OnCountryDelete", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID));

		return $bDelete;
	}

	// CITY
	public static function CityCheckFields($ACTION, &$arFields)
	{
		global $DB;

		if ((is_set($arFields, "NAME") || $ACTION=="ADD") && strlen($arFields["NAME"])<=0) return false;

		/*
		$db_lang = CLangAdmin::GetList(($b="sort"), ($o="asc"), array("ACTIVE" => "Y"));
		while ($arLang = $db_lang->Fetch())
		{
			if ((is_set($arFields[$arLang["LID"]], "NAME") || $ACTION=="ADD") && strlen($arFields[$arLang["LID"]]["NAME"])<=0) return false;
		}
		*/

		return True;
	}

	// REGION
	public static function RegionCheckFields($ACTION, &$arFields)
	{
		if ((is_set($arFields, "NAME") || $ACTION=="ADD") && strlen($arFields["NAME"])<=0) return false;

		return True;
	}

	
	/**
	* <p>Функция изменяет параметры города с кодом ID на значения из массива arFields </p>
	*
	*
	*
	*
	* @param int $ID  Код города.
	*
	*
	*
	* @param array $arFields  Массив с параметрами города должен содержать ключи: <ul> <li> <b>NAME</b> -
	* название города (не зависящее от языка);</li> <li> <b>SHORT_NAME</b> -
	* сокращенное название города - абревиатура (не зависящее от
	* языка);</li> <li> <b>&lt;код языка&gt;</b> - ключем является код языка, а
	* значением ассоциативный массив вида <pre class="syntax"> array("LID" =&gt; "код
	* языка", "NAME" =&gt; "название города на этом языке", "SHORT_NAME" =&gt;
	* "сокращенное название города (аббревиатура) на этом языке")</pre> Эта
	* пара ключ-значение должна присутствовать для каждого языка
	* системы.</li> </ul>
	*
	*
	*
	* @return int <p>Возвращается код измененного города или <i>false</i> у случае
	* ошибки.</p> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__updatecity.3fe4165d.php
	* @author Bitrix
	*/
	public static function UpdateCity($ID, $arFields)
	{
		global $DB;

		$ID = intval($ID);

		if ($ID <= 0 || !CSaleLocation::CityCheckFields("UPDATE", $arFields))
			return false;

		foreach (GetModuleEvents("sale", "OnBeforeCityUpdate", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID, &$arFields))===false)
				return false;

		$strUpdate = $DB->PrepareUpdate("b_sale_location_city", $arFields);
		$strSql = "UPDATE b_sale_location_city SET ".$strUpdate." WHERE ID = ".$ID."";
		$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		$db_lang = CLangAdmin::GetList(($b="sort"), ($o="asc"), array("ACTIVE" => "Y"));
		while ($arLang = $db_lang->Fetch())
		{
			if ($arCntLang = CSaleLocation::GetCityLangByID($ID, $arLang["LID"]))
			{
				$strUpdate = $DB->PrepareUpdate("b_sale_location_city_lang", $arFields[$arLang["LID"]]);
				$strSql = "UPDATE b_sale_location_city_lang SET ".$strUpdate." WHERE ID = ".$arCntLang["ID"]."";
			}
			else
			{
				$arInsert = $DB->PrepareInsert("b_sale_location_city_lang", $arFields[$arLang["LID"]]);
				$strSql =
					"INSERT INTO b_sale_location_city_lang(CITY_ID, ".$arInsert[0].") ".
					"VALUES(".$ID.", ".$arInsert[1].")";
			}
			$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
		}

		foreach (GetModuleEvents("sale", "OnCityUpdate", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID, $arFields));

		return $ID;
	}

	/**
	* The function modifies the parameters of the region
	*
	* @param int $ID region code
	* @param array $arFields array with parameters region
	* @return int $ID code region
	*/
	public static function UpdateRegion($ID, $arFields)
	{
		global $DB;

		$ID = intval($ID);

		if ($ID <= 0 || !CSaleLocation::RegionCheckFields("UPDATE", $arFields))
			return false;

		foreach (GetModuleEvents("sale", "OnBeforeRegionUpdate", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID, &$arFields))===false)
				return false;

		$strUpdate = $DB->PrepareUpdate("b_sale_location_region", $arFields);
		$strSql = "UPDATE b_sale_location_region SET ".$strUpdate." WHERE ID = ".$ID."";
		$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		$db_lang = CLangAdmin::GetList(($b="sort"), ($o="asc"), array("ACTIVE" => "Y"));
		while ($arLang = $db_lang->Fetch())
		{
			if ($arCntLang = CSaleLocation::GetRegionLangByID($ID, $arLang["LID"]))
			{
				$strUpdate = $DB->PrepareUpdate("b_sale_location_region_lang", $arFields[$arLang["LID"]]);
				//print_r($arFields);die();

				$strSql = "UPDATE b_sale_location_region_lang SET ".$strUpdate." WHERE ID = ".$arCntLang["ID"]."";
			}
			else
			{
				$arInsert = $DB->PrepareInsert("b_sale_location_region_lang", $arFields[$arLang["LID"]]);
				$strSql =
					"INSERT INTO b_sale_location_region_lang(REGION_ID, ".$arInsert[0].") ".
					"VALUES(".$ID.", ".$arInsert[1].")";
			}
			$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
		}

		foreach (GetModuleEvents("sale", "OnRegionUpdate", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID, $arFields));

		return $ID;
	}

	/**
	* The function delete region
	*
	* @param int $ID region code
	* @return true false
	*/
	public static function DeleteRegion($ID)
	{
		global $DB;
		$ID = IntVal($ID);

		foreach (GetModuleEvents("sale", "OnBeforeRegionDelete", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID))===false)
				return false;

		$bDelete = false;
		$DB->Query("DELETE FROM b_sale_location_region_lang WHERE REGION_ID = ".$ID."", true);
		$bDelete = $DB->Query("DELETE FROM b_sale_location_region WHERE ID = ".$ID."", true);

		foreach (GetModuleEvents("sale", "OnRegionDelete", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID));

		return $bDelete;
	}

	
	/**
	* <p>Функция удаляет город с кодом ID. Местоположение, с которым связан этот город, не изменяется.</p>
	*
	*
	*
	*
	* @param int $ID  Код города.
	*
	*
	*
	* @return bool <p>Функция возвращает <i>true</i> в случае успешного удаления
	* местоположения и <i>false</i> - в противном случае.</p> <a name="examples"></a>
	*
	*
	* <h4>Example</h4> 
	* <pre>
	* &lt;?
	* if (!CSaleLocation::DeleteCity(12))
	*    echo "Ошибка удаления города";<br>?&gt;
	* 
	* </htm
	* </pre>
	*
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__deletecity.339c5a43.php
	* @author Bitrix
	*/
	public static function DeleteCity($ID)
	{
		global $DB;
		$ID = IntVal($ID);

		foreach (GetModuleEvents("sale", "OnBeforeCityDelete", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID))===false)
				return false;

		$DB->Query("DELETE FROM b_sale_location_city_lang WHERE CITY_ID = ".$ID."", true);
		$bDelete = $DB->Query("DELETE FROM b_sale_location_city WHERE ID = ".$ID."", true);

		foreach (GetModuleEvents("sale", "OnCityDelete", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID));

		return $bDelete;
	}

	// LOCATION
	public static function LocationCheckFields($ACTION, &$arFields)
	{
		global $DB;

		if ((is_set($arFields, "SORT") || $ACTION=="ADD") && IntVal($arFields["SORT"])<=0) $arFields["SORT"] = 100;
		if (is_set($arFields, "COUNTRY_ID")) $arFields["COUNTRY_ID"] = IntVal($arFields["COUNTRY_ID"]);
		if (is_set($arFields, "CITY_ID")) $arFields["CITY_ID"] = IntVal($arFields["CITY_ID"]);

		return True;
	}

	
	/**
	* <p>Функция обновляет параметры местоположения с кодом ID в соответствии с параметрами из массива arFields.</p>
	*
	*
	*
	*
	* @param int $ID  Код местоположения. </h
	*
	*
	*
	* @param array $arFields  Ассоциативный массив параметров местоположения с ключами: <ul> <li>
	* <b>SORT</b> - индекс сортировки; </li> <li> <b>COUNTRY_ID</b> - код страны;</li> <li>
	* <b>REGION_ID</b> - код региона;</li> <li> <b>CITY_ID</b> - код города (если такой город
	* уже есть, иначе код должен быть нулем, и должен быть заполнен ключ
	* CITY).</li> </ul>
	*
	*
	*
	* @return int <p>Возвращается код измененного местоположения или <i>false</i> в
	* случае ошибки.</p> <br><br>
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__updatelocation.3c5a6205.php
	* @author Bitrix
	*/
	public static function UpdateLocation($ID, $arFields)
	{
		global $DB;

		$ID = intval($ID);

		if ($ID <= 0 || !CSaleLocation::LocationCheckFields("UPDATE", $arFields))
			return false;

		foreach (GetModuleEvents("sale", "OnBeforeLocationUpdate", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID, &$arFields))===false)
				return false;

		$strUpdate = $DB->PrepareUpdate("b_sale_location", $arFields);
		$strSql = "UPDATE b_sale_location SET ".$strUpdate." WHERE ID = ".$ID."";
		$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);

		foreach (GetModuleEvents("sale", "OnLocationUpdate", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID, $arFields));

		return $ID;
	}


	public static function CheckFields($ACTION, &$arFields)
	{
		global $DB;

		if (is_set($arFields, "CHANGE_COUNTRY") && $arFields["CHANGE_COUNTRY"]!="Y")
			$arFields["CHANGE_COUNTRY"] = "N";
		if (is_set($arFields, "WITHOUT_CITY") && $arFields["WITHOUT_CITY"]!="Y")
			$arFields["WITHOUT_CITY"] = "N";

		if (is_set($arFields, "COUNTRY_ID"))
			$arFields["COUNTRY_ID"] = trim($arFields["COUNTRY_ID"]);
		//	$arFields["COUNTRY_ID"] = IntVal($arFields["COUNTRY_ID"]);

		if (is_set($arFields, "CHANGE_COUNTRY") && $arFields["CHANGE_COUNTRY"]=="Y"
			&& (!is_set($arFields, "COUNTRY_ID") || $arFields["COUNTRY_ID"]<=0))
			return false;

		return True;
	}

	
	/**
	* <p>Функция добавляет новое местоположение включая страну и город местоположения, если нужно.</p>
	*
	*
	*
	*
	* @param array $arFields  Ассоциативный массив параметров местоположения с ключами: <ul> <li>
	* <b>SORT</b> - индекс сортировки; </li> <li> <b>COUNTRY_ID</b> - код страны (если такая
	* страна уже есть, иначе код должен быть нулем, и должен быть
	* заполнен ключ COUNTRY);</li> <li> <b>COUNTRY</b> - массив с параметрами страны
	* (если страна уже есть и установлен ключ COUNTRY_ID, то этот ключ
	* заполнять не нужно); </li> <li> <b>WITHOUT_CITY</b> - флаг (Y/N), означающий, что
	* это местоположение без города (только страна) (если значением с
	* этим ключом является N, то необходимо заполнить ключ CITY);</li> <li>
	* <b>CITY</b> - массив с параметрами города (если установлен флаг WITHOUT_CITY
	* в значение Y, то этот ключ заполнять не нужно);</li> <li> <b>REGION_NAME</b> -
	* название региона;</li> <li> <b>REGION_ID</b> - ID региона;</li> </ul> Массив с
	* параметрами страны должен содержать ключи: <ul> <li> <b>NAME</b> - название
	* страны (не зависящее от языка);</li> <li> <b>SHORT_NAME</b> - сокращенное
	* название страны - абревиатура (не зависящее от языка);</li> <li>
	* <b>&lt;код языка&gt;</b> - ключом является код языка, а значением
	* ассоциативный массив вида: <pre class="syntax">array("LID" =&gt; "код языка", "NAME"
	* =&gt; "название страны на этом языке", "SHORT_NAME" =&gt; "сокращенное
	* название страны (аббревиатура) на этом языке")</pre> Эта пара
	* ключ-значение должна присутствовать для каждого языка системы.
	* </li> </ul> Массив с параметрами города должен содержать ключи: <ul> <li>
	* <b>NAME</b> - название города (не зависящее от языка);</li> <li> <b>SHORT_NAME</b> -
	* сокращенное название города - абревиатура (не зависящее от
	* языка);</li> <li> <b>&lt;код языка&gt;</b> - ключем является код языка, а
	* значением ассоциативный массив вида: <pre class="syntax">array("LID" =&gt; "код
	* языка", "NAME" =&gt; "название города на этом языке", "SHORT_NAME" =&gt;
	* "сокращенное название города (аббревиатура) на этом языке")</pre> Эта
	* пара ключ-значение должна присутствовать для каждого языка
	* системы. </li> </ul>
	*
	*
	*
	* @return int <p>Возвращается код добавленного местоположения или <i>false</i> у
	* случае ошибки.</p> <a name="examples"></a>
	*
	*
	* <h4>Example</h4> 
	* <pre>
	* &lt;?
	* $arFields = array(
	*    "SORT" =&gt; 100,
	*    "COUNTRY_ID" =&gt; 0,
	*    "WITHOUT_CITY" =&gt; "N"
	* );
	* 
	* $arCountry = array(
	*    "NAME" =&gt; "Russian Federation",
	*    "SHORT_NAME" =&gt; "Russia",
	*    "ru" =&gt; array(
	*       "LID" =&gt; "ru",
	*       "NAME" =&gt; "Российская федерация",
	*       "SHORT_NAME" =&gt; "Россия"
	*       ),
	*    "en" =&gt; array(
	*       "LID" =&gt; "en",
	*       "NAME" =&gt; "Russian Federation",
	*       "SHORT_NAME" =&gt; "Russia"
	*       )
	* );
	* 
	* $arFields["COUNTRY"] = $arCountry;
	* 
	* $arCity = array(
	*    "NAME" =&gt; "Kaliningrad",
	*    "SHORT_NAME" =&gt; "Kaliningrad",
	*    "ru" =&gt; array(
	*       "LID" =&gt; "ru",
	*       "NAME" =&gt; "Калининград",
	*       "SHORT_NAME" =&gt; "Калининград"
	*       ),
	*    "en" =&gt; array(
	*       "LID" =&gt; "en",
	*       "NAME" =&gt; "Kaliningrad",
	*       "SHORT_NAME" =&gt; "Kaliningrad"
	*       )
	* );
	* 
	* $arFields["CITY"] = $arCity;
	* 
	* $ID = CSaleLocation::Add($arFields);
	* if (IntVal($ID)&lt;=0)
	*    echo "Ошибка добавления местоположения";
	* ?&gt;
	* </pre>
	*
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__add.92483b06.php
	* @author Bitrix
	*/
	public static function Add($arFields)
	{
		global $DB;

		if (!CSaleLocation::CheckFields("ADD", $arFields))
			return false;

		if ((!is_set($arFields, "COUNTRY_ID") || IntVal($arFields["COUNTRY_ID"])<=0) && strlen($arFields["COUNTRY_ID"]) > 0)
		{
			$arFields["COUNTRY_ID"] = CSaleLocation::AddCountry($arFields["COUNTRY"]);
			if (IntVal($arFields["COUNTRY_ID"])<=0) return false;

			if ($arFields["WITHOUT_CITY"]!="Y" && strlen($arFields["REGION_ID"]) <= 0)
			{
				UnSet($arFields["CITY_ID"]);
				CSaleLocation::AddLocation($arFields);
			}
		}

		if ($arFields["REGION_ID"] <= 0 && $arFields["REGION_ID"] != "")
		{
			$arFields["REGION_ID"] = CSaleLocation::AddRegion($arFields["REGION"]);
			if (IntVal($arFields["REGION_ID"])<=0) return false;

			if ($arFields["WITHOUT_CITY"] != "Y")
			{
				//$arFieldsTmp = $arFields;
				UnSet($arFields["CITY_ID"]);
				CSaleLocation::AddLocation($arFields);
			}
		}
		elseif ($arFields["REGION_ID"] == '')
		{
			UnSet($arFields["REGION_ID"]);
		}

		if ($arFields["WITHOUT_CITY"]!="Y")
		{
			if (IntVal($arFields["REGION_ID"]) > 0)
				$arFields["CITY"]["REGION_ID"] = $arFields["REGION_ID"];
			$arFields["CITY_ID"] = CSaleLocation::AddCity($arFields["CITY"]);
			if (IntVal($arFields["CITY_ID"])<=0) return false;
		}
		else
		{
			UnSet($arFields["CITY_ID"]);
		}

		$ID = CSaleLocation::AddLocation($arFields);

		return $ID;
	}

	
	/**
	* <p>Функция обновляет параметры местоположения с кодом ID в соответствии с параметрами из массива arFields. Обновляются так же страна и город этого местоположения. </p>
	*
	*
	*
	*
	* @param int $ID  Код местоположения. </h
	*
	*
	*
	* @param array $arFields  Ассоциативный массив параметров местоположения с ключами: <ul> <li>
	* <b>SORT</b> - индекс сортировки; </li> <li> <b>COUNTRY_ID</b> - код страны (если такая
	* страна уже есть, иначе код должен быть нулем, и должен быть
	* заполнен ключ COUNTRY);</li> <li> <b>COUNTRY</b> - массив с параметрами страны
	* (должен быть заполнен, если не установлен ключ COUNTRY_ID или если ключ
	* CHANGE_COUNTRY установлен в значение Y); </li> <li> <b>CHANGE_COUNTRY</b> - флаг (Y/N),
	* изменять ли параметры страны (долны быть установлены ключи COUNTRY_ID
	* и COUNTRY); </li> <li> <b>WITHOUT_CITY</b> - флаг (Y/N), означающий, что это
	* местоположение без города (только страна) (если значением с этим
	* ключем является N, то необходимо заполнить ключ CITY);</li> <li> <b>CITY_ID</b> -
	* код города (если такой город уже есть, иначе код должен быть нулем,
	* и должен быть заполнен ключ CITY);</li> <li> <b>CITY</b> - массив с параметрами
	* города (если установлен флаг WITHOUT_CITY в значение Y, то этот ключ
	* заполнять не нужно);</li> </ul> Массив с параметрами страны должен
	* содержать ключи: <ul> <li> <b>NAME</b> - название страны (не зависящее от
	* языка);</li> <li> <b>SHORT_NAME</b> - сокращенное название страны - абревиатура
	* (не зависящее от языка);</li> <li> <b>&lt;код языка&gt;</b> - ключем является
	* код языка, а значением ассоциативный массив вида <pre class="syntax">
	* array("LID" =&gt; "код языка", "NAME" =&gt; "название страны на этом языке",
	* "SHORT_NAME" =&gt; "сокращенное название страны (аббревиатура) на этом
	* языке")</pre> Эта пара ключ-значение должна присутствовать для
	* каждого языка системы. </li> </ul> Массив с параметрами города должен
	* содержать ключи: <ul> <li> <b>NAME</b> - название города (не зависящее от
	* языка);</li> <li> <b>SHORT_NAME</b> - сокращенное название города - абревиатура
	* (не зависящее от языка);</li> <li> <b>&lt;код языка&gt;</b> - ключем является
	* код языка, а значением ассоциативный массив вида <pre class="syntax">
	* array("LID" =&gt; "код языка", "NAME" =&gt; "название города на этом языке",
	* "SHORT_NAME" =&gt; "сокращенное название города (аббревиатура) на этом
	* языке")</pre> Эта пара ключ-значение должна присутствовать для
	* каждого языка системы.</li> </ul>
	*
	*
	*
	* @return int <p>Возвращается код измененного местоположения или <i>false</i> у
	* случае ошибки.</p> <a name="examples"></a>
	*
	*
	* <h4>Example</h4> 
	* <pre>
	* &lt;?
	* $arFields = array(
	*    "SORT" =&gt; 100,
	*    "COUNTRY_ID" =&gt; 8,
	*    "WITHOUT_CITY" =&gt; "N"
	* );
	* 
	* $arCity = array(
	*    "NAME" =&gt; "Kaliningrad",
	*    "SHORT_NAME" =&gt; "Kaliningrad",
	*    "ru" =&gt; array(
	*       "LID" =&gt; "ru",
	*       "NAME" =&gt; "Калининград",
	*       "SHORT_NAME" =&gt; "Калининград"
	*       ),
	*    "en" =&gt; array(
	*       "LID" =&gt; "en",
	*       "NAME" =&gt; "Kaliningrad",
	*       "SHORT_NAME" =&gt; "Kaliningrad"
	*       )
	* );
	* 
	* $arFields["CITY"] = $arCity;
	* 
	* if (!CSaleLocation::Update(6, $arFields))
	*    echo "Ошибка изменения местоположения";
	* ?&gt;
	* </pre>
	*
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__update.a6601f1c.php
	* @author Bitrix
	*/
	public static function Update($ID, $arFields)
	{
		global $DB;

		if (!CSaleLocation::CheckFields("UPDATE", $arFields)) return false;

		if (!($arLocRes = CSaleLocation::GetByID($ID, LANGUAGE_ID))) return false;

		if ((!is_set($arFields, "COUNTRY_ID") || IntVal($arFields["COUNTRY_ID"])<=0) && $arFields["COUNTRY_ID"] != "")
		{
			$arFields["COUNTRY_ID"] = CSaleLocation::AddCountry($arFields["COUNTRY"]);
			if (IntVal($arFields["COUNTRY_ID"])<=0) return false;

			UnSet($arFields["CITY_ID"]);
			UnSet($arFields["REGION_ID"]);
			CSaleLocation::AddLocation($arFields);
		}
		elseif ($arFields["CHANGE_COUNTRY"]=="Y" || $arFields["COUNTRY_ID"] == "")
		{
			CSaleLocation::UpdateCountry($arFields["COUNTRY_ID"], $arFields["COUNTRY"]);
		}

		//city
		if ($arFields["WITHOUT_CITY"]!="Y")
		{
			if (IntVal($arLocRes["CITY_ID"])>0)
			{
				CSaleLocation::UpdateCity(IntVal($arLocRes["CITY_ID"]), $arFields["CITY"]);
			}
			else
			{
				$arFields["CITY_ID"] = CSaleLocation::AddCity($arFields["CITY"]);
				if (IntVal($arFields["CITY_ID"])<=0) return false;
			}
		}
		else
		{
			CSaleLocation::DeleteCity($arLocRes["CITY_ID"]);
			$arFields["CITY_ID"] = false;
		}

		//region
		if (IntVal($arFields["REGION_ID"])>0)
		{
			CSaleLocation::UpdateRegion(IntVal($arLocRes["REGION_ID"]), $arFields["REGION"]);
		}
		elseif ($arFields["REGION_ID"] == 0 && $arFields["REGION_ID"] != '')
		{
			$db_res = CSaleLocation::GetRegionList(array("ID" => "DESC"), array("NAME" => $arFields["REGION"][LANGUAGE_ID]["NAME"]));
			$arRegion = $db_res->Fetch();

			if (count($arRegion) > 1)
				$arFields["REGION_ID"] = $arRegion["ID"];
			else
			{
				$arFields["REGION_ID"] = CSaleLocation::AddRegion($arFields["REGION"]);
				if (IntVal($arFields["REGION_ID"])<=0)
					return false;

				$arFieldsTmp = $arFields;
				UnSet($arFieldsTmp["CITY_ID"]);
				CSaleLocation::AddLocation($arFieldsTmp);
			}
		}
		elseif ($arFields["REGION_ID"] == '')
		{
			//CSaleLocation::DeleteRegion($arLocRes["REGION_ID"]);
			$arFields["REGION_ID"] = 0;
		}
		else
		{
			UnSet($arFields["REGION_ID"]);
		}

		CSaleLocation::UpdateLocation($ID, $arFields);

		return $ID;
	}

	
	/**
	* <p>Функция удаляет местоположение с кодом ID. Функция так же удаляет город этого местоположения, страну этого местоположения (если она не входит больше ни в одно другое местоположение), а так же связи этого местоположения с группами местоположений и службами доставки. </p>
	*
	*
	*
	*
	* @param int $ID  Код местоположения. </h
	*
	*
	*
	* @return bool <p>Функция возвращает <i>true</i> в случае успешного удаления
	* местоположения и <i>false</i> - в противном случае.</p> <a name="examples"></a>
	*
	*
	* <h4>Example</h4> 
	* <pre>
	* &lt;?
	* if (!CSaleLocation::Delete(12))
	*    echo "Ошибка удаления местоположения";<br>?&gt;
	* </pre>
	*
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__delete.008e0aa2.php
	* @author Bitrix
	*/
	public static function Delete($ID)
	{
		global $DB;
		$ID = IntVal($ID);

		if (!($arLocRes = CSaleLocation::GetByID($ID, LANGUAGE_ID)))
			return false;

		foreach (GetModuleEvents("sale", "OnBeforeLocationDelete", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent, array($ID))===false)
				return false;

		if (IntVal($arLocRes["CITY_ID"]) > 0)
			CSaleLocation::DeleteCity($arLocRes["CITY_ID"]);

		$bDelCountry = True;
		$db_res = CSaleLocation::GetList(
				array("SORT" => "ASC"),
				array("COUNTRY_ID" => $arLocRes["COUNTRY_ID"], "!ID"=>$ID),
				LANGUAGE_ID
			);
		if ($db_res->Fetch())
			$bDelCountry = false;

		if ($bDelCountry && IntVal($arLocRes["COUNTRY_ID"]) > 0)
			CSaleLocation::DeleteCountry($arLocRes["COUNTRY_ID"]);

		$bDelRegion = True;
		$db_res = CSaleLocation::GetList(
				array("SORT" => "ASC"),
				array("REGION_ID" => $arLocRes["REGION_ID"], "!ID"=>$ID),
				LANGUAGE_ID
			);
		if ($db_res->Fetch())
			$bDelRegion = false;

		if ($bDelRegion && IntVal($arLocRes["REGION_ID"]) > 0)
			CSaleLocation::DeleteRegion($arLocRes["REGION_ID"]);

		$DB->Query("DELETE FROM b_sale_location2location_group WHERE LOCATION_ID = ".$ID."", true);
		$DB->Query("DELETE FROM b_sale_delivery2location WHERE LOCATION_ID = ".$ID." AND LOCATION_TYPE = 'L'", true);
		$DB->Query("DELETE FROM b_sale_location_zip WHERE LOCATION_ID = ".$ID."", true);
		$bDelete = $DB->Query("DELETE FROM b_sale_location WHERE ID = ".$ID."", true);

		foreach (GetModuleEvents("sale", "OnLocationDelete", true) as $arEvent)
			ExecuteModuleEventEx($arEvent, array($ID));

		return $bDelete;
	}

	public static function OnLangDelete($strLang)
	{
		global $DB;
		$DB->Query("DELETE FROM b_sale_location_city_lang WHERE LID = '".$DB->ForSql($strLang)."'", true);
		$DB->Query("DELETE FROM b_sale_location_country_lang WHERE LID = '".$DB->ForSql($strLang)."'", true);
		return True;
	}

	
	/**
	* <p>Функция удаляет все местоположения из базы.</p> <br><br>
	*
	*
	*
	*
	* @return mixed 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_help/sale/classes/csalelocation/csalelocation__deleteall.1cda6559.php
	* @author Bitrix
	*/
	public static function DeleteAll()
	{
		global $DB;

		foreach (GetModuleEvents("sale", "OnBeforeLocationDeleteAll", true) as $arEvent)
			if (ExecuteModuleEventEx($arEvent)===false)
				return false;

		$DB->Query("DELETE FROM b_sale_location2location_group");
		$DB->Query("DELETE FROM b_sale_location_group_lang");
		$DB->Query("DELETE FROM b_sale_location_group");

		$DB->Query("DELETE FROM b_sale_delivery2location");
		$DB->Query("DELETE FROM b_sale_location");

		$DB->Query("DELETE FROM b_sale_location_city_lang");
		$DB->Query("DELETE FROM b_sale_location_city");

		$DB->Query("DELETE FROM b_sale_location_country_lang");
		$DB->Query("DELETE FROM b_sale_location_country");

		$DB->Query("DELETE FROM b_sale_location_region_lang");
		$DB->Query("DELETE FROM b_sale_location_region");

		$DB->Query("DELETE FROM b_sale_location_zip");

		foreach (GetModuleEvents("sale", "OnLocationDeleteAll", true) as $arEvent)
			ExecuteModuleEventEx($arEvent);

	}

	public static function GetLocationZIP($location)
	{
		global $DB;

		return $DB->Query("SELECT ZIP FROM b_sale_location_zip WHERE LOCATION_ID='".$DB->ForSql($location)."'");
	}

	public static function GetByZIP($zip)
	{
		global $DB;

		$dbRes = $DB->Query('SELECT LOCATION_ID FROM b_sale_location_zip WHERE ZIP=\''.$DB->ForSql($zip).'\'');
		if ($arRes = $dbRes->Fetch())
			return CSaleLocation::GetByID($arRes['LOCATION_ID']);
		else
			return false;
	}

	public static function ClearLocationZIP($location)
	{
		global $DB;

		$query = "DELETE FROM b_sale_location_zip WHERE LOCATION_ID='".$DB->ForSql($location)."'";
		$DB->Query($query);

		return;
	}

	public static function ClearAllLocationZIP()
	{
		global $DB;
		$DB->Query("DELETE FROM b_sale_location_zip");
	}

	public static function AddLocationZIP($location, $ZIP, $bSync = false)
	{
		global $DB;

		$arInsert = array(
			"LOCATION_ID" => intval($location),
			"ZIP" => intval($ZIP),
		);

		if ($bSync)
		{
			$cnt = $DB->Update(
				'b_sale_location_zip',
				$arInsert,
				"WHERE LOCATION_ID='".$arInsert["LOCATION_ID"]."' AND ZIP='".$arInsert["ZIP"]."'"
			);

			if ($cnt <= 0)
			{
				$bSync = false;
			}
		}

		if (!$bSync)
		{
			$DB->Insert('b_sale_location_zip', $arInsert);
		}

		return;
	}

	public static function SetLocationZIP($location, $arZipList)
	{
		global $DB;

		if (is_array($arZipList))
		{
			CSaleLocation::ClearLocationZIP($location);

			$arInsert = array(
				"LOCATION_ID" => "'".$DB->ForSql($location)."'",
				"ZIP" => '',
			);

			foreach ($arZipList as $ZIP)
			{
				if (strlen($ZIP) > 0)
				{
					$arInsert["ZIP"] = "'".$DB->ForSql($ZIP)."'";
					$DB->Insert('b_sale_location_zip', $arInsert);
				}
			}
		}

		return;
	}

	public static function _GetZIPImportStats()
	{
		global $DB;

		$query = "SELECT COUNT(*) AS CNT, COUNT(DISTINCT LOCATION_ID) AS CITY_CNT FROM b_sale_location_zip";
		$rsStats = $DB->Query($query);
		$arStat = $rsStats->Fetch();

		return $arStat;
	}

	public static function _GetCityImport($arCityName, $country_id = false)
	{
		global $DB;

		$arQueryFields = array('LCL.NAME', 'LCL.SHORT_NAME');

		$arWhere = array();
		foreach ($arCityName as $city_name)
		{
			$city_name = $DB->ForSql($city_name);
			foreach ($arQueryFields as $field)
			{
				if (strlen($field) > 0)
					$arWhere[] = $field."='".$city_name."'";
			}
		}

		if (count($arWhere) <= 0) return false;
		$strWhere = implode(' OR ', $arWhere);

		if ($country_id)
		{
			$strWhere = 'L.COUNTRY_ID=\''.intval($country_id).'\' AND ('.$strWhere.')';
		}

		$query = "
SELECT L.ID, L.CITY_ID
FROM b_sale_location L
LEFT JOIN b_sale_location_city_lang LCL ON L.CITY_ID=LCL.CITY_ID
WHERE ".$strWhere;

		$dbList = $DB->Query($query);

		if ($arCity = $dbList->Fetch())
			return $arCity;
		else
			return false;
	}

	public static function GetRegionsIdsByNames($arRegNames, $countryId = false)
	{
		global $DB;
		$arResult = array();
		$arWhere = array();
		$arQueryFields = array('RL.NAME', 'RL.SHORT_NAME');


		if(is_array($arRegNames))
		{
			foreach ($arRegNames as $regName)
			{
				$regName = $DB->ForSql($regName);
				foreach ($arQueryFields as $field)
					$arWhere[] = $field." LIKE '".$regName."'";
			}

			if (count($arWhere) > 0)
			{
				$strWhere = implode(' OR ', $arWhere);

				$query = "	SELECT RL.REGION_ID, RL.NAME, RL.SHORT_NAME
							FROM b_sale_location_region_lang RL ";

				if ($countryId)
				{
					$strWhere = 'L.COUNTRY_ID=\''.intval($countryId).'\' AND ('.$strWhere.')';
					$query .= "LEFT JOIN b_sale_location L ON L.REGION_ID=RL.REGION_ID ";
				}

				$query .= "WHERE ".$strWhere;
				$query .= " GROUP BY RL.REGION_ID";
				$query .= " ORDER BY RL.NAME, RL.SHORT_NAME";

				$dbList = $DB->Query($query);

				$arRegionsLang = array();

				while($arRegion = $dbList->Fetch())
				{
					if(strlen($arRegion["NAME"]) > 0)
						$idx = $arRegion["NAME"];
					else
						$idx = $arRegion["SHORT_NAME"];

					$arResult[$idx] = $arRegion["REGION_ID"];
				}
			}
		}

		return $arResult;
	}

	public static function GetRegionsNamesByIds($arIds, $lang = LANGUAGE_ID)
	{
		global $DB;
		$arResult = array();
		$arWhere = array();

		if ('' == $lang)
			$lang = LANGUAGE_ID;

		if(!empty($arIds) && is_array($arIds))
		{
			foreach ($arIds as $id)
			{
				if(intval($id) > 0)
					$arWhere[] = intval($id);
			}

			if (!empty($arWhere))
			{
				$query = "select RL.REGION_ID, RL.NAME, RL.SHORT_NAME from b_sale_location_region_lang RL";
				$query .= " where REGION_ID IN(".implode(',', $arWhere).") and RL.LID='".$DB->ForSql($lang, 2)."'";
				$query .= " order by RL.NAME, RL.SHORT_NAME";

				$dbList = $DB->Query($query);

				while($arRegion = $dbList->Fetch())
					$arResult[$arRegion["REGION_ID"]] = strlen($arRegion["NAME"]) > 0 ? $arRegion["NAME"] : $arRegion["SHORT_NAME"];
			}
		}

		return $arResult;
	}
}
?>