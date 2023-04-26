<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="{{ url('/') }}">Sell.Me</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
  data-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">

      @guest
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button"
      data-toggle="dropdown" aria-expanded="false">Account</a>
        <ul class="dropdown-menu dropdown-menu-right">
        @if (Route::has('login'))
        <a class="dropdown-item" href="{{ route('login') }}">{{ ('Login') }}</a>
        @endif
        @if (Route::has('register'))
        <a class="dropdown-item" href="{{ route('register') }}">
          {{ __('Register') }}
        </a>
        </ul>
      </li>
      @endif
      @endguest
    </ul>
  </div>

</nav>
