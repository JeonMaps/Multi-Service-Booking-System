@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <!-- Users Nav -->
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('users.index')}}">
                            <i class="bi bi-circle"></i><span>View Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('users.create-admin')}}">
                            <i class="bi bi-circle"></i><span>Create an admin account</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('users.create-business')}}">
                            <i class="bi bi-circle"></i><span>Create a business account</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Users Nav END -->

            <li class="nav-item">
                <!-- Service Providers Nav -->
                <a class="nav-link collapsed" data-bs-target="#providers-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Service Providers</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="providers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('service-providers.index')}}">
                            <i class="bi bi-circle"></i><span>View Businesses</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('service-providers.create')}}">
                            <i class="bi bi-circle"></i><span>Create a Business</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Service Providers Nav END -->

            <li class="nav-item">
                <!-- Categories Nav -->
                <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tag-fill"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('categories.index')}}">
                            <i class="bi bi-circle"></i><span>View Categories</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Charts Nav END -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin.appointments')}}">
                    <i class="bi bi-bookmark-check-fill"></i>
                    <span>Appointments</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin-profile') }}">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('help') }}">
                    <i class="bi bi-question-circle"></i>
                    <span>Help</span>
                </a>
            </li><!-- End Help Page Nav -->
            
                <!-- End Error 404 Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->
@endsection
