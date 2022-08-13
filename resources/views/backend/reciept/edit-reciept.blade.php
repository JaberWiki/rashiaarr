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
        <h3>Reciept</h3>
        <span id="message_error"></span>
        <hr><br>
        
            <div style="background-color:#138496;padding:20px;color:white;margin-bottom:20px;">
            <div class="form-group row" >
                    <label class="col-lg-4 col-form-label" for="val-category">Voucher<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" name="voucher" value="{{ $reciept->voucher }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" name="date" value="{{ $reciept->date }}">
                    </div>
                </div>
               
               <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-subcategory_id">Branch<span class="text-danger">*</span></label>
                      <div class="col-lg-6">
                          <select class="form-control" name="branch_id" disabled>
                                <option disabled="" selected="" value="">Select one</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == $reciept->branch_id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                                @endforeach
                                
                          </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Note<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="note" readonly value="{{ $reciept->note }}" required>
                    </div>
                </div>

            </div>


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

    @foreach($recdebits as $recdebit)
      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $recdebit->ledger->ledger_name }}</td>
        <td>{{ $recdebit->details }}</td>
        <td>{{ $recdebit->amount }}</td>
        <td><a href="{{ URL::to('admin/reciept/details/delete/'.$recdebit->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a></td>
      </tr>
    @endforeach

      <tr>
        <td></td>
          <th scope="row"><b>Total</b></th>
          <td><b>Debit</b></td>
          @php
            
            $total = DB::table('recdebits')->where('reciept_id',$reciept->id)->sum('amount');
          @endphp
          <td><b>{{ $total }}</b></td>
          <td></td>
      </tr>
      <tr>
          <th scope="row"></th>
          <td></td>
          <td><b>Credit</b></td>
          <td><b>{{ $total }}</b></td>
           <td></td>
          <td></td>
      </tr>
  </tbody>
</table>
<br><br>

            <form id="validate" action="{{ route('admin.reciept.details.add') }}" method="post">
            @csrf   
            <input value="{{ $reciept->id }}" type="hidden" name="id">
            <table id="emptbl" class="table table-bordered border-primar">
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
                                    <option disabled="" selected="" value="">Select one</option>
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
                'ledger_id[]' : "Please select ledger",
                'details[]' : "Please input details",
                'amount[]' : "Please insert amount",
            },
        });
    </script>

@endsection