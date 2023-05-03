<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-dark">
  <a href='/dashboard' class="navbar-brand mb-0 h1 text-light">
    <img src="https://www.ufp.pt/app/uploads/2018/08/logoufp_174x70.png" class="d-inline-block" width="120" height="50" alt="Secretariado da Comissão de Ética">
    Secretariado da Comissão de Ética
  </a>
  <button type="button" data-toggle="collapse" data-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a href="#" class="nav-link text-light active">Home</a>
      </li>
      <li class="nav-item ">
        <a href="#" class="nav-link text-light">Features</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">Price</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdownMenuLink">
            @if (Route::has('login'))
            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light ml-auto" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->nome }}
          </a>
          <div class="dropdown-menu" style="right: 0; left: auto;"  aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
      </ul>
      @endguest
  </div>
</nav>