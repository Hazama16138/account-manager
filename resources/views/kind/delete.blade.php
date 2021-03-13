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
	@method('DELETE')
	@csrf
	<table class="table">
		<tr>
			<th scope="row">Name</th>
			<td>
				{{$data->name}}
			</td>
		</tr>
		<tr>
			<th scope="row">Kana</th>
			<td>
				{{$data->kana}}
			</td>
		</tr>
	</table>
	<p>削除します。本当によろしいですか？</p>
	<input type="submit" value="削除" tabindex="3" class="btn btn-danger">
</form>
@endsection