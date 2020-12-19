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
<form method="POST" action="/kind/">
	@csrf
	<table class="table">
		<tr>
			<th scope="row">Name</th>
			<td>
				<input type="text" name="name" maxlength="20" tabindex="1" autofocus placeholder="最大20文字">
			</td>
		</tr>
		<tr>
			<th scope="row">Kana</th>
			<td>
				<input type="text" name="kana" maxlength="50" tabindex="2" placeholder="最大50文字">
			</td>
		</tr>
	</table>
	<input type="submit" value="登録" tabindex="3" class="btn btn-primary">
</form>
@endsection