<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('guest.all.products') }}">Products</a>
    </li>
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
      <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
    @endif
    @endguest
</div> 