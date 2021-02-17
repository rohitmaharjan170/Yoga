@extends('backend.layouts.master')

@section('content')

    <div class="admin-pckg p-4">
            <h2>User Details</h2>
            
    </div>

    <table class="table table-responsive-sm table-bordered" id="table">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            
        </tr>
        </thead>
        <tbody>

        @foreach($users as $index=>$user)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection