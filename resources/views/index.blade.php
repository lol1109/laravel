<!DOCTYPE html>
<html>
<head>
	<title>Data branch</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-3xl">Data branch</h1>
	<a class="btn btn-primary mb-3" href="{{ route('branch.create')}}">add data</a>
	<table class="table table-primary">
		<tr>
			<th>No</th>
			<th>register</th>
			<th>name</th>
			<th>photo</th>
			<th colspan="2">Action</th>
		</tr>
		@foreach($branchs as $branch)
		<tr>
			<td><a href="{{ route('branch.show', ['branch' => $branch->id]) }}">1</a></td>
			<td>{{$branch->register}}</td>
			<td>{{$branch->name}}</td>
			<td><img width="100" height="100" src="{{ asset('storage'.$branch->photo)}}" alt="photo.jpg"></td>
			<td>
				<a class="btn btn-sm btn-primary w-25 mb-1" href="{{ route('branch.edit', ['branch' => $branch->id]) }}">edit</a>
				<form action="{{ route('branch.destroy', ['branch' => $branch->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger  w-25">Hapus</button>
                </form>
				<!-- <a href="{{ route('branch.destroy', ['branch' => $branch->id]) }}">delete</a> -->
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>