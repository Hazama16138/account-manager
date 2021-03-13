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
<form method="POST" action="/category">
	@csrf
	<table class="table">
		<tr>
			<th scope="row">Name</th>
			<td>
				<div>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" maxlength="20" tabindex="1" autofocus placeholder="最大20文字" value="{{ old('name') }}">
					@error('name')
					<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row">Category_id</th>
			<td>
				<input type="number" class="form-control @error('category_id') is-invalid @enderror" name="category_id" tabindex="2" value="{{ old('category_id') }}">
				@error('category_id')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</td>
		</tr>
	</table>
	<input type="submit" value="登録" tabindex="3" class="btn btn-primary">
</form>
@endsection