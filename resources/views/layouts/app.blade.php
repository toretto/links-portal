
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Starter</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">


  <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <!-- Summernote Editor -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- Core CSS -->
    <link rel="stylesheet" type="text/css" href="https://laravel-starter.sigiharja.dev/assets/css/app.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>


      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Google fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
  </head>
  
  <body>
      

<header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="bi bi-pen"></i> Laravel Starter</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li><a href="{{url('/')}}" class="nav-link"> Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Items</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">#</a></li>
              <li><a class="dropdown-item" href="#">#</a></li>
              <li><a class="dropdown-item" href="#">#</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Admin</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('/admin/users')}}">Users</a></li>
              <li><a class="dropdown-item" href="#">#</a></li>
              <li><a class="dropdown-item" href="#">#</a></li>
            </ul>

        </li>

      </ul>
    </div>
  </div>
      <div class="text-end">
              @guest
                <a href="{{url('login')}}" class="btn btn-outline-dark me-2">Login</a>
               @endguest
        @auth
            <a href="{{url('account')}}" class="btn btn-outline-dark-me-2">My Account</a>
        @endauth
              </div>
    </div>
  </nav>

  </div>

  <main>
    <div class="body">
      <div class="container">
                @yield('content')
    
          </div>
    </div>
  </main>

</body>
</html>
