@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Reciept List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Reciept List</h4>
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

                                              @foreach($reciepts as $reciept)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $reciept->voucher }}</td>
                                                  <td>{{ $reciept->branch->branch_name }}</td>
                                                  <td>{{ $reciept->date }}</td>

                                                  </td>
                                                  <td><a href="{{ URL::to('admin/reciept/view/'.$reciept->id) }}" class="btn btn-primary btn-sm">View</a> <a href="{{ URL::to('admin/reciept/delete/'.$reciept->id) }}" id="delete" class="btn btn-success btn-sm">Delete</a><a href="{{ URL::to('admin/reciept/print/'.$reciept->id) }}" class="btn btn-danger btn-sm">Print</a><a href="{{ URL::to('admin/reciept/edit/'.$reciept->id) }}" class="btn btn-info btn-sm">Edit</a></td>
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