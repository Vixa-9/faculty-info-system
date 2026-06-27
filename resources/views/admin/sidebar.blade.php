<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/tgu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/admin/configs/add" class="nav-link active">
                        <i class="fas fa-user"></i>
                        <p>
                           User Management
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/configs/add" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>
                            System configuration

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                        <i class="fas fa-sitemap"></i>
                        <p>
                            Menu Management
                            {{--<i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu List</p>
                            </a>
                        </li>
                    </ul>--}}
                </li>

                <li class="nav-item">
                    <a href="/admin/news" class="nav-link">
                        <i class="fas fa-rss"></i>
                        <p>
                            News Management
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/news/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/news" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/arts/add" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            Article Management
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/arts/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/arts/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List of Articles</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/slides/add" class="nav-link">
                        <i class="far fa-images"></i>
                        <p>
                            Slide Management
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/slides/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slides</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/slides/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slide List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/slides/add" class="nav-link">
                        <i class="fas fa-wifi"></i>
                        <p>
                            Manage Link Pages
                        </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>--}}
                </li>

                <li class="nav-item">
                    <a href="/admin/sliders/add" class="nav-link">
                        <i class="fas fa-video"></i>
                        <p>
                            Video Management
                        </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>--}}
                </li>
                <li class="nav-item">
                   <a {{--href="/"--}} class="nav-link">
                        <i class="fas fa-upload"></i>
                        <p>
                            File Upload Management
                        </p>
                       <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/files/outline" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload the detailed course syllabus.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload the detailed course syllabus.</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/files/lis-outline" class="nav-link">
                        <i class="fab fa-facebook-square"></i>
                        <p>
                            Social Media Management
                         </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>--}}
                </li>

                <li class="nav-item">
                    <a href="/admin/contacts/add" class="nav-link">
                        <i class="fas fa-address-card"></i>
                        <p>
                            Contact Management
                        </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>--}}
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
