@extends('backend.layouts.master')
@section('content')
      <h2 class="title ml-3">Package</h2>
      <div class="row-sm-10 my-2">
        <div class="mx-3 border">
          <div class="mt-2 row justify-content-center">
                <section class="col-10">
                      <div class="card">
                            <div class="card-body">
                              <div class="cost-edit d-flex" style="justify-content:space-between;">
                                <div class="cost">
                                  <h3 class="card-title"> {{ $package->name }}</h3>
                                </div>
                                <div class="edit">
                                    
                          <a title="Edit" href="{{route('package.edit', $package->id)}}" class="btn btn-primary btn-sm"><i
                            class="fa fa-edit"></i></a>
                                </div>
                            </div>
                                 
                            </div>
                            <img style="max-height: 65vh" src="/images/package/{{$package->image}}" alt="" class="card-img-bottom">
                            <div class="card-footer">
                            <h4>$ {{$package->cost}}</h4>
                            </div>
                      </div>
                </section>
          </div>
          <div class="row-sm-10">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0 ">
                    <a style="display:block" data-toggle="collapse" class="collapsed" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="fa" aria-hidden="true"></i>
                      Overview
                    </a>
                  </h5>
                </div>
    
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    {!! $package->overview!!}
                  </div>
                </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a style="display:block" class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa" aria-hidden="true"></i>
                        Description
                      </a>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      {!! $package->description!!}
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <a style="display:block" class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa" aria-hidden="true"></i>
                        Itineraries
                      </a>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      {!! $package->itineraries !!}
                    </div>
                  </div>
                </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <a style="display:block" class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <i class="fa" aria-hidden="true"></i>
                      Cost Details
                    </a>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                  <div class="card-body">
                    {!! $package->cost_details !!}
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h5 class="mb-0">
                    <a style="display:block" class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <i class="fa" aria-hidden="true"></i>
                      Practical Information
                    </a>
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                  <div class="card-body">
                    {!! $package->practical_info !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
  
       </div>
      </div>
@endsection