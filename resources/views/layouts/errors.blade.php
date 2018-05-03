<!-- Show Message Successfully -->
@if(Session::has('message'))
	<div id="successMessage" class="alert alert-success">
		<a class="panel-close close" data-dismiss="alert">×</a> 
		{{Session::get('message')}}
	</div>
@endif
<!-- Show Message Error -->
@if(Session::has('message-error'))
	<div id="successMessage" class="alert alert-danger">
		<a class="panel-close close" data-dismiss="alert">×</a> 
		{{Session::get('message-error')}}
	</div>
@endif
<!-- Show Message if any error -->
@if ($errors->any())
	<div id="successMessage" class="alert alert-danger">
		<a class="panel-close close" data-dismiss="alert">×</a> 
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif