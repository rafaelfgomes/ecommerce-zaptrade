<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

  <div class="container">
    
    <a class="navbar-brand" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">

      <span class="oi oi-menu"></span> Menu
    
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active"><a href="{{ route('index') }}" class="nav-link">Página Inicial</a></li>
        
        <li class="nav-item dropdown">
        
          <a class="nav-link dropdown-toggle" href="#" id="dropdown-categories" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          
          <div class="dropdown-menu" aria-labelledby="dropdown-categories">

            @foreach ($categories as $category)
            
              <a class="dropdown-item" href="{{ route('category.page', [ 'name' => $category->slug_name ]) }}">{{ $category->name }}</a>
                
            @endforeach

          </div>
        
        </li>
        
        <li class="nav-item"><a href="{{ route('contact.page') }}" class="nav-link">Contato</a></li>
        <li class="nav-item cta cta-colored"><a href="#" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

      </ul>

    </div>

  </div>
  
</nav>