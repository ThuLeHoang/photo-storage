@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.div-img{
		position: relative;
		background-color: #fff;
		padding: 2px;
		margin: 2px;
		max-width: : 300px;
		max-height: 300px;
		}
	.img {

		display: block;
		height: auto;
		max-width: 300px;
	}

	.overlay {
	  position: absolute; 
	  bottom: 0; 
	  right: 0;
	  /*background: rgb(0, 0, 0);*/
	  background: rgba(0, 0, 0, 0.5); /* Black see-through */
	  color: #f1f1f1; 
	  transition: .5s ease;
	  opacity:0;
	  color: white;
	  font-size: 10px;
	  padding: 10px;
	  width: 100%;
	  text-align: right;
	}
	.title{
		text-align: left;
		float: left;
	}
	.div-img:hover .overlay {
	 	opacity: 1;
	}
	.img-edit{
		max-width: 400px;
		max-height: 500px;
	}
	.form-edit{
		position: relative;
		padding: 20px;
		font-size: 15px;
	}
	.form-control{
		font-size: 12px;
	}
	.modal-footer {
		position: absolute;
		right: 0;
		bottom: 0;
	}
</style>

<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
@section('content')
<div id='home'>
	<div class="container">
	    <div class="row">        
            @foreach ($Images as $image)
	            <div class="div-img"> 
	            	<img class="img" src="{{ asset('images/' . $image->image) }}" />
	            	<div class="overlay">
	            		<div class="title">
	            			<label>{{$image->title}}</label>
	            		</div>

	        			<button class="btn-primary "value="{{$image->id}}" data-imageid="{{$image->id}}" data-title="{{$image->title}}" data-toggle="modal" data-target="#editForm">
							Edit
						</button>

	            		<form action="{{route('delete', $image->id)}}" method="post">
	            			<input type="hidden" name="_token" value="{{csrf_token()}}">
	            			@method('DELETE')
	            			<button type="submit" onclick="return confirm('Are you sure delete this image?')" class="btn btn-danger" open_modal>
	            				delete
	            			</button>
	            		</form>
	            	</div> 
	            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Edit -->
	<div class="modal fade" id="editForm" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-body">
	          <div class="row">
	          	
			        <div class="col-md-6" style="text-align: center;"><img class="img-edit" src="{{asset('images/' . $image->image) }}" /></div>
			        
			        <div class="col-md-4 form-edit">		
			        <form action="{{route('update', $image->id)}}" method="post">	          	
	          			{{csrf_field()}}
	          			
		          		<span>Title: </span>
		          			<input type="text" id="title" name="title" class="form-control">
		          		<span>Description: </span>
		          			<textarea type="textarea" id="description" name="title" rows="5" class="form-control"></textarea>
		          		
		          		<div class="modal-footer">
			          		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			          		<button type="submit" class="btn btn-primary">Save</button>
			          	</div>
			          	</form>			                    
			        </div>
		    	
		         
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
	
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	 $(document).on('click','.open_modal',function(){
        var url = "/home";
        var image_id= $(this).val();
        console.log(image_id);
        $.get(url + '/' + image_id, function (data) {
            //success data
            console.log(data);
            $('#image_id').val(data.id);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#btn-save').val("update");
            $('#editForm').modal('show');
        }) 
    });

</script>
@endsection

