@extends('layouts.admin')

@section('content')
    
    <h1 class="mt-4">{{ $product->name }}</h1>

    @include('components.common.product', ['product' => $product, 'isAdmin' => true])
@endsection