@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Product List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Stock In Records</h2>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                       <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Date</th>
                                              <th scope="col">details</th>
                                              <th scope="col">Stock Amount</th>
                                              <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($stocks as $stock)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $stock->created_at }}</td>
                                                  <td>{{ $stock->details }}</td>
                                                  <td>{{ $stock->stock }}</td>
                                                  <td>{{ $stock->price }}</td>
                                                </tr>
                                              @endforeach
                                          </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Stock Out Records</h2>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                       <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Date</th>
                                              <th scope="col">Stock Out Amount</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($stockouts as $stockout)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $stockout->created_at }}</td>
                                                  <td>{{ $stockout->stock }}</td>
                                                </tr>
                                              @endforeach
                                          </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title" style="color:red;">Summary</h2>
                                <h4>Total Stock In : <b>{{ $total_stock }}</b></h4>
                                <h4>Total Stock Out : <b>{{ $total_stockout }}</b></h4>
                                <h4>Remaining Stock : <b>{{ $total_stock-$total_stockout }}</b></h4>
                                <h4>Total Price : <b>{{ $total_price }}</b></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection