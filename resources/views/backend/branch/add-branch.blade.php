@extends('admin.admin_master')
@section('admin_content')
 <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Branch</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">

                                	@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif

                                    <form class="form-valide" action="{{ route('admin.branch.store') }}" method="post">
                                    	@csrf


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Branch Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="branch_name" placeholder="Enter Branch Name.">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Branch Address<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="branch_address" placeholder="Enter Branch Address.">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-subcategory_id">Select Country<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" name="country">
                                                        <option disabled="" selected="" value="">Select one</option>
                                                        <option value="bangladesh">Bangladesh</option>
                                                        <option value="india">India</option>
                                                        <option value="pakistan">Pakistan</option>
                                                  </select>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Branch Location<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="location" placeholder="Enter Branch Location.">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Side Note
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="note" placeholder="Side Note.">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-danger">Add Branch</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
@endsection