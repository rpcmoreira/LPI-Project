<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-dark">
  <a href='/' class="navbar-brand mb-0 h1 text-light">
    <img src="https://www.ufp.pt/app/uploads/2018/08/logoufp_174x70.png" class="d-inline-block" width="120" height="50" alt="Secretariado da Comissão de Ética">
    Secretariado da Comissão de Ética
  </a>
  <button type="button" data-toggle="collapse" data-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    @if(Auth::user() != null && Auth::user()->tipo_id == 7)
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
          <!--<a class="dropdown-item" href="{{ route('q250') }}">{{ __('Q250') }}</a>-->
          <a class="dropdown-item" href="{{ route('q251') }}">{{ __('Q251 - Submissão Parecer') }}</a>
          <a class="dropdown-item" href="{{ route('q252') }}">{{ __('Q252 - Consentimento Informado') }}</a>
          <a class="dropdown-item" href="{{ route('q272') }}">{{ __('Q272 - Pedido Autorização') }}</a>
          <a class="dropdown-item" href="{{ route('q381') }}">{{ __('Q381 - Síntese de Resultados') }}</a>
        </div>
      </li>
    </ul>
    @elseif(Auth::user() != null && (Auth::user()->tipo_id == 6 || Auth::user()->tipo_id == 8))
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
    @if(Auth()->user() && (Auth()->user()->tipo_id == 7 || Auth()->user()->tipo_id == 6))
    <ul class="navbar-nav ml-auto">
      @php $messages = DB::table('messages')->where('user_id', Auth()->user()->id)->where('is_read', 0)->count();@endphp
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="right: 0; left: auto;">
          <i class="fa fa-bell text-white ml-auto">
            <span class="badge badge-danger pending">{{$messages}}</span>
          </i>
        </a>
        <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdownMenuLink2">
          @if($messages == 0)
          <a class="dropdown-item">{{__('Sem Notificações a Apresentar')}}</a>
          @else
          @php
          $mensagem = DB::table('messages')
          ->where('user_id', Auth()->user()->id)
          ->where('is_read', 0)
          ->orderBy('id', 'desc')
          ->get();
          @endphp
          @foreach($mensagem as $message)
          @php
          $projeto = DB::table('projetos')->where('id', $message->projeto_id)->value('nome');
          $usuario = DB::table('users')->where('id', (DB::table('projetos')->where('id', $message->projeto_id)->value('proponente_id')))->value('nome');
          $estado = DB::table('estado')->where('id', $message->estado_id)->value('estado');
          @endphp
          @if($message->type == 1)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' de '.$usuario.' passou para o estado '.$estado ) }}</p>
          </a>
          @elseif($message->type == 2)
          @if(Auth()->user()->tipo_id == 6)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' de '.$usuario.' foi aprovado com recomendação') }}</p>
          </a>
          @elseif(Auth()->user()->tipo_id == 7)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' foi aprovado com recomendação') }}</p>
          </a>
          @endif
          @elseif($message->type == 3)
          @if(Auth()->user()->tipo_id == 6)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' de '.$usuario.' foi aprovado sem recomendação') }}</p>
          </a>
          @elseif(Auth()->user()->tipo_id == 7)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' foi aprovado sem recomendação') }}</p>
          </a>
          @endif
          @elseif($message->type == 4)
          @if(Auth()->user()->tipo_id == 6)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' de '.$usuario.' não foi aprovado, tendo sido cancelado') }}</p>
          </a>
          @elseif(Auth()->user()->tipo_id == 7)
          <a class="dropdown-item message-item" data-message-id="{{ $message->id }}">
            <p class="font-italic">{{ __('O projeto '.$projeto.' não foi aprovado, tendo sido cancelado') }}</p>
          </a>
          @endif
          @endif
          @endforeach
          @endif
        </div>
      </li>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/echo/1.11.4/echo.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.message-item').on('click', function() {
            var messageId = $(this).data('message-id');
            var badgeCount = $('.badge.pending').text();

            $.ajax({
              url: "{{ route('mark-as-read', ':id') }}".replace(':id', messageId),
              type: "POST",
              dataType: "json",
              data: {
                _token: "{{ csrf_token() }}",
              },
              success: function(response) {
                // Handle the success response, if needed
                console.log(response);

                // Update the UI to indicate the message is read
                $(this).addClass('message-read');

                // Update the badge count
                if (badgeCount > 0) {
                  badgeCount--;
                  $('.badge.pending').text(badgeCount);
                }
              },
              error: function(xhr) {
                // Handle the error response, if needed
                console.log(xhr.responseText);
              }
            });
          });
        });

        // Configure Laravel Echo
        window.Echo = new Echo({
          broadcaster: 'pusher',
          key: '{{ env("PUSHER_APP_KEY") }}',
          cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
          forceTLS: true
        });

        // Listen for the 'MessageRead' event
        window.Echo.channel('my_channel')
          .listen('.MessageRead', function(data) {
            console.log(data);

            // Update the UI to indicate the message is read
            $('.message-item[data-message-id="' + data.messageId + '"]').addClass('message-read');

            // Update the badge count
            var badgeCount = $('.badge.pending').text();
            if (badgeCount > 0) {
              badgeCount--;
              $('.badge.pending').text(badgeCount);
            }
          });
      </script>
      @endif


      @guest
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdownMenuLink">
            @if (Route::has('login'))
            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
            @if (Route::has('register'))
            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </div>
        </li>
      </ul>
      @else
      <ul class="navbar-nav ml-auto">
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