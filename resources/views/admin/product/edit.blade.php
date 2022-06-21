@extends('layouts.admin')

@section('content')

    <form enctype="multipart/form-data" action="{{route('admin.product.update', $product->id)}}" method="POST" class="my-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>

            <input type="text"
                class="form-control" id="name"
                placeholder="name@example.com"
                name="name" value="{{old('name', $product->name)}}"
            >
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number"
                min=0
                class="form-control" id="price"
                placeholder="54.99" 
                name="price"
                value="{{old('price', $product->price)}}"
            >
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Selectionner un status</label>

            <div class="form-check">
                <label for="status" class="form-label">En solde</label>
                <input
                    class="form-check-input" id="status"
                    type="radio"
                    value="in_sale"
                     {{(old('status') == 'on_sale') || $product->status == 'on_sale' ? 'checked' : ''}}
                    name="status">
            </div>
            
            <div class="form-check">
                <label for="status" class="form-label">Standard</label>
                <input
                    class="form-check-input" id="status"
                    type="radio"
                    value="standard"
                    {{(old('status') == 'standard') || $product->status == 'on_sale' ? 'checked' : ''}}
                    name="status">
            </div>
        </div>

        <div class="mb-3">
            <label for="visibility" class="form-label">Visibilité</label>
            <div class="form-check">
                <input type="radio"
                       name="visibility"
                       class="form-check-input"
                       value="published"
                       {{(old('visibility') == 'published') || $product->visibility == 'published' ? 'checked' : ''}}>
                <label class="form-check-label" for="flexRadioDefault2">
                   Publier
                </label>
            </div>

            <div class="form-check">
                <input type="radio"
                       name="visibility"
                       class="form-check-input"
                       value="unpublished"
                       {{(old('visibility') == 'unpublished') || $product->visibility == 'unpublished' ? 'checked' : ''}}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Non publié
                </label>
            </div>
        </div>

        {{-- <div class="mb-3">
            <label for="price" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id">
                <option value="null" disabled>Choisir une categorie</option>

                @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}" {{(old('category_id') == $categorie->id) ? 'selected' : ''}}>
                        {{$categorie->name === 'men' ? 'Homme' : 'Femme'}}
                    </option>
                @endforeach
            </select>
        </div> --}}

        {{-- <div class="mb-3">
            <label for="price" class="form-label">Référence</label>
            <input type="text" class="form-control" id="reference" name="reference" placeholder="d4mfhUntg9dA94jf">
        </div> --}}

        {{-- <div class="mb-3">
            <label for="price" class="form-label">Tailles</label>

            @foreach($sizes as $size)
                    <div class="form-check">
                        <label class="form-check-label" for="sizes"> {{ $size->size }} </label>
                        <input type="checkbox"
                               class="form-check-input"
                               name="sizes[]"
                               value="{{$size->id}}"
                               {{in_array($size->id, old('sizes', [])) ? 'checked' : ''}}
                        >
                    </div>
            @endforeach
        </div> --}}

        {{-- <div class="mb-3">
            <label class="form-check-label" for="inputAddress">Importer l'image du produit</label>
            <input type="file"
                class="form-control"
                name="picture">
        </div> --}}

        <button type="submit" class="btn btn-primary mb-3">Crée ce produit</button>
        
    </form>

@endsection