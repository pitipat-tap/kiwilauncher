@extends("../admin-layouts.main-admin")


@section("title")
File manager |  
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "filemanager", "has_sublink" => 0, "sublink" => ""))

<?php
	if(!isset($_SESSION)) {
		session_start(); 
	};;
	$_SESSION["USER_ROLE"] = Auth::user()->role;
	
	$lpath = getLinkPath();
?>


<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="filemanager" class="container">
	<h3 class="title">File manager</h3>
	<br />
    
    <div class="ui-block">
    	<?php $p_link = "http://".$_SERVER['SERVER_NAME'].$lpath."/filemanager/dialog.php?type=1&field_id=profile-image-url"; ?>
		<iframe width="1024" height="600" frameborder="0" src="{{ $p_link }}" style="width: 100%"></iframe>
	</div>
</div>

@stop