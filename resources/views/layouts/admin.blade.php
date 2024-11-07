<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Find Jobs')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- ApexCharts -->
    <link href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.css" rel="stylesheet">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: #2c3e50;
            padding-top: 20px;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed {
            width: 70px;
        }

        .main-content {
            margin-left: 280px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .main-content-expanded {
            margin-left: 70px;
        }

        .nav-link {
            color: #ecf0f1;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: #34495e;
            color: #fff;
        }

        .nav-link.active {
            background: #3498db;
            color: #fff;
        }

        .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        .stat-card {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .user-profile {
            padding: 20px;
            border-bottom: 1px solid #34495e;
            margin-bottom: 20px;
        }

        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .main-content {
                margin-left: 70px;
            }

            .nav-link span {
                display: none;
            }

            .sidebar.mobile-expanded {
                width: 280px;
            }

            .sidebar.mobile-expanded .nav-link span {
                display: inline;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="user-profile text-white">
            <div class="d-flex align-items-center">
                <img src="{{ auth()->user()->avatar ?? 'https://via.placeholder.com/50' }}" alt="Admin" class="me-3">
                <div class="user-info">
                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                    <small>Administrator</small>
                </div>
            </div>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.jobs.pending') ? 'active' : '' }}" href="{{ route('admin.jobs.pending') }}">
                    <i class="fas fa-clock"></i>
                    <span>Pending Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.jobs.approved') ? 'active' : '' }}" href="{{ route('admin.jobs.approved') }}">
                    <i class="fas fa-check-circle"></i>
                    <span>Approved Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-tags"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <button class="btn" id="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex">
                    <div class="dropdown">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="notificationDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                            <li><a class="dropdown-item" href="#">New job application</a></li>
                            <li><a class="dropdown-item" href="#">New user registration</a></li>
                            <li><a class="dropdown-item" href="#">Pending job approval</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @if(request()->routeIs('admin.dashboard'))
        <div class="container-fluid">
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Job Seekers</h5>
                            <h2 class="mb-0">{{ \App\Models\User::where('role', 'job_seeker')->count() }}</h2>
                            <small>Total registered job seekers</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Recruiters</h5>
                            <h2 class="mb-0">{{ \App\Models\User::where('role', 'recruiter')->count() }}</h2>
                            <small>Total registered recruiters</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Active Jobs</h5>
                            <h2 class="mb-0">{{ \App\Models\Job::where('status', 'approved')->count() }}</h2>
                            <small>Currently active job postings</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <h2 class="mb-0">{{ \App\Models\Category::count() }}</h2>
                            <small>Total job categories</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Job Applications Trend</h5>
                            <div id="applicationsChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Popular Categories</h5>
                            <div id="categoriesChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Activities</h5>
                    <div class="list-group">
                        @foreach(\App\Models\JobApplication::latest()->take(5)->get() as $application)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New application for {{ $application->job->title }}</h6>
                                <small>{{ $application->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $application->user->jobSeeker->full_name }} applied for this position</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.min.js"></script>

    <script>
        // Sidebar Toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('sidebar-collapsed');
            document.getElementById('main-content').classList.toggle('main-content-expanded');
        });

        // Mobile Sidebar
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').classList.add('sidebar-collapsed');
            document.getElementById('main-content').classList.add('main-content-expanded');
        }

        // Initialize Charts if on dashboard
        if (document.getElementById('applicationsChart')) {
            // Applications Trend Chart
            var applicationsOptions = {
                series: [{
                    name: 'Applications',
                    data: [30, 40, 35, 50, 49, 60, 70]
                }],
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
                },
                yaxis: {
                    title: {
                        text: 'Number of Applications'
                    }
                },
                tooltip: {
                    shared: true
                }
            };
            new ApexCharts(document.getElementById('applicationsChart'), applicationsOptions).render();

            // Categories Pie Chart
            var categoriesOptions = {
                series: [44, 55, 13, 43, 22],
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: ['Technology', 'Marketing', 'Sales', 'Design', 'Others'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            new ApexCharts(document.getElementById('categoriesChart'), categoriesOptions).render();
        }
    </script>

    @stack('scripts')
</body>
</html>
