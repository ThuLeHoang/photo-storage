
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
        #upload{
            text-align: center;
        }
        #section{
            max-width: 200px;
        }
        #checkbox{
            width: 20px;
            height: 20px;
        }
    </style>
@section('content')
<div class="container">
<div id="upload">
    <form action="upload" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="main-region">
            <div class="input">
                <input type="file" name="image[]" id="images" accept="image/*" multiple="multiple"> </br>  
            </div>
            <select class="form-control m-bot15" name="album_id" id="section">
                <option disabled selected>Add to Album</option>
                @if ($Albums->count())
                    @foreach($Albums as $album)
                        <option value="{{$album->id}}" name="">
                            {{ $album->title }}
                        </option>  
                    @endforeach
                @endif
            </select>
        </br>
            <div class="row">
                <div style="margin-left: 30px; margin-right: 30px;">Public</div>
                <div class=""><input style="text-align: left;" type="checkbox" name="public" id="checkbox"></div> 
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 180px;">Upload</button>
    </form>
</div>
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