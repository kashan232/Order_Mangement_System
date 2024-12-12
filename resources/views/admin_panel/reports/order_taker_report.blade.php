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
							<li class="breadcrumb-item active">Order Taker Report</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">

							<form method="GET" action="{{ route('report.order.taker') }}">
								@csrf
								<div class="row">
									<!-- Customer Name -->
									<div class="col-md-4 mb-3">
										<label for="customer_name" class="form-label">Customer's Name</label>
										<select class="form-control" id="customer_name" name="customer_name">
											<option value="">All Customers</option>
											@foreach($customers as $customer)
											<option value="{{ $customer->customer_name }}"
												data-shop="{{ $customer->shop_name }}"
												data-pso="{{ $customer->pso_name }}">
												{{ $customer->customer_name }}
											</option>
											@endforeach
										</select>
									</div>

									<!-- Shop Name & POS Name -->
									<div class="col-md-4">
										<label for="shop_name" class="form-label">Shop Name</label>
										<input type="text" class="form-control" id="shop_name" name="shop_name" readonly>
									</div>

									<div class="col-md-4">
										<label for="pso_name" class="form-label">POS Name</label>
										<input type="text" class="form-control" id="pso_name" name="pso_name" readonly>
									</div>

									<!-- Review Type & Date -->
									<div class="col-md-4">
										<label for="review_type" class="form-label">Review Type</label>
										<select class="form-control" id="review_type" name="review_type">
											<option value="">All Types</option>
											<option value="positive">Positive</option>
											<option value="negative">Negative</option>
										</select>
									</div>

									<div class="col-md-4">
										<label for="review_date" class="form-label">Review Date</label>
										<input type="date" class="form-control" id="review_date" name="review_date">
									</div>

									<!-- Submit Button -->
									<div class="col-md-4 d-flex align-items-end">
										<button type="submit" class="btn btn-primary w-100">Filter</button>
									</div>
								</div>
							</form>


							<table class="table table-bordered mt-4">
								<thead>
									<tr>
										<th>Customer Name</th>
										<th>Shop Name</th>
										<th>POS Name</th>
										<th>Review Type</th>
										<th>Remarks</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									@forelse($filteredReviews as $review)
									<tr>
										<td>{{ $review->customer_name }}</td>
										<td>{{ $review->shop_name }}</td>
										<td>{{ $review->pso_name }}</td>
										<td><span class="badge {{ $review->review_type == 'positive' ? 'bg-success' : 'bg-danger' }}">
													{{ ucfirst($review->review_type) }}
												</span></td>
										<td>{{ $review->remarks }}</td>
										<td>{{ $review->created_at->format('d M Y') }}</td>
									</tr>
									@empty
									<tr>
										<td colspan="6" class="text-center">No reviews found.</td>
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
@include('main_includes.footer_include')

<script>
	document.getElementById('customer_name').addEventListener('change', function() {
		let selectedOption = this.options[this.selectedIndex];
		document.getElementById('shop_name').value = selectedOption.getAttribute('data-shop') || '';
		document.getElementById('pso_name').value = selectedOption.getAttribute('data-pso') || '';
	});
</script>