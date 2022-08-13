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
                                <h2 class="card-title">{{ $product_details->product_name }}</h2>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product Name</th>
                                              <th scope="col">Stock</th>
                                              <th scope="col">Total Price</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          
                                                <tr>
                                                    <td>{{ $product_details->product_name }}</td>
                                                  <td>{{ $stock }}</td>
                                                   <td>{{ $price }}</td>
                                                
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