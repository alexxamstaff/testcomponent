<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("COMPONENT_NAME"),
    "DESCRIPTION" => GetMessage("COMPONENT_DESCRIPTION"),
		"ICON" => "/images/cat_detail.gif",
    "CACHE_PATH" => "Y",
  	"SORT" => 50,
  	"PATH" => array(
  		"ID" => "specialcomponents",
			"NAME"=>GetMessage("PATH_NAME"),
			"SORT" => 50
    ),
);
?>
