<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li>
					<a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-01.svg" alt=""></span> <span> Dashboard </span></a>
				</li>
				

				 <!-- Customers -->
                 <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-06.svg" alt=""></span> <span> Customers </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('customerscare.create') }}"> Create Customer </a></li>
                        <li><a href="{{ route('customerscare.index') }}"> List Customers </a></li>
                    </ul>
                </li>

                <!-- Sales -->
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-06.svg" alt=""></span> <span> Sales </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('customerscaresales.create') }}"> Create Sales </a></li>
                        <li><a href="{{ route('customerscaresales.index') }}"> List Sales </a></li>
                    </ul>
                </li>

                 <!-- Complains -->
                 <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-06.svg" alt=""></span> <span> Complaint </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('complaints.create') }}"> Create Complaint </a></li>
                        <li><a href="{{ route('complaints') }}"> List Complaint </a></li>
                    </ul>
                </li>

			</ul>
			
		</div>
	</div>
</div>
