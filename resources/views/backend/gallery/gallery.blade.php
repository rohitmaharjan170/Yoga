@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Gallery</h2>
 
   <a class="btn btn-info add-btn" href="{{ Route('galleries.create') }}" ><i
      class="fa fa-plus-circle"></i> Add New image</a>

</div>
<div class="table-responsive">
   <table class="table table-bordered"  id="table">
   <thead>
      <tr>
         <th width="4%">No.</th>
         <th width="12%">Image</th>
         <th width="7%">Modify</th>
      </tr>
   </thead>
   <tbody>
      @foreach($gallery as $create=>$galleries)
      <tr>
         <td>{{$create+1}}</td>
         <td>
            @foreach(explode(', ', $galleries->image) as $image)
            <img style="height: 35px; width: 35px;" src="/images/gallery/{{ $image }}">
            @endforeach
         </td>
     
         <td>
            <div class="btn-group">
               <a href="" class="btn btn-danger btn-sm" 
                            data-galleriesid= {{$galleries->id}}
                            data-toggle="modal" data-target="#galleriesDelete"><i
                            class="fa fa-trash"></i></a>
            </div>
         </td>
      </tr>
      @endforeach 
   </tbody>
</table>
  <!-- Delete Modal -->
  <div id="galleriesDelete" class="modal fade">
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
                           <input type="hidden" name="galleries_id" id="galleries_id" value="">
                       
                       
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