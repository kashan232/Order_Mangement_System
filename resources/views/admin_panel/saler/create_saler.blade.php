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
							<li class="breadcrumb-item active">Saler Account</li>
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
							<form action="{{ route('saler.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-12">
										<div class="form-heading">
											<h4>Saler Details</h4>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Name <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Email <span class="login-danger">*</span></label>
											<input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Password <span class="login-danger">*</span></label>
											<input class="form-control" type="password" name="password" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Date of Birth <span class="login-danger">*</span></label>
											<input class="form-control" type="date" name="dob" value="{{ old('dob') }}" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Gender</label>
											<select class="form-control" name="gender">
												<option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
												<option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
												<option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
											</select>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Date of Joining <span class="login-danger">*</span></label>
											<input class="form-control" type="date" name="joining_date" value="{{ old('joining_date') }}" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Position <span class="login-danger">*</span></label>
											<input class="form-control" type="text" name="position" value="{{ old('position') }}" required>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Emergency Contact Person</label>
											<input class="form-control" type="text" name="emergency_contact_person" value="{{ old('emergency_contact_person') }}">
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Emergency Contact Number</label>
											<input class="form-control" type="text" name="emergency_contact_number" value="{{ old('emergency_contact_number') }}">
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Status</label>
											<select class="form-control" name="status">
												<option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
												<option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
											</select>
										</div>
									</div>

									<div class="col-12 col-md-6 col-xl-4">
										<div class="input-block local-forms">
											<label>Remarks/Notes</label>
											<textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea>
										</div>
									</div>

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