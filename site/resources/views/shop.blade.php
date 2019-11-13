@extends('layout')

@section('active2')

    active

@endsection

@section('maincontent')



    <section class="text-center my-4">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Our bestsellers</h2>
                <!-- Section description -->
                <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas
                    nostrum quisquam eum porro a pariatur veniam.</p>
            </div>

        <div class="row justify-content-center w-100 my-4">

            <!-- Grid column -->
            <div class="col-lg-3 col-md-6 mb-lg-0">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/31QIre08LGL._SY355_.jpg" class="card-img-top mx-auto"
                             alt="sample photo" style="height: 300px; width: auto;">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card image -->
                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <!-- Category & Title -->

                        <h4 class="card-title">
                            <strong>
                                <a href="">Denim trousers</a>
                            </strong>
                        </h4>

                        <!-- Description -->
                        <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit..</p>
                        <!-- Card footer -->
                        <!--
                        <div class="card-footer px-1">
            <span class="float-left font-weight-bold">
              <strong>49$</strong>
            </span>
                            <span class="float-right">
              <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                <i class="fas fa-shopping-cart grey-text ml-3"></i>
              </a>
            </span>
                        </div>
                        -->
                        <div>
                            <p class="text-dark">49$</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-elegant">Ajouter au panier <i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <!-- Card content -->
                </div>
                <!-- Card -->
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Products v.1 -->

@endsection
