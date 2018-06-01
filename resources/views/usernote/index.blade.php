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
<style type="text/css">
	input.btn.btn-danger.mynote {
	    margin-top: -9px!important;
	}
</style>
<div class="container notes">
    <div><h3>Notes</h3></div>

    <!-- Add Notes -->
	<form action="{{ url('note') }}" method="POST" enctype="multipart/form-data" class="add-note">
	{{ csrf_field() }}
			<div class="form-group">
				<label class="col-lg-12 control-label">Title:</label>
				<div class="col-lg-12">
					<input class="form-control file" name="title" type="text" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-12 control-label">Body:</label>
				<div class="col-lg-12">
					<textarea class="form-control" name="body" type="text" required>
					</textarea>
				</div>
			</div>
		    <div class="form-group">
				<div class="col-lg-12">
					<input type="submit" class="btn btn-success" value="Add Note">
				</div>
			</div>
	</form><!-- Form END -->
	@foreach($notes as $note)
		
			<h3 class="p-name text">{{ $note->title }}
				<div class="mynote-body"><small>{{ $note->body }}</small></div>
				 {{ Form::open(array('url' => 'mynote/' . $note->id,  'onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right form-delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('x', array('class' => 'btn btn-danger mynote')) }}
                {{ Form::close() }}
			</h3>
		
	@endforeach
	<script>
		function ConfirmDelete()
		{
			var x = confirm("Are you sure you want to delete?");
			if (x)
				return true;
			else
				return false;
		}
	</script>
</div>
@endsection
