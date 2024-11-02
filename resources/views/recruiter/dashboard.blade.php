
{{-- @extends('layouts.employer') --}}
    @section('content')
            <!-- Main Content -->
            <div class="col-lg-10 content">
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <form class="d-flex ms-auto">
                                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                            </form>
                            <ul class="navbar-nav ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="/api/placeholder/32/32" class="rounded-circle" alt="User" width="32"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Dashboard Content -->
                <div class="py-4">
                    <h2 class="mb-4">Dashboard</h2>
                    <div class="row">
                        <!-- Stats Cards -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-briefcase fa-2x text-muted"></i>
                                    <div class="ms-4">
                                        <h6>Total Jobs Posted</h6>
                                        <h4>12</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-users fa-2x text-muted"></i>
                                    <div class="ms-4">
                                        <h6>Total Applications</h6>
                                        <h4>48</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-file-alt fa-2x text-muted"></i>
                                    <div class="ms-4">
                                        <h6>Active Jobs</h6>
                                        <h4>8</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Applications Table -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Candidate</th>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                    <th>Applied Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/api/placeholder/40/40" class="rounded-circle me-3" width="40" alt="">
                                            <div>
                                                <strong>John Smith</strong>
                                                <p class="text-muted mb-0">john@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Senior Developer</td>
                                    <td><span class="badge bg-success">Under Review</span></td>
                                    <td>2024-10-20</td>
                                </tr>
                                <!-- Repeat similar rows for other applications -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endSection
