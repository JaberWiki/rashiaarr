@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Branch List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Branch List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Branch</th>
                                              <th scope="col">Address</th>
                                              <th scope="col">Country</th>
                                              <th scope="col">Location</th>
                                              <th scope="col">Created At</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($branches as $branch)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $branch->branch_name }}</td>
                                                  <td>{{ $branch->branch_address }}</td>
                                                  <td>{{ $branch->country }}</td>
                                                  <td>{{ $branch->location }}</td>
                                                  <td>{{ date('d/M/Y', strtotime($branch->created_at->toDateString())) }}

                                                  </td>
                                                  <td><a href="{{ URL::to('admin/branch/edit/'.$branch->id) }}" class="btn btn-info btn-sm">Edit</a> <a href="{{ URL::to('admin/branch/delete/'.$branch->id) }}" id="delete" class="btn btn-success btn-sm">Delete</a> <a href="{{ URL::to('admin/branch/report/'.$branch->id) }}" class="btn btn-danger btn-sm">Report</a> <a href="{{ URL::to('admin/branch/allreport/'.$branch->id) }}" class="btn btn-primary btn-sm">Total Report</a> <a href="{{ URL::to('admin/branch/search/'.$branch->id) }}" class="btn btn-info btn-sm">Search Report</a></td>
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