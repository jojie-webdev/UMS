@extends('layouts.master')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container profile">
    <h2 class="show-user">Show Users</h2>  
	<div class="row thumb-profile">
		@foreach($users as $user)
			<div class="col-sm-6 col-md-4" style="margin-bottom: 15px;">
				<div class="thumbnail">
				<a href="" data-toggle="modal" data-target="#profile-info">
					<img src="/uploads/{{ $user->filename }}" class="img-circle" alt="User Image" width="220" height="200">
				</a>
					<div class="caption">
						<h3>{{ $user->name }}</h3>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

<!-- Show Info -->
<!-- Confirmation Modal -->
<div class="modal" id="profile-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                	<div class="col-md-6">
                		<div>Name: <span>{{ $user->name }}</span></div>
                		<div>Company: <span>{{ $user->company }}</span></div>
                		<div>Address: <span>{{ $user->address }}</span></div>
                		<div>Age: <span>{{ $user->age }}</span></div>
                	</div>
                	<div class="col-md-6">
                		<div>Gender: <span>{{ $user->gender }}</span></div>
                		<div>About Me: <span>{{ $user->about_me }}</span></div>
                		<div>Email: <span>{{ $user->email }}</span>}</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

