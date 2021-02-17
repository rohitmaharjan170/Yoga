@extends('frontend.layout.app')
@section('title','Booking')
@section('content')
<div class="booking d-flex mt-4 container">
   <div class="booking-form">
      <div class="page-title pt-2 mb-2">
         <h3>BOOKING FORM</h3>
      </div>
      <p>If you want to take part to make healthy and happy life then fill the form below and submit to us. We'll contact you as soon as possible!</p>

      <form action="{{ route('booking.store') }}" method="post" >
         @csrf
         <div class="form-group col-md-12">
            <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
         </div>
         <div class="form-group col-md-12 p-0">
            <input type="text" class="form-control" name="package_name" value="{{$package->name}}" readonly>
         </div>
         <div class="name form-row mt-4">
            <div class="form-group col-md-12">
               <input type="text" class="form-control" placeholder="Full Name" name="name"  required>
               <span style="color:red">{{$errors->first('name')}}</span>
            </div>
         </div>
         <div class="email form-row mt-1">
            <div class="form-group col-md-6">
               <input type="email" class="form-control" placeholder="Email" name="email"  required>
               <span style="color:red">{{$errors->first('email')}}</span>
            </div>
            <div class="form-group  col-md-6">
               <input class="form-control" type="tel" placeholder="Enter your mobile number"
                  name="mobileNo"  required>
               <span style="color:red">{{$errors->first('mobile')}}</span>
            </div>
         </div>
         <div class="form-group">
            <input class="form-control" type="text" placeholder="Enter your country name and full address"
               name="country"  required>
            <span style="color:red">{{$errors->first('country')}}</span>
         </div>
         <div class="form-group">
            <input type="date" class="form-control" placeholder="Date" name="issueDate" required> 
            <span style="color:red">{{$errors->first('issueDate')}}</span>
         </div>
         <div class="description-booking">
            <textarea class="form-control rounded-0" placeholder="Enter description here" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
         </div>
         <button type="submit" class="btn btn-default booking-btn mt-3 ">
         Submit
         </button>
      </form>
   </div>
</div>
@endsection