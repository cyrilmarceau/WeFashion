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
                        <td>
                            <a class="edit btn btn-light" href="{{route('admin.category.edit', $category->id)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form id="formDelete" action="{{route('admin.category.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" id="triggerModalBtn" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach($categories as $category)
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalExample" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalExample">Voulez-vous supprimer cette catégorie </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light cancelDeleteProduct" data-bs-dismiss="modal">Non</button>
                    <button class="btn btn-danger validateDelete" type="submit"> Supprimer</button>
                </div>
            </div>
        </div>
    </div>




@endsection
