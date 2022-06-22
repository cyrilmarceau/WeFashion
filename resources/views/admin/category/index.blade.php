@extends('layouts.admin')

@section('content')
    
    @if (session('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped caption-top align-middle">
            

                {{-- <caption>Liste des produits</caption> --}}
                    
                <caption class="text-end my-3 me-4"><a class="btn btn-primary" href="{{route('admin.category.create')}}" role="button">Nouveau</a></caption>
            
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th style="width: 90%">{{$category->name}}</th>
                        {{-- <td>
                            <a lass="edit btn btn-primary" href="{{route('admin.category.show', $category->id)}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td> --}}
                        <td>
                            <a class="edit btn btn-light" href="{{route('admin.category.edit', $category->id)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="delete btn btn-danger"
                                onclick="return confirm('Are you sure?')"
                                href="{{route('admin.category.destroy', $category->id)}}"
                            >
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach($categories as $category)
            </tbody>
        </table>
    </div>

    <div class="col-12 mt-4 me-4">
        {{-- {{ $categories->links() }} --}}
    </div>

@endsection