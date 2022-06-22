@extends('layouts.admin')

@section('content')
    
    <h1 class="mt-4">{{ $product->name }}</h1>

    <div class="row product">
        <div class="col-7">
            @if(isset($product->picture))
                <img class="w-50" src="{{asset('/images/' . $product->picture->link)}}" alt="Produit {{ $product->name }}">
            @endif

            <p class="mt-2">{{ $product->description }}</p>
        </div>
        <div class="col-5">
            <p>{{ $product->name }}</p>
            <p>Prix: {{ $product->price }}€</p>
            <p>Status: {{__('db.status.' . $product->status)}}</p>
            <p>Référence: {{ $product->reference }}</p>
            <p>Crée le: {{ $product->created_at }}</p>

            <div class="mb-3 form-check ps-0">
                <label class="form-check-label" for="exampleCheck1">Taille: </label>

                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Selectionner une taille</option>
                    
                    @forelse($product->sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                    @empty
                    <p>Aucune taille</p>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
@endsection