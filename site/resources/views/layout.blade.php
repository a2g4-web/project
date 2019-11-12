<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title> BDE CESI</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid animated fadeInDown" style="z-index: 1;">
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
                    <a class="nav-link" href="{{url('/shop')}}"><i class="fas fa-shopping-bag"></i> Boutique</a>
                </li>
                <li class="nav-item @yield('active3')">
                    <a class="nav-link" href="{{url('/events')}}"><i class="fas fa-calendar-alt"></i> Evènements</a>
                </li>
            </div>
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email@exemple.com">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-dark">Sign in</button>
                                <a href="inscription.html">S'inscrire</a>
                            </form>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
