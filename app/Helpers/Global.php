<?php

function defaultTitle()
{
	return " Kiwi Launcher | Creative Launcher ";
}

function defaultDescription()
{
	return "ONE STOP IT SERVICES AND SOLUTIONS";
}

function isMenuItemActive ($viewLink, $menuLink)
{
    $output = "";
    if ($viewLink == $menuLink) {
        $output = "active";
    }
    return $output;
}

function defaultThumbnailUrl()
{
	return URL::asset("/image/default-web-thumbnail-image.jpg");
}

function isAdminNavLinkActive($link, $menulink) {
	$isActive = "";
	if ($link == $menulink) {
		$isActive = "active";
	}
	
	return $isActive;
}

function isAdminIconSubLinkActive($link, $menulink) {
	$isActive = "fa-chevron-down";
	if ($link == $menulink) {
		$isActive = "fa-chevron-up toggled";
	}
	
	return $isActive;
}

function isAdminGroupSubLinkToggled($has_sublink, $link, $menulink)
{
	$isToggled = "";
	if ($has_sublink == 1) {
		if ($link == $menulink) {
			$isToggled = "toggled";
		}
	} 
	
	return $isToggled;
}

function isAdminNavSubLinkActive($has_sublink, $sublink, $menulink)
{
	$isActive = "";
	if ($has_sublink == 1) {
		if ($sublink == $menulink) {
			$isActive = "active";
		}
	} 
	
	return $isActive;
}


function getLinkPath() 
{
    $lpath = '';
    if($_SERVER['HTTP_HOST'] == 'localhost'){
        // set projactname to $lpath
        $lpath = '/kiwilauncher/public';
    }
    return $lpath;
}

?>
