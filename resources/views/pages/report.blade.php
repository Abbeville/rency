@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-block card-stretch card-height">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Overview</h4>
                    </div>                        
                    <div class="card-header-toolbar d-flex align-items-center">
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton1"
                                data-toggle="dropdown">
                                This Month<i class="ri-arrow-down-s-line ml-1"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right shadow-none"
                                aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="#">Year</a>
                                <a class="dropdown-item" href="#">Month</a>
                                <a class="dropdown-item" href="#">Week</a>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="card-body">
                    <div id="report-chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-block card-stretch card-height">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Daily Sales</h4>
                    </div>                        
                    <div class="card-header-toolbar d-flex align-items-center">
                        <div><a href="#" class="btn light-gray view-btn">$ 25,000.00</a></div>
                    </div>
                </div>   
                <div class="card-body">
                    <div id="report-chart2" style="min-height: 340px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-block card-stretch card-height">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Monthly Sales</h4>
                    </div>                        
                    <div class="card-header-toolbar d-flex align-items-center">
                        <div><a href="#" class="btn light-gray view-btn">$ 25,000.00</a></div>
                    </div>
                </div>   
                <div class="card-body">
                    <div id="report-chart3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-block card-stretch card-height">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Best Seller</h4>
                    </div>                        
                    <div class="card-header-toolbar d-flex align-items-center">
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton002"
                                data-toggle="dropdown">
                                This Month<i class="ri-arrow-down-s-line ml-1"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right shadow-none"
                                aria-labelledby="dropdownMenuButton002">
                                <a class="dropdown-item" href="#">Year</a>
                                <a class="dropdown-item" href="#">Month</a>
                                <a class="dropdown-item" href="#">Week</a>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="card-body">
                    <div id="report-chart4"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
    
@endsection