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
                                <h4 class="card-title">Product List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                              <th scope="col">Serial No</th>
                                              <th scope="col">Product Name</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($products as $product)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $product->product_name }}</td>
                                                  <td><a href="{{ URL::to('admin/stock/edit-product/'.$product->id) }}" class="btn btn-info btn-sm">Edit</a> <a href="{{ URL::to('admin/stock/view-record/'.$product->id) }}" class="btn btn-danger btn-sm">View Stock Records</a> <a href="{{ URL::to('admin/stock/view-stock-in-out/'.$product->id) }}" class="btn btn-warning btn-sm">View Product In And Out Records</a> <a href="{{ URL::to('admin/stock/delete-product/'.$product->id) }}" id="delete" class="btn btn-error btn-success btn-sm">Delete</a></td>
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