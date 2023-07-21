@extends('layouts.main')

@section('title', 'Products | SilvaRx Events')

@section('content')
<h1>Products</h1>
@if($search != '')
    <p>The user is searching for: {{ $search }}
@endif
<a href="/">Back</a>
@endsection