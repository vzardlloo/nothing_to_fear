<form action="{{ url('txt2sql') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="submit" name="ok">
</form>