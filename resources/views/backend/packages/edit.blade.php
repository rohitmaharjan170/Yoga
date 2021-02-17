@extends('backend.layouts.master')

@section('content')
<div class="admin-pckg p-4">
        <h2>Edit Packages</h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <form action="{{route('package.update',$package->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                             @method('PATCH')
                             @include('backend.packages.form')
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

