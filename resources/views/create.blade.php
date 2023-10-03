<!DOCTYPE html>
<html>
<head>
	<title>insert data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
		<h3>insert branch</h3>
		<a class="btn btn-primary btn-sm mb-2" href="{{ route('branch.index') }}">back</a>
		@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
		<form action="{{ route('branch.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" id="name" name="name">
				<br>
				<label for="photo">Photo</label>
				<input class="form-control" type="file" id="photo" name="photo">
				<br>
				<input type="submit" class="btn btn-primary btn-lg btn-block" name="send">
			</div>
		</form>
		</div>
		<div class="col-3"></div>
	</div>
</body>
</html>