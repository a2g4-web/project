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
                <!-- Search form -->
                <div class="row justify-content-center">
                    <div class="md-form col-md-2">
                        <input aria-label="Search" class="form-control" id="recherche" placeholder="Search" type="text">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Products v.1 -->



    <div class="container">
        <div class="row justify-content-center articles">

        </div>
    </div>



@endsection
