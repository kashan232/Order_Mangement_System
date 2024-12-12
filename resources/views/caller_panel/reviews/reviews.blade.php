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
							<li class="breadcrumb-item active">Reviews</li>
						</ul>

						<!-- Simple Filter -->
						<label for="complaint_status" class="mr-2 mt-4"><b>Filter Reviews:</b></label>
						<select class="form-select w-auto" id="complaint_status">
							<option value="">All Reviews</option>
							<option value="positive">Positive</option>
							<option value="negative">Negative</option>
						</select>
					</div>
				</div>
			</div>

			<!-- Review Table -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-block">
							<h6 class="card-title text-bold">Reviews</h6>

							<div class="table-responsive">
								<table class="datatable table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Customer Name</th>
											<th>Shop Name</th>
											<th>POS Name</th>
											<th>Review Type</th>
											<th>Date of Review</th>
											<th>Remarks</th>
										</tr>
									</thead>
									<tbody id="reviewTableBody">
										@forelse ($reviews as $key => $review)
										<tr data-status="{{ $review->review_type }}">
											<td>{{ $key + 1 }}</td>
											<td>{{ $review->customer_name }}</td>
											<td>{{ $review->shop_name }}</td>
											<td>{{ $review->pso_name }}</td>
											<td>
												<span class="badge {{ $review->review_type == 'positive' ? 'bg-success' : 'bg-danger' }}">
													{{ ucfirst($review->review_type) }}
												</span>
											</td>
											<td>{{ date('d M, Y', strtotime($review->created_at)) }}</td>
											<td>{{ $review->remarks }}</td>
										</tr>
										@empty
										<tr>
											<td colspan="7" class="text-center">No reviews found.</td>
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
	// Filter Table on Dropdown Change
	document.getElementById('complaint_status').addEventListener('change', function () {
		const selectedFilter = this.value.toLowerCase();
		const rows = document.querySelectorAll('#reviewTableBody tr');

		rows.forEach(row => {
			const rowStatus = row.getAttribute('data-status').toLowerCase();

			// Show all if no filter selected, otherwise match filter
			row.style.display = !selectedFilter || rowStatus === selectedFilter ? '' : 'none';
		});
	});
</script>
