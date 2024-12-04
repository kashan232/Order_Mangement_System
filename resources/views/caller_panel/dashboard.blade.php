@include('main_includes.header_include')
<div class="main-wrapper">
    @include('main_includes.navbar_include')
    @include('main_includes.caler_sidebar_include')

    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Caller Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Welcome Caller, <span>{{ Auth::user()->name }}</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="assets/img/morning-img-02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="doctor-list-blk">
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="doctor-widget border-right-bg">
								<div class="doctor-box-icon flex-shrink-0">
									<img src="assets/img/icons/doctor-dash-01.svg" alt="">
								</div>
								<div class="doctor-content dash-count flex-grow-1">
									<h4><span class="counter-up">30</span><span>/85</span><span class="status-green">+60%</span></h4>
									<h5>Products </h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="doctor-widget border-right-bg">
								<div class="doctor-box-icon flex-shrink-0">
									<img src="assets/img/icons/doctor-dash-02.svg" alt="">
								</div>
								<div class="doctor-content dash-count flex-grow-1">
									<h4><span class="counter-up">20</span><span>/125</span><span class="status-pink">-20%</span></h4>
									<h5>Pending Order</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="doctor-widget border-right-bg">
								<div class="doctor-box-icon flex-shrink-0">
									<img src="assets/img/icons/doctor-dash-03.svg" alt="">
								</div>
								<div class="doctor-content dash-count flex-grow-1">
									<h4><span class="counter-up">12</span><span>/30</span><span class="status-green">+40%</span></h4>
									<h5>Delivered Order</h5>
								</div>
							</div>
						</div><div class="col-xl-3 col-md-6">
							<div class="doctor-widget">
								<div class="doctor-box-icon flex-shrink-0">
									<img src="assets/img/icons/doctor-dash-04.svg" alt="">
								</div>
								<div class="doctor-content dash-count flex-grow-1">
									<h4><span class="counter-up">530</span><span></span><span class="status-green">+50%</span></h4>
									<h5>Cancelled Order</h5>
								</div>
							</div>
						</div>
					</div>
                </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Sales Representatives</h4>
                                <div>
                                    <ul class="nav chat-user-total">
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Delivered  75%</li>
                                        <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Cancelled 25%</li>
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
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@include('main_includes.footer_include')