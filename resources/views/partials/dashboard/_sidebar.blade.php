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

      <li class="active">
        
        <a href="{{ route('dashboard.index') }}">  
          <i class="nc-icon nc-bank"></i>
          <p>Início</p>
        </a>

      </li>
      
      <li>

        <a href="{{ route('dashboard.user.profile') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Perfil</p>
        </a>
      
      </li>
      
      <li>
        <a href="{{ route('dashboard.product.register') }}">
          <i class="nc-icon nc-bell-55"></i>
          <p>Produtos</p>
        </a>
      </li>

      <li>
        <a href="{{ route('dashboard.category.register') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Categorias</p>
        </a>
      </li>
      
    </ul>

  </div>

</div>