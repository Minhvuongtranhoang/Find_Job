<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #fff;
            min-height: 100vh;
            border-right: 1px solid #dee2e6;
        }
        .sidebar .nav-link {
            color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #e9ecef;
            color: #000;
        }
        .content {
            padding: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
    .profile-header {
      background-color: #f8f9fa;
      padding: 20px;
      border-bottom: 1px solid #dee2e6;
    }
    .profile-header .profile-img {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      overflow: hidden;
      border: 4px solid #dee2e6;
    }
    .profile-header .profile-img img {
      width: 100%;
      height: 100%;
    }
    .profile-header .profile-info {
      margin-left: 20px;
    }
    .profile-header .profile-info h1 {
      margin: 0;
    }
    .profile-header .profile-info p {
      margin: 0;
      color: #6c757d;
    }
    .profile-content {
      padding: 20px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-lg-2 d-lg-block sidebar collapse">
                <div class="position-sticky">
                    <div class="d-flex justify-content-center py-4">
                        <span class="fs-3 fw-bold">JobBoard</span>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/"><i class="fas fa-building me-2"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employer.candidates"><i class="fas fa-users me-2"></i> Candidates</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="employer.job-posts"><i class="fas fa-file-alt me-2"></i> Job Posts</a>
                      </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employer.manage-jobs"><i class="fas fa-briefcase me-2"></i> Manage Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employer.profile"><i class="fas fa-user-circle me-2"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="general.general"><i class="fas fa-file-alt me-2"></i> General</a>
                      </li>
                    </ul>
                </div>
            </nav>
            <!--main content-->

              @yield('content')

            <!--footer-->
            <footer class="footer mt-auto py-3 bg-light">
              <div class="container">
                <span class="text-muted">&copy; {{ date('Y') }} JobBoard. All rights reserved.</span>
              </div>
            </footer>

        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
