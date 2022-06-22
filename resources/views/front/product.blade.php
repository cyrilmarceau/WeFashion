@extends('layouts.master')

@section('content')

    <h1>{{ $product->name }}</h1>

    @include('components.common.product', ['product' => $product, 'isAdmin' => false])
@endsection