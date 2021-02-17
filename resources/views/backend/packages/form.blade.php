<div class="form-group row">
    <div class="package-name col-4">
        <label>Package name</label>
        <input type="text" class="form-control" name="name"
               value="@if($package){{ $package->name }}@else{{ old('name') }}@endif"
               id="name">
    </div>
    <div class="package-cost col-4">
        <label>Cost</label>
        <input type="text" class="form-control" name="cost"
               value="@if($package){{ $package->cost }}@else{{old('cost')}}@endif">
        <span class="text-danger">{{ $errors->first('cost') }}</span>
    </div>
    <div class="pckg-image col-4">
        <label>Image</label>
        <input id="image" type="file"
               class="form-control" name="image[]"
               value="@if($package){{ $package->image }}@else{{old('image')}}@endif" multiple>
        <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
</div>
<div class="form-group row">
    <div class="description col-6">
        <label>Description</label>
        <textarea class="form-control" id="description-ckeditor" name="description">
               @if($package){{ $package->description }}@else{{old('description')}}@endif</textarea>
        <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
    <div class="overview col-6">
        <label>Overview</label>
        <textarea class="form-control" id="overview-ckeditor" name="overview">
               @if($package){{ $package->overview }}@else{{old('overview')}}@endif
               </textarea>
        <span class="text-danger">{{ $errors->first('overview') }}</span>
    </div>
</div>
<div class="form-group row">
    <div class="description col-6">
        <label>Iteneraries</label>
        <textarea class="form-control" id="iteneraries-ckeditor" name="itineraries">
               @if($package){{ $package->itineraries }}@else{{old('itineraries')}}@endif
               </textarea>
        <span class="text-danger">{{ $errors->first('itineraries') }}</span>
    </div>
    <div class="overview col-6">
        <label>Cost-Details</label>
        <textarea class="form-control" id="cost-ckeditor" name="cost_details">
               @if($package){{ $package->cost_details }}@else{{old('cost_details')}}@endif
               </textarea>
        <span class="text-danger">{{ $errors->first('cost_details') }}</span>
    </div>
</div>
<div class="form-group row">
    <div class="description col-6">
        <label>Practical Information</label>
        <textarea class="form-control" id="information-ckeditor" name="practical_info">
               @if($package){{ $package->practical_info }}@else{{old('practical_info')}}@endif
               </textarea>
        <span class="text-danger">{{ $errors->first('practical_info') }}</span>
    </div>
</div>
<button type="submit" class="btn btn-primary float-sm-right">
    {{-- <i class="fa @if($package) fas-refresh @else fas-plus-circle @endif"></i> --}}
    @if($package)
        Update @else Add Package @endif
</button>