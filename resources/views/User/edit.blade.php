@extends('layouts.app01')

@php
$url = "/".request()->path();
@endphp

@foreach ($breadcrumb as $value)
@if($value['href'] == $url)
@section('title', $value['name'])
@endif
@endforeach

@section('content')
<form method="POST" action="/user/{{$data->id}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<table class="table">
		<tr>
			<th scope="row">Name</th>
			<td>{{ $data->name }}</td>
		</tr>
		<tr>
			<th scope="row">email</th>
			<td>{{ $data->email }}</td>
		</tr>
		<tr>
			<th scope="row">Image</th>
			<td>
				<input type="file" name="image" class="form-control form-control-file" tabindex=" 1" value="{{$data->image}}">
				@error('image')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
				@if ($data->image)
					<div class="mt-4 text-center">
						<img src="/storage/users/{{ $data->image }}" width="300" height="300">
					</div>
				@else
					<div class="mt-4 text-center">
						<img src="/img/no-image.png" width="300" height="300">
					</div>
				@endif
			</td>
		</tr>
		<tr>
			<th scope="row">Auth</th>
			<td>
				<select name="auth" class="form-select form-select-lg @error('auth') is-invalid @enderror">
					@switch($data->auth)
						@case(99)
							<option value="1">一般</option>
							<option value="99" selected>管理者</option>
							@break
						@case(1)
						@default
							<option value="1" selected>一般</option>
							<option value="99">管理者</option>
					@endswitch
				</select>
				@error('auth')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</td>
		</tr>
	</table>
	<input type="submit" value="編集" tabindex="3" class="btn btn-primary">
	<a href="/user" class="btn btn-secondary">戻る</a>
</form>
@endsection