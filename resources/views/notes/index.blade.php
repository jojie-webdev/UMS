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
<div class="container notes">
    <div><h3>Notes</h3></div>
    @foreach($notes as $note)
		 <h3 class="p-name text">{{ $note->title }} &nbsp; - &nbsp;
            <small style="font-style: italic;">
                @if ($note->getNoteUsername() === Auth::user()->name)
                    me
                @else
                    {{$note->getNoteUsername()}}
                @endif
            </small>
        </h3>
	@endforeach
</div>
@endsection

