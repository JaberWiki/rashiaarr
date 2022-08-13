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
        <h3>Payment</h3>
        <span id="message_error"></span>
        <hr><br>

        
            <div style="background-color:#138496;padding:20px;color:white;margin-bottom:20px;">

        <form id="validate" method="post" action="{{ url('admin/payment/update/'.$payment->id) }}" >
            @csrf
            <div class="form-group row" >
                    <label class="col-lg-4 col-form-label" for="val-category">Voucher<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" name="voucher" value="{{ $payment->voucher }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="date" value="{{ $payment->created_at->format('Y-m-d') }}">
                    </div>
                </div>
               
               <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-subcategory_id">Branch<span class="text-danger">*</span></label>
                      <div class="col-lg-6">
                          <select class="form-control" name="branch_id" disabled>
                                <option disabled="" selected="" value="">Select one</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == $payment->branch_id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                                @endforeach
                                
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Note<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="note" value="{{ $payment->note }}" readonly>
                    </div>
                </div>

            </div>

             <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </div>
        </form>

<form id="validate" method="post" action="" >
    @csrf
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serail No</th>
      <th scope="col">Ledger</th>
      <th scope="col">Details</th>
      <th scope="col">Amount</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
    @endphp

    @foreach($debits as $debit)
      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>
            <select class="form-control" name="ledger_id" required>
                <option disabled="" selected="" value="" readonly>Select one</option>
                @foreach($ledgers as $ledger)
                    <option value="{{ $ledger->id }}" {{ $ledger->id == $debit->ledger_id ? 'selected' : '' }}>{{ $ledger->ledger_name }}</option>
                @endforeach
            </select>
        </td>
        <td><input type="text" readonly value="{{ $debit->details }}" class="form-control" name="details" /></td>
        <td><input type="text" readonly value="{{ $debit->amount }}" class="form-control" name="amount"/></td>
        <td><a href="{{ URL::to('admin/payment/details/delete/'.$debit->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a></td>
      </tr>
    @endforeach

      <tr>
        <td></td>
          <th scope="row">Total</th>
          <td><b>Debit</b></td>
          @php
            
            $total = DB::table('debits')->where('payment_id',$payment->id)->sum('amount');
          @endphp
          <td><b>{{ $total }}</b></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
          <th scope="row"></th>
          <td></td>
          <td><b>Credit</td>
          <td><b>{{ $total }}</b></td>
          <td></td>
          <td></td>
      </tr>
  </tbody>
</br>

</table>
</form>
<br><br>
                

            
            <form id="validate" action="{{ route('admin.payment.details.add') }}" method="post">
            @csrf  

            <input type="hidden" value="{{ $payment->branch_id }}" name="branch_id" />

            <table id="emptbl" class="table table-bordered border-primar">
                <input value="{{ $payment->id }}" type="hidden" name="id">
                <thead class="table-dark">
                    <tr>
                        <th>Ledgers</th>
                        <th>Costing Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td id="col0">
                            <select class="form-control" name="ledger_id[]" required>
                                    <option disabled="" selected="" value="" readonly>Select one</option>
                                    @foreach($ledgers as $ledger)
                                        <option value="{{ $ledger->id }}">{{ $ledger->ledger_name }}</option>
                                    @endforeach
                              </select>
                        </td> 
                        <td id="col1"><input type="text" class="form-control" name="details[]" placeholder="Cost Details" required></td> 
                        <td id="col2"><input type="tel" class="form-control" name="amount[]" placeholder="Enter amount" required></td> 
                    </tr>
                </tbody>  
            </table> 
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
        function addRows()
        { 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length; 
            var row = table.insertRow(rowCount);
            for(var i =0; i <= cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                if(i == 2)
                { 
                    var radioinput = document.getElementById('col2').getElementsByTagName('input'); 
                    for(var j = 0; j <= radioinput.length; j++)
                    { 
                        if(radioinput[j].type == 'radio')
                        { 
                            var rownum = rowCount;
                            radioinput[j].name = 'gender['+rownum+']';
                        }
                    }
                }
            }
        }

        function deleteRows()
        {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }else{
                alert('There should be atleast one row');
            }
        }
    </script>
    <!-- alert blink text -->
    <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
    </script>
    <!-- script validate form -->
    <script>
        $('#validate').validate({
            reles: {
                'empname[]': {
                    required: true,
                },
                'phone[]': {
                    required:true,
                },
                'department[]': {
                    required:true,
                },
            },
            messages: {
                'empname[]' : "Please input file*",
                'phone[]' : "Please input file*",
                'department[]' : "Please input file*",
            },
        });
    </script>

@endsection