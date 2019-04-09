<style type="text/css">
	.div-img{
		background-color: #fff;
		padding: 2px;
		margin: 2px;
		max-height: 200px;
		
	}
	.img{
		height: 250px;
		width: 350px;
	}
</style>
@extends('layouts.app')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
@section('content')
<div id='home'>
<div class="container">
    <div class="row">
        
            @foreach ($Images as $image)
            <div class="div-img"> <img class="img" src="{{ asset('images/' . $image->image) }}" /> </div>
            @endforeach
        
    </div>
</div>
</div>

@endsection
<script src="{{ asset('js/app.js') }}" defer></script>
