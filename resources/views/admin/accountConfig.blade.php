@extends("../admin-layouts.main-admin")


@section("title")
Account Config | 
@stop


@section("specific_js_head")
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "accountConfig", "has_sublink" => 0, "sublink" => ""))

<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>
<script>
    function save(text){
        console.log("save");
        var $type = text;
        $.ajax({
            url: 'http://localhost/kiwilauncher/public/admin/save-payment-type',
                //url: 'http://' + window.location.hostname + '/achievement, //for server
                type: 'POST',
                dataType: 'json',
                data: $type,
                success: function(data, status, xhr) {
                    if(data.status == 200) {
                        console.log("s");
                        console.log(data);
                }
            },
                error: function(xhr, status, error) {
                    console.log("f");
                    console.log(xhr);
                }
            });
    }
</script>
<div id="dashboard" class="container">
	<h3 class="title"> Account Config</h3>
    <a onClick="save('test')"> save </a>	
</div>

@stop
