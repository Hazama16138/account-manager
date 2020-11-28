@extends('layouts.app')

@section('title', '種類')

@php
$url = "/".request()->path();
$array = [
    ['name' => 'kind', 'href' => '/kind'],
    ['name' => 'sample', 'href' => '#'],
    ['name' => 'test', 'href' => '#'],
];
@endphp