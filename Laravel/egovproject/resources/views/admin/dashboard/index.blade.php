@extends('adminetic::admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Phone Lost Reports</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Reports</li>
                    <li class="breadcrumb-item active">Phone Lost Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <table class="table table-bordered striped table-hover datatable">
        <thead>
            <tr>
                <th>Nmae</th>
                <th>Address</th>
                <th>Contact</th>
                <th>IME</th>
                <th>Lost Address</th>
                <th>Lost Datetime</th>
                <th>Brand</th>
                <th>Model</th>
            </tr>
        </thead>
        <tbody>
            @isset($reports)
            @foreach ($reports as $report)
            <tr>
                <td>{{$report->name}}</td>
                <td>{{$report->address}}</td>
                <td>{{$report->contact}}</td>
                <td>
                    <ul>
                        <li>{{$report->imei1}}</li>
                        <li>{{$report->imei2}}</li>
                    </ul>
                </td>
                <td>{{$report->lost_address}}</td>
                <td>{{$report->lost_time}}</td>
                <td>{{$report->brand}}</td>
                <td>{{$report->model}}</td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('custom_js')
@include('admin.layouts.modules.dashboard.scripts')
@endsection