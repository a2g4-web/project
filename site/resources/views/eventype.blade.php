@extends('layout')

@section('maincontent')

    <div class="card my-4 text-center">
        <div class="card-body">
            <h2 class="card-title">{{$data['name']}}</h2>
            <h3 class="card-description text-center">{{$data['description']}}</h3>
            <a href="#" class="btn btn-primary btn-elegant" style="left:40%">Inscription</a>
        </div>
    </div>

    <!--Section: Comments-->
    <section class="my-5">

        <!-- Card header -->
        <div class="card-header border-0 font-weight-bold">2 comments</div>

        <div class="media d-block d-md-flex mt-4">

            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                <h5 class="font-weight-bold mt-0">
                    <a href="" style="color: black">Miley Steward</a>
                    <a href="" class="pull-right" style="color: black">
                        <i class="fas fa-reply"></i>
                    </a>
                </h5>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <div class="media d-block d-md-flex mt-4">

                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="font-weight-bold mt-0">
                            <a href="" style="color: #000000;">Tommy Smith</a>
                            <a href="" class="pull-right" style="color: #000000;">
                                <i class="fas fa-reply"></i>
                            </a>
                        </h5>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </div>
                </div>

                <!-- Quick Reply -->
                <div class="form-group mt-4">
                    <label for="quickReplyFormComment">Your comment</label>
                    <textarea class="form-control" id="quickReplyFormComment" rows="5"></textarea>

                    <div class="text-center my-4">
                        <button class="btn btn-primary btn-sm btn-elegant" type="submit">Post</button>
                    </div>
                </div>
                <div class="media d-block d-md-flex mt-3">
                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="font-weight-bold mt-0">
                    </div>
                </div>
            </div>
        </div>

        <!--Pagination -->
        <nav class="d-flex justify-content-center mt-5">
            <ul class="pagination pg-dark mb-0">

                <!--First-->
                <li class="page-item disabled">
                    <a class="page-link">First</a>
                </li>

                <!--Arrow left-->
                <li class="page-item disabled">
                    <a class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <!--Numbers-->
                <li class="page-item active">
                    <a class="page-link">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link">5</a>
                </li>

                <!--Arrow right-->
                <li class="page-item">
                    <a class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>

                <!--Last-->
                <li class="page-item">
                    <a class="page-link">Last</a>
                </li>

            </ul>
        </nav>
        <!--Pagination -->

    </section>
    <!--Section: Comments-->
@endsection
