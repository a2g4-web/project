@extends('layout')

@section('active2')

    active

@endsection

@section('maincontent')

    <section class="text-center my-4">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Notre boutique</h2>
                <!-- Section description -->
                <p class="card-text text-center">Bienvenue sur la boutique de votre BDE, vous trouverez grand nombre d'articles à votre disposition</p>
                <!-- Search form -->
                <div class="row justify-content-center">
                    @if(!isset($articles))
                        <div class="md-form input-group col-md-2">
                            <input aria-label="Search" class="form-control" id="recherche" placeholder="Rechercher" type="text">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon" id="material-addon-addon1"><a href="#" class="text-blue" id="recherche-link"><i class="fas fa-search"></i></a></span>
                            </div>
                        </div>
                        <div class="md-form">
                            <a class="btn btn-elegant  btn-sm" onclick="sortByPrice()" >Trier par prix</a><!--Button to sort the articles by price-->
                        </div>
                        <div class="md-form">
                            <a class="btn btn-elegant  btn-sm" onclick="sortByBest()" >Top 3</a><!--Button to show the best seller-->
                        </div>
                        <div class="md-form">
                            <a class="btn btn-elegant  btn-sm" onclick="shopToHTML()" >Voir tout</a><!--Button to show all the articles-->
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Products v.1 -->



    <div class="container">
        <div class="row justify-content-center articles">
            @if(isset($articles) && count($articles) > 0)
                @foreach($articles as $item)
                    <div class="col-md-4 col-lg-3 col-sm-12 pb-4">
                        <div class="card card-cascade narrower card-ecommerce">
                            <div class="view overlay">
                                <img class="mx-auto w-100" src="{{$item['imageUrl']}}" alt="Card image cap" height="200">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body card-body-cascade text-center">
                                <h4 class="card-title card-name">{{$item['name']}}</h4>
                                <p class="card-text">{{$item['description']}}</p>
                                <p class="card-price">{{$item['price']}}</p>
                                <a href="/api/addtobasket/{{$item['id']}}" class="btn btn-primary" id="article-btn-{{$item['id']}}">Mettre au panier</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
        <div class="btn-fix text-center">
            <a class="btn-floating btn-elegant btn-lg white-text" href="#" data-toggle="modal" data-target="#centralModalLg"><i class="fas fa-plus mt-3"></i></a>
        </div>
    @endif

    <div class="modal fade" id="centralModalLg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Ajout article</h4>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="/api/addarticle" enctype="multipart/form-data" method="post" id="articleForm"> <!--Form to add an article in the shop-->
                            <p class="h4 text-center">Ajouter un article</p>
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de l'article"> <!--Input for the name of the article-->
                            </div>
                            <div class="md-form">
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description de l'article"> <!--Input for the description of the article-->
                            </div>
                            <div class="md-form">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Prix de l'article"> <!--Input for the price of the article-->
                            </div>
                            <div class=md-form">
                                <select class="browser-default custom-select mb-3" name="categoryId" id="categoryId"> <!--Dropdown list to select the category of the article-->
                                    <option value="" disabled="" selected="">Séléctionner la catégorie</option>
                                </select>
                            </div>
                            <div class="file-field">
                                <div class="btn btn-primary">
                                    <span id="addFile">Ajouter une image</span> <!--Button to add an image to the article-->
                                    <input type="file" name="fileInput" id="fileInput" hidden>
                                </div>
                                <p id="fileName"></p>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal">Fermer</button> <!--Button to close the window to add an article-->
                    <button type="button" class="btn btn-primary btn-sm" id="formSend">Sauvegarder</button> <!--Button to submit the form to add an event-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Ajout catégorie</h4>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="/api/addcategory" enctype="multipart/form-data" method="post" id="categoryForm"> <!--Form to add a category to the shop-->
                            <p class="h4 text-center">Ajouter une catégorie</p>
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de la catégorie"> <!--Input for the name of the category-->
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal">Fermer</button> <!--Button to close the window to add a category-->
                    <button type="button" class="btn btn-primary btn-sm" id="formSends">Sauvegarder</button> <!--Button to submit the form to add a category-->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection

@section('scripts')
    <script src="/assets/js/shop.js"></script>
@endsection
