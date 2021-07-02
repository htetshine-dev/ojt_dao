<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
  <a class="navbar-brand" href="{{ url('/') }}">
    SCM Bulletin Board
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  @guest
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
  </ul>
  @else
  <ul class="navbar-nav ml-left">
    {{-- if admin --}}
    @if( Auth::user()->type == 0)
      <li class="nav-item">
        <a class="nav-link" href="{{ __('/user/user/user-lists') }}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ __('/user/user/profile/1') }}">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ __('/user/post/post-lists') }}">Posts</a>
      </li>
    {{-- if user --}}
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{ __('/user/post/post-lists') }}">Posts</a>
      </li>
    @endif

  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="" class="nav-link">{{ Auth::user()->name }}</a>
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
  </ul>
  @endguest
  </div>
</nav>