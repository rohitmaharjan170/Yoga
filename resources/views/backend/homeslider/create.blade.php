@extends('backend.layouts.master')
@section('content')
<div class="admin-pckg p-4">
   <h2>Add Sliders</h2>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{route('homeslider.store')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label class="control-label">Image</label>
                     <div>
                        <input type="file" class="form-control input-lg" name="image[]" id="image"  value="@if($homeslider){{ $homeslider->image }}@else{{old('image')}}@endif" multiple>                            
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">Carousel-caption-title</label>
                     <div>
                        <input type="text" class="form-control input-lg" name="carousel_caption_title">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">Carousel-caption-detail</label>
                     <div>
                        <textarea class="form-control input-lg" name="carousel_caption_detail"></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-sm-right" onsubmit="alert('success');">
                  Add
                  </button>                
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection