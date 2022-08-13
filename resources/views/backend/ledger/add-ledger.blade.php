@extends('admin.admin_master')
@section('admin_content')
 <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Ledger</li>
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

                                    <form class="form-valide" action="{{ route('admin.ledger.store') }}" method="post">
                                    	@csrf


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Ledger Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="ledger_name" placeholder="Enter Ledger Name.">
                                            </div>
                                        </div>
                                        
                                       
                                       
                                       <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-subcategory_id">Select Payment<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" name="payment">
                                                        <option disabled="" selected="" value="">Select one</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="bank">Bank</option>
                                                        <option value="bkash">Bkash</option>
                                                        <option value="nagad">Nagad</option>
                                                        <option value="indirect">Indirect</option>
                                                        <option value="direct">Direct</option>
                                                        <option value="purchase">Purchase</option>
                                                        <option value="salary">Salary</option>
                                                  </select>
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
                                                <button type="submit" class="btn btn-danger">Add Ledger</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection