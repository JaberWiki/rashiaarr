@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Balance List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Balance List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Amount</th>
                                              <th scope="col">Date</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                            $tBalance = 0;
                                          @endphp

                                              @foreach($balances as $balance)
                                                @php
                                                    $tBalance += $balance['balance'];
                                                @endphp
                                                
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $balance->balance }}</td>
                                                  <td>{{ date('d/M/Y', strtotime($balance->created_at->toDateString())) }}

                                                  </td>
                                                  <td><a href="{{ URL::to('admin/balance/edit/'.$balance->id) }}" class="btn btn-info btn-sm">Edit</a> <a href="{{ URL::to('admin/balance/delete/'.$balance->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a></td>
                                                </tr>
                                              @endforeach
                                              <tr>
                                              <th scope="row">{{ "Total Amount" }}</th>
                                              <td>{{ $tBalance }}</td>
                                              </tr>
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