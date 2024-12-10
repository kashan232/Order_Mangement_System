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
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
							<li class="breadcrumb-item active">Complaints</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							@if (session()->has('success'))
							<div class="alert alert-success alert-dismissible fade show mt-4">
								<strong>Success!</strong> {{ session('success') }}.
							</div>
							@endif
							@if ($errors->any())
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
							@endif
							<form action="{{ route('complaints.store') }}" method="POST">
								@csrf
								<div class="row">
									<!-- Sale Header -->
									<div class="col-12 mb-4">
										<h4 class="form-heading text-center">Register Complaints</h4>
									</div>

									<!-- Complaint Title -->
									<div class="col-12 mb-3">
										<label for="complaint_title" class="form-label">Complaint Title</label>
										<input type="text" class="form-control" id="complaint_title" name="complaint_title" required>
									</div>

									<!-- Complaint Description -->
									<div class="col-12 mb-3">
										<label for="complaint_description" class="form-label">Complaint Description</label>
										<textarea class="form-control" id="complaint_description" name="complaint_description" rows="4" required></textarea>
									</div>

									<!-- Customer's Name -->
									<div class="col-12 mb-3">
										<label for="customer_name" class="form-label">Customer's Name</label>
										<select class="form-control" id="customer_name" name="customer_name" required>
											<option disabled selected>Select Customer</option>
											@foreach($customers as $customer)
											<option value="{{ $customer->customer_name }}" data-cnt="{{ $customer->mobile_number }}" data-pso="{{ $customer->pso_name }}" data-shop="{{ $customer->shop_name }}">{{ $customer->customer_name }}</option>
											@endforeach
										</select>

									</div>

									<!-- Customer's Contact Number -->
									<div class="col-md-4 mb-3">
										<label for="contact_number" class="form-label">Customer's Contact Number</label>
										<input type="text" class="form-control" id="contact_number" name="contact_number" required>
									</div>

									<div class="col-md-4">
										<div class="mb-3">
											<label for="shop_name" class="form-label">Shop Name</label>
											<input type="text" class="form-control" id="shop_name" name="shop_name" readonly>
										</div>
									</div>

									<div class="col-md-4">
										<div class="mb-3">
											<label for="pso_name" class="form-label">POS Name</label>
											<input type="text" class="form-control" id="pso_name" name="pso_name" readonly>
										</div>
									</div>
									<!-- Date of Complaint -->
									<div class="col-12 mb-3">
										<label for="complaint_date" class="form-label">Date of Complaint</label>
										<input type="date" class="form-control" id="complaint_date" name="complaint_date" required>
									</div>

									<!-- Submit Button -->
									<div class="col-12 text-center">
										<button type="submit" class="btn btn-primary submit-form">Save Complaint</button>
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

<script>
	// When customer is selected, set the POS Name field automatically
	document.getElementById('customer_name').addEventListener('change', function() {
		var selectedCustomer = this.options[this.selectedIndex];
		var cnt = selectedCustomer.getAttribute('data-cnt');
		var psoName = selectedCustomer.getAttribute('data-pso');
		var psoshop = selectedCustomer.getAttribute('data-shop');

		document.getElementById('pso_name').value = psoName;
		document.getElementById('shop_name').value = psoshop;
		document.getElementById('contact_number').value = cnt;
	});
</script>