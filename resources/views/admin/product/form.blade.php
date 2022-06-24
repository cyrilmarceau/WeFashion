@extends('layouts.admin')

@section('content')

    <?php $isCreateRoute = Route::is('admin.product.create') ? true : false ?>

    @if ($isCreateRoute === true) 
        <form enctype="multipart/form-data" action="{{route('admin.product.store')}}" method="POST" class="my-4">
    @else
        <form enctype="multipart/form-data" action="{{route('admin.product.update', $product->id)}}" method="POST" class="my-4">
        @method('PUT')
    @endif
    
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>

            <input type="text"
                class="form-control" id="name"
                placeholder="name@example.com"
                name="name" value="{{ $isCreateRoute === true ? old('name') : old('name', $product->name)}}"
            >
            @error('name')
                <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
            @enderror
        </div>

        <div class="mb-3">
                <label  class="form-label" for="description">Description</label>
                <textarea
                    class="form-control" id="description" 
                    name="description">
                    {{ $isCreateRoute === true ?
                        old('description') : old('description', $product->description)
                    }}
                    </textarea>

                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror

            </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number"
                step="0.01"
                min=0
                class="form-control" id="price"
                placeholder="54.99" 
                name="price"
                value="{{ $isCreateRoute === true ? old('price') : old('price', $product->price)}}"
            >
            @error('price')
                <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Selectionner un status</label>

            <div class="form-check">
                <label for="status" class="form-label">En solde</label>
                <input
                    class="form-check-input" id="status"
                    type="radio"
                    value="in_sale"
                    name="status"

                    @if($isCreateRoute === true)
                        {{(old('status') == 'on_sale') ? 'checked' : ''}}
                    @else
                        {{(old('status') == 'on_sale') || $product->status == 'on_sale' ? 'checked' : ''}}
                    @endif
                >
                @error('status')
                    <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
                @enderror
            </div>
            
            <div class="form-check">
                <label for="status" class="form-label">Standard</label>
                <input
                    class="form-check-input" id="status"
                    type="radio"
                    value="standard"

                    {{-- Set default value for create form --}}
                    {{old('status') === null ? 'checked' : ''}}

                    @if($isCreateRoute === true)
                        {{(old('status') == 'standard') ? 'checked' : ''}}
                    @else
                        {{(old('status') == 'standard') || $product->status == 'standard' ? 'checked' : ''}}
                    @endif
                    name="status">
            </div>
        </div>

        <div class="mb-3">
            <label for="visibility" class="form-label">Visibilité</label>
            <div class="form-check">
                <input type="radio"
                       name="visibility"
                       class="form-check-input" id="published"
                       value="published"


                       {{-- Set default value for create form --}}
                       {{old('visibility') === null ? 'checked' : ''}}
                        
                       @if($isCreateRoute === true)
                            {{(old('visibility') == 'published') ? 'checked' : ''}}>
                       @else
                            {{(old('visibility') == 'published') || $product->visibility == 'published' ? 'checked' : ''}}
                       @endif
                
                <label class="form-check-label" for="published">
                   Publier
                </label>
            </div>

            <div class="form-check">
                <input type="radio"
                       name="visibility"
                       class="form-check-input" id="unpublished"
                       value="unpublished"
                       @if($isCreateRoute === true)
                            {{(old('visibility') == 'unpublished') ? 'checked' : ''}}
                       @else
                            {{(old('visibility') == 'unpublished') || $product->visibility == 'unpublished' ? 'checked' : ''}}
                       @endif
                    >
                <label class="form-check-label" for="unpublished">
                    Non publié
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id">
                <option value="null" disabled>Choisir une categorie</option>

                @foreach($categories as $categorie)
                    <option
                        value="{{$categorie->id}}"

                        @if($isCreateRoute === true)
                            {{(old('category_id') == $categorie->id) ? 'selected' : ''}}
                        @else
                                {{(old('category_id') == $categorie->id) || $product->category_id == $categorie->id ? 'selected' : ''}}
                        @endif
                    >
                        {{$categorie->name}}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text"
                   class="form-control"
                   id="reference"
                   name="reference"
                   maxlength=16
                   placeholder="d4mfhUntg9dA94jf"
                   value="{{ $isCreateRoute === true ? old('reference') : old('reference', $product->reference)}}"
            >

            @error('reference')
                <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="sizes" class="form-label">Tailles</label>
            
            @foreach($sizes as $size)
                    <div class="form-check">
                        <label class="form-check-label" for="sizes"> {{ $size->size }} </label>
                        <input type="checkbox"
                               class="form-check-input"
                               name="sizes[]"
                               value="{{$size->id}}"
                               @if($isCreateRoute === true)
                                    {{in_array($size->id, old('sizes', [])) ? 'checked' : ''}}
                               @else
                                    {{in_array($size->id, old('sizes', $checkedSizes)) ? 'checked' : '' }}
                               @endif
                        >
                    </div>
            @endforeach

            @error('sizes')
                <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
            @enderror
        </div>

        <div class="mb-3">
            @if(isset($product->picture))
                <div class="d-flex flex-column mb-3">
                    <label class="form-label" for="picture">Photo du produit: {{$product->name}}</label>
                    <img style="width: 20%" src="{{asset('/images/' . $product->picture->link)}}" alt="produit {{$product->name}}">
                </div>
            @endif
            
            <div class="mb-4">
                <label class="form-check-label" for="inputAddress">Importer l'image du produit</label>
                <input type="file"
                    class="form-control"
                    name="picture"
                >
                @error('picture')
                    <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
                @enderror
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary mb-3">{{$isCreateRoute === true ? "Crée ce produit" : "Mettre à jours ce produit"}}</button>
        
    </form>

@endsection