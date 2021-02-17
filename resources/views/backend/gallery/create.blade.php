@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Add gallery images</h2>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{route('galleries.store')}}" method="POST"  enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label class="control-label">Image</label>
                     <div>
                        <input type="file" class="form-control input-lg" name="image[]" id="image"  value="" multiple>                            
                     </div>
                     <button type="submit" class="btn btn-primary float-sm-right" onsubmit="alert('success');">
                        Add Image
                        </button> 
                  </div>        
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection