@extends('layouts.admin')

@section('content')

    <?php $isCreateRoute = Route::is('admin.category.create') ? true : false ?>

    @if ($isCreateRoute === true) 
        <form enctype="multipart/form-data" action="{{route('admin.category.store')}}" method="POST" class="my-4">
    @else
        <form enctype="multipart/form-data" action="{{route('admin.category.update', $category->id)}}" method="POST" class="my-4">
        @method('PUT')
    @endif
    
        @csrf

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
                        {{$categorie->name === 'men' ? 'Homme' : 'Femme'}}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-3">{{$isCreateRoute === true ? "Crée ce produit" : "Mettre à jours ce produit"}}</button>
        
    </form>

@endsection