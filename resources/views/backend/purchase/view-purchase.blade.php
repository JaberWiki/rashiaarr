@extends('admin.admin_master')
@section('admin_content')
<!-- library bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- library js validate -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


<style>
    .error {
        color: red;
        border-color: red;
    }
</style>
<div class="content-body">
    <div style="margin-left:30px;margin-right:30px;">
        <br><br>
        <h3>Payment List</h3>
        <span id="message_error"></span>
        <hr><br>

        <div style="background-color:#138496;padding:20px;color:white;margin-bottom:20px;">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-category">Name<span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" readonly class="form-control" value="{{ $purchases->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-category">Date<span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" readonly class="form-control" value="{{ $purchases->date }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="address">Purchase From<span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" readonly class="form-control" name="address" id="address" value="{{ $purchases->address }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-subcategory_id">Quantity<span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="number" readonly class="form-control mr-2" aria-label="Text input with dropdown button" name='quantity_unit' value="{{ $purchases->quantity_unit }}">
                        <div class="input-group-append">
                            <input type="text" readonly class="form-control mr-2" aria-label="Text input with dropdown button" name='quantity_unit' value="{{ $purchases->quantity_type }}">

                        </div>
                    </div>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-category">Total Price<span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="number" readonly class="form-control" name="price"  value="{{ $purchases->price }}">
                </div>
            </div>

        </div>



       

        

    </div>
</div>



@endsection