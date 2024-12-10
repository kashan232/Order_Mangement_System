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
							<li class="breadcrumb-item active">Sales Account</li>
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
							<form action="{{ route('sales.store') }}" method="POST">
								@csrf
								<div class="row">
									<!-- Sale Header -->
									<div class="col-12 mb-4">
										<h4 class="form-heading text-center">Sales Entry</h4>
									</div>

									<!-- Customer Selection -->
									<div class="col-md-4">
										<div class="mb-3">
											<label for="customer_id" class="form-label">Select Customer <span class="text-danger">*</span></label>
											<select class="form-control" id="customer_id" name="customer_id" required>
												<option value="" disabled selected>Select Customer</option>
												@foreach($customers as $customer)
												<option value="{{ $customer->id }}" data-pso="{{ $customer->pso_name }}" data-shop="{{ $customer->shop_name }}">{{ $customer->customer_name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<!-- Shop Name (Auto-Populate based on selected customer) -->
									<div class="col-md-4">
										<div class="mb-3">
											<label for="shop_name" class="form-label">Shop Name</label>
											<input type="text" class="form-control" id="shop_name" name="shop_name" readonly>
										</div>
									</div>

									<!-- POS Name (Auto-Populate based on selected customer) -->
									<div class="col-md-4">
										<div class="mb-3">
											<label for="pso_name" class="form-label">POS Name</label>
											<input type="text" class="form-control" id="pso_name" name="pso_name" readonly>
										</div>
									</div>


									<!-- Sale Date -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="sale_date" class="form-label">Sale Date</label>
											<input type="date" class="form-control" id="sale_date" name="sale_date" required>
										</div>
									</div>

									<!-- Sale Amount -->
									<div class="col-md-6">
										<div class="mb-3">
											<label for="sale_amount" class="form-label">Sale Amount <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="sale_amount" name="sale_amount" required>
										</div>
									</div>

									<!-- Submit Button -->
									<div class="col-12 text-center">
										<button type="submit" class="btn btn-primary submit-form">Save Sale</button>
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
	document.getElementById('customer_id').addEventListener('change', function() {
		var selectedCustomer = this.options[this.selectedIndex];
		var psoName = selectedCustomer.getAttribute('data-pso');
		var psoshop = selectedCustomer.getAttribute('data-shop');

		document.getElementById('pso_name').value = psoName;
		document.getElementById('shop_name').value = psoshop;
	});
</script>