<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalExample" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="productModalExample">Voulez-vous supprimer le produit {{ $product->name }} </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Non</button>

            {{-- <form action="{{route('admin.product.destroy', $product->id)}}" method="POST"> --}}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"> Supprimer</button>
            {{-- </form> --}}
        </div>
        </div>
    </div>
</div>