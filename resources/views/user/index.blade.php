@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Users</h2>         
    <table id="users-table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PASSWORD</th>
                <th>STATUS</th>
                <th>SHOW</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->password}}</td>
                    <td>ACTIVE</td>
                    <td>
                        <button class="btn btn-success" data-catid={{$user->id}} data-toggle="modal" data-target="#delete">Show</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

