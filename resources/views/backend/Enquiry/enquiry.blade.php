@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Enquiry</h2>
</div>
<div class="table-responsive">
   <table class="table table-bordered"  id="table">
   <thead>
      <tr>
         <th width="4%">Id</th>
         <th width="15%">Name</th>
         <th width="10%">Email</th>
         <th  width="10%">Subject</th>
         <th width="15%">Description</th>
         <th width="5%">Action</th>
      </tr>
   </thead>
   <tbody>
      @foreach($enquiry as $create=>$enquiries)
      <tr>
         <td>{{$create+1}}</td>
         <td>{{$enquiries->name}}</td>
         <td>{{$enquiries->email}}</td>
         <td>{{$enquiries->subject}}</td>
         <td>{{$enquiries->description}}</td>
         <td>
            <div class="btn-group">
               <a title="View" href="{{ Route('enquiry.show',$enquiries->id) }}" class="btn btn-info btn-sm"><i
                  class="fa fa-eye"></i></a>
            </div>
            <div class="btn-group">
               <a href="" class="btn btn-danger btn-sm" 
                            data-enquiriesid= {{$enquiries->id}}
                            data-toggle="modal" data-target="#enquiriesDelete"><i
                            class="fa fa-trash"></i></a>
            </div>
         </td>
      </tr>
      @endforeach 
   </tbody>
</table>
 <!-- Delete Modal -->
 <div id="enquiriesDelete" class="modal fade">
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
                           <input type="hidden" name="enquiries_id" id="enquiries_id" value="">
                       
                       
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