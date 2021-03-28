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
<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Auth</th>
			<th scope="col">Image</th>
			<th scope="col">Create Date</th>
			<th scope="col">Update Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($items as $item)
		<tr>
			<td class="align-middle">{{ $item->id }}</a></td>
			<td class="align-middle">
				<a href="/user/{{$item->id}}/edit">{{ $item->name }}</a>
			</td>
			<td class="align-middle">
				{{ $item->email }}
			</td>
			<td class="align-middle">
				@if (!empty($item->auth))
				{{ $item->auth }}
				@else
				-
				@endif
			</td>
			<td class="align-middle">
				@if (!empty($item->image))
				{{ $item->image }}
				@else
				-
				@endif
			</td>
			<td class="align-middle">{{ $item->created_at }}</td>
			<td class="align-middle">{{ $item->updated_at }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="d-flex justify-content-center">{{ $items->links() }}</div>
@endsection