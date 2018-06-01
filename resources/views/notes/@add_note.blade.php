@extends('layouts.master')

@section('content')
<div class="container notes">
    <div><h3>Notes</h3></div>
    <!-- Add Notes -->
	
	{{ Form::open(array('url' => 'note/', 'class' => 'pull-right form-delete', 'required' => 'required')) }}
		{{ Form::hidden('_method', 'POST') }}
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-lg-12 control-label">Title:</label>
			<div class="col-lg-12">
				<input class="form-control file" name="title" type="text">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-12 control-label">Body:</label>
			<div class="col-lg-12">
				<textarea class="form-control" name="body" type="text">
				</textarea>
			</div>
		</div>
	    <div class="form-group">
			<div class="col-lg-12">
				<input type="submit" class="btn btn-success" value="Add Note">
			</div>
		</div>
	{{ Form::close() }}<!-- Form END -->
	@foreach($notes as $note)
		 <h3 class="p-name text">{{ $note->title }}</h3>
	@endforeach
</div>
@endsection
 