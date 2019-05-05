
@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <style type="text/css">
        /*.main-region{
            max-height: 300px;
            width: 1000px;
            background-color: #000;
        }*/
        .input{
            width: 800px;
            float: left;

        }
        .options{
            float: left;
        }
        .input{
            width: 900px;
        }
        .file-preview{
            max-height: 300px; 
            overflow: auto;
        }
    </style>
@section('content')

<div id="upload">
    <form action="upload" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="main-region">
            <div class="input">
                <input type="file" name="image[]" id="images" accept="image/*" multiple="multiple"> </br>  
            </div>
            <select class="form-control m-bot15" name="album_id">
                <option disabled selected>Add to Album</option>
                @if ($Albums->count())
                    @foreach($Albums as $album)
                        <option value="{{$album->id}}" name="">
                            {{ $album->title }}
                        </option>  
                    @endforeach
                @endif
            </select>
            <span>Public</span><input type="checkbox" name="public"> 
        </div>
        <button type="submit">Upload</button>
    
</div>
    <script type="text/javascript">
        $("#images").fileinput({
            theme: 'fas',
            uploadUrl: "{{route('image.upload')}}",
            uploadExtraData: function() {
                return {
                    _token: "{{ csrf_token() }}",
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
            overwriteInitial: false,
            maxFileSize:12048,
            maxFilesNum: 30,
            showUploadedThumbs: false,
            showClose: false,
            showUpload: false,
            layoutTemplates: {actionUpload: ''},
        }).on('fileuploaded', function() {
                location.assign("/home");
        });
</script>
@endsection