<div class="header">
	<div class="header-left">
		<a href="index.html" class="logo">
			<img src="/Order_Booker_System/assets/img/logo.png" width="35" height="35" alt=""> <span>Order Booker</span>
		</a>
	</div>
	<a id="toggle_btn" href="javascript:void(0);"><img src="/Order_Booker_System/assets/img/icons/bar-icon.svg" alt=""></a>
	<a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="/Order_Booker_System/assets/img/icons/bar-icon.svg" alt=""></a>
	<div class="top-nav-search mob-view">
		<form>
			<input type="text" class="form-control" placeholder="Search here">
			<a class="btn"><img src="/Order_Booker_System/assets/img/icons/search-normal.svg" alt=""></a>
		</form>
	</div>
	<ul class="nav user-menu float-end">
		<li class="nav-item dropdown has-arrow user-profile-list">
			<a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
				<div class="user-names">
					<h5>{{ Auth::user()->name }}</h5>
					<span>
						@if (Auth::user()->usertype === 'admin')
						Admin
						@elseif (Auth::user()->usertype === 'Saler')
						Saler
						@elseif (Auth::user()->usertype === 'Caller')
						Caller
						@else
						Unknown
						@endif
					</span>
				</div>
				<span class="user-img">
					<img src="/Order_Booker_System/assets/img/user-06.jpg" alt="Admin">
				</span>
			</a>
			<div class="dropdown-menu">
				<!-- <a class="dropdown-item" href="profile.html">My Profile</a>
				<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
				<a class="dropdown-item" href="settings.html">Settings</a> -->

				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item ai-icon">
						<span class="ms-2">{{ __('Log Out') }} </span>
					</a>
				</form>
			</div>
		</li>
	</ul>
</div>