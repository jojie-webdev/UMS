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
<div class="container">
    <h2>Users Info:</h2>  
    <table id="users-table" class="table table-striped" data-form="deleteForm">
        <thead>
            <tr>
                <th>ID</th>
                <th>AVATAR</th>
                <th>NAME</th>
                <th>COMPANY</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>ABOUT ME</th>
                <th>STATUS</th>
                <!-- show action if user is admin -->
                @if (Auth::user()->isAdmin())
                    <th>ACTION</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <img src="/uploads/{{ $user->filename }}" class="img-circle" alt="User Image" width="50" height="50">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->company}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->about_me}}</td>
                    <!-- If user is active or not -->
                    @if ($user->is_active)
                        <td style="color: green;"><strong>ACTIVE</strong></td>
                    @else
                        <td style="color: red;"><strong>INACTIVE</strong></td>
                    @endif

                    <!-- show action if user is admin -->
                    @if (Auth::user()->isAdmin())
                        <td>
                            <!-- <button class="btn btn-danger" data-catid={{$user->id}} data-toggle="modal" data-target="#delete">Deactivate</button> -->
                            <form action="{{url('admin', [$user->id])}}" method="POST" class="form-delete">
                                <input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                                @if ($user->is_active)
                                    @if(Auth::check())
                                        @if (Auth::id() === $user->id)
                                            <input type="submit" class="btn btn-danger" value="Deactivate" disabled="">
                                        @else
                                            <input type="submit" class="btn btn-danger delete confirm" value="Deactivate">
                                        @endif
                                    @endif
                                @else
                                    <input type="submit" class="btn btn-success" value="Activate">
                                @endif
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Confirmation Modal -->
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Submit</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

