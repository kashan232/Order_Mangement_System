@include('main_includes.header_include')
<div class="main-wrapper">
    @include('main_includes.navbar_include')
    @include('main_includes.admin_sidebar_include')

    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Welcome Admin, <span>Admin Name</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="assets/img/morning-img-01.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <!-- Total Sales -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <div class="dash-boxs comman-flex-center">
                                <img src="assets/img/icons/empty-wallet.svg" alt="">
                            </div>
                            <div class="dash-content dash-count">
                                <h4>Total Sales</h4>
                                <h2><span class="counter-up">50,000</span></h2>
                                <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>12%</span> vs last month</p>
                            </div>
                        </div>
                    </div>

                    <!-- Profits -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <div class="dash-boxs comman-flex-center">
                                <img src="assets/img/icons/empty-wallet.svg" alt="">
                            </div>
                            <div class="dash-content dash-count">
                                <h4>Profits</h4>
                                <h2><span class="counter-up">20,000</span></h2>
                                <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>8%</span> vs last month</p>
                            </div>
                        </div>
                    </div>

                    <!-- Losses -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <div class="dash-boxs comman-flex-center">
                                <img src="assets/img/icons/empty-wallet.svg" alt="">
                            </div>
                            <div class="dash-content dash-count">
                                <h4>Losses</h4>
                                <h2><span class="counter-up">5,000</span></h2>
                                <p><span class="negative-view"><i class="feather-arrow-down-right me-1"></i>5%</span> vs last month</p>
                            </div>
                        </div>
                    </div>

                    <!-- Expenses -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <div class="dash-boxs comman-flex-center">
                                <img src="assets/img/icons/empty-wallet.svg" alt="">
                            </div>
                            <div class="dash-content dash-count">
                                <h4>Expenses</h4>
                                <h2><span class="counter-up">15,000</span></h2>
                                <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>10%</span> vs last month</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Sales Representatives</h4>
                                <div>
                                    <ul class="nav chat-user-total">
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Profits 75%</li>
                                        <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Losses 25%</li>
                                    </ul>
                                </div>
                                <div class="input-block mb-0">
                                    <select class="form-control select">
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div id="patient-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Saler Prograss</h4>
                            </div>
                            <div id="donut-chart-dash" class="chart-user-icon">
                                <img src="assets/img/icons/user-icon.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Sales Summary</h4>
                            <a href="sales.html" class="float-end">View All</a>
                        </div>
                        <div class="card-body p-0 table-dash">
                            <div class="table-responsive">
                                <table class="table mb-0 border-0 datatable custom-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>Wireless Headphones</td>
                                            <td>2024-11-30</td>
                                            <td>150</td>
                                            <td>
                                                <span class="badge bg-primary">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>002</td>
                                            <td>Smartphone</td>
                                            <td>2024-11-29</td>
                                            <td>700</td>
                                            <td>
                                                <span class="badge bg-success">Delivered</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>003</td>
                                            <td>Smart Watch</td>
                                            <td>2024-11-28</td>
                                            <td>200</td>
                                            <td>
                                                <span class="badge bg-danger">Cancelled</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>004</td>
                                            <td>Gaming Console</td>
                                            <td>2024-11-27</td>
                                            <td>400</td>
                                            <td>
                                                <span class="badge bg-success">Delivered</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>005</td>
                                            <td>Bluetooth Speaker</td>
                                            <td>2024-11-26</td>
                                            <td>120</td>
                                            <td>
                                                <span class="badge bg-primary">Pending</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title d-inline-block">Product and Stock</h4>
                            <a href="products.html" class="float-end product-views">Show all</a>
                        </div>
                        <div class="card-block table-dash">
                            <div class="table-responsive">
                                <table class="table mb-0 border-0 datatable custom-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td>P0001</td>
                                            <td class="table-image">
                                                <h2>Product A</h2>
                                            </td>
                                            <td>Electronics</td>
                                            <td>25</td>
                                            <td>50</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>P0002</td>
                                            <td class="table-image">
                                                <h2>Product B</h2>
                                            </td>
                                            <td>Apparel</td>
                                            <td>50</td>
                                            <td>20</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@include('main_includes.footer_include')