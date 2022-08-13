@extends('admin.admin_master')
@section('title')
	{{ 'Website Setting' }}
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
					<form action="{{ url('admin/sitesetting/update') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-group row">
	                    <label class="col-lg-4 col-form-label" for="val-category">Website Logo<span class="text-danger">*</span>
	                    </label>
	                    <div class="col-lg-6">
	                        <input type="file" name="logo" class="form-control" onchange="readURL(this);">
	                        <img id="image" src="{{ asset($site->logo) }}" height="100" width="100"/>
	                    </div>
	                </div>


					 	<div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website Title<span class="text-danger">*</span>
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" required class="form-control" name="site_titile" value="{{ $site->site_titile }}">
		                    </div>
		                </div>


		                <div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website description<span class="text-danger">*</span>
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" required class="form-control" name="site_description" value="{{ $site->site_description }}">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website Telephonr Number<span class="text-danger">*</span>
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" required class="form-control" name="telephone" value="{{ $site->telephone }}">
		                    </div>
		                </div>

						
						<div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website Facebook Link
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" class="form-control" name="facebook_url" value="{{ $site->facebook_url }}">
		                    </div>
		                </div>

							
		                <div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website Youtube Link
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" class="form-control" name="youtube_url" value="{{ $site->youtube_url }}">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website Twitter Link
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" class="form-control" name="twitter_url" value="{{ $site->twitter_url }}">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label class="col-lg-4 col-form-label" for="val-category">Website LinkedIN Link
		                    </label>
		                    <div class="col-lg-6">
		                        <input type="text" class="form-control" name="linkedin_url" value="{{ $site->linkedin_url }}">
		                    </div>
		                </div>

							
							

						 <div class="form-group row">
	                        <div class="col-lg-8 ml-auto">
	                            <button type="submit" class="btn btn-primary">Update Site Settings</button>
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
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection