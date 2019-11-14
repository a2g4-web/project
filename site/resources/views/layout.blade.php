<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/dark-hive/jquery-ui.css">
    <link rel="stylesheet" href="assets/style.css">
    <title> BDE CESI</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark container-fluid animated fadeInDown" style="z-index: 1;">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="assets/logo.png" alt="Logo BDE" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggle">
            <div class="navbar-nav">
                <li class="nav-item @yield('active1')">
                    <a class="nav-link" href="{{url('/campus')}}"><i class="fas fa-graduation-cap"></i> Nos campus</a>
                </li>
                <li class="nav-item @yield('active2')">
                    <div class="btn-group">
                        <a class="nav-link pr-0" href="{{url('/shop')}}"><i class="fas fa-shopping-bag"></i> Boutique</a>
                        <a class="nav-link dropdown-toggle pl-0" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Vetements</a>
                            <a class="dropdown-item" href="#">Accessoires</a>
                            <a class="dropdown-item" href="#">Goodies</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item @yield('active3')">
                    <a class="nav-link" href="{{url('/events')}}"><i class="fas fa-calendar-alt"></i> Evènements</a>
                </li>
            </div>
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        @if(\Illuminate\Support\Facades\Cookie::get('user') != null)
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\App\User::getUser()['first_name']}} {{\App\User::getUser()['last_name']}}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/api/logout">Déconnexion</a>
                            </div>
                        @else
                        @if(\Illuminate\Support\Facades\Cookie::get('loginState') != 'error')
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                        @else
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion (échec)</a>
                        @endif
                            <div class="dropdown-menu dropdown-menu-right">
                                <form class="px-4 py-3" action="/api/login" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="email@exemple.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark" >Sign in</button>
                                    </div>
                                    <div class="text-center pt-5">
                                        <p> Pas encore inscrit ?</p>
                                        <a class="btn btn-dark text-white" href="{{url('/signup')}}">Inscrivez-vous maintenant</a>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/basket')}}"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

@yield('maincontent')

<footer class="bg-dark">
    <div class="container-fluid">
        <div class="col-md-12">
            <p class="text-light">Test mentions légales</p>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
<script
    src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="assets/script.js"></script>
</body>
</html>
