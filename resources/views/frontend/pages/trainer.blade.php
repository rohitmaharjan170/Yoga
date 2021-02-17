@extends('frontend.layout.app')

@section('content')

    <section id="car">

        <div class="row mt-4">
            <div class="col-12">
                <div class="page-title pt-2 mb-2">
                    <h2>YOGALIFE TRAINERS</h2>

                </div>
            </div>
        </div>


        <div class="row">
            @foreach ($trainer as $trainers)
                <div class="item col-12 col-md-3">
                    <div class="card trainer ">
                        <img class="card-img-top" src="{{ asset('instructor/'.$trainers->image) }} ">
                        <div class="card-body py-4" align="center">
                            <h4 class="trainer-name" style="font-family: Bebas Neue; ">{{$trainers->name}}</h4>
                            <p class="trainer-title">{{$trainers->designation}}</p>
                            <p class="trainer-description">{{$trainers->description}}</p>
                            <div class="trainer-social-icon d-flex mt-4 align-items-center justify-content-center ml-4">
                                <i class="fab fa-facebook fa-lg mr-4"></i>
                                <i class="fab fa-instagram fa-lg mr-4"></i>
                                <i class="fab fa-twitter fa-md lg-3 mr-4"></i>
                                <i class="fab fa-pinterest fa-lg mr-4"></i>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>


        <!-- </div>
    </div> -->
    </section>

@endsection