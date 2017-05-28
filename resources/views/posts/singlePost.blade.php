@extends('layouts.app');

@section('myPostURL', '../post')

@section('cssFiles')
	<link href="{{ asset('css/blogPost.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="container" id="content" style="margin-top: 50px;">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">

					<div id="post-heading-section">
						<h1>{{ $post->heading }}</h1>
						
						@if ($post->user->name == $user)
							<a href="" class="pull-right">
								<button class="btn-danger">Delete</button>
							</a> 

							<a href="{{ $post->id."/edit" }}" class="pull-right">
								<button class="btn-primary">Edit</button>
							</a>
						@endif
					</div>

					<h4>&nbsp;&nbsp;&nbsp;by</h4>

					<p><h3>{{ $post->user->name }}</h3>( <small><strong>Catagory : </strong><b><a href="../catagory/{{ $post->catagory }}">{{ $post->catagory }}</a></b>, <strong>Updated At : </strong><b><i> {{ $post->updated_at->formatLocalized('%A %d %B %Y') }}</i> </b> </small> )</p><hr>

					<p>{!! $post->body !!}</p>

					
					<br>
					<h4>Comments</h4>
					<hr id="body-and-comment-separator">
					
					{{-- /* Comment from the database */ --}}

					@foreach ($comments as $comment)
						<div class="comment-section">

							<div class="comment-body">

								<div class="col-lg-2">
									<b>{{ $comment->user->name }}</b>
								</div>
								
								<div class="col-lg-10">
									
									{!! $comment->body !!}

								</div>
								

							</div>

							@if ($comment->user->name == $user)
							<a href="../delete/comment/{{ $comment->id }}" class="pull-right">
								<button class="btn-danger">Delete</button>
								
							</a>
							@endif

						</div>
						
						<br><hr>
					@endforeach



					{{-- /* tinymce text editor for commenting */ --}}
					
					<form action="../comment/{{ $post->id }}" method="POST" role="form">

						{{ csrf_field() }}
						
					
						<div class="form-group">
							<label for="">Write your comment</label>
							<textarea class="form-control tinyMce" name="comment"></textarea>
						</div>
					
						
					
						<button type="submit" class="btn btn-primary pull-right">Submit</button>
					</form>
					
					

				
			</div>
		</div>
	</div>
@endsection



@section('jsFiles')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('js/tinyMce.js') }}"></script>
@endsection