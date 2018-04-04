@extends('layouts.nmaster')
@section('bredcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    @endsection
    @section('content')
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
<!--        <div class="row">
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>568120</h2>
                            <p class="m-b-0">Total Revenue</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>1178</h2>
                            <p class="m-b-0">Requests</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>25</h2>
                            <p class="m-b-0">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>847</h2>
                            <p class="m-b-0">Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h1>Welcome CSEI </h1>
                    </div>
<!--                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iBook</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iPhone</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iMac</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iBook</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>-->
                </div>
            </div>
<!--            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Recent Requests </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iBook</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iPhone</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iMac</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>John Abraham</td>
                                        <td><span>iBook</span></td>
                                        <td><span>456 pcs</span></td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    @endsection

    @push('scripts')
    <!--google map-->
    <script type="text/javascript" src="{{asset('js/plugins/google-map/google-map-script.js')}}"></script>
    @endpush