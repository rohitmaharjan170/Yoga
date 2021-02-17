@extends('backend.layouts.master')

@section('content')

    <div class="admin-pckg p-4">
        <h2>Instructor List</h2>
        <a class="btn btn-info add-btn" data-toggle="modal" data-target="#ModalLoginForm"><i
                    class="fa fa-plus-circle"></i> Add New</a>
    </div>

    <!-- Modal HTML Markup -->
    <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">New Instructor</h1>
                </div>
                <form role="form" method="post" action="{{route('store')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}

                    <div class="modal-body">

                        @include('backend.instructor.form')
                        <div class="form-group">
                            <div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Edit Modal -->
    <div id="edit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit Instructor</h1>
                </div>
                <form role="form" method="post" action="{{route('update')}}" enctype="multipart/form-data">

                    {{ csrf_field()}}


                    <div class="modal-body">
                        <input type="hidden" name="instructor_id" id="instructor_id" value="">
                        @include('backend.instructor.form')
                        <div class="form-group">
                            <div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <br/>

    <!-- Delete Modal -->
    <div id="delete" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center"> Delete Confirmation</h2>
                </div>
                <form role="form" method="get" action="{{route('delete')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}


                    <div class="modal-body">

                        <p class="text-center">
                            Are you sure you want to delete this record?
                        </p>
                        <input type="hidden" name="instructor_id" id="instructor_id" value="">


                        <div class="form-group text-center">
                            <div>

                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

{{-- instructor show --}}
    <div id="show" class="modal fade">
        <div class="modal-dialog" style="max-width: 800px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Instructor Detail</h1>
                </div>
                     <div class="modal-body">
                        <input type="hidden" name="instructor_id" id="instructor_id" value="">
                           <div class="row">
                               <div class="class col-6">
                                    <img src="" id="image" style="max-width:350px">
                               </div>
                               <div class="class col-6">
                                  
                                

                                    <div class="row">
                                        <div class="col-lg-5 font-weight-bolder">
                                           <h5> Name</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="card-text" id="name"></p>
                                        </div>
                                    </div>
                                <div class="row my-4">
                                    <div class="col-lg-5 font-weight-bolder">
                                       <h5> Designation</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="card-text" id="designation"></p>
                                    </div>
                                </div>


                              

                                    <div class="description" style="margin-left: 4px;">
                                        <h5 >Description:</h5>
                                            <p id="description" align="justify"></p>
                                    </div>
                                            
                                  
                                   
                               </div>
                           </div>

                        <div class="form-group row mt-4 ml-4"> 
                            <div class="col-8"></div>
                            <div class="col-4">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="table-responsive">
        <table class="table table-bordered"  id="table">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Designation</th>
            <th>Description</th>
            <th width="12%">Action</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($instructors as $index=>$instructor)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$instructor->name}}</td>
                <td><img src="/instructor/{{$instructor->image}}" style="height: 35px; width:35px;"></td>
                <td>{{$instructor->designation}}</td>
                <td>{{str_limit($instructor->description,50)}}</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm" data-myname="{{$instructor->name}}"
                        data-mydesignation="{{$instructor->designation}}"
                        data-mydescription="{{$instructor->description}}"
                        data-instructorid={{$instructor->id}}
                        data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm"
                        data-instructorid={{$instructor->id}}
                        data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></a>
                    <a href="" class="btn btn-info btn-sm" data-myname="{{$instructor->name}}"
                        data-mydesignation="{{$instructor->designation}}"
                        data-mydescription="{{$instructor->description}}"
                        data-myimage="/instructor/{{$instructor->image}}"
                        data-instructorid={{$instructor->id}}
                        data-toggle="modal" data-target="#show">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection






