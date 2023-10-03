<!DOCTYPE html>
<html>
<head>
	<title>edit data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
		<h3>Edit branch</h3>
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
        @foreach($brenchs as $brench)
		<form action="{{ route('branch.update', ['branch' => $brench->id]) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Name</label>
				<input type="hidden" name="id" value="{{$brench->id}}">
				<input class="form-control" type="text" id="name" name="name" value="{{$brench->name}}">
				<br>
				<label for="photo">Photo</label>
				<input class="form-control" type="file" id="photo" name="photo" value="{{$brench->photo}}">
				<br>
				<input type="submit" class="btn btn-primary btn-lg btn-block" name="send">
			</div>
		</form>
		@endforeach
		</div>
		<div class="col-3"></div>
	</div>
</body>
</html>