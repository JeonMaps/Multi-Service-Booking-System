@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('business.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <!-- Charts Nav -->
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('services.index')}}">
                            <i class="bi bi-circle"></i><span>View Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('services.create')}}">
                            <i class="bi bi-circle"></i><span>Create a Services</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Charts Nav END -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('business.appointments',['businessId' => auth()->user()->service_provider_id])}}">
                    <i class="bi bi-gem"></i>
                    <span>Appointments</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('business-profile') }}">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('business-help') }}">
                    <i class="bi bi-question-circle"></i>
                    <span>Help</span>
                </a>
            </li><!-- End Help Page Nav -->
            
                <!-- End Error 404 Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->
@endsection
