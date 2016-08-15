<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

  //Проверка параметров
  if(!isset($arParams["CACHE_TIME"])){
  	$arParams["CACHE_TIME"] = 36000000;
  }
  $arParams["CACHE_TIME"] = IntVal($arParams["CACHE_TIME"]);
  $arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
  $arSection = array();
  $arResult = array();

if($arParams["IBLOCK_ID"]){
      //Создаем кэш
      if ($this->StartResultCache($arParams["CACHE_TIME"])){

        //Выбор разделов
        $db_list = CIBlockSection::GetList(array(), array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y'),false,array("ID","NAME"));
        while($ar_result = $db_list->Fetch()){
          $arSection[$ar_result["ID"]] = $ar_result;
        }


        //выбор элементов
        $db_list = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', 'ACTIVE_DATE'=>'Y'),false,false,array("ID","NAME","PREVIEW_TEXT","IBLOCK_SECTION_ID"));
        while($ar_result = $db_list->Fetch()){
          //если есть раздел, помещаем в него элемент
          if (array_key_exists($ar_result["IBLOCK_SECTION_ID"], $arSection)){
            $arSection[$ar_result["IBLOCK_SECTION_ID"]]["ITEMS"][] = $ar_result;
          }
        }


        $arResult["SECTION"] = $arSection;
        //Подключение шаблона
        $this->IncludeComponentTemplate();
    }
}

?>
