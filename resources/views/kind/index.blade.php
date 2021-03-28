@extends('layouts.app01')

@php
$url = "/".request()->path();
$test = ['id' => '1'];
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
			<th scope="col">操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
		<tr>
			<td class="align-middle">{{ $item->kind_id }}</td>
			<td class="align-middle">
				<a href="/kind/{{$item->kind_id}}/edit">{{ $item->name }}</a>
			</td>
			<td class="align-middle">{{ $item->kana }}</td>
			<td class="align-middle">{{ $item->create_date }}</td>
			<td class="align-middle">{{ $item->update_date }}</td>
			<td class="align-middle">
				<a href="{{route('kind.show', $item->kind_id)}}" class="btn btn-danger h-25">削除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">{{$items->onEachSide(5)->links()}}</div>
@endsection