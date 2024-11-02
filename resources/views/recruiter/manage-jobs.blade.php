<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Jobs</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .custom-search-icon {
            position: absolute;
            left: 15px;
            top: 10px;
            color: #6c757d;
        }
        .custom-input {
            padding-left: 40px;
        }
        .badge-custom {
            font-size: 12px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
@extends('layouts.employer')
@section('content')

  <div class="col-lg-10 content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 font-weight-bold">Manage Jobs</h1>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Post New Job
            </a>
        </div>

        <!-- Filters and Search -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 position-relative mb-3">
                        <input type="text" class="form-control custom-input" placeholder="Search jobs...">
                        <i class="fas fa-search custom-search-icon"></i>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-control">
                            <option value="all">All Status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-control">
                            <option value="all">All Job Types</option>
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-control">
                            <option value="all">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jobs List -->
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Job Title</th>
                            <th>Applications</th>
                            <th>Status</th>
                            <th>Date Posted</th>
                            <th>Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Senior PHP Developer</strong>
                                <div class="text-muted">Full Time • $60k-$80k • New York</div>
                            </td>
                            <td>
                                <span class="badge badge-primary badge-custom">12 Applications</span>
                            </td>
                            <td>
                                <span class="badge badge-success badge-custom">Open</span>
                            </td>
                            <td>2024-10-12</td>
                            <td>2024-11-12</td>
                            <td>
                                <a href="#" class="text-primary">Edit</a> |
                                <a href="#" class="text-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>UI/UX Designer</strong>
                                <div class="text-muted">Contract • $40k-$60k • Remote</div>
                            </td>
                            <td>
                                <span class="badge badge-primary badge-custom">8 Applications</span>
                            </td>
                            <td>
                                <span class="badge badge-danger badge-custom">Closed</span>
                            </td>
                            <td>2024-10-01</td>
                            <td>2024-10-30</td>
                            <td>
                                <a href="#" class="text-primary">Edit</a> |
                                <a href="#" class="text-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
  </div>
@endSection

    <!-- FontAwesome and Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
