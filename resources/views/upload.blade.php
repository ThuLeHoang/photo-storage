@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<form action="upload" method="post" enctype="multipart/form-data" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="image[]" id="images" multiple="multiple"> </br>
			
			<input type="submit" name="submit" value="Upload">
			
		</form>
	</div>
	<script type="text/x-template" id="check-img"> </script>
	<div id="img-preview">
		<upload></upload>
	</div>
</div>

@endsection

<!-- <script type="text/javascript">
// 	Vue.component('img-preview', {
// 	template: '#check-img',
// 	data() {
// 		return { 
// 			hasfile: true
// 		 }
// 	},
// 	methods: {
		
// 	}
// });
<script> -->