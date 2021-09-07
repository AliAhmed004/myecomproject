@extends('layouts.admin_layout')
    @section('content')
    @section('title', 'Brand')
    @section('brand_active', 'active')
    <div class="row m-t-30">
                            <div class="col-md-12">
                            @if(session()->has('status'))
                                
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              @endif 
                            
                              <h2><b>Brand</b></h2>
                              <a class=" mt-5 btn btn-primary" href="{{url('admin/brand/manage_brand')}}" role="button">Add Brand</a>
                              
                              <!-- DATA TABLE-->
                                <div class="table-responsive mt-5 m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Serial#</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                          @php
                                             $i=0
                                          @endphp
                                        @foreach($brand as $value)
                                            <tr>
                                            @php
                                             $i++
                                          @endphp
                                              <td>{{$i}}</td>
                                                <td>{{$value->name}}</td>
                                                <td>
                                                   <a href="{{asset('storage/media/brand_images/')}}/{{$value->image}}"> <img width="50px" height="50px" src="{{asset('storage/media/brand_images/')}}/{{$value->image}}" alt=""></a>
                                                </td>
                                                @if($value->status==1)
                                                <td><a href="{{url('admin/brand/manage_brand')}}/{{$value->id}}/status/0"  class="btn btn-success btn-sm">Active</a></td>
                                                @else
                                                <td><a href="{{url('admin/brand/manage_brand')}}/{{$value->id}}/status/1" class="btn btn-warning btn-sm">Deactive</a></td>
                                                @endif
                                                <td> <a href="{{url('admin/brand/manage_brand')}}/{{$value->id}}" class="btn btn-success text-white" >Edit</a>
                                                <a href="{{url('admin/brand/delete_brand')}}/{{$value->id}}" class="btn btn-danger text-white" >Delete</a>
                                                </td>
                                                
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

    
@endsection