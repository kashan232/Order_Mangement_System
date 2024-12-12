<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('home') }}"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-01.svg" alt=""></span> <span> Dashboard </span></a>
                </li>

                 <!-- Customers -->
                 <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-06.svg" alt=""></span> <span> Customers </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('customers.create') }}"> Create Customer </a></li>
                        <li><a href="{{ route('customers.index') }}"> List Customers </a></li>
                    </ul>
                </li>

                <!-- Sales -->
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-06.svg" alt=""></span> <span> Sales </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('sales.create') }}"> Create Sales </a></li>
                        <li><a href="{{ route('sales.index') }}"> List Sales </a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('complaints.list') }}"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-01.svg" alt=""></span> <span> Complaints </span></a>
                </li>

                 <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-07.svg" alt=""></span> <span> Customer Care </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('callers.create') }}"> Customer Care </a></li>
                        <li><a href="{{ route('callers.index') }}"> List Customer Cares </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-07.svg" alt=""></span> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('report.order.taker') }}"> Order Taker Report </a></li>
                    </ul>
                </li>


                



                <!-- Saler Account -->
                <!-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-02.svg" alt=""></span> <span> Saler Account </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('salers.create') }}"> Create Saler </a></li>
                        <li><a href="{{ route('salers.index') }}"> List Salers </a></li>
                    </ul>
                </li> -->

                 
               
               

                <!-- Products -->
                <!-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-08.svg" alt=""></span> <span> Products </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="create-product.html"> Create Product </a></li>
                        <li><a href="list-products.html"> List Products </a></li>
                    </ul>
                </li> -->

                <!-- Orders -->
                <!-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-03.svg" alt=""></span> <span> Orders </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="create-order.html"> Create Order </a></li>
                        <li><a href="list-orders.html"> List Orders </a></li>
                    </ul>
                </li> -->

                <!-- Customer Assign to Saler -->
                <!-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/Order_Booker_System/assets/img/icons/menu-icon-09.svg" alt=""></span> <span> Customer Assign </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="assign-customer.html"> Assign Customer </a></li>
                        <li><a href="list-assigned-customers.html"> List Assigned Customers </a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>
