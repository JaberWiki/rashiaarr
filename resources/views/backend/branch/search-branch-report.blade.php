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

                                   

                                    <form class="form-valide" action="{{ route('admin.branch.generatereport') }}" method="post">
                                        @csrf

                                        <input type="hidden" value="{{ $branch->id }}" name="branch_id" />

                                        <div class="form-group row">
                                           <label class="col-lg-4 col-form-label" for="val-category">From<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-5">
                                                <input type="date" class="form-control" name="from" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-category">To<span class="text-danger">*</span>
                                            </label>
                                              <div class="col-lg-5">
                                                <input type="date" class="form-control" name="to" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                       
                                     

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-danger">Generate report</button>
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