@extends('layouts.master')

@section('content')

<h1>Produits soldé</h1>

    <div class="row g-5">

        @include('components.front.count', ['count' => $count])

        @include('components.front.card', ['products' => $products])

        @include('components.front.pagination', ['products' => $products])
    </div>
@endsection