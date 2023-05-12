<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-dark">
  <a href='/' class="navbar-brand mb-0 h1 text-light">
    <img src="https://www.ufp.pt/app/uploads/2018/08/logoufp_174x70.png" class="d-inline-block" width="120" height="50" alt="Secretariado da Comissão de Ética">
    Secretariado da Comissão de Ética
  </a>
  <button type="button" data-toggle="collapse" data-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if(Auth::user() != null && Auth::user()->tipo_id == 6)
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('dashboard') }}">
          <span data-feather="home"></span>
          Home <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-feather="file"></span>Formulários</a>
          <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('q250') }}">{{ __('Q250') }}</a>
            <a class="dropdown-item" href="{{ route('q251') }}">{{ __('Q251 - Submissão Parecer') }}</a>
            <a class="dropdown-item" href="{{ route('q252') }}">{{ __('Q252 - Consentimento Informado') }}</a>
            <a class="dropdown-item" href="{{ route('q272') }}">{{ __('Q272 - Pedido Autorização') }}</a>
            <a class="dropdown-item" href="{{ route('q381') }}">{{ __('Q381 - Síntese de Resultados') }}</a>
          </div>
      </li>
    </ul>
    @elseif(Auth::user() != null && Auth::user()->tipo_id == 5)
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('dashboard') }}">
            <span data-feather="bar-chart-2"></span>
            Dashboard <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('projectlist') }}">
            <span data-feather="file"></span>
            Lista de Projetos
          </a>
        </li>
      </ul>
      @else
      @endif

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
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light ml-auto" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->nome }}
          </a>
          <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
      @endguest
    </div>
</nav>