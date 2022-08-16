
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
      <h4 class="" style="text-align:center;">Total Report</h4>
      <h2 class="branch">{{ $ledger->ledger_name }}</h2>
      

      
        
      <div class="col-md-12" style="margin-top:40px;">
        
<br><br><br>

@foreach($debits as $branch_id=>$debitlinks)
@php
    $branch = DB::table('branches')->where('id',$branch_id)->first();
@endphp
    <h3>Branch: {{ $branch->branch_name }}</h3>
  <table class="table" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">Serail No</th>
      <th scope="col">Date</th>
      <th scope="col">Details</th>
     
      <th scope="col">Debit</th>
      <th scope="col">Credit</th>
      <!-- <th scope="col">Total</th> -->
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
    @endphp

    @foreach ($debitlinks as $debitlink)
      <tr>
        <th scope="row">{{ $i++ }}</th>
         <td>{{ $debitlink->created_at }}</td>
        <td>{{ $debitlink->details }}</td>
        <td>{{ $debitlink->amount }}</td>
        <td></td>
      </tr>
      
    @endforeach
      <tr>
        <td></td>
        <td></td>
        <td><b>Total</b></td>
        @php
            $total = DB::table('debits')->where('ledger_id',$ledger->id)->where('branch_id',$branch->id)->sum('amount');
        @endphp
        <td><b>{{ $total }}.00</b></td>
        <td><b>{{ $total }}.00</b></b></td>
      </tr>
    
  </tbody>
</table>
@endforeach

@php
    $total = DB::table('debits')->where('ledger_id',$ledger->id)->sum('amount');
@endphp

<h1 style="border:2px solid red;color:red;padding:30px;margin:80px;text-align:right;">Grand Total: <b>{{ $total }}</b></h1>

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
   

