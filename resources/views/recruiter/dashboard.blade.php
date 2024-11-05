
@extends('layouts.recruiter')
    @section('content')
            <!-- Main Content -->
            <div class="row mb-4">
              <div class="col-12">
                  <h2 class="mb-4">Dashboard Overview</h2>
              </div>
              <div class="col-md-3">
                  <div class="card stats-card p-3 mb-3">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h6 class="mb-0">Active Jobs</h6>
                              <h3 class="mb-0">24</h3>
                          </div>
                          <i class="fas fa-briefcase fa-2x"></i>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card stats-card p-3 mb-3">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h6 class="mb-0">New Applications</h6>
                              <h3 class="mb-0">156</h3>
                          </div>
                          <i class="fas fa-users fa-2x"></i>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card stats-card p-3 mb-3">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h6 class="mb-0">Interviews</h6>
                              <h3 class="mb-0">12</h3>
                          </div>
                          <i class="fas fa-calendar-check fa-2x"></i>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card stats-card p-3 mb-3">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h6 class="mb-0">Hired</h6>
                              <h3 class="mb-0">8</h3>
                          </div>
                          <i class="fas fa-handshake fa-2x"></i>
                      </div>
                  </div>
              </div>
          </div>
@endSection
