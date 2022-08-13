@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Payment List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Payment List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Voucher</th>
                                              <th scope="col">Brand</th>
                                              <th scope="col">Date</th>
                                              <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($payments as $payment)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $payment->voucher }}</td>
                                                  <td>{{ $payment->branch->branch_name }}</td>
                                                  <td>{{ Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>

                                                  </td>
                                                  <td><a href="{{ URL::to('admin/payment/view/'.$payment->id) }}" class="btn btn-primary btn-sm">View</a> <a href="{{ URL::to('admin/payment/delete/'.$payment->id) }}" id="delete" class="btn btn-success btn-sm">Delete</a> <a href="{{ URL::to('admin/payment/print/'.$payment->id) }}" class="btn btn-danger btn-sm">Print</a> <a href="{{ URL::to('admin/payment/edit/'.$payment->id) }}" class="btn btn-info btn-sm">Edit</a></td>
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
        </div>
@endsection