@extends('layouts.master')

@section('content')

<h1>Produits soldé</h1>

    <div class="row g-5">
        <div class="col-12 mx-3">
            <p class="text-end">Résultat{{ $count > 1 ? "s" : "" }}: {{ $count }}</p>
        </div>
        @forelse($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    @if(isset($product->picture))
                        <img src="{{asset('/images/' . $product->picture->link)}}" alt="Produit {{ $product->name }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="{{url('produits', $product->id)}}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>

            </div>
        @empty
        <div class="col-12">
            <p>Aucun produit</p>
        </div>
        @endforelse
    </div>
@endsection