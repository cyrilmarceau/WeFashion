<div class="row product">
    <div class="col-7">
        @if(isset($product->picture))
            <img class="w-100" src="{{asset('/images/' . $product->picture->link)}}" alt="Produit {{ $product->name }}">
        @endif

        <p class="mt-2">{{ $product->description }}</p>
    </div>
    <div class="col-5">
        <p>{{ $product->name }}</p>
        <p>Prix: {{ $product->price }}€</p>
        <p>Status: {{__('db.status.' . $product->status)}}</p>
        <p>Référence: {{ $product->reference }}</p>
        <p>Crée le: {{ $product->created_at }}</p>

        <form>
            <div class="mb-3 form-check ps-0">
                <label class="form-check-label" for="exampleCheck1">Taille: </label>

                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Selectionner une taille</option>
                    
                    @forelse($product->sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                    @empty
                    <p>Aucune taille</p>
                    @endforelse
                </select>
            </div>

            @if ($isAdmin === true)
                <a class="btn btn-primary"
                href="{{route('admin.product.edit', $product->id)}}">

                Modifier ce produit
            </a>
            @else
                <button type="submit" class="btn btn-primary">Acheter</button>
            @endif
            
        </form>
    </div>
</div>