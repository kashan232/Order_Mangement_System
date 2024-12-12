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
							<li class="breadcrumb-item active">Complaint</li>
						</ul>
						<select class="form-select w-auto" id="all_complains" name="all_complains" required>
							<option value="">All Complaint</option>

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
							<h6 class="card-title text-bold">Complaint</h6>

							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12">
											<table class="datatable table table-striped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
												<thead>
													<tr>
														<th>#</th>
														<th>Complaint Title</th>
														<th>Description</th>
														<th>Customer</th>
														<th>Contact</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach($complaints as $complaint)
													<tr>
														<td>{{ $complaint->id }}</td>
														<td>{{ $complaint->complaint_title }}</td>
														<td>{{ $complaint->complaint_description }}</td>
														<td>{{ $complaint->customer_id }}</td>
														<td>{{ $complaint->contact_number }}</td>
														<td>
															@if($complaint->status == 'Pending')
															<span class="badge bg-primary">{{ $complaint->status }}</span>
															@elseif($complaint->status == 'Closed')
															<span class="badge bg-success">{{ $complaint->status }}</span>
															@elseif($complaint->status == 'In Progress')
															<span class="badge bg-danger">{{ $complaint->status }}</span>
															@else
															<span class="badge bg-danger">{{ $complaint->status }}</span>
															@endif
														</td>
														<td>
															<a href="{{ route('complaints.view', $complaint->id) }}" class="btn btn-sm btn-primary">View</a>
														</td>

													</tr>
													@endforeach
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
	document.getElementById('all_complains').addEventListener('change', function() {
		const filterValue = this.value; // Get the selected customer id
		const rows = document.querySelectorAll('table tbody tr'); // Select all table rows

		rows.forEach(row => {
			const customerId = row.getAttribute('data-customer-id'); // Get the all_complains from the row
			if (!filterValue || customerId === filterValue) {
				row.style.display = ''; // Show the row
			} else {
				row.style.display = 'none'; // Hide the row
			}
		});
	});
</script>