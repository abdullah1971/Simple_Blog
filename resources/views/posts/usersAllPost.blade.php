@extends('layouts.post')

@section('cssFiles')
	<link href="{{ asset('css/blogPost.css') }}" rel="stylesheet">
@endsection

@if ($selectMenu == "All")
	@section('item1Active','class=active')
@elseif ($selectMenu == "published")
	@section('item2Active','class=active')
@elseif ($selectMenu == "drafted")
	@section('item3Active','class=active')
@elseif ($selectMenu == "personal")
	@section('item4Active','class=active')
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
							
							{{-- <button class="btn-danger">Delete</button> --}}
							{{-- <div class="form-group">
								<label for="">label</label>
								<input type="text" class="form-control" id="" placeholder="Input field">
							</div> --}}
						
							
						
							<button type="submit" class="btn-danger">Delete</button>
						</form>
						

						{{-- <a href="{{ "post/".$post->id }}" class="pull-right">
							<button class="btn-danger">Delete</button>
						</a>  --}}




						<a href="{{ "post/".$post->id."/edit" }}" class="pull-right">
							<button class="btn-primary">Edit</button>
						</a>
						
						{{-- <a href="" class="pull-right">
							<button class="btn-default">Change Status</button>
						</a> --}}


						{{-- <button class="btn-primary"><a href=""> Edit</a></button>
						<button class="btn-danger"><a href=""> Delete</a></button> --}}

					</div>
					<h4>&nbsp;&nbsp;&nbsp;by</h4>
					<p><h3>{{ $user }}</h3>( <small><strong>Catagory : </strong><b><a href="">{{ $post->catagory }}</a></b>, <strong>Updated At : </strong><b><i> {{ $post->updated_at->formatLocalized('%A %d %B %Y') }}</i> </b> </small> )</p><hr>
					<p>{!! str_limit($post->body, $limit = 350) !!}</p>

					<a href="{{ "post/".$post->id }}" class="pull-right">Details>></a><br><br><br>

				@endforeach

{{-- 
				<div id="post-heading-section">
					<h2>Heading</h2>

					<a href="" class="pull-right">
						<button class="btn-danger">Delete</button>
					</a> 

					<a href="" class="pull-right">
						<button class="btn-primary">Edit</button>
					</a>
					
					<a href="" class="pull-right">
						<button class="btn-default">Change Status</button>
					</a>


					

				</div>
				<h4>by</h4>
				<p><h3>Author</h3>(<small><strong>Catagory : </strong><a href="">Science</a>, <strong>Updated At : </strong> 29/11/1993</small>)</p><hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis libero maxime doloribus! Voluptas quasi neque adipisci maxime rem perferendis et eius? Laudantium culpa consequatur saepe dolore, iusto quis? Quas, modi.</p>

				<a href="" class="pull-right">Details>></a> --}}


			</div>
		</div>
	</div>
@endsection
