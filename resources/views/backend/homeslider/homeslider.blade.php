@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Homeslider</h2>
 
   <a class="btn btn-info add-btn" href="{{ Route('homeslider.create') }}" ><i
      class="fa fa-plus-circle"></i> Add New</a>

</div>
<div class="table-responsive">
   <table class="table table-bordered"  id="table">
   <thead>
      <tr>
         <th width="4%">No.</th>
         <th width="12%">Image</th>
         <th width="12%">Caption title</th>
         <th width="15%">Caption details </th>
         <th width="7%">Modify</th>
      </tr>
   </thead>
   <tbody>
      @foreach($homeslider as $create=>$slider)
      <tr>
         <td>{{$create+1}}</td>
         <td>
            @foreach(explode(', ', $slider->image) as $image)
            <img style="height: 35px; width: 35px;" src="/images/homeslider/{{ $image }}">
            @endforeach
         </td>
         <td>{{$slider->carousel_caption_title}}</td>
         <td>{{$slider->carousel_caption_detail}}</td>
         <td>
            <div class="btn-group">
               <a href="" class="btn btn-danger btn-sm" 
                            data-sliderid= {{$slider->id}}
                            data-toggle="modal" data-target="#sliderDelete"><i
                            class="fa fa-trash"></i></a>
               </form>
            </div>
         </td>
      </tr>
      @endforeach 
   </tbody>
</table>
<!-- Delete Modal -->
<div id="sliderDelete" class="modal fade">
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
                           <input type="hidden" name="slider_id" id="slider_id" value="">
                       
                       
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