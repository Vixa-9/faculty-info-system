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

                <li class="nav-item">
                    <a href="/admin/analytics" class="nav-link {{ request()->is('admin/analytics') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar nav-icon"></i>
                        <p>Analytics</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/faculty-info" class="nav-link {{ request()->is('admin/faculty-info') ? 'active' : '' }}">
                        <i class="fas fa-university nav-icon"></i>
                        <p>Faculty Info</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/lecturers" class="nav-link {{ request()->is('admin/lecturers*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                        <p>Lecturers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/departments" class="nav-link {{ request()->is('admin/departments*') ? 'active' : '' }}">
                        <i class="fas fa-building nav-icon"></i>
                        <p>Departments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/research" class="nav-link {{ request()->is('admin/research*') ? 'active' : '' }}">
                        <i class="fas fa-flask nav-icon"></i>
                        <p>Research Activities</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/student-projects" class="nav-link {{ request()->is('admin/student-projects*') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram nav-icon"></i>
                        <p>Student Projects</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/configs/add" class="nav-link {{ request()->is('admin/configs*') ? 'active' : '' }}">
                        <i class="fas fa-user nav-icon"></i>
                        <p>User Management</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/configs/add" class="nav-link {{ request()->is('admin/system*') ? 'active' : '' }}">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>System configuration</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link {{ request()->is('admin/menus*') ? 'active' : '' }}">
                        <i class="fas fa-sitemap nav-icon"></i>
                        <p>Menu Management</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('admin/news*') ? 'menu-open' : '' }}">
                    <a href="/admin/news" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                        <i class="fas fa-rss nav-icon"></i>
                        <p>News Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/news/create" class="nav-link {{ request()->is('admin/news/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/news" class="nav-link {{ request()->is('admin/news') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('admin/arts*') ? 'menu-open' : '' }}">
                    <a href="/admin/arts/list" class="nav-link {{ request()->is('admin/arts*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper nav-icon"></i>
                        <p>Article Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/arts/add" class="nav-link {{ request()->is('admin/arts/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/arts/list" class="nav-link {{ request()->is('admin/arts/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List of Articles</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('admin/slides*') ? 'menu-open' : '' }}">
                    <a href="/admin/slides/list" class="nav-link {{ request()->is('admin/slides*') ? 'active' : '' }}">
                        <i class="far fa-images nav-icon"></i>
                        <p>Slide Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/slides/add" class="nav-link {{ request()->is('admin/slides/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slide</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/slides/list" class="nav-link {{ request()->is('admin/slides/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slide List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/files/outline" class="nav-link {{ request()->is('admin/files*') ? 'active' : '' }}">
                        <i class="fas fa-upload nav-icon"></i>
                        <p>File Upload Management</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/contacts/add" class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
                        <i class="fas fa-address-card nav-icon"></i>
                        <p>Contact Management</p>
                    </a>
                </li>

                <li class="nav-item mt-3 border-top pt-2">
                    <a href="/" class="nav-link">
                        <i class="fas fa-globe nav-icon"></i>
                        <p>View Site</p>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="/admin/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link w-100 text-left" style="color:#c2c7d0;">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
