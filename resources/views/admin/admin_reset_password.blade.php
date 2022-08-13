@extends('admin.admin_master')
@section('title')
	{{ 'Admin Reset Password' }}
@endsection
@section('admin_content')
 <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
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

			<form action="{{ route('admin.password.update') }}" method="post">
				@csrf

				<div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Old Password<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="password" required class="form-control" name="old_password">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">New Passowrd<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="password" required class="form-control" name="password">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Confirm Passowrd<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="password" required class="form-control" name="password_confirmation">
                    </div>
                </div>
					
				<div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-primary">Change Password</button>
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