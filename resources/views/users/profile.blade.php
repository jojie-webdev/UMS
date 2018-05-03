@extends('layouts.master')

@section('content')
	<div class="container">
	    <h1>Edit Profile</h1>
	  	<hr>
		<div class="row">
			<!-- left column -->
			<div class="col-md-3">
				<div class="text-center">
					<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
					<h6>Upload a different photo...</h6>
					<input type="file" class="form-control">
				</div>
			</div>
	      
			<!-- edit form column -->
			<div class="col-md-9 personal-info">
				<!-- <div class="alert alert-info alert-dismissable">
					<a class="panel-close close" data-dismiss="alert">×</a> 
					<i class="fa fa-coffee"></i>
					This is an <strong>.alert</strong>. Use this to show important messages to the user.
				</div> -->
				<h3>Personal info</h3>

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
				<form action="{{url('users', [$user->id])}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
					<div class="form-group">
						<label class="col-lg-3 control-label">NAME:</label>
						<div class="col-lg-8">
							<input class="form-control" name="name" type="text" value="{{$user->name}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Email:</label>
						<div class="col-lg-8">
							<input class="form-control" name="email" type="text" value="{{$user->email}}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Password:</label>
						<div class="col-md-8">
							<input class="form-control" type="password" name="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Confirm Password:</label>
						<div class="col-md-8">
							<input class="form-control" type="password" name="confirm-password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Avatar Upload:</label>
						<div class="col-md-8">
							<input class="form-control" type="file" name="filename">
						</div>
					</div>
					@if ($errors->any())
						<div class="alert alert-danger">
						    <ul>
						        @foreach ($errors->all() as $error)
						            <li>{{ $error }}</li>
						        @endforeach
						    </ul>
						</div>
					@endif
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<input type="submit" class="btn btn-primary" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
