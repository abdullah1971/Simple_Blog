@extends('layouts.app');

@section('myPostURL', '../post')

@section('cssFiles')
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/blogPost.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="container" id="content" style="margin-top: 50px;">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">

				

					<div id="post-heading-section">
						<h1>{{ $post->heading }}</h1>

						<a href="" class="pull-right">
							<button class="btn-danger">Delete</button>
						</a> 

						<a href="{{ $post->id."/edit" }}" class="pull-right">
							<button class="btn-primary">Edit</button>
						</a>
						
						{{-- <a href="" class="pull-right">
							<button class="btn-default">Change Status</button>
						</a> --}}

					</div>
					<h4>&nbsp;&nbsp;&nbsp;by</h4>
					<p><h3>{{ $user }}</h3>( <small><strong>Catagory : </strong><b><a href="">{{ $post->catagory }}</a></b>, <strong>Updated At : </strong><b><i> {{ $post->updated_at->formatLocalized('%A %d %B %Y') }}</i> </b> </small> )</p><hr>
					<p>{!! $post->body !!}</p>

					{{-- <a href="{{ "post/".$post->id }}" class="pull-right">Details>></a> --}}<br><br><br>

				
			</div>
		</div>
	</div>
@endsection