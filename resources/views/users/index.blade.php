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
				<a href="" data-toggle="modal" data-target="#profile-info" class="show-user-profile">
					<img src="/uploads/{{ $user->filename }}" class="img-circle" alt="User Image" width="220" height="200">
				</a>
					<div id="prof" class="caption">
						<h3 class="p-name">{{ $user->name }}</h3>
                        <div class="p-company" hidden>{{ $user->company }}</div>
                        <div class="p-address" hidden>{{ $user->address }}</div>
                        <div class="p-age" hidden>{{ $user->age }}</div>
                        <div class="p-gender" hidden>{{ $user->gender }}</div>
                        <div class="p-about-me" hidden>{{ $user->about_me }}</div>
                        <div class="p-email" hidden>{{ $user->email }}</div>
                        <!-- If user is active or not -->
                        @if ($user->is_active)
                            <div class="user-status-active">ACTIVE</div>
                        @else
                            <div class="user-status-inactive">INACTIVE</div>
                        @endif
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

<!-- Show Info -->
<div class="modal" id="profile-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">More Info:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                	<div class="col-md-6 modal-prof">
                		<div class="name">Name:<span></span></div>
                		<div class="company">Company:<span></span></div>
                		<div class="address">Address:<span></span></div>
                		<div class="age">Age:<span></span></div>
                	</div>
                	<div class="col-md-6 modal-prof">
                		<div class="gender">Gender:<span></span></div>
                		<div  class="about-me">About Me:<span></span></div>
                		<div class="email">Email:<span></span></div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

