@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@section('content')

<div id="upload">
    <div v-if="hasfile === false">
        <form action="upload" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="image[]" id="images" multiple="multiple" @change="onFileChange"> </br>     
        </form>        	
    </div>

	    <div v-else>
    		<div class="gallery">
                <div class="row">
                    <div class="img"></div>
                </div>
    		</div>
            <form action="upload" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" name="image[]" id="images" multiple="multiple" @change="onFileChange"> </br>     
            
                <input type="submit" name="submit" value="Upload">
            </form>
	    </div>
</div>

<script type="text/javascript">
var app = new Vue({
	el: '#upload',
	data() {
        return {
        	url: null,
            hasfile: false
        }
    },
    methods: {
    	onFileChange(e) {
    		this.hasfile = true;
   //  		var selectedFiles = e.target.files;
			// for (var i=0; i < selectedFiles.length; i++){
			//     this.images.push(selectedFiles[i]);
			// }

			// for (var i=0; i<this.images.length; i++){
			//     let reader = new FileReader(); //instantiate a new file reader
			//     reader.addEventListener('load', function(){
			//       this.$refs['img' + parseInt( i )][0].src = reader.result;
			//     }.bind(this), false);  //add event listener

			//     reader.readAsDataURL(this.images[i]);
			// }
    		
    	}
    }
});
</script>
@endsection

<script type="text/javascript">
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
</script>