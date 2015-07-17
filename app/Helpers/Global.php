<?php

function defaultTitle()
{
	return "KiwiLauncher";
}

function defaultDescription()
{
	return "KiwiLauncher ...........";
}

function isMenuItemActive ($viewLink, $menuLink)
{
    $output = "";
    if ($viewLink == $menuLink) {
        $output = "active";
    }
    return $output;
}

?>