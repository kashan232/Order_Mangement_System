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
							<li class="breadcrumb-item active">Sales</li>
						</ul>
						<select class="form-select w-auto" id="customer_id" name="customer_id" required>
							<option value="">All Customers</option>
							@foreach($customers as $customer)
							<option value="{{ $customer->id }}" data-pso="{{ $customer->pso_name }}">
								{{ $customer->customer_name }}
							</option>
							@endforeach
						</select>

					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				@if (session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show mt-4">
					<strong>Success!</strong> {{ session('success') }}.
				</div>
				@endif

				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-block">
							<h6 class="card-title text-bold">Sales</h6>

							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12">
											<table class="datatable table table-striped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
												<thead>
													<tr>
														<th>#</th>
														<th>Customer Name</th>
														<th>Shop Name</th>
														<th>POS Name</th>
														<th>Sale Date</th>
														<th>Sale Amount</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													@forelse ($sales as $key => $sale)
													<tr data-customer-id="{{ $sale->customer_id }}">
														<td>{{ $key + 1 }}</td>
														<td>{{ $sale->customer->customer_name }}</td>
														<td>{{ $sale->shop_name }}</td>
														<td>{{ $sale->pso_name }}</td>
														<td>{{ $sale->sale_date }}</td>
														<td>{{ $sale->sale_amount }}</td>
														<td>
															<a href="#" class="btn btn-sm btn-primary me-2">Edit</a>
															<form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block;">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this sale?')">Delete</button>
															</form>
														</td>
													</tr>
													@empty
													<tr>
														<td colspan="6" class="text-center">No sales found.</td>
													</tr>
													@endforelse
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
		</div>
	</div>
</div>
@include('main_includes.footer_include')
<script>
    document.getElementById('customer_id').addEventListener('change', function() {
        const filterValue = this.value; // Get the selected customer id
        const rows = document.querySelectorAll('table tbody tr'); // Select all table rows

        rows.forEach(row => {
            const customerId = row.getAttribute('data-customer-id'); // Get the customer_id from the row
            if (!filterValue || customerId === filterValue) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });
</script>