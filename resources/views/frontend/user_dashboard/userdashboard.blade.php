@extends('frontend.layout.app')
@section('title','User Profile')
@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="page-title pt-2 mb-2">
                    <h1>USER PROFILE</h1>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="profile-sidebar col-sm-12 col-lg-3 p-0">
                <ul class="nav nav-pills nav-sidebar navigation pl-3">
                    <li class="nav-item active ">
                        <a data-toggle="tab" href="#info"
                           class="nav-link">
                            <i class='nav-icon fas fa-cogs'></i>
                            <p><strong> User Info</strong></p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a data-toggle="tab" href="#booking"
                           class="nav-link">
                            <i class="nav-icon fas fa-box-open"></i>
                            <p><strong> Booking Details </strong></p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-content col-sm-12 col-lg-8 tab-content mb-5">

                @if(count($package) >0)
                <div id="booking" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table table-bordered"  id="table">
                        <thead style="background: darkcyan; color: white">
                        <tr>
                            <th width="4%">No.</th>
                            <th width="15%">Package name</th>
                            <th width="5%">Email</th>
                            <th width="10%">Country</th>
                            <th width="10%">Mobile No</th>
                            <th width="15%">Issue Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($package as $create=>$packages)
                            <tr>
                                <td>{{$create+1}}</td>
                                <td>{{$packages->pname}}</td>
                                <td>{{$packages->email}}</td>
                                <td>{!!$packages->country!!}</td>
                                <td>{!!$packages->mobileNo!!}</td>
                                <td>{!!$packages->issuedate!!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                    @else
                    <div id="booking" class="tab-pane fade">
                        <div class="user-booking-btn">
                            <h3 class="page-title">Your Booking list is empty</h3>
                            <h5 class="my-2">You can check our listed packages</h5>
                            <a href="{{route('packages')}}">View Packages</a>
                        </div>
                    </div>
                @endif

                <div id="info" class="tab-pane active ">
                    <div class="panel">
                        <form action="{{ route('update.dashboard',$user->id) }}" method="POST">
                            @csrf

                            <div class="form-row justify-content-center">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name" style="color: #0a0a0a;"><strong>Name</strong></label>
                                    <input type="text" class="form-control" id="name" value="{{ $user->name }}"
                                           name="name" required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email" style="color: #0a0a0a;"><strong>Email</strong></label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}"
                                           required>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>

                                </div>
                                <button type="submit" class="btn btn-primary col-6 col-md-4 mt-3"
                                        style="background: darkcyan">Update
                                </button>
                                {{--@if(session()->has('notif'))--}}
                                {{--<strong> Notification:</strong>--}}
                                {{--{{session()->get('notif')}}--}}
                                {{--@endif--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

