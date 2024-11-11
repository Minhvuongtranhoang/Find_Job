<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #4b6cb7;
            --secondary-color: #182848;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            padding: 10px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand i {
            margin-right: 10px;
        }

        .toggle-sidebar {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);

        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 0.75rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }

        .btn {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .form-input, .form-textarea {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            width: 100%;
        }

        .form-input:focus, .form-textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }

        .form-select {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            width: 100%;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 5px 0 15px rgba(0,0,0,0.2);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding-top: 60px;
            }

            .toggle-sidebar {
                display: block;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .card-stats {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .table td, .table th {
                min-width: 200px;
            }

            .table td:last-child, .table th:last-child {
                position: sticky;
                right: 0;
                background: white;
                box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px;
            }

            .card {
                padding: 1rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .d-flex {
                flex-direction: column;
            }

            .brand {
                font-size: 20px;
            }
        }









/* Base Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Container */
.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 1rem;
}

@media (max-width: 640px) {
  .container {
    padding: 0.5rem;
  }
}

/* Typography */
h1 {
  font-size: 1.875rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 1.5rem;
}

@media (max-width: 640px) {
  h1 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }
}

/* Card Styles */
.card {
  background: #fff;
  border-radius: 0.75rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.card:hover {
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

/* Table Styles */
table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

thead {
  background: #f8fafc;
}

th {
  padding: 1rem;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: #64748b;
  text-align: left;
}

td {
  padding: 1rem;
  font-size: 0.875rem;
  color: #334155;
  vertical-align: middle;
}

tr {
  border-bottom: 1px solid #e2e8f0;
}

tbody tr:hover {
  background: #f8fafc;
}

@media (max-width: 768px) {
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }

  th, td {
    padding: 0.75rem;
  }
}

/* Form Styles */
.form-input,
.form-textarea {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #e2e8f0;
  border-radius: 0.375rem;
  font-size: 0.875rem;
  transition: all 0.3s ease;
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-label {
  display: block;
  font-size: 0.875rem;
  font-weight: 600;
  color: #1a1a1a;
  margin-bottom: 0.5rem;
}

/* Button Styles */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.625rem 1.25rem;
  font-size: 0.875rem;
  font-weight: 500;
  border-radius: 0.375rem;
  transition: all 0.3s ease;
  cursor: pointer;
}

.btn-primary {
  background: #3b82f6;
  color: #fff;
}

.btn-primary:hover {
  background: #2563eb;
}

.btn-danger {
  background: #ef4444;
  color: #fff;
}

.btn-danger:hover {
  background: #dc2626;
}

/* Status Badge Styles */
.badge {
  display: inline-flex;
  align-items: center;
  padding: 0.25rem 0.75rem;
  font-size: 0.75rem;
  font-weight: 600;
  border-radius: 9999px;
}

.badge-success {
  background: #dcfce7;
  color: #166534;
}

.badge-warning {
  background: #fef3c7;
  color: #92400e;
}

.badge-danger {
  background: #fee2e2;
  color: #991b1b;
}

/* Avatar & Image Styles */
.avatar {
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 50%;
  object-fit: cover;
}

.company-logo {
  max-height: 5rem;
  width: auto;
  object-fit: contain;
}

/* Alert Styles */
.alert {
  padding: 1rem;
  border-radius: 0.375rem;
  margin-bottom: 1rem;
}

.alert-success {
  background: #dcfce7;
  border: 1px solid #86efac;
  color: #166534;
}

/* Location Item Styles */
.location-item {
  border: 1px solid #e2e8f0;
  border-radius: 0.5rem;
  padding: 1rem;
  margin-bottom: 1rem;
  transition: all 0.3s ease;
}

.location-item:hover {
  border-color: #3b82f6;
}

/* Responsive Grid */
.grid {
  display: grid;
  gap: 1.5rem;
}

@media (min-width: 640px) {
  .grid-cols-2 {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 768px) {
  .grid-cols-3 {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* Utility Classes */
.flex {
  display: flex;
}

.items-center {
  align-items: center;
}

.justify-between {
  justify-content: space-between;
}

.gap-4 {
  gap: 1rem;
}

.mb-4 {
  margin-bottom: 1rem;
}

.hidden {
  display: none;
}

@media (min-width: 768px) {
  .md\:block {
    display: block;
  }

  .md\:hidden {
    display: none;
  }
}

/* Pagination Styles */
.pagination {
  display: flex;
  justify-content: center;
  gap: 0.5rem;
  margin-top: 1.5rem;
}

.pagination-link {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  background: #f8fafc;
  color: #1a1a1a;
  font-size: 0.875rem;
  transition: all 0.3s ease;
}

.pagination-link:hover {
  background: #e2e8f0;
}

.pagination-link.active {
  background: #3b82f6;
  color: #fff;
}
    </style>
</head>
<body>
    <button class="toggle-sidebar btn">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar">
        <div class="brand">
            <i class="fas fa-building"></i>
            Recruiter Pro
        </div>
        <nav class="nav flex-column">
            <a href="{{ route('recruiter.dashboard') }}" class="nav-link {{ request()->routeIs('recruiter.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="{{ route('recruiter.jobs.index') }}" class="nav-link {{ request()->routeIs('recruiter.jobs.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>
                Manage Jobs
            </a>
            <a href="{{ route('recruiter.applications.index') }}" class="nav-link {{ request()->routeIs('recruiter.applications.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Applications
            </a>
            <a href="{{ route('recruiter.company.edit') }}" class="nav-link {{ request()->routeIs('recruiter.company.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                Company Profile
            </a>
            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="nav-link w-100 border-0 bg-transparent text-start">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Handle active state of nav links
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            if (currentPath.includes(link.getAttribute('href'))) {
                link.classList.add('active');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
