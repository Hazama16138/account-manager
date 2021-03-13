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
<a class="btn btn-outline-primary" href="./category/create" role="button">新規登録</a>
<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Parent_id</th>
			<th scope="col">Create Date</th>
			<th scope="col">Update Date</th>
			<th scope="col">操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
		<tr>
			<td class="align-middle">{{ $item->category_id }}</td>
			<td class="align-middle">
				<a href="/category/{{$item->category_id}}/edit">{{ $item->name }}</a>
			</td>
			<td class="align-middle">{{ $item->parent_id }}</td>
			<td class="align-middle">{{ $item->create_date }}</td>
			<td class="align-middle">{{ $item->update_date }}</td>
			<td class="align-middle">
				<a href="{{route('category.show', $item->category_id)}}" class="btn btn-danger h-25">削除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection