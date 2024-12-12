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

						<!-- Status Filter -->
						<select class="form-select w-auto" id="complaint_status" name="complaint_status" required>
							<option value="">All Statuses</option>
							<option value="Pending">Pending</option>
							<option value="Inprogress">In Progress</option>
							<option value="Resolved">Resolved</option>
						</select>
					</div>
				</div>
			</div>

			<!-- Complaints Table -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-block">
							<h6 class="card-title text-bold">Complaints</h6>

							<div class="table-responsive">
								<table class="datatable table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Customer Name</th>
											<th>Contact Number</th>
											<th>Shop Name</th>
											<th>POS Name</th>
											<th>Date of Complaint</th>
											<th>Status</th>
											<th>Remarks</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($Complaint as $key => $complaint)
										<tr data-status="{{ $complaint->status }}">
											<td>{{ $key + 1 }}</td>
											<td>{{ $complaint->customer_id }}</td>
											<td>{{ $complaint->contact_number }}</td>
											<td>{{ $complaint->shop_name }}</td>
											<td>{{ $complaint->pso_name }}</td>
											<td>{{ $complaint->complaint_date }}</td>
											<td>
												@if($complaint->status == 'Pending')
												<span class="badge bg-primary">{{ $complaint->status }}</span>
												@elseif($complaint->status == 'Closed')
												<span class="badge bg-success">{{ $complaint->status }}</span>
												@elseif($complaint->status == 'In Process')
												<span class="badge bg-danger">{{ $complaint->status }}</span>
												@else
												<span class="badge bg-danger">{{ $complaint->status }}</span>
												@endif
											</td>
											<td>{{ $complaint->remark }}</td>
											
										</tr>
										@empty
										<tr>
											<td colspan="8" class="text-center">No complaints found.</td>
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
@include('main_includes.footer_include')

<script>
	document.getElementById('complaint_status').addEventListener('change', function() {
		const statusFilter = this.value;
		const rows = document.querySelectorAll('table tbody tr');

		rows.forEach(row => {
			const rowStatus = row.getAttribute('data-status');
			if (!statusFilter || rowStatus === statusFilter) {
				row.style.display = '';
			} else {
				row.style.display = 'none';
			}
		});
	});
</script>