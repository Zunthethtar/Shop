 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
    <!-- LOGO -->
<div class="d-flex justify-content-center mt-3">
<p class="font-italic" style="font-size: 17px;color:hotpink">Z</p>
<span style="font-size: 20px;color:black">Shop</span>
</div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                   <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarLayouts" data-bs-target="#sidebarLayouts">
                   <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span>
                </a>
                    <div class="collapse menu-dropdown ms-4" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                           <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/owner/index') }}">Owner</a>

                           </li> 
                           <li class="nav-item mt-1">
                            <a class="dropdown-item" style="color: white;"  href="{{ url('admin/sub_category/index') }}">Sub Category</a>

                        </li> 
                            <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;" href="{{ url('admin/categories/index') }}">Categories</a>
                               </li>
                               
                            <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/products/index') }}">Products</a>

                           </li>
                           <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/order/index') }}">Order</a>
                           </li>

                           <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/order_detail/index') }}">Order Detail</a>

                           </li>
                           <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/shop/index') }}">Shop</a>

                           </li>                        
                           <li class="nav-item mt-1">
                               <a class="dropdown-item" style="color: white;"  href="{{ url('admin/bill/index') }}">Bill</a>

                           </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<!-- ============================================================== -->