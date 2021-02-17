@extends('frontend.layout.app')

@section('content')

<div class="gallery-page row mt-4 mx-4">
        <div class="gallery col-12">
           <div class="page-title pt-2 mb-2">
              <h2>CLASSES SCHEDULE</h2>
           </div>
        </div>
     </div>

    <div class="schedule row mx-4 my-3">
        <div class="col-12">
            <h6>Here below is the time table of the yoga classes in yogalife center.</h6>
            <div class="table-responsive">
                <table class="table table-bordered"  id="table">
            <thead>
                <tr>
                <th scope="col">Time</th>
                <th scope="col">Sun</th>
                <th scope="col">Mon</th>
                <th scope="col">Tue</th>
                <th scope="col">Wed</th>
                <th scope="col">Thurs</th>
                <th scope="col">Fri</th>
                <th scope="col">Sat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedule as $schedules)
                    <tr>
                    <td>{{$schedules->time}}</td>
                    <td>{{$schedules->sunday}}</td>
                    <td>{{$schedules->monday}}</td>
                    <td>{{$schedules->tuesday}}</td>
                    <td>{{$schedules->wednesday}}</td>
                    <td>{{$schedules->thursday}}</td>
                    <td>{{$schedules->friday}}</td>
                    <td>{{$schedules->saturday}}</td>
                    </tr>
                @endforeach
                
              
               
            </tbody>
        </table>
            </div>
        </div>
    </div>

@endsection