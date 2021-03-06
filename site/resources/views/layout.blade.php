<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/dark-hive/jquery-ui.css">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="icon" href="/assets/logo.png">
    <title> BDE CESI</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark container-fluid animated fadeInDown" style="z-index: 1;">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="/assets/logo.png" alt="Logo BDE" height="50px"> <!--Logo BDE to return to the home page-->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggle">
            <div class="navbar-nav">
                <li class="nav-item @yield('active1')">
                    <a class="nav-link" href="{{url('/campus')}}"><i class="fas fa-graduation-cap"></i> Nos campus</a> <!--Link to go to the page with the campuses-->
                </li>
                <li class="nav-item @yield('active2')">
                    <div class="btn-group">
                        <a class="nav-link pr-0" href="{{url('/shop')}}"><i class="fas fa-shopping-bag"></i> Boutique</a> <!--Link to go to the page of the shop-->
                        <a class="nav-link dropdown-toggle pl-0" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </a>
                        <div class="dropdown-menu" id="dropdownCategory">
                            @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
                                <a class="dropdown-item text-center" id="showModal" href="#"><i class="fas fa-plus"></i></a>
                            @endif
                        </div>
                    </div>

                </li>
                <li class="nav-item @yield('active3')">
                    <a class="nav-link" href="{{url('/events')}}"><i class="fas fa-calendar-alt"></i> Evènements</a> <!--Link to go to the page of the events-->
                </li>
                <li class="nav-item @yield('active4')">
                    @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 1)
                        <a class="nav-link" href="mailto:bde@viacesi.fr"><i class="far fa-envelope"></i> Envoyer une idée </a> <!--Link to send an idea to the bde-->
                    @elseif(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 3)
                        <a class="nav-link" href="mailto:bde@viacesi.fr"><i class="far fa-envelope"></i> Signaler un contenu</a> <!--Link to send a problem to the bde-->
                    @endif
                </li>
            </div>
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        @if(\Illuminate\Support\Facades\Cookie::get('user') != null)
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\App\User::getUser()['first_name']}} {{\App\User::getUser()['last_name']}}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-header" href="#">
                                    @if(\App\User::getUser()['usertypeId'] === 1)
                                        Etudiant
                                    @elseif(\App\User::getUser()['usertypeId'] === 2)
                                        Membre BDE
                                    @else
                                        Staff CESI
                                    @endif
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/api/logout">Déconnexion</a> <!--Button to disconnect the user-->
                            </div>
                        @else
                            @if(\Illuminate\Support\Facades\Cookie::get('loginState') != 'error')
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a> <!--Button to open the form of the connexion-->
                            @else
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion (échec)</a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right">
                                <form class="px-4 py-3" action="/api/login" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="email@exemple.com"> <!--Input of the email connexion-->
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"> <!--Input of the password connexion-->
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark" >Se connecter</button> <!--Button to submit the form of connexion-->
                                    </div>
                                    <div class="text-center pt-5">
                                        <p> Pas encore inscrit ?</p>
                                        <a class="btn btn-dark text-white" href="{{url('/signup')}}">Inscrivez-vous maintenant</a> <!--Button to go to the page to register-->
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/basket')}}"><i class="fas fa-shopping-cart"></i></a> <!--Button to go to the basket-->
                </li>
            </ul>
        </div>
    </nav>
</header>

@yield('maincontent')

<footer class="bg-dark">
    <div class="container-fluid">
        <div class="col-md-12 text-center text-light">
            <a class="btn btn-elegant" href="/mentions">Mentions légales</a>
        </div>
        <div class="row justify-content-center"
        <div style="font-size: 2rem;">
            <div><a href="https://www.facebook.com/BDECESIARRAS" class="list-group-item-action"><i class="fab fa-facebook-square white-text mx-3"></i></a></div> <!--Facebook logo to go to the facebook of the bde-->
            <div><a href="https://twitter.com/BDE_Exia_Arras" class="list-group-item-action"><i class="fab fa-twitter white-text mx-3"></i></a></div> <!--Twitter logo to go to the twitter of the bde-->
            <div><a href="https://www.linkedin.com/company/groupe-cesi/" class="list-group-item-action"><i class="fab fa-linkedin white-text mx-3"></i></a></div> <!--Linkedin logo to go to the linkedin of the bde-->
        </div>
    </div>

    @if (\Illuminate\Support\Facades\Cookie::get('allowCookies') == null)<!--Window to ask to accept the cookies-->
        <div class="modal fade bottom" id="modalCookies" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-frame modal-bottom" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center">
                            <p class="pt-3 pr-2"> Voulez vous acepter l'utilisation des cookies sur ce site ?</p>
                            <a class="btn btn-elegant" href="/api/allowCookies">Accepter</a> <!--Button to accepte the cookies-->
                            <button type="button" class="btn btn-elegant" data-dismiss="modal">Refuser</button> <!--Button to refuse the cookies-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
<script
    src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="/assets/js/script.js"></script>
@yield('scripts')
</body>
</html>
