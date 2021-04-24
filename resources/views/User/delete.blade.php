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
<form method="POST" action="/user/{{$data->id}}">
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
			<th scope="row">Email</th>
			<td>
				{{$data->email}}
			</td>
		</tr>
		<tr>
			<th scope="row">Auth</th>
			<td>
				@switch($data->auth)
					@case(99)
						管理者
						@break
					@case(1)
					@default
						一般
				@endswitch
			</td>
		</tr>
		@if ($data->image)
			<tr>
				<th scope="row">Image</th>
				<td>
					<div class="mt-4 text-center">
						<img src="/storage/users/{{ $data->image }}" width="300" height="300">
					</div>
				</td>
			</tr>
		@endif
	</table>
	<p>削除します。本当によろしいですか？</p>
	<input type="submit" value="削除" tabindex="3" class="btn btn-danger">
</form>
@endsection