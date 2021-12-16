<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span class="brand-text font-weight-light">PhoneStore</span>  
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo constant("URL") ?>public/assets/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_COOKIE['username'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a id="" href="<?php echo constant('URL') ?>Dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="" href="" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="" href="<?php echo constant('URL') ?>Product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="" href="<?php echo constant('URL') ?>Category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thể loại</p>
                            </a>
                        </li>
                                               
                        <li class="nav-item">
                            <a id="" href="<?php echo constant('URL') ?>publisher" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhà cung cấp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="" href="<?php echo constant('URL') ?>sale" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale</p>
                            </a>
                        </li>                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="" href="" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Quản lý user
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a id="user" href="<?php echo constant('URL') ?>User" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="role" href="<?php echo constant('URL') ?>Role" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="employee" href="<?php echo constant('URL') ?>Employee" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Quản lý nhân viên
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="customer" href="<?php echo constant('URL') ?>Customer" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Quản lý khách hàng
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="" href="<?php echo constant('URL') ?>importmanagement" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Quản lý nhập hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="" href="<?php echo constant('URL') ?>Order" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Quản lý hóa đơn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="" href="<?php echo constant('URL') ?>import" class="nav-link">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Nhập hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="" href="<?php echo constant('URL') ?>sell" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Sell</p>
                    </a>
                </li>
             
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>