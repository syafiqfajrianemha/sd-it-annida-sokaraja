@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div id="flash-data" data-flashdata="{{ session('message') }}"></div>

<h1 class="h3 mb-3 text-gray-800">Dashboard</h1>
@endsection
