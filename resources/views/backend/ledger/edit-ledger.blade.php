@extends('admin.admin_master')
@section('admin_content')
 <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Ledger</li>
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

                                    <form class="form-valide" action="{{ url('admin/ledger/update/'.$data->id) }}" method="post">
                                    	@csrf


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Ledger Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="ledger_name" value="{{ $data->ledger_name }}" placeholder="Enter Ledger Name.">
                                            </div>
                                        </div>
                                        
                                       
                                       <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-subcategory_id">Select Payment<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" name="payment">
                                                        <option value="cash" {{ $data->payment == 'cash' ? 'selected' : '' }}>Cash</option>
                                                        <option value="bank" {{ $data->payment == 'bank' ? 'selected' : '' }}>Bank</option>
                                                        <option value="bkash" {{ $data->payment == 'bkash' ? 'selected' : '' }}>Bkash</option>
                                                        <option value="nagad" {{ $data->payment == 'nagad' ? 'selected' : '' }}>Nagad</option>
                                                        <option value="indirect" {{ $data->payment == 'indirect' ? 'selected' : '' }}>Indirect</option>
                                                        <option value="direct" {{ $data->payment == 'direct' ? 'selected' : '' }}>Direct</option>
                                                        <option value="purchase" {{ $data->payment == 'purchase' ? 'selected' : '' }}>Purchase</option>
                                                        <option value="salary" {{ $data->payment == 'salary' ? 'selected' : '' }}>Salary</option>
                                                  </select>
                                                </div>
                                        </div>
                                        
                                        
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">Side Note
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="note" value="{{ $data->note }}" placeholder="Side Note.">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-danger">Update Ledger</button>
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