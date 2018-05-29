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

    <!-- Add Notes -->
	<form action="{{ url('note') }}" method="POST" enctype="multipart/form-data" class="add-note">
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
					<textarea class="form-control" name="body" type="text" >
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
		 <h3 class="p-name text">{{ $note->title }}</h3>
	@endforeach
</div>
@endsection
 