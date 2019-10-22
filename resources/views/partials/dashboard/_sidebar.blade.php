<div class="sidebar" data-color="white" data-active-color="danger">

  <div class="logo">

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{ asset('images/dashboard/logo-small.png') }}">
      </div>
    </a>

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-normal">

      Nome

    </a>

  </div>

  <div class="sidebar-wrapper">

    <ul class="nav">

      <li @if (url()->current() == route('dashboard.index')) class="active" @endif>

        <a href="{{ route('dashboard.index') }}">
          <i class="nc-icon nc-bank"></i>
          <p>Início</p>
        </a>

      </li>

      <li @if (url()->current() == route('dashboard.user.profile')) class="active" @endif>

        <a href="{{ route('dashboard.user.profile') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Perfil</p>
        </a>

      </li>

      <li @if (url()->current() == route('dashboard.products.page')) class="active" @endif>

        <a href="{{ route('dashboard.products.page') }}">
          <i class="nc-icon nc-bell-55"></i>
          <p>Produtos</p>
        </a>

      </li>

      <li @if (url()->current() == route('dashboard.categories.page')) class="active" @endif>

        <a href="{{ route('dashboard.categories.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Categorias</p>
        </a>

      </li>

    </ul>

  </div>

</div>