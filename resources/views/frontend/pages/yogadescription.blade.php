@extends('frontend.layout.app')
@section('content')
    @foreach ($singleclass as $list)
        <div class="singleclass-page d-flex mt-4">
            <div class="single-class-title ">
                <div class="row mt-4">
                    <div class=" col-12">
                        <div class="page-title pt-2 mb-2">
                            <h2>{{$list->name}}</h2>
                        </div>
                    </div>
                </div>
                <img class="package-thumbnail-img mb-4" src="{{asset('type/'.$list->image) }}" alt="">

                <div class="package-content text-justify">
                    <div class="package-feature">
                        <p class="card-text-description" style="font-size: 15px">{{$list->description}}</p>
                    </div>
                </div>

            </div>
            <div class="class-info" align="center">
                <div class="enquiry">
                    <div class="enquiry-title py-2 pl-2">
                        Get in Touch
                        <small>(Any Enquiry)</small>
                    </div>
                    <div class="enquiry-form m-4">
                        <form class="form-enquiry" action=" {{ route('enquiry.store') }} " method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full name" name="name" required>
                                <span style="color:red">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group ">
                                <input type="email" class="form-control mt-3" placeholder="Email" name="email" required>
                                <span style="color:red">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control mt-3" placeholder="Subject" name="subject"
                                       required>
                                <span style="color:red">{{$errors->first('subject')}}</span>
                            </div>
                            <div class="form-group">
                            <textarea class="form-control rounded-0 mt-3" placeholder="Enter description here"
                                      id="exampleFormControlTextarea1" rows="5" name="description" required></textarea>
                                <span style="color:red">{{$errors->first('description')}}</span>
                            </div>
                            <button type="submit" class="btn btn-default booking-btn mt-3"> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection