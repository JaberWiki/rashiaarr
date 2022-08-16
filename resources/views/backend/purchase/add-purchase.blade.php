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
        <h3>Purchase</h3>
        <span id="message_error"></span>
        <hr><br>
        <form id="validate" action="{{ route('admin.form.save.purchase') }}" method="post">
            @csrf
            <div style="background-color:#138496;padding:20px;color:white;margin-bottom:20px;">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Product Name<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <select name="name" class="form-control" onchange="if($(this).val()=='')showCustomInput('name')">
                            <option disabled selected>Select an Option...</option>
                            <option value="" class="bg-primary text-white ">Type Manually</option>
                            @foreach($products as $product)
                            <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select><input name="name" class="form-control" style="display:none;" disabled="disabled" onblur="if($(this).val()=='')showOptions('name')">


                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="date">Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="date" id="date" value="{{ date('d/M/Y') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="address">Purchase From<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-subcategory_id">Quantity<span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="number" class="form-control mr-2" aria-label="Text input with dropdown button" name='quantity_unit'>
                            <div class="input-group-append">
                                <select name="quantity_type" class="form-control ml-2" onchange="if($(this).val()=='')showCustomInput('quantity_type')">
                                    <option disabled selected>Select Unit Type...</option>
                                    <option value="" class="bg-info text-white ">Type Manually</option>
                                    @foreach($product_units as $product_unit)
                                    <option value="{{ $product_unit->unit_name }}">{{ $product_unit->unit_name }}</option>
                                    @endforeach
                                </select><input name="quantity_type" class="form-control" style="display:none;" disabled="disabled" onblur="if($(this).val()=='')showOptions('quantity_type')">
                            </div>

                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Total Price<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="price" placeholder="Input Price in TK" required>
                    </div>
                </div>
            </div>
            <table>
                <br>
                <tr>
                    <td><button type="button" class="btn btn-sm btn-info" onclick="addRows()">Add</button></td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">Remove</button></td>
                    <td><button type="submit" class="btn btn-sm btn-success">Save</button></td>
                </tr>
            </table>
        </form>

        <br>

    </div>
</div>

<script>
    function addRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        var cellCount = table.rows[0].cells.length;
        var row = table.insertRow(rowCount);
        for (var i = 0; i <= cellCount; i++) {
            var cell = 'cell' + i;
            cell = row.insertCell(i);
            var copycel = document.getElementById('col' + i).innerHTML;
            cell.innerHTML = copycel;
            if (i == 2) {
                var radioinput = document.getElementById('col2').getElementsByTagName('input');
                for (var j = 0; j <= radioinput.length; j++) {
                    if (radioinput[j].type == 'radio') {
                        var rownum = rowCount;
                        radioinput[j].name = 'gender[' + rownum + ']';
                    }
                }
            }
        }
    }

    function deleteRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        if (rowCount > '2') {
            var row = table.deleteRow(rowCount - 1);
            rowCount--;
        } else {
            alert('There should be atleast one row');
        }
    }
</script>
<!-- alert blink text -->
<script>
    function blink_text() {
        $('#message_error').fadeOut(700);
        $('#message_error').fadeIn(700);
    }
    setInterval(blink_text, 1000);
</script>
<!-- script validate form -->
<script>
    $('#validate').validate({
        reles: {
            'empname[]': {
                required: true,
            },
            'phone[]': {
                required: true,
            },
            'department[]': {
                required: true,
            },
        },
        messages: {
            'empname[]': "Please input file*",
            'phone[]': "Please input file*",
            'department[]': "Please input file*",
        },
    });
</script>
<script>
    function toggle($toBeHidden, $toBeShown) {
        $toBeHidden.hide().prop('disabled', true);
        $toBeShown.show().prop('disabled', false).focus();
    }

    function showOptions(inputName) {
        var $select = $(`select[name=${inputName}]`);
        toggle($(`input[name=${inputName}]`), $select);
        $select.val(null);
    }


    function showCustomInput(inputName) {
        toggle($(`select[name=${inputName}]`), $(`input[name=${inputName}]`));
    }
</script>

@endsection