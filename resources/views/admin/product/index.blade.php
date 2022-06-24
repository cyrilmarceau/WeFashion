@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped caption-top align-middle">
                <caption class="text-end my-3 me-4">
                    <a class="btn btn-primary" href="{{route('admin.product.create')}}" role="button">Nouveau</a>
                </caption>
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Etat</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                    <tr>
                        <th style="width: 13%">{{$product->name}}</th>
                        <td style="width: 38%">{{$product->description}}</td>
                        <td style="width: 13%">{{isset($product->category) ? $product->category->name: 'N/A'}}</td>
                        <td style="width: 13%">{{$product->price}} €</td>
                        <td style="width: 13%">{{__('db.status.' . $product->status)}}</td>
                        <td>
                            <a lass="edit btn btn-primary" href="{{route('admin.product.show', $product->id)}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a class="edit btn btn-light" href="{{route('admin.product.edit', $product->id)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form id="formDelete-{{ $product->id }}" action="{{route('admin.product.destroy', $product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression de ce produit ?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach($products as $product)
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalExample" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalExample">Voulez-vous supprimer le produit  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light cancelDeleteProduct" data-bs-dismiss="modal">Non</button>
                <button class="btn btn-danger validateDelete" type="submit"> Supprimer</button>
            </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4 me-4">
        {{ $products->links() }}
    </div>



@endsection
