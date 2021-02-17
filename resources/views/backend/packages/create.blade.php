@extends('backend.layouts.master')

@section('content')
<div class="admin-pckg p-4">
        <h2>Add Packages</h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('package.store')}}" method="POST" enctype="multipart/form-data">      
                        {{ csrf_field() }}
                                @include('backend.packages.form')          
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

