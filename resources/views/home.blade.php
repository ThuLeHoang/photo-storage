@extends('layouts.app')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
@section('content')
<div id='home'>
<div class="">
    <div class="row justify-content-center">
        
            @foreach ($Images as $image)
            <div> <img src="{{ asset('images/' . $image->image) }}" width="300px" height="auto" /> </div>
            @endforeach
        
    </div>
</div>
</div>

@endsection
<script src="{{ asset('js/app.js') }}" defer></script>
