@extends('layouts.app')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/> -->
    <style type="text/css">
        .main-region{
            max-height: 300px;
            width: 1000px;
            background-color: #000;
        }
        .input{
            width: 800px;
            float: right;

        }
        .options{
            float: left;
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
		</div>
    </form>        	
    
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
            layoutTemplates: {actionUpload: ''},
        }).on('fileuploaded', function() {
                $(window).load('/home');
                console.log('File pre ajax triggered');
        });
</script>
@endsection

<!-- <script type="text/javascript">
	$(function(){
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                // hasfile= true;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img style="max-width: 250px; max-height: 200px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            imagesPreview(this, 'div.img');
        });
    });
</script> -->