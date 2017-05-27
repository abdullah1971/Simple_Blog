@extends('layouts.app')

@section('myPostURL', 'post')

@section('cssFiles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- {{ Route::current()->getName() }} --}}
<div class="container">
    <div class="row" id="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
