<?php

echo"
<aside class='main-sidebar'>

        <!-- sidebar: style can be found in sidebar.less -->
        <section class='sidebar'>

          <!-- Sidebar user panel (optional) -->
          <div class='user-panel'>
            <div class='pull-left image'>
              <img src='".base_url("assets/admin/img/user2-160x160.jpg")."' class='img-circle' alt='User Image'>
            </div>
            <div class='pull-left info'>
              <p>".$_SESSION["user_login"]->name."</p>
              <!-- Status -->
              <a href='#'><i class='fa fa-circle text-success'></i> User online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action='#' method='get' class='sidebar-form'>
            <div class='input-group'>
              <input type='text' name='q' class='form-control' placeholder='Search...'>
              <span class='input-group-btn'>
                <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class='sidebar-menu'>
            <li class='header'>MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class='active'><a href='".base_url("admin")."'><i class='fa fa-link'></i> <span>Dashboard</span></a></li>
			<li class='treeview' style='display:none;'>
              <a href='#'><i class='fa fa-link'></i> <span>Pages</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/pages/about_us")."'>About Us</a></li>
                <li><a href='".base_url("admin/pages/contact_us")."'>Contact Us</a></li>
              </ul>
            </li>
			<li class='treeview'>
              <a href='#'><i class='fa fa-link'></i> <span>Products</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/products/add")."'>Add New</a></li>
                <li><a href='".base_url("admin/products")."'>Manage Product</a></li>
              </ul>
            </li>
            <li class='treeview'>
              <a href='#'><i class='fa fa-link'></i> <span>Masters</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/categories")."'>Manage Category</a></li>
                <li><a href='".base_url("admin/units")."'>Manage Unit</a></li>
              </ul>
            </li>
			<li class='treeview' style='display:none;'>
              <a href='#'><i class='fa fa-link'></i> <span>Events</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/events/manage_event")."'>Manage Event</a></li>
              </ul>
            </li>
			<li class='treeview'>
              <a href='#'><i class='fa fa-link'></i> <span>Sliders</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/sliders")."'>Manage Slider</a></li>
              </ul>
            </li>
			<li class='treeview'>
              <a href='#'><i class='fa fa-link'></i> <span>Users</span> <i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='".base_url("admin/users")."'>Manage User</a></li>
              </ul>
            </li>
			<li style='display:none;'><a href='".base_url("admin/setings")."'><i class='fa fa-link'></i> <span>Setting</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
	";
	
?>