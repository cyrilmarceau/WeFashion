<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand logo" href="{{url('/')}}">WE FASHION</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-uppercase active" aria-current="page" href="{{url('produits/soldes')}}">Soldes</a>
                </li>
                @if(isset($categories))
                    @forelse($categories as $id => $name)
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{url('produits/categorie', $id)}}">{{$name}}</a>
                        </li>
                    @empty
                        <li>Aucun produits pour l'instant ...</li>
                    @endforelse
                @endif
            </ul>
        </div>
    </div>
</nav>