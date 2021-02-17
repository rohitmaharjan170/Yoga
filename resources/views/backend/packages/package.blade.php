@extends('backend.layouts.master')
@section('content')
    <div class="admin-pckg p-4">
        <h2>PACKAGES</h2>
        <a class="btn btn-info add-btn" href="{{ Route('package.create') }}"><i
                    class="fa fa-plus-circle"></i> Add New</a>
    </div>

     <!-- Delete Modal -->
     <div id="packagedelete" class="modal fade">
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
                                <input type="hidden" name="package_id" id="package_id" value="">
                            
                            
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
            <th width="4%">No.</th>
            <th width="9%">Package name</th>
            <th width="5%">Cost</th>
            <th width="5%">Image</th>
            <th width="3%">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $create=>$package)
            <tr>
                <td>{{$create+1}}</td>
                <td>{{$package->name}}</td>
                <td>{{$package->cost}}</td>
                <td>
                    @foreach(explode(', ', $package->image) as $image)
                        <img style="height: 35px; width: 35px;" src="/images/package/{{ $image }}">
                    @endforeach
                </td>
                <td class="action-table">
                    <a title="Edit" href="{{route('package.edit', $package->id)}}" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></a>
                    <div class="btn-group">
                        <a title="View" href="{{ Route('package.show',$package->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-eye"></i></a>
                    </div>



                    <a href="" class="btn btn-danger btn-sm" 
                            data-packageid= {{$package->id}}
                            data-toggle="modal" data-target="#packagedelete"><i
                            class="fa fa-trash"></i></a>

                    {{--<form --}}
                          {{--action="{{ route('package.destroy',$package->id) }}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input type="hidden" name="_method" value="DELETE"/>--}}
                        {{--<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>--}}
                    {{--</form>--}}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
