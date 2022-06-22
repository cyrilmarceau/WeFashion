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
                    
                <caption class="text-end my-3 me-4"><a class="btn btn-primary" href="{{route('admin.product.create')}}" role="button">Nouveau</a></caption>
            
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
                        <th>{{$product->name}}</th>
                        <td>{{$product->description}}</td>
                        <td>{{__('db.categories.' .$product->category->name)}}</td>
                        <td style="width: 10%;">{{$product->price}} €</td>
                        <td>{{__('db.status.' . $product->status)}}</td>
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
                            <a class="delete btn btn-danger"
                                onclick="return confirm('Are you sure?')"
                                href="{{route('admin.product.destroy', $product->id)}}"
                            >
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach($products as $product)
            </tbody>
        </table>
    </div>

    <div class="col-12 mt-4 me-4">
        {{ $products->links() }}
    </div>

@endsection