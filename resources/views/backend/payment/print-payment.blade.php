
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- library js validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


    <style>
        .heading{
          text-align:center;
          margin-top:30px;
        }
        .sub-heading{
          text-align:center;
        }
        .branch{
          text-align:center;
        }
        .voucher{
          border:2px solid black;
          padding:5px;
          text-align:center;
          float:left;

        }
       .pNumber {
    border: 2px solid black;
    padding: 5px;
    text-align: center;
    float: left;
    margin-left: 30px;
    padding-left: 30px;
    padding-right: 30px;
}

.date{
  border:2px solid black;
  float:right;
  padding:5px;
  text-align:right;
}
.signature{
  border-top:2px solid black;
  margin-top:150px;
  float:left;
}

    </style>

<body>
   <div class="content-body">
      <h4 class="heading">Salam-Rashia-Alif(JV)</h4>
      <p class="sub-heading">Shahi Nibash,1 no road Katalganj, Panchlaish, Chattogram</p>
      <p class="branch">{{ $payment->branch->branch_name }}</p>

      <h5 class="heading">PAYMENT SLIP</h5>
        
      <div class="col-md-12" style="margin-top:40px;">
          <div class="col-md-6">
                <h6 class="voucher">Voucher No</h6>
                <h6 class="pNumber">{{ $payment->voucher }}</h6>
          </div>
          <div class="col-md-12">
                <h6 class="date">Date : {{ $payment->created_at->todatestring() }}</h6>
          </div>
<br><br><br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Serail No</th>
      <th scope="col">Ledger</th>
      <th scope="col">Details</th>
      <th scope="col">Debit</th>
      <th scope="col">Credit</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
    @endphp

    @foreach($debits as $debit)
      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $debit->ledger->ledger_name }}</td>
        <td>{{ $debit->details }}</td>
        <td>{{ $debit->amount }}.00</td>
        <td>0.00</td>
      </tr>
    @endforeach
    <tr>
        <th scope="row"></th>
        <td></td>
        <td><b>Total</b></td>
        @php
            $total = DB::table('debits')->where('payment_id',$payment->id)->sum('amount');
          @endphp
        <td><b>{{ $total }}.00</b></td>
        <td><b>{{ $total }}.00</b></td>
      </tr>

  </tbody>
</table>
   <div class="col-md-3 signature">
                <h6 style="text-align:center;">Prepared By</h6>
      </div>
      <div class="col-md-3 signature" style="margin-left:30px;">
                <h6 style="text-align:center;">Checked By</h6>
      </div>
      <div class="col-md-3 signature" style="margin-left:30px;">
                <h6 style="text-align:center;">Recommended By</h6>
      </div>
      <div class="col-md-2 signature" style="margin-left:30px;">
                <h6 style="text-align:center;">Approved By</h6>
      </div>
      </div>
    </div>
</body>
   

