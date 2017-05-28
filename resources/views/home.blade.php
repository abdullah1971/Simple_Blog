@extends('layouts.app')


@if(Route::currentRouteName() == "home")
    @section('myPostURL', 'post')
@elseif(Route::currentRouteName() != "home")
    @section('myPostURL', '../post')
@endif



@section('cssFiles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- {{ Route::current()->getName() }} --}}
<div class="fluid-container">
    <div class="row" id="content">
        <div class="col-md-9 ">
            @foreach ($posts as $post)
                
                <div id="all-single-posts">

                    <h1>{{ $post->heading }}</h1>
                    
                    <h4>&nbsp;&nbsp;&nbsp;by</h4>

                    <p><h3>{{  App\Post::find($post->id)->user->name }}</h3>( <small><strong>Catagory : </strong><b><a href="">{{ $post->catagory }}</a></b>, <strong>Updated At : </strong><b><i> {{ $post->updated_at->formatLocalized('%A %d %B %Y') }}</i> </b> </small> )</p><hr>

                    <p>{!! str_limit($post->body, $limit = 350) !!}</p>

                    <a href="{{ "post/".$post->id }}" class="pull-right">Details>></a>
                    

                </div>
                

            @endforeach
        </div>

        <div class="col-md-3">
            
            @include('partials.sidebar');

        </div>
    </div>
</div>
@endsection
