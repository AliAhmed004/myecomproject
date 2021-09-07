@extends('layouts.admin_layout')
    @section('content')
    @section('title', 'Category')
    @section('cat_active', 'active')

    <div class="row" >
    <div class="col-lg-12">
    <h2><b>Manage Category</b></h2>
                              <a class="btn btn-primary mt-3" href="{{url('admin/category')}}" role="button">Back</a>
                             
                                <div class="card mt-5">
                                  
                                    <div class="card-body">
                                      
                                        <form action="{{url('admin/category/manage_category')}}" method="post" >
                                        @csrf
                                            <div class="form-group">
                                                <div class="row" >
                                                    <div class="col-lg-4" >
                                                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                        <input id="cc-pament" name="categoryName" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$cat_name}}">
                                                            @error('categoryName')
                                                            <div class="alert alert-danger" role="alert">
                                                            {{$message}}
                                                            </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-lg-4" >
                                                        <label for="parent_cat" class="control-label mb-1">Parent Category</label>
                                                        <select name="parent_cat" id="parent_cat" class="form-control">
                                                        <option value="">Please select</option>
                                                        @foreach($all_cats as $key=>$value)

                                                        @if($value->id==$cat_id)
                                                        <option selected value="{{$value->id}}">{{$value->cat_name}}</option>
                                                       @else
                                                       <option value="{{$value->id}}">{{$value->cat_name}}</option>
                                                       @endif
                                                        @endforeach
                                                       
                                                         
                                                        </select> 
                                                    </div>
                                                    <div class="col-lg-4" >
                                                        <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                                        <input id="cc-name" name="categorySlug" type="text" value="{{$cat_slug}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                        </div>
                                                        @error('categorySlug')
                                                        <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                        </div>
                                                       @enderror
                                                    </div>
                                                </div>

                                              </div>
                                           
                                             <div>
                                             <input name="cat_id" type="hidden" value="{{$cat_id}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                
                                             </div>
                                            <!-- <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                                <input id="cc-name" name="categorySlug" type="text" value="{{$cat_slug}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('categorySlug')
                                            <div class="alert alert-danger" role="alert">
                                             {{$message}}
                                            </div>
                                          @enderror -->
                                           @if(session()->has('error'))
                                           <div class="alert alert-danger" role="alert">
											   {{session('error')}}
									        </div>
                                           @endif
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <!-- <i class="fa fa-lock fa-lg"></i>&nbsp; -->
                                                    <span id="payment-button-amount">Add</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    </div>
@endsection