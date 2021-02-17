@extends('backend.layouts.master')

@section('content')
    <div class="admin-pckg p-4">

        <h2>Time Period For Daily Yoga Classes</h2>

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
                    <h1 class="modal-title">New Schedule</h1>
                </div>
                <form role="form" method="POST" action="{{route('classstore')}}" enctype="multipart/form-data">

                    {{ csrf_field()}}

                    <div class="modal-body">

                        @include('backend.yogaclass.form1')

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

    <!-- Edit -->
    <div id="classedit" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Edit Schedule</h1>
                </div>
                <form role="form" method="POST" action="{{route('classupdate')}}" enctype="multipart/form-data">

                    {{ csrf_field()}}

                    <div class="modal-body">
                        <input type="hidden" name="yogaclass_id" id="yogaclass_id" value="">

                        @include('backend.yogaclass.form1')

                        <div class="form-group">
                            <div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Delete Modal -->
    <div id="classdelete" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center"> Delete Confirmation</h2>
                </div>
                <form role="form" method="get" action="{{route('classdelete')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}


                    <div class="modal-body">

                        <p class="text-center">
                            Are you sure you want to delete this record?
                        </p>
                        <input type="hidden" name="yogaclass_id" id="yogaclass_id" value="">


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


    <div class="table-responsive">
        <table class="table table-bordered"  id="table">
        <thead>
        <tr>
            <th>Time</th>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thrus</th>
            <th>Fri</th>
            <th>Sat</th>
            <th width="10%">Action</th>

        </tr>
        </thead>
        <tbody>

        @foreach($yogaclasses as  $yogaclass)
            <tr>
                <td>{{$yogaclass->time}}</td>
                <td>{{$yogaclass->sunday}}</td>
                <td>{{$yogaclass->monday}}</td>
                <td>{{$yogaclass->tuesday}}</td>
                <td>{{$yogaclass->wednesday}}</td>
                <td>{{$yogaclass->thursday}}</td>
                <td>{{$yogaclass->friday}}</td>
                <td>{{$yogaclass->saturday}}</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm"
                       data-mytime="{{$yogaclass->time}}"
                       data-sun="{{$yogaclass->sunday}}"
                       data-mon="{{$yogaclass->monday}}"
                       data-tue="{{$yogaclass->tuesday}}"
                       data-wed="{{$yogaclass->wednesday}}"
                       data-thurs="{{$yogaclass->thursday}}"
                       data-fri="{{$yogaclass->friday}}"
                       data-sat="{{$yogaclass->saturday}}"
                       data-yogaclassid={{$yogaclass->id}}
                               data-toggle="modal" data-target="#classedit"><i
                               class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm"
                       data-yogaclassid={{$yogaclass->id}}
                               data-toggle="modal" data-target="#classdelete"><i
                               class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>

@endsection

