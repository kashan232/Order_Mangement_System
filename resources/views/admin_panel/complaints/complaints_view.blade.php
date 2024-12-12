@include('main_includes.header_include')
<div class="main-wrapper">
	@include('main_includes.navbar_include')
	@include('main_includes.admin_sidebar_include')

	<!-- Take Action Modal -->
	<div class="modal fade" id="takeActionModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Take Action</h5>
				</div>

				<div class="modal-body">
					<form id="complaintForm">
						<div class="alert alert-success text-dark" role="alert" id="alertmessage" style="display: none;"></div>
						<input type="hidden" name="complaint_id" id="complaint_id" readonly>
						<input type="hidden" name="complaint_cnic" id="complaint_cnic" readonly>


						<div class="form-group">
							<label for="status">Status:</label>
							<select class="form-control" id="status" name="status">
								<option value="In Process">In process</option>
								<option value="Closed">Closed</option>
							</select>
						</div>

						<div class="form-group">
							<label for="remark">Remark:</label>
							<textarea class="form-control" id="remark" name="remark" rows="5"></textarea>
						</div>

						<div class="w-100 text-right">
							<button type="button" class="btn btn-primary mt-2 mb-2" id="submitBtn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<div class="page-wrapper">
		<div class="content">
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
							<li class="breadcrumb-item active"> View Complaint</li>
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
							<h6 class="card-title text-bold">View Complaint</h6>

							<div class="card-body table-border-style">
								<div class="table-responsive">
									<hr>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td><b>Complaint Number</b></td>
												<td>{{ $complaint->id }}</td>
											</tr>
											<tr>
												<td><b>User Type</b></td>
												<td>{{ $complaint->user_type }}</td>
											</tr>
											<tr>
												<td><b>Complaint Title</b></td>
												<td>{{ $complaint->complaint_title }}</td>
											</tr>
											<tr>
												<td><b>Description</b></td>
												<td>{{ $complaint->complaint_description }}</td>
											</tr>
											<tr>
												<td><b>Customer Name</b></td>
												<td>{{ $complaint->customer_id }}</td>
											</tr>
											<tr>
												<td><b>Contact Number</b></td>
												<td>{{ $complaint->contact_number }}</td>
											</tr>
											<tr>
												<td><b>Shop Name</b></td>
												<td>{{ $complaint->shop_name }}</td>
											</tr>
											<tr>
												<td><b>POS Name</b></td>
												<td>{{ $complaint->pso_name }}</td>
											</tr>
											<tr>
												<td><b>Complaint Date</b></td>
												<td>{{ \Carbon\Carbon::parse($complaint->complaint_date)->format('F d, Y') }}</td>
											</tr>
											<tr>
												<td><b>Status</b></td>
												<td>
													<span class="btn btn-{{ strtolower($complaint->status) == 'closed' ? 'success' : 'danger' }} btn-sm">
														{{ ucfirst($complaint->status) }}
													</span>
												</td>
											</tr>
											<tr>
												<td><b>Created At</b></td>
												<td>{{ \Carbon\Carbon::parse($complaint->created_at)->format('F d, Y h:i A') }}</td>
											</tr>
											<tr>
												<td><b>Updated At</b></td>
												<td>{{ \Carbon\Carbon::parse($complaint->updated_at)->format('F d, Y h:i A') }}</td>
											</tr>

											<!-- Show Remarks if Status is "In Process" or "Closed" -->
											@if(in_array(strtolower($complaint->status), ['in process', 'closed']))
											<tr>
												<td><b>Remarks</b></td>
												<td>{{ $complaint->remark ?? 'No remarks available' }}</td>
											</tr>
											@endif

											<tr>
												<td colspan="2" class="text-center">
													@if(strtolower($complaint->status) == 'closed')
													<span class="btn btn-secondary disabled">No Action Taken</span>
													@else
													<button type="button" class="btn btn-primary"
														data-toggle="modal" data-target="#takeActionModal"
														data-id="{{ $complaint->id }}"
														data-cnic="{{ $complaint->contact_number }}">
														Take Action
													</button>
													@endif
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
</div>
@include('main_includes.footer_include')

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->

<script>
	$('#takeActionModal').on('show.bs.modal', function(event) {
		const button = $(event.relatedTarget);
		const complaintId = button.data('id');
		const complaintCnic = button.data('cnic');

		$('#complaint_id').val(complaintId);
		$('#complaint_cnic').val(complaintCnic);
	});

	$('#submitBtn').on('click', function(e) {
		e.preventDefault(); // Prevent the default form submission

		var formData = {
			complaint_id: $('#complaint_id').val(),
			complaint_cnic: $('#complaint_cnic').val(),
			status: $('#status').val(),
			remark: $('#remark').val(),
			_token: '{{ csrf_token() }}'
		};

		$.ajax({
			url: "{{ route('complaints.update') }}",
			type: "POST",
			data: formData,
			success: function(response) {
				$('#alertmessage').show().text(response.message);
				$('#takeActionModal').modal('hide');
				location.reload(); // Refresh the page to see updates
			},
			error: function(response) {
				alert('Something went wrong. Please try again.');
			}
		});
	});

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