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
        <h3>Reciept List</h3>
        <span id="message_error"></span>
        <hr><br>
         
            <div style="background-color:#138496;padding:20px;color:white;margin-bottom:20px;">
            <div class="form-group row" >
                    <label class="col-lg-4 col-form-label" for="val-category">Voucher<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" value="{{ $reciept->voucher }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" value="{{ $reciept->date }}">
                    </div>
                </div>
               
               <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Brand<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" value="{{ $reciept->branch->branch_name }}">
                    </div>
                </div>

      

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-category">Note<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" value="{{ $reciept->note }}">
                    </div>
                </div>

            </div>
            
    

        <br>
        
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serail No</th>
      <th scope="col">Ledger</th>
      <th scope="col">Details</th>
      <th scope="col">Amount</th>
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
      </tr>
      <tr>
          <th scope="row"></th>
          <td></td>
          <td><b>Credit</b></td>
          <td><b>{{ $total }}</b></td>
      </tr>
  </tbody>
</table>

    </div>
    </div>

   

@endsection