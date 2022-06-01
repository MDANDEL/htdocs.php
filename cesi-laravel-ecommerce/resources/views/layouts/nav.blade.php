<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class = "nav-link" href="{{ route('products.index') }}">Liste des Produits</a>
        </li>
        <li class="nav-item">
          <a class = "nav-link" href="{{ route('products.create') }}">Créer un Produit</a>
        </li>
        @guest
            <li class="nav-item">
              <a class = "nav-link" href="{{ route('register') }}">Inscription</a>
            </li>

            <li class="nav-item">
              <a class = "nav-link" href="{{ route('login') }}">Connexion</a>
            </li>
        @endguest

        @auth
            <li class="nav-item">
              <a class = "nav-link" href="{{ route('logout') }}">Se Deconnecter</a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
