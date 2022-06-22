@extends('layouts.admin')

@section('content')

    <?php $isCreateRoute = Route::is('admin.category.create') ? true : false ?>

    {{-- <div class="mb-3 my-4">
        <label for="price" class="form-label">Catégories actuelle</label>
        <select class="form-select" name="category_id">
            <option value="null" disabled>Choisir une categorie</option>

            @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">
                    {{$categorie->name}}
                </option>
            @endforeach
        </select>
    </div> --}}

    @if ($isCreateRoute === true) 
        <form enctype="multipart/form-data" action="{{route('admin.category.store')}}" method="POST" class="my-4">
    @else
        <form enctype="multipart/form-data" action="{{route('admin.category.update', $category->id)}}" method="POST" class="my-4">
        @method('PUT')
    @endif
    
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Les categories actuelles:</label>
                @foreach($categories as $categorie)
                    <p>{{$categorie->name}}</p>
                @endforeach
        </div>

        <hr>
        <div class="mb-3">
            <label for="name" class="form-label">En ajouter une nouvelle</label>

                <input type="text"
                    class="form-control" id="name"
                    placeholder="Accessoire, Bijoux ..."
                    name="name" value="{{ $isCreateRoute === true ? old('name') : old('name', $category->name)}}"
                >
                @error('category')
                    <div class="alert alert-danger" role="alert"> <p class="mb-0"> {{$message}} </p> </div>
                @enderror
        </div>


        <button type="submit" class="btn btn-primary mb-3">{{$isCreateRoute === true ? "Crée cette catégorie" : "Mettre à jours cette catégorie"}}</button>
        
    </form>

@endsection