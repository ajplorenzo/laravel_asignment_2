<div class="collapse bg-inverse" id="navbarHeader">
  <div class="container">
    <div class="row">
      
      <div class="col-sm-4 py-4">
        <h4 class="text-white">Menu</h4>
        <ul class="list-unstyled">
          @if(auth()->check())
          <li><a href="/wishlist" class="text-white">My Wishlist</a></li>
          <li><a href="{{ route('logout') }}" class="text-white">Logout</a></li>
          @else
          <li><a href="/home" class="text-white">Login</a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="navbar navbar-inverse bg-inverse">
  <div class="container d-flex justify-content-between">
    <a href="/" class="navbar-brand">Inventory Crawler</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</div>