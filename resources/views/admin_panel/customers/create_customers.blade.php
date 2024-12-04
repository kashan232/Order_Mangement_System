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
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
							<li class="breadcrumb-item active">Customers Account</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							@if ($errors->any())
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
							@endif
							<form action="{{ route('customers.store') }}" method="POST">
								@csrf
								<div class="row">
									<!-- Customer Name -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer's name" value="{{ old('customer_name') }}" required>
										</div>
									</div>

									<!-- Shop Name -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="shop_name" class="form-label">Shop Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter shop name" value="{{ old('shop_name') }}" required>
										</div>
									</div>

									<!-- Mobile Number -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="mobile_number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" value="{{ old('mobile_number') }}" required>
										</div>
									</div>

									<!-- CNIC -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="cnic" class="form-label">CNIC Number <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC number" value="{{ old('cnic') }}" required>
										</div>
									</div>

									<!-- Address -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="address" class="form-label">Address <span class="text-danger">*</span></label>
											<textarea class="form-control" id="address" name="address" placeholder="Enter address" required>{{ old('address') }}</textarea>
										</div>
									</div>

									<!-- Assigned PSO (Order Taker) -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="pso_name" class="form-label">Assigned PSO (Order Taker)</label>
											<input type="text" class="form-control" id="pso_name" name="pso_name" placeholder="Enter assigned PSO name" value="{{ old('pso_name') }}">
										</div>
									</div>

									<!-- Shop Type -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="shop_type" class="form-label">Shop Type</label>
											<select class="form-control" id="shop_type" name="shop_type">
												<option value="" disabled selected>Select shop type</option>
												<option value="Retail">Retail</option>
												<option value="Wholesale">Wholesale</option>
												<option value="Service">Service</option>
											</select>
										</div>
									</div>

									<!-- Notes -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="notes" class="form-label">Additional Notes</label>
											<textarea class="form-control" id="notes" name="notes" placeholder="Add any relevant details">{{ old('notes') }}</textarea>
										</div>
									</div>

									<!-- Submit Buttons -->
									<div class="col-12 text-center">
										<button type="submit" class="btn btn-primary submit-form me-2">Register</button>
										<button type="reset" class="btn btn-secondary me-2">Reset</button>
									</div>
								</div>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('main_includes.footer_include')