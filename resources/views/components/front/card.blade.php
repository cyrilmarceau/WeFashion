@forelse($products as $product)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            @if(isset($product->picture))
                <img src="{{asset('/images/' . $product->picture->link)}}" alt="Produit {{ $product->name }}">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <a href="{{url('produits', $product->id)}}" class="btn btn-primary">Voir le produit</a>
            </div>
        </div>

    </div>
@empty
<div class="col-12">
    <p>Aucun produit</p>
</div>
@endforelse