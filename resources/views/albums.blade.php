@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<style type="text/css">
	.input{
            width: 800px;
            float: right;

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
        /*.file-preview-frame{
        	max-width: 200px;
        	max-height: 200px;
        }*/
        .file-caption-main {
            max-width: 800px;
            padding-right: 10px;
        }
        .kv-file-content {
		    width: 180px;
		    height: 160px;
		}
</style>
@section('content')
<div class="container">
    <h1>Let's make an album.</h1>
	<p>Easily organize all your photos into beautiful albums to share with friends, family, or even other Retro members.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAlbum">
    	Create Album
    </button>

    @foreach ($Albums as $album)
    <div>{{$album->title}}</div>
    @endforeach
  <!-- The Modal -->
  <div class="modal fade" id="createAlbum">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
               
        <!-- Modal body -->
        <div class="modal-body">
        	<h1>Create Album</h1>
          <form action="createAlbum" method="post" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<div class="">
          		<span>Album name:</span><input type="text" name="title" class="form-control" placeholder="Enter Album Name ...">
          		<span>Description:</span><input type="textarea" name="description" class="form-control" rows="5" placeholder="Enter  Album Description ...">
          		<input type="file" name="image[]" id="images" accept="image/*" multiple="multiple"> </br>
          			<span>Public</span>
          		<input type="checkbox" name="public">  
          		<button type="submit" class="btn btn-primary">Create</button>
          	</div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
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
            showRemove: false,

            layoutTemplates: {
            	actionUpload: '',
            	actionZoom:'',
            },
        }).on('fileuploaded', function() {
                location.assign("/home");
        });
</script>
@endsection
