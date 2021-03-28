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
<form method="POST" action="/kind/{{$data->kind_id}}">
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
			<th scope="row">Kana</th>
			<td>
				<input type="text" name="kana" class="form-control @error('kana') is-invalid @enderror" maxlength="50" tabindex="2" placeholder="最大50文字" value="{{$data->kana}}">
				@error('kana')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</td>
		</tr>
	</table>
	<input type="submit" value="編集" tabindex="3" class="btn btn-primary">
</form>
@endsection