<head>
	<link rel="stylesheet" href="/css/my.css">
</head>
<body>
	<div class="container">
		<h1>响应式导航</h1>
	</div>
	<form action="{{ url('txt2sql') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="file" id="file" /> 
		<br />
		<input type="submit" name="ok">
	</form>
</body>