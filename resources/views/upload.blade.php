<!DOCTYPE html>
<html>
<head>
	<title>Upload Images</title>
</head>
<body>
<div class="container">
	<div class="">
		<form action="upload" method="post" enctype="multipart/form-data" >
			<input type="file" name="image" id="images">
			<input type="submit" name="submit" value="Upload">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>

</div>
</body>
</html>