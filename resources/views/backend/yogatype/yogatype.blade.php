@extends('backend.layouts.master')

@section('content')
    <div class="admin-pckg p-4">

        <h2>Different Types Of Yoga</h2>

        <a class="btn btn-info add-btn" data-toggle="modal" data-target="#ModalLoginForm">
            <i
      class="fa fa-plus-circle"></i> &nbsp Add New
        </a>
    </div>

    <!-- Modal HTML Markup -->
    <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">New Yoga</h1>
                </div>
                        <form role="form" method="post" action="{{route('typestore')}}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            
                            <div class="modal-body">
                                
                                @include('backend.yogatype.form2')
                                <div class="form-group">
                                    <div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" >Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="typeedit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit Schedule</h1>
                </div>
                        <form role="form" method="POST" action="{{route('typeupdate')}}" enctype="multipart/form-data">
                        
                            {{ csrf_field()}}
                            
                            <div class="modal-body">
                                <input type="hidden" name="yogatype_id" id="yogatype_id" value="">
                                    
                                @include('backend.yogatype.form2')
                            
                                    
                                <div class="form-group">
                                    <div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" >Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div><!-- /.modal-content -->
        </div>
    </div>


    <!-- Delete Modal -->
    <div id="typedelete" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center"> Delete Confirmation</h2>
                </div>
                        <form role="form" method="get" action="{{route('typedelete')}}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            
                            
                            <div class="modal-body">

                                <p class="text-center">
                                    Are you sure you want to delete this record?
                                </p>
                                <input type="hidden" name="yogatype_id" id="yogatype_id" value="">
                            
                            
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

    <div class="table-responsive">
        <table class="table table-bordered"  id="table">
            <thead>
                <tr>
                <th>S.No</th>
                <th width="20%">Name</th>
                <th width="12%">Image</th>
                <th width="50%">Description</th>
                <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($yogatypes as $index=>$yogatype)
                    <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$yogatype->name}}</td>
                    <td><img style="height: 35px; width: 35px;" src="{{ asset('type/'.$yogatype->image) }}"></td>
                    <td>{{str_limit($yogatype->description,50)}}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-myname="{{$yogatype->name}}" 
                            data-mydescription="{{$yogatype->description}}" 
                            data-yogatypeid= {{$yogatype->id}}
                            data-toggle="modal" data-target="#typeedit"><i
                            class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm" 
                            data-yogatypeid= {{$yogatype->id}}
                            data-toggle="modal" data-target="#typedelete"><i
                            class="fa fa-trash"></i></a>
                        <a href="" class="btn btn-info btn-sm" 
                            data-myname="{{$yogatype->name}}"
                            data-mydescription="{{$yogatype->description}}"
                            data-myimage="{{ asset('type/'.$yogatype->image) }}"
                            data-yogatypeid="{{$yogatype->id}}"
                            data-toggle="modal" data-target="#yogaTypeShow"><i
                            class="fa fa-eye"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
            
            </tbody>
    </table>
    <div id="yogaTypeShow" class="modal fade">
        <div class="modal-dialog" style="max-width: 800px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">YogaType Details</h1>
                </div>
                     <div class="modal-body">
                     
                            <img class="yogatype-img" id="image">
                      

                        <div class="row mt-4">
   <div class="col-lg-3 label" ><h4 class="labelko font-weight-bolder">Name:</h4>
   </div>
   <div class="col-lg-8 detail">
      <span id="name"></span>
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
     
@endsection