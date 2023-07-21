@extends('layouts.main')

@section('title', '{{ $id }} | SilvaRx Events')

@section('content')
    @if($id != null)
        <h1>Product {{ $id }}</h1>
        <p>Este é o produto com o ID {{ $id }}</p>
    @endif
<a href="/">Back</a>
@endsection