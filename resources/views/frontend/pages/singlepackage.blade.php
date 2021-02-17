@extends('frontend.layout.app')
@section('title','Packages')
@section('content') @foreach($packages as $package)
    <div class="singleclass-page d-flex mt-4">
        <div class="single-class-title">
            <div class="gallery-page row mt-4">
                <div class="gallery col-12">
                    <div class="page-title pt-2 mb-2">
                        <h2>{{$package->name}}</h2>
                    </div>
                </div>
            </div>
            <img class="package-thumbnail-img mb-4"
                 src="@if($package->image ){{ asset('images/package/'. $package->image) }} @else {{ asset('images/profile.jpg')}} @endif"
                 alt="">
            <div>
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item tab-item">
                        <a href="#description" class="nav-link active" data-toggle="tab">Description</a>
                    </li>
                    <li class="nav-item tab-item">
                        <a href="#overview" class="nav-link" data-toggle="tab">Overview</a>
                    </li>
                    <li class="nav-item tab-item">
                        <a href="#itenraries" class="nav-link" data-toggle="tab">Itineraries</a>
                    </li>
                    <li class="nav-item tab-item tab-item">
                        <a href="#cost" class="nav-link" data-toggle="tab">Cost Details</a>
                    </li>
                    <li class="nav-item tab-item">
                        <a href="#p_info" class="nav-link" data-toggle="tab">Practical Information</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content text-justify">
                <div class="tab-pane active" id="description"><span class="desc"
                                                                    style="width:100%"> {!!($package->description) !!}</span>
                </div>
                <div class="tab-pane fade" id="overview"><span class="desc"
                                                               style="width:100%">{!! ($package->overview) !!}</span></div>

                <div class="tab-pane fade" id="itenraries"><span class="desc"
                                                                 style="width:100%">{!! ($package->itenararies) !!}</span>
                </div>
                <div class="tab-pane fade" id="cost"><span class="desc"
                                                           style="width:100%">{!! ($package->cost_details) !!}</span>
                </div>
                <div class="tab-pane fade" id="p_info"><span class="desc"
                                                             style="width:100%">{!! ($package->practical_info) !!}</span>
                </div>
            </div>

            <p class="single-class-overview mt-3" align="justify"></p>
        </div>
        <div class="class-info" align="center">
            <div class="dabba pr-2">
                <div class="gallery-page row ">
                    <div class="book-dabba col-12">
                        <div class="gallery-c pl-3 pt-2 mb-2">
                            <img src="/images/buddhist-yoga.png" class="img-yoga mt-2 mb-4">
                            <h4>{{$package->name}}</h4>
                            <h5 class="click-book-btn mt-4" style="line-height: 1.8em;">Click to this button below to
                                book <br> this yoga package.
                            </h5>
                        </div>
                    </div>
                </div>
                <img src="/images/arrow.gif" class="img=gif mt-3 pb-4">
                <br>
            </div>
            <a href="{{ Route('booking', $package->id) }}"
               class="btn btn btn-default book-now-btn mt-4 p-2 font-weight-bold px-4 btn-block"
               style="font-size:20px;">BOOK NOW</a>
        </div>
    </div>
@endforeach
@endsection