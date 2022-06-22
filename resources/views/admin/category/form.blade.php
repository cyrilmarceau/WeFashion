@extends('layouts.admin')

@section('content')

    <?php $isCreateRoute = Route::is('admin.category.create') ? true : false ?>

    <div class="mb-3 my-4">
        <label for="price" class="form-label">Catégories actuelle</label>
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

    @if ($isCreateRoute === true) 
        <form enctype="multipart/form-data" action="{{route('admin.category.store')}}" method="POST" class="my-4">
    @else
        <form enctype="multipart/form-data" action="{{route('admin.category.update', $category->id)}}" method="POST" class="my-4">
        @method('PUT')
    @endif
    
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Rajouter une catégorie</label>

                <input type="text"
                    class="form-control" id="name"
                    placeholder="Accessoire, Bijoux ..."
                    name="name" value="{{ old('name')}}"
                >
                @error('category')
                    <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">{{$isCreateRoute === true ? "Crée cette catégorie" : "Mettre à jours cette catégorie"}}</button>
        
    </form>

@endsection