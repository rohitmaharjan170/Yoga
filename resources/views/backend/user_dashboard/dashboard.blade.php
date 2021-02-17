@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$yogaClassCount}}</h3>

                        <p>Classes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                <a href="{{route ('yogatype') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$packageCount}}</h3>

                        <p>Packages</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <a href="{{ route('package.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gray-light">
                    <div class="inner">
                        <h3>{{$bookingCount}}</h3>

                        <p>Bookings</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-snowboarding"></i>
                    </div>
                    <a href="{{ route('booking.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary-gradient">
                    <div class="inner">
                        <h3>{{$userCount}}</h3>

                        <p>Website Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection

