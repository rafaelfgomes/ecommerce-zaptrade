<div class="sidebar" data-color="white" data-active-color="danger">

  <div class="logo">

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-mini">
      <div class="logo-image-small pt-3">
        <img src="{{ asset('images/dashboard/logo-small.png') }}">
      </div>
    </a>

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-normal">
      <span class="small">{{ Auth::user()->name }}<br>{{ Auth::user()->profile->name }}</span>
    </a>

    <form action="{{ route('dashboard.logout') }}" method="POST">

      <div class="row">

        <div class="col text-center">

          <button type="submit" class="btn btn-primary btn-round">Sair</button>

        </div>

      </div>

    </form>

  </div>

  <div class="sidebar-wrapper">

    <ul class="nav">

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

      <li @if (url()->current() == route('users.register.page')) class="active" @endif>

        <a href="{{ route('users.register.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Cadastrar usuário</p>
        </a>

      </li>

      <li @if (url()->current() == route('category.register.page')) class="active" @endif>

        <a href="{{ route('category.register.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Cadastrar categoria</p>
        </a>

      </li>

      <li @if (url()->current() == route('product.register.page')) class="active" @endif>

        <a href="{{ route('product.register.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Cadastrar produto</p>
        </a>

      </li>

    </ul>

  </div>

</div>