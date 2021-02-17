@extends('frontend.layout.app')
@section('content')
    <div class="gallery-page d-flex mx-5 mt-4">
        <div class="gallery">
            <div class="page-title pt-2 mb-2">
                <h2>GALLERY</h2>
            </div>
            <div class="gallery-container">
                <div class="tz-gallery">
                    <div class="row">
                        @foreach($gallery as $galleries)
                            <div class="item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="card gallery">
                                    <a class="lightbox" href="{{ asset('images/gallery/'. $galleries->image) }}">
                                        <img src="{{ asset('images/gallery/'. $galleries->image) }}"
                                             class="card-img-top">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection