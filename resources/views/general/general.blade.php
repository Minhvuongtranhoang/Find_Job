<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add some additional styling for better UI */
        body {
            background-color: #f7f7f7;
        }

        .profile-header {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .card {
            border-radius: 0.5rem;
        }

        .card-title {
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        a.text-white {
            text-decoration: none;
        }

        a.text-white:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="min-vh-100 bg-light rounded shadow-lg p-4">
        <!-- Profile Header -->
        <div class="profile-header d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <div class="profile-img me-3">
                    <img src="https://insieutoc.vn/wp-content/uploads/2021/03/cac-mau-logo-dep-nhat.jpg" alt="Company logo" class="rounded-circle" style="width: 80px; height: 80px;">
                </div>
                <div class="profile-info">
                    <h1 class="h3 fw-bold mb-1">First Name Last Name</h1>
                    <p class="text-muted mb-0">Company Name</p>
                </div>
            </div>

        </div>

        <!-- Profile Content -->
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-4 mb-4">
                <!-- Personal Information Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Thông tin liên hệ</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> user@example.com</li>
                            <li><strong>Phone:</strong> 123-456-7890</li>
                            <li><strong>Member Since:</strong> January 2020</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li><strong>Company Name:</strong> Company Name</li>
                          <li><strong>Website:</strong> <a href="http://example.com" target="_blank" class="link-primary">http://example.com</a></li>
                          <li><strong>Address:</strong> 123 Main St, City, Country</li>
                          <li><strong>Description:</strong> Company description goes here.</li>
                          <li><strong>Industries:</strong>
                              <ul class="list-inline mt-2">
                                  <li class="list-inline-item badge bg-primary">Industry 1</li>
                                  <li class="list-inline-item badge bg-primary">Industry 2</li>
                              </ul>
                          </li>
                      </ul>

                      <!-- Location Map Card -->
                      <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">Location</h5>
                          <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7713019104253!2d108.24999477448101!3d15.973315141999736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421152317b3825%3A0x63aeca1a1e623d4a!2zS1RYIFZJ4buGVCAtIEjDgE4gfCBWS1U!5e0!3m2!1sen!2s!4v1716397343693!5m2!1sen!2s" width="330" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Thống kê</h5>
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted">Nhân viên</h6>
                                    <h2 class="fw-bold mb-0">0</h2>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted">Vị trí việc làm</h6>
                                    <h2 class="fw-bold mb-0">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">

                <!-- Recent Activity -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Giới thiệu Công ty</h5>
                        <div class="mb-2">
                            <p class="mb-1">Công ty KDIC là công ty chuyên về thiết bị nâng hạ và thiết bị công nghiệp. Cung cấp cho thị trường Việt Nam các giải pháp thiết bị về xe nâng hàng và thiết bị khác cho ngành công nghiệp Logistics. Trải qua trên 10 năm hoạt động kể từ 2004, chúng tôi đã mở rộng hoạt động ra cả 3 miền đất nước. Vị thế, dộ tín nhiệm và mức độ tin tưởng của công ty hiện nay có được là nhờ sự cam kết và tâm huyết của chúng tôi. Khẩu hiệu của công ty là: “ Tâm huyết của chúng tôi – Sự hài lòng của các bạn”. Điều chúng tôi tạo ra sự khác biệt, đơn giản là nhờ vào tâm huyết của tập thể thành viên toàn công ty. Tại công ty KDIC, sản phẩm kinh doanh chính là các nhãn hiệu nổi tiếng thế giới như sau: • Xe nâng hàng YALE forklift (JAPAN-USA) • Phụ tùng truyền động TSUBAKI (JAPAN) • Phụ tùng xe nâng hàng TVH (Belgium) <span class="text-muted">2 hours ago</span></p>
                        </div>
                        <p class="text-center text-muted">No recent activity</p>
                    </div>
                </div><br>

                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title fw-bold mb-3">Bài đăng tuyển dụng</h5>
                      <div class="mb-2">
                          <div class="card border-0 shadow-sm mb-4"></div>
                            <div class="card-body" style="background: #007bff">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://insieutoc.vn/wp-content/uploads/2021/03/cac-mau-logo-dep-nhat.jpg" alt="Company logo" class="rounded-circle" style="width: 50px; height: 50px;">
                                <div class="ms-3">
                                  <h5 class="card-title fw-bold mb-0">Job Title</h5>
                                  <p class="text-muted mb-0">Company Name</p>
                                </div>
                              </div>
                              <p><strong>Salary:</strong> $50,000 - $60,000</p>
                              <p><strong>Location:</strong> New York, NY</p>
                              <p><strong>Field:</strong> Information Technology</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-outline-primary">View Details</a>
                                <a href="#" class="btn btn-primary">Apply</a>
                                <a href="#" class="text-danger"><i class="fas fa-heart"></i></a>
                              </div>
                            </div>
                          </div>

                          <div class="card border-0 shadow-sm mb-4"></div>
                            <div class="card-body" style="background: #007bff">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://insieutoc.vn/wp-content/uploads/2021/03/cac-mau-logo-dep-nhat.jpg" alt="Company logo" class="rounded-circle" style="width: 50px; height: 50px;">
                                <div class="ms-3">
                                  <h5 class="card-title fw-bold mb-0">Job Title</h5>
                                  <p class="text-muted mb-0">Company Name</p>
                                </div>
                              </div>
                              <p><strong>Salary:</strong> $50,000 - $60,000</p>
                              <p><strong>Location:</strong> New York, NY</p>
                              <p><strong>Field:</strong> Information Technology</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-outline-primary">View Details</a>
                                <a href="#" class="btn btn-primary">Apply</a>
                                <a href="#" class="text-danger"><i class="fas fa-heart"></i></a>
                              </div>
                            </div>
                          </div>

                          <div style="text-align: center">--more--</div>
                      </div>
                      <p class="text-center text-muted">No recent activity</p>
                  </div>
              </div>
            </div>
        </div>
</body>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <ul class="list-unstyled">
                    <li>Email: info@example.com</li>
                    <li>Phone: 123-456-7890</li>
                    <li>Address: 123 Main St, City, Country</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Facebook</a></li>
                    <li><a href="#" class="text-white">Twitter</a></li>
                    <li><a href="#" class="text-white">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-3">
            <p class="mb-0">&copy; 2023 Your Company. All rights reserved.</p>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
