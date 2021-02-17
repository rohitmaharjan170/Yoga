@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Booking Details</h2>
</div>

   <div class="table-responsive">
      <table class="table table-bordered"  id="table">
   <thead>
      <tr>
         <th width="4%">Id</th>
         <th width="9%">Package Name</th>
         <th width="10%">Name</th>
         <th width="15%">Email</th>
         <th  width="15%">Country</th>
         <th width="15%">Mobile No</th>
         <th width="15%">Issue Date</th>
         <th width="15%">Description</th>
         <th width="10%">Action</th>
      </tr>
   </thead>
   <tbody>
           @foreach($bookings as $create=>$booking)
      <tr>
         <td>{{$create+1}}</td>
         <td>{{$booking->package->name}}</td>
         <td>{{$booking->name}}</td>
         <td>{{$booking->email}}</td>
         <td>{{$booking->country}}</td>
         <td>{{$booking->mobileNo}}</td>
         <td>{{$booking->issuedate}}</td>
         <td>{{str_limit($booking->description,50)}}</td>
         <td>
         <div class="btn-group">
            <a href="" class="btn btn-danger btn-sm" 
            data-bookingid= {{$booking->id}}
            data-toggle="modal" data-target="#bookingDelete"><i
            class="fa fa-trash"></i></a>
              &nbsp;
               <a href="" class="btn btn-info btn-sm fa fa-eye" data-myname="{{$booking->name}}"
                  data-myemail="{{$booking->email}}"
                  data-mydescription="{{$booking->description}}"
                  data-issuedate = "{{ $booking->issuedate}}"
                  data-bookingid="{{$booking->id}}"
                  data-country="{{$booking->country}}"
                  data-mobileno="{{$booking->mobileNo}}"
                  data-toggle="modal" data-target="#bookingShow">
              </a>
            </div>
         </td>
      </tr>
      @endforeach 
   </tbody>

</table>
<div id="bookingShow" class="modal fade">
   <div class="modal-dialog" style="max-width: 800px;" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h1 class="modal-title">Booking Details</h1>
           </div>
                <div class="modal-body">
                   <input type="hidden" name="booking_id" id="booking_id" value="">
                           
                                  

<div class="row mt-4">
   <div class="col-lg-3 label" >
      <h4 class="labelko font-weight-bold">Name:</h4>
   </div>
   <div class="col-lg-8  detail">
      <span id="name"></span>
   </div>
</div>

<div class="row mt-4">
   <div class="col-lg-3 label" >
      <h4 class="labelko font-weight-bolder">Email:</h4>
   </div>
   <div class="col-lg-8  detail">
      <span id="email"></span>
   </div>
</div>


<div class="row mt-4">
   <div class="col-lg-3  label" >
      <h4 class="labelko font-weight-bolder">Country:</h4>
   </div>
   <div class="col-lg-8  detail">
      <span id="country"></span>
   </div>
</div>

<div class="row mt-4">
   <div class="col-lg-3 label" >
      <h4 class="labelko font-weight-bolder">Mobile Number:</h4>
   </div>
   <div class="col-lg-8 detail">
      <span id="mobileNo"></span>
   </div>
</div>

<div class="row mt-4">
   <div class="col-lg-3 label" >
      <h4 class="labelko font-weight-bolder">Issue Date:</h4>
   </div>
   <div class="col-lg-8 detail">
      <span id="issuedate"></span>
   </div>
</div>

<div class="row mt-4">
   <div class="col-lg-3 label" >
      <h4 class="labelko font-weight-bolder">Description:</h4>
   </div>
   <div class="col-lg-8 detail" align="justify">
      <span id="description"></span>
   </div>
</div>
  
<div class="modal-btn mt-4" align="center">

<button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
</div>
      

                             
                          </div>
                      </div>

             
       </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Delete Modal -->
<div id="bookingDelete" class="modal fade">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h2 class="modal-title text-center"> Delete Confirmation</h2>
           </div>
                   <form id="modal-form" role="form" method="post" action="" enctype="multipart/form-data">
                       {{ csrf_field()}}
                       
                       @method('delete')
                       <div class="modal-body">

                           <p class="text-center">
                               Are you sure you want to delete this record?
                           </p>
                           <input type="hidden" name="booking_id" id="booking_id" value="">
                       
                       
                       <div class="form-group text-center">
                               <div>
                                   
                                   <button type="submit" class="btn btn-danger" >Delete</button>
                                   <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                               </div>
                           </div>
                   
                       </div>
                   </form>
       </div>
   </div>
</div> 

@endsection