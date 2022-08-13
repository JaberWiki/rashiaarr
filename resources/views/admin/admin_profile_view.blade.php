@extends('admin.admin_master')
@section('title')
	{{ 'Admin Profile Setting' }}
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
			<form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
				@csrf

				 <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Admin Name<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" required class="form-control" name="name" value="{{ $admin_data->name }}">
                    </div>
                </div>

  				

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Admin E-mail<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="email" required class="form-control" name="email" value="{{ $admin_data->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Admin Profile Photo<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="file" onchange="readURL(this);" name="profile_photo_path" class="form-control">
                        <img width=100px; id="image" height=100px; src="{{ (!empty($admin_data->profile_photo_path))? url('backend/upload/admin/'.$admin_data->profile_photo_path):url('backend/upload/admin_profile.png') }}">
                    </div>
                </div>
				  
					 
					 <div class="form-group row">
                        <div class="col-lg-8 ml-auto">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
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

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(100);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection