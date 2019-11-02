<div class="sidebar" data-color="white" data-active-color="danger">

  <div class="logo">

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-mini">

      <div class="logo-image-small pt-3">

        @if ( Auth::user()->profile_id == 1)
          <img src="{{ asset('images/dashboard/manager-avatar.jpg') }}">
        @else
          <img src="{{ asset('images/dashboard/user-avatar.jpg') }}">
        @endif

      </div>

    </a>

    <a href="{{ route('dashboard.index') }}" class="simple-text logo-normal">

      <span class="small">{{ Auth::user()->name }}<br>{{ Auth::user()->profile->name }}</span>

    </a>

  </div>

  <div class="sidebar-wrapper">

    <ul class="nav">

      <li @if (url()->current() == route('dashboard.products.page')) class="active" @endif>

        <a href="{{ route('dashboard.products.page') }}">
          <i class="nc-icon nc-bell-55"></i>
          <p>Produtos</p>
        </a>

      </li>

      @if (Auth::user()->profile->id == 1)

        <li @if (url()->current() == route('dashboard.categories.page')) class="active" @endif>

          <a href="{{ route('dashboard.categories.page') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Categorias</p>
          </a>

        </li>

      @endif

      <li @if (url()->current() == route('users.register.page')) class="active" @endif>

        <a href="{{ route('users.register.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Cadastrar usuário</p>
        </a>

      </li>

      @if (Auth::user()->profile->id == 1)

        <li @if (url()->current() == route('category.register.page')) class="active" @endif>

          <a href="{{ route('category.register.page') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Cadastrar categoria</p>
          </a>

        </li>

      @endif

      <li @if (url()->current() == route('product.register.page')) class="active" @endif>

        <a href="{{ route('product.register.page') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Cadastrar produto</p>
        </a>

      </li>

    </ul>

  </div>

</div>