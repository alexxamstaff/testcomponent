<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//если есть что выводить
if($arResult["SECTION"]){

  //показываем категорию вакансии
  foreach ($arResult["SECTION"] as $arSection){
    //если в категории есть вакансии
    if($arSection["ITEMS"]){
      echo"-".$arSection["NAME"];
      echo "<br>";
      //показываем вакансии
      foreach ($arSection["ITEMS"] as $arItems) {
       echo"--".$arItems["NAME"]."(".$arItems["PREVIEW_TEXT"].")";
       echo "<br>";
      }
      echo "<br>";
    }

  }

}
?>
