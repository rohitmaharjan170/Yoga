@extends('frontend.layout.app')
@section('content')
    <div class=" row mx-4 mt-4">
        <div class=" col-12">
            <div class="page-title pt-2 mb-2">
                <h2>PACKAGES</h2>
            </div>
        </div>
    </div>
    <!-- packages -->

    <div class="packages-area  my-3 mx-4 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8" id="all-package-list">
                    @if(count($packages) == 0)
                        <div class="message-box">
                            There are no Packages in this destination
                        </div>
                    @endif
                <!-- Single Room Area -->
                    @foreach($packages as $package)
                        <div class="single-package-area row mb-5">
                            <!-- Room Thumbnail -->
                            <div class="package-thumbnail col-6">
                                <img class="package-thumbnail-img"
                                     src="@if($package->image ){{ asset('images/package/'. $package->image) }} @else {{ asset('images/profile.jpg')}} @endif"
                                     alt="">
                            </div>
                            <!-- Room Content -->
                            <div class="package-content col-6">
                                <h2>{{$package->name}}</h2>
                                <span>
                     <h4 class="pckgcost mt-4 font-weight-bold">$ {{$package->cost}}</h4>
                  </span>
                                <div class="package-feature">
                                    <h3>
                                        Description:
                                    </h3>
                                    <h4 class="desc mt-2"><span class="desc"
                                                                style="width:100%">{!! substr($package->description,0,300) !!}</span>
                                    </h4>
                                </div>
                                <a href="{{ Route('single.package',$package->id) }}"
                                   class="btn btn btn-default view-detail-btn mt-n2">View
                                    Details &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="enquiry">
                        <div class="enquiry-title py-2 pl-2">
                            Get in Touch
                            <small>(Any Enquiry)</small>
                        </div>
                        <div class="enquiry-form m-4">
                            <form class="form-enquiry" action=" {{ route('enquiry.store') }} " method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full name" name="name"
                                           required>
                                    <span style="color:red">{{$errors->first('name')}}</span>
                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control mt-3" placeholder="Email" name="email"
                                           required>
                                    <span style="color:red">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group ">
                                    <input type="text" class="form-control mt-3" placeholder="Subject" name="subject"
                                           required>
                                    <span style="color:red">{{$errors->first('subject')}}</span>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control rounded-0 mt-3" placeholder="Enter description here"
                                              id="exampleFormControlTextarea1" rows="5" name="description"
                                              required></textarea>
                                    <span style="color:red">{{$errors->first('description')}}</span>
                                </div>
                                <button type="submit" class="btn btn-default booking-btn mt-3"> Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$packages->links()}}
@endsection