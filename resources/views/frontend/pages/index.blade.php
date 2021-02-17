@extends('frontend.layout.app')
@section('content')
    <!-- slider -->
    <div id="carouselExampleControls" class="carousel slide home-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($homeslider as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('images/homeslider/'. $slider->image) }} "
                         alt="First slide">
                    <div class="carousel-caption">
                        <h1 class="display-2 animated bounce">{{$slider->carousel_caption_title}}</h1>
                        <p class="title-details animated fadeInLeft">{{$slider->carousel_caption_detail}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--end of slider-->
    <!-- yoga changes your life part -->
    <div class="title" align="center">
        <h1>Yoga Changes Your Life</h1>
        <p>"Yoga is the journey of the self, through the self, to the self."</p>
        <p>-- The Bhagavad Gita</p>
    </div>
    <div class="yoga-features d-flex mt-4 container">
        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column">
            <div class="feature1 d-flex flex-row align-items-center">
                <div class="feature-icon mt-n3 mr-3">
                    <img src="/images/bell.png">
                </div>
                <div class="features">
                    <h4 class="feature-topic">Stress Relief</h4>
                    <span>Yoga works at the physical, emotional, mental, and spiritual levels,
                        thus helping to connect the mind to the body.</span>
                </div>
            </div>
            <div class="feature2 d-flex flex-row mt-5 align-items-center">
                <div class="feature-icon mt-n3">
                    <img src="/images/brain.png">
                </div>
                <div class="features">
                    <h4 class="feature-topic">All-round fitness</h4>
                    <span>It supports the lymphatic system that protects the body from disease and infection.</span>
                </div>
            </div>
            <div class="feature3 d-flex flex-row mt-5 align-items-center">
                <div class="feature-icon mt-n3">
                    <img src="/images/heart.png">
                </div>
                <div class="features mt-2">
                    <h4 class="feature-topic">Inner Peace</h4>
                    <span>You cannot always control what goes on outside. But you can always control what goes on inside</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mt-n2 home-feature-image" align="center">
            <img class="feature-image" src="/images/girl.png" alt="girl image">
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column mobile-margin">
            <div class="feature1 d-flex flex-row align-items-center">
                <div class="feature-icon mt-n3">
                    <img src="/images/weigh.png">
                </div>
                <div class="features mt-2">
                    <h4 class="feature-topic">Weight Loss</h4>
                    <span>Yoga helps to burn calories and get toned muscles with improved flexibility. </span>
                </div>
            </div>
            <div class="feature2 d-flex flex-row mt-5 align-items-center">
                <div class="feature-icon  mt-n3">
                    <img src="/images/bulb.png">
                </div>
                <div class="features mt-2">
                    <h4 class="feature-topic">Increased Energy</h4>
                    <span>It supports the lymphatic system that protects the body from disease and infection.</span>
                </div>
            </div>
            <div class="feature3 d-flex flex-row mt-5 align-items-center">
                <div class="feature-icon  mt-n3 mr-4">
                    <img src="/images/yoga.png" style="width: 100%">
                </div>
                <div class="features">
                    <h4 class="feature-topic">Flexibility and Posture</h4>
                    <span>Yoga gradually enhances flexibility when practiced daily. The Yoga postures work efficiently in
                        building hamstring flexibility that influences trunk movements.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end of yoga changes your life-->


    <!--classes-->

    <section id="car">
        <div class="title" align="center">
            <h1>Featured Classes</h1>
            <p>KarnaliYoga Center organizes various Yoga classes.</p>
        </div>
        <div class="carousel-trainer-properties mt-3">
            <div class="owl-one owl-carousel owl-theme" id="owl-one">
                @foreach ($classlist as $classlists)
                    <div class="item">
                        <div class="card trainer">
                            <img class="card-img-top" src="{{ asset('type/'. $classlists->image) }}"
                                 alt="Card image cap">
                            <div class="card-body" align="justify">
                                <h4 class="trainer-name" style="font-family: Bebas Neue; ">{{$classlists->name}}</h4>
                                <p class="trainer-description "
                                   align="justify">{!! str_limit($classlists->description, 100) !!}</p>
                                <a class="details-package" href="{{ Route('yogadescription', $classlists->id) }}">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--end of classes -->

    <div class="yoga-in-nepal row">
        <div class="guru nepal col-12 col-md-6">
            <img class="img-responsive" src="{{ asset('images/20.jpeg') }}"
                 alt="Card image cap">
            <div class="contents-nepal-left">
                <h1 class="mb-4">Yoga In Nepal</h1>
                <p>Nepal is the original home if Yoga, Eastern</p>
                <p>philosophy and wisdom</p>
                <a class="mt-4 subscribe button-nepal" href="{{Route('yogaNepal')}}">Learn More</a>
            </div>
        </div>
        <div class="guru nepal-guru col-12 col-md-6">
            <div class="contents-nepal ">
                <h1 class="mb-4">Know Your Teacher</h1>
                <p>Nepal Yoga Academy is run by an experienced Yoga</p>
                <p> Guru who has been blessed by Swamis, yoga and </p>
                <p> spiritual gurus in India and Nepal . . . </p>
                <a class="mt-4 subscribe button-trainer" href="{{Route('trainer')}}">Learn More</a>
            </div>
        </div>
    </div>
    <!-- trainers -->
    <section id="car">
        <div class="title" align="center">
            <h1>Our Yoga Retreats</h1>
            <p>KarnaliYoga center provides you the best retreats.</p>
        </div>
        <div class="carousel-trainer-properties mt-3">
            <div class="owl-two owl-carousel owl-theme" id="owl-two">
                @foreach ($packages as $package)
                    <div class="item">
                        <div class="card trainer">
                            <img class="card-img-top" src="{{ asset('images/package/'. $package->image) }}"
                                 alt="Card image cap">
                            <div class="card-body" align="justify">
                                <h4 class="trainer-name" style="font-family: Bebas Neue; ">{{$package->name}}</h4>
                                <p class="trainer-description "
                                   align="justify">{!! str_limit($package->description, 100) !!}</p>
                                <a class="details-package"
                                   href="{{ Route('single.package', $package->id) }}">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of trainers -->


@endsection