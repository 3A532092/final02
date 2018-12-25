<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">顯卡銷售首頁</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  @if (Route::has('login'))
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
    @auth
    <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('GraphicController@getindex') }}">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ action('GraphicController@getindex') }}">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
              @endif
            @endauth
          </ul>
        </div>
        @endif
  </div>
</nav>