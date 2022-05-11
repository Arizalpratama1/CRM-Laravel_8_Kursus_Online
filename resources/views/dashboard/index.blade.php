@extends('layouts.vuexy')

@section('header')
Dashboard 
@endsection

@section('content')
<div class="row match-height">
    <div class="col-lg-8 col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Statistics</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 mr-25 mb-0">Updated hari ini</p>
                </div>
            </div>
        
            <div class="card-body statistic-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-primary mr-2">
                                <div class="avatar-content">
                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0"></h4>
                                    <p class="card-text font-small-3 mb-0">Sales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-info mr-2">
                                <div class="avatar-content">
                                    <i data-feather="user" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0"></h4>
                                    <p class="card-text font-small-3 mb-0">Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-danger mr-2">
                                <div class="avatar-content">
                                    <i data-feather="box" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0"></h4>
                                    <p class="card-text font-small-3 mb-0">Catalogs</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-success mr-2">
                                <div class="avatar-content">
                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0"></h4>
                                    <p class="card-text font-small-3 mb-0">Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-12">
        <div class="row match-height">
            <div class="col-lg-6 col-md-3 col-6">
                <div class="card">
                    <div class="card-body pb-50">
                        <h6>Direct</h6>
                        <div class="avatar bg-light-info mr-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mb-1"></h2>
                        <div id="statistics-order-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-3 col-6">
                <div class="card">
                    <div class="card-body pb-50">
                        <h6>Online</h6>
                        <div class="avatar bg-light-info mr-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mb-1"></h2>
                        <div id="statistics-order-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('myjs')
<script type="text/javascript">

</script>
@endsection