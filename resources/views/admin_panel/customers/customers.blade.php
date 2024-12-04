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
							<li class="breadcrumb-item active">Caller Account</li>
						</ul>
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
							<h6 class="card-title text-bold">Customers</h6>
							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12">
											<table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
												<thead>
													<tr>
														<th>#</th>
														<th>Customer Name</th>
														<th>Shop Name</th>
														<th>Mobile </th>
														<th>CNIC</th>
														<th>Address</th>
														<th>PSO Name</th>
														<th>Shop Type</th>
														<th>Notes</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													@forelse ($Customers as $key => $customer)
													<tr>
														<td>{{ $key + 1 }}</td>
														<td>{{ $customer->customer_name }}</td>
														<td>{{ $customer->shop_name }}</td>
														<td>{{ $customer->mobile_number }}</td>
														<td>{{ $customer->cnic }}</td>
														<td>{{ $customer->address }}</td>
														<td>{{ $customer->pso_name ?? 'N/A' }}</td>
														<td>{{ $customer->shop_type ?? 'N/A' }}</td>
														<td>{{ $customer->notes ?? 'N/A' }}</td>
														<td>
															<a href="#" class="btn btn-sm btn-primary me-2">Edit</a>
															<form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
															</form>
														</td>
													</tr>
													@empty
													<tr>
														<td colspan="10" class="text-center">No customers found.</td>
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

</script>