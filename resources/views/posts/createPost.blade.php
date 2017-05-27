@extends('layouts.app')

@section('myPostURL', '../post')

@section('makeActive', 'class="active"')

@section('cssFiles')
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection


@section('content')
	{{-- {{ Route::current()->getName() }} --}}
	<div class="row" id="content">
		<div class="col-lg-offset-3 col-lg-6">
			
			<form action="../post" method="POST" role="form" style="background-color: white; padding: 50px">
					
				{{ csrf_field() }}

				<legend>Create Your Post</legend>
			
				<div class="form-group{{ $errors->has('postHeading') ? ' has-error' : '' }}">
					<label for="post-heading">Post Heading</label>

					<input type="text" class="form-control" id="post-heading" name="postHeading" placeholder="Post Heading" value="{{ old('postHeading') }}">

					@if ($errors->has('postHeading'))
					    <span class="help-block">
					        <strong>{{ $errors->first('postHeading') }}</strong>
					    </span>
					@endif
				</div>


				<div class="form-group">
					<label for="postCatagory">Post Catagory</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="postCatagory">
					  <option value="science">Science</option>
					  <option value="literature">Literature</option>
					  <option value="currentTopic">Current Topic</option>
					  <option value="religion">Religion</option>
					</select>
				</div>


				<div class="form-group">
					<label for="post-catagory">Post Status</label><br>
					<input type="radio" name="post-type" value="publish" checked> Publish<br>
				    <input type="radio" name="post-type" value="draft"> Draft<br>
				    <input type="radio" name="post-type" value="personal"> Personal
				</div>


				<div class="form-group{{ $errors->has('postBody') ? ' has-error' : '' }}">
					<label for="post-body">Post Heading</label><br>

					<textarea class="tinyMce" name="postBody" value="{{ old('postBody') }}"></textarea>

					@if ($errors->has('postBody'))
					    <span class="help-block">
					        <strong>{{ $errors->first('postBody') }}</strong>
					    </span>
					@endif
				</div>
			
				
			
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
	</div>
@endsection



@section('jsFiles')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('js/tinyMce.js') }}"></script>
@endsection

