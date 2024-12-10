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
							<li class="breadcrumb-item active">Customer Care Account</li>
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
							<h6 class="card-title text-bold">Customer Cares</h6>
							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12">
											<table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
												<thead>
													<tr role="row">
														<th>Caller Name</th>
														<th>Email</th>
														<th>District</th>
														<th>Area</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($callers as $caller)
													<tr>
														<td>{{ $caller->name }}</td>
														<td>{{ $caller->email }}</td>
														<td>{{ $caller->district }}</td>
														<td>{{ $caller->area }}</td>
														<td>
															<span class="badge {{ $caller->status == 'active' ? 'bg-success' : 'bg-danger' }}">
																{{ ucfirst($caller->status) }}
															</span>
														</td>
														<td>
															<form action="{{ route('callers.destroy', $caller->id) }}" method="POST" style="display:inline-block;">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Caller?');">Delete</button>
															</form>

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

</script>