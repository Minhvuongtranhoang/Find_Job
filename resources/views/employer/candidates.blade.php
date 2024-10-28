
  @extends('layouts.employer')
  @section('content')
  <div class="col-lg-10 content">
    <div class="container mt-5">
      <div class="d-flex justify-content-between mb-4">
        <h1 class="h3">Candidates</h1>
        <button class="btn btn-primary">
          <i class="fas fa-download"></i> Export
        </button>
      </div>

      <!-- Filters & Search -->
      <div class="card mb-4">
        <div class="card-body">
          <form class="row g-3">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Search candidates...">
            </div>
            <div class="col-md-2">
              <select class="form-select">
                <option value="all">All Status</option>
                <option value="shortlisted">Shortlisted</option>
                <option value="under_review">Under Review</option>
                <option value="rejected">Rejected</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-select">
                <option value="all">All Experience</option>
                <option value="0-2">0-2 years</option>
                <option value="2-5">2-5 years</option>
                <option value="5+">5+ years</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-secondary w-100">
                <i class="fas fa-filter"></i> More Filters
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Candidates List -->
      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
          <thead>
            <tr>
              <th>Candidate</th>
              <th>Applied Position</th>
              <th>Skills</th>
              <th>Experience</th>
              <th>Status</th>
              <th>Applied Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // Simulated candidates data
              $candidates = [
                [
                  "id" => 1,
                  "name" => "Sarah Wilson",
                  "email" => "sarah.wilson@example.com",
                  "avatar" => "https://via.placeholder.com/40",
                  "appliedPosition" => "Senior Frontend Developer",
                  "skills" => ["React", "TypeScript", "Node.js"],
                  "experience" => "5 years",
                  "status" => "shortlisted",
                  "applicationDate" => "2024-10-15"
                ],
                [
                  "id" => 2,
                  "name" => "Michael Chen",
                  "email" => "michael.chen@example.com",
                  "avatar" => "https://via.placeholder.com/40",
                  "appliedPosition" => "Full Stack Developer",
                  "skills" => ["Python", "Django", "React"],
                  "experience" => "3 years",
                  "status" => "under_review",
                  "applicationDate" => "2024-10-18"
                ]
              ];

              foreach ($candidates as $candidate) {
                echo "<tr>
                        <td>
                          <div class='d-flex align-items-center'>
                            <img src='{$candidate['avatar']}' alt='Avatar' class='candidate-avatar me-3'>
                            <div>
                              <p class='mb-0'>{$candidate['name']}</p>
                              <small class='text-muted'>{$candidate['email']}</small>
                            </div>
                          </div>
                        </td>
                        <td>{$candidate['appliedPosition']}</td>
                        <td>" . implode(", ", $candidate['skills']) . "</td>
                        <td>{$candidate['experience']}</td>
                        <td>
                          <span class='badge bg-" . getStatusColor($candidate['status']) . " status-badge'>
                            " . ucfirst(str_replace('_', ' ', $candidate['status'])) . "
                          </span>
                        </td>
                        <td>{$candidate['applicationDate']}</td>
                        <td>
                          <button class='btn btn-sm btn-outline-secondary'>
                            <i class='fas fa-ellipsis-v'></i>
                          </button>
                        </td>
                      </tr>";
              }

              function getStatusColor($status) {
                return match ($status) {
                  'shortlisted' => 'success',
                  'under_review' => 'warning',
                  'rejected' => 'danger',
                  default => 'secondary',
                };
              }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link" href="#">Previous</a>
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

