@extends('layouts.app')

@php
$url = "/".request()->path();
@endphp

@foreach ($breadcrumb as $value)
@if($value['href'] == $url)
@section('title', $value['name'])
@endif
@endforeach

@section('content')
<a class="btn btn-outline-primary" href="./kind/create" role="button">新規登録</a>
<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Kana</th>
			<th scope="col">Create Date</th>
			<th scope="col">Update Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
		<tr>
			<td>{{ $item->kind_id }}</td>
			<td>
				<a href="/kind/{{$item->kind_id}}/edit">{{ $item->name }}</a>
			</td>
			<td>{{ $item->kana }}</td>
			<td>{{ $item->create_date }}</td>
			<td>{{ $item->update_date }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection