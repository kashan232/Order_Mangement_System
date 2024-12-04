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
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							@if ($errors->any())
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
							@endif
							<form action="{{ route('callers.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-12">
										<div class="form-heading">
											<h4>Caller Details</h4>
										</div>
									</div>

									<!-- Name -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Name <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter caller's name" required>
										</div>
									</div>

									<!-- Email -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Email <span class="login-danger">*</span></label>
											<input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
										</div>
									</div>

									<!-- Password -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Password <span class="login-danger">*</span></label>
											<input class="form-control" type="password" name="password" placeholder="Create a password" required>
										</div>
									</div>

									<!-- District -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>District <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="district" value="{{ old('district') }}" placeholder="Enter district name" required>
										</div>
									</div>

									<!-- Area -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Area <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="area" value="{{ old('area') }}" placeholder="Enter area or locality" required>
										</div>
									</div>

									<!-- Region -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Region</label>
											<input class="form-control" type="text" name="region" value="{{ old('region') }}" placeholder="Enter region" required>
										</div>
									</div>

									<!-- Contact Number -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Contact Number <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="Enter contact number" required>
										</div>
									</div>

									<!-- Notes -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Additional Notes</label>
											<textarea class="form-control" name="notes" placeholder="Add any relevant details">{{ old('notes') }}</textarea>
										</div>
									</div>

									<!-- Status -->
									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Status</label>
											<select class="form-control" name="status">
												<option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
												<option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
											</select>
										</div>
									</div>

									<!-- Submit Buttons -->
									<div class="col-12">
										<div class="doctor-submit">
											<button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
											<button type="reset" class="btn btn-primary cancel-form">Cancel</button>
										</div>
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