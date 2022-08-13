@extends('admin.admin_master')
@section('admin_content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Total Report</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-body">
                                <h2 style="text-align:center;color:red;">Current Balance: <b>{{ $current }}</b></h2>
                                <h4 style="text-align:center;">Total Input Balance : <b>{{ $balance }}</b></h4>
                                <h4 style="text-align:center;">Total Stock In : <b>{{ $stockin }}</b></h4>
                                <h4 style="text-align:center;">Total Payment For Ledgers : <b>{{ $debit }}</b></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection