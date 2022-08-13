 @extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ledger Report</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $ledger->ledger_name }} Payment Report</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Ledger Name</th>
                                              <th scope="col">Details</th>
                                              <th scope="col">Amount</th>
                                              
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($debits as $debit)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $ledger->ledger_name }}</td>
                                                  <td>{{ $debit->details }}</td>
                                                  <td>{{ $debit->amount }}</td>

                                                 
                                                </tr>
                                              @endforeach
                                          </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $ledger->ledger_name }} Reciept Report</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Ledger Name</th>
                                              <th scope="col">Details</th>
                                              <th scope="col">Amount</th>
                                              
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($recdebits as $debit)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $ledger->ledger_name }}</td>
                                                  <td>{{ $debit->details }}</td>
                                                  <td>{{ $debit->amount }}</td>
                                        
                                                 
                                                </tr>
                                              @endforeach
                                          </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
@endsection