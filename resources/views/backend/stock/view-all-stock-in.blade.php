@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Stock List</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">All Stock In List</h2>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Details</th>
                                              <th scope="col">Stock</th>
                                              <th scope="col">Total Price</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $i = 1;
                                          @endphp

                                              @foreach($stockins as $stock)
                                                <tr>
                                                  <th scope="row">{{ $i++ }}</th>
                                                  <td>{{ $stock->product->product_name }}</td>
                                                  <td>{{ $stock->details }}</td>
                                                  <td>{{ $stock->stock }}</td>
                                                   <td>{{ $stock->price }}</td>
                

                                                  
                                                  <td><a href="{{ URL::to('admin/stock/edit-stock-in/'.$stock->id) }}" class="btn btn-info btn-sm">Edit</a></td>
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