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
<form method="POST" action="/user" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="user_id" value="{{ $data->id }}">
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
	<input type="submit" value="登録" tabindex="3" class="btn btn-primary">
	<a href="/user" class="btn btn-secondary">戻る</a>
</form>
@endsection