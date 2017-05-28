@extends('layouts.post')

@section('cssFiles')
	<link href="{{ asset('css/blogPost.css') }}" rel="stylesheet">
@endsection



@if ($selectMenu == "All")
	@section('item1Active','class=active')
@elseif ($selectMenu == "published")
	@section('item2Active','class=active')
	@section('myPostURL','../post')
@elseif ($selectMenu == "drafted")
	@section('item3Active','class=active')
	@section('myPostURL','../post')
@elseif ($selectMenu == "personal")
	@section('item4Active','class=active')
	@section('myPostURL','../post')
@endif








@section('content')
	<div class="container">
		<div class="row" id="content">
			<div class="col-lg-offset-2 col-lg-10">

				@foreach ($posts as $post)

					<div id="post-heading-section">
						<h1>{{ $post->heading }}</h1>
						
						<form class=" pull-right" action="{{ "post/".$post->id }}" method="POST" role="form">

							<input name="_method" type="hidden" value="DELETE">

							{{ csrf_field() }}
							
							<button type="submit" class="btn-danger">Delete</button>
						</form>
						

						<a href="{{ "post/".$post->id."/edit" }}" class="pull-right">
							<button class="btn-primary">Edit</button>
						</a>
						
					</div>
					<h4>&nbsp;&nbsp;&nbsp;by</h4>
					<p><h3>{{ $user }}</h3>( <small><strong>Catagory : </strong><b><a href="catagory/{{ $post->catagory }}">{{ $post->catagory }}</a></b>, <strong>Updated At : </strong><b><i> {{ $post->updated_at->formatLocalized('%A %d %B %Y') }}</i> </b> </small> )</p><hr>
					<p>{!! str_limit($post->body, $limit = 350) !!}</p>

					<a href="{{ "../post/".$post->id }}" class="pull-right">Details>></a><br><br><br>

				@endforeach

			</div>
		</div>
	</div>
@endsection
