@if (Session::has('success'))
    <div data-alert class="alert-box success-custom ui-block">
        <p class="info success">{{ Session::get('success') }}</p>
    </div>
@elseif (Session::has('error'))
	<div data-alert class="alert-box error-custom ui-block">
    	<h4>{{ Session::get('error') }}</h4>
    	<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
    </div>
@endif