@extends('layouts.master')

@section('content')
	<div class="container">
	    <h1>Edit Profile</h1>
	  	<hr>
		<div class="row">
			<div class="col-md-12 personal-info">
				<h3>Personal info</h3>
				
				<!-- Update Form Request -->
				<form action="{{url('users', [$user->id])}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
					<div class="row">
						<!-- left column -->
						<div class="col-md-3">
							<div class="text-center">
								<img src="/uploads/{{ Auth::user()->filename }}" class="img-circle" alt="User Image" width="100" height="100">
								<h6>Upload a different photo...</h6>
								<input class="form-control" type="file" name="filename">
							</div>
						</div><!-- Col 3 END -->

						<!-- right column -->
						<div class="col-md-9">
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
									<input class="form-control" type="password" name="password" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Confirm Password:</label>
								<div class="col-md-8">
									<input class="form-control" type="password" name="confirm-password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</div>
						</div> <!-- Col 9 END -->
					</div><!-- Row END -->
				</form><!-- Form END -->
			</div>
		</div>
	</div>
@endsection
