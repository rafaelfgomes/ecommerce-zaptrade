<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">

  <div class="container-fluid">

    <div class="navbar-wrapper">

      <div class="navbar-toggle">

        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>

      </div>

      <a class="navbar-brand" href="{{ route('dashboard.index') }}">Dashboard Zaptrade</a>

    </div>

    <form action="{{ route('dashboard.logout') }}" class="form-inline my-2 my-lg-0" method="POST">

        <div class="row">

          <div class="col text-center">

            <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-sign-out-alt"></i></button>

          </div>

        </div>

      </form>

  </div>



</nav>
<!-- End Navbar -->