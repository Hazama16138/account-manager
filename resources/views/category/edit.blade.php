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
<form method="POST" action="/category/{{$data->category_id}}">
	@method('PUT')
	@csrf
	<table class="table">
		<tr>
			<th scope="row">Name</th>
			<td>
				<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" maxlength="20" tabindex="1" placeholder="最大20文字" value="{{$data->name}}">
				@error('name')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</td>
		</tr>
		<tr>
			<th scope="row">Category</th>
			<td>
				<input type="text" name="kana" class="form-control @error('kana') is-invalid @enderror" tabindex="2" value="{{$data->category_id}}">
				@error('category_id')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</td>
		</tr>
	</table>
	<input type="submit" value="編集" tabindex="3" class="btn btn-primary">
</form>
@endsection