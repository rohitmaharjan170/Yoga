@extends('backend.layouts.master')
@section('content')
<h2 class="title m-3">Enquiry</h2>
@foreach($enquiry as $enquiries)
<div class="card m-2">
   <div class="card-body p-3">
      <h4>Name:</h4>
      <div class="table-responsive panel mb-5">
         {!!($enquiries->name) !!}
      </div>
      <h4>Email:</h4>
      <div class="table-responsive panel mb-5">
         {!! ($enquiries->email) !!}
      </div>
      <h4>Subject:</h4>
      <div class="table-responsive panel mb-5">
         {!! ($enquiries->subject) !!}
      </div>
      <h4> Description:</h4>
      <div class="table-responsive panel mb-5">
         {!! ($enquiries->description) !!} 
      </div>
   </div>
</div>
@endforeach
@endsection