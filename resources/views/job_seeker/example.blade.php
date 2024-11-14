<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3C6E71;
            --secondary-color: #284B63;
            --background-color: #f8f9fa;
        }

        body {
            background-color: var(--background-color);
        }

        .hero-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .search-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Enhanced Job Carousel */
        .job-carousel {
            padding: 40px 0;
            background: white;
            border-radius: 20px;
            margin: 40px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .carousel-inner {
            padding: 20px 40px;
        }

        .job-slide-wrapper {
            display: flex;
            gap: 20px;
        }

        .job-card-carousel {
            background: white;
            border-radius: 15px;
            padding: 25px;
            border: 1px solid #eee;
            transition: all 0.3s;
            flex: 0 0 calc(33.333% - 20px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .job-card-carousel:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .job-logo {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            margin-right: 10px;
            object-fit: cover;
        }

        /* Custom Carousel Controls */
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }

        .carousel-control-prev {
            left: -25px;
        }

        .carousel-control-next {
            right: -25px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
        }

         /* Modern Header Styles */
         .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-link {
            font-weight: 500;
            color: #333;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .carousel-item {
            height: 300px;
            background: white;
            border-radius: 15px;
            padding: 30px;
        }

        .job-slide {
            text-align: center;
        }

        /* Enhanced Category Cards */
        .category-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            /* transform: rotate(-5deg);//xoay biểu tượng một góc -5 độ */
        }

        .square-company-logo {
            width: 100px;
            height: 100px;
            margin-right: 8px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            /* transform: rotate(-5deg);//xoay biểu tượng một góc -5 độ */
        }

        .company-card {
            background: white;
            padding: 15px;
            border-radius: 15px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .company-card:hover {
            transform: translateY(-5px);
        }

        .company-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }

        .job-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);

        }

        .job-card:hover {
            transform: translateY(-5px);
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .blog-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .favorite-icon {
            font-size: 20px;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .favorite-icon:hover {
            color: red;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }

            .search-form {
                padding: 20px;
            }

            .category-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

  <!-- Modern Header -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
      <a class="navbar-brand" href="#">JobPortal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
              <li class="nav-item">
                  <a class="nav-link" href="#">Trang chủ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Việc làm</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Công ty</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
              </li>
          </ul>
          <div class="d-flex gap-2">
              <button class="btn btn-outline-primary">Đăng nhập</button>
              <button class="btn btn-primary">Đăng ký</button>
          </div>
      </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">Khám phá cơ hội nghề nghiệp</h1>
                <p class="lead mb-5">Tìm việc làm IT phù hợp với bạn</p>

                <!-- Search Form -->
                <div class="search-form">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control form-control-lg" placeholder="Tìm kiếm công việc...">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select form-select-lg">
                                <option selected>Chọn ngành nghề</option>
                                <option>Frontend Developer</option>
                                <option>Backend Developer</option>
                                <option>Full Stack Developer</option>
                                <option>DevOps Engineer</option>
                                <option>Data Scientist</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select form-select-lg">
                                <option selected>Chọn địa điểm</option>
                                <option>Hà Nội</option>
                                <option>Hồ Chí Minh</option>
                                <option>Đà Nẵng</option>
                                <option>Remote</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-lg w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://www.ryrob.com/wp-content/uploads/2022/04/How-to-Name-a-Blog-45-Blog-Name-Ideas-and-Examples-to-Learn-From.jpg" alt="Hero Image" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Modern Job Carousel -->
<section class="py-5">
  <div class="container">
      <h2 class="mb-4">Việc làm nổi bật</h2>
      <div class="job-carousel">
          <div id="jobCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  <!-- First Slide -->
                  <div class="carousel-item active">
                      <div class="job-slide-wrapper">
                          <div class="job-card-carousel">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                                <div>
                                    <h5 class="h5">Frontend Developer</h5>
                                    <p class="text-muted mb-2">Tech Company A</p>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                  <span>Hà Nội</span>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-dollar-sign text-primary me-2"></i>
                                  <span>20-30 triệu</span>
                              </div>
                              <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                          </div>
                          <div class="job-card-carousel">
                            <div class="d-flex align-items-center mb-3">
                              <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                              <div>
                                  <h5 class="h5">Frontend Developer</h5>
                                  <p class="text-muted mb-2">Tech Company A</p>
                              </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                  <span>Hồ Chí Minh</span>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-dollar-sign text-primary me-2"></i>
                                  <span>25-35 triệu</span>
                              </div>
                              <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                          </div>
                          <div class="job-card-carousel">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                                <div>
                                    <h5 class="h5">Frontend Developer</h5>
                                    <p class="text-muted mb-2">Tech Company A</p>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                  <span>Đà Nẵng</span>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-dollar-sign text-primary me-2"></i>
                                  <span>30-40 triệu</span>
                              </div>
                              <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                          </div>
                      </div>
                  </div>
                  <!-- Second Slide -->
                  <div class="carousel-item">
                      <div class="job-slide-wrapper">
                          <div class="job-card-carousel">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                                <div>
                                    <h5 class="h5">Frontend Developer</h5>
                                    <p class="text-muted mb-2">Tech Company A</p>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                  <span>Hà Nội</span>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-dollar-sign text-primary me-2"></i>
                                  <span>35-45 triệu</span>
                              </div>
                              <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                          </div>
                          <div class="job-card-carousel">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                                <div>
                                    <h5 class="h5">Frontend Developer</h5>
                                    <p class="text-muted mb-2">Tech Company A</p>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                  <span>Hồ Chí Minh</span>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                  <i class="fas fa-dollar-sign text-primary me-2"></i>
                                  <span>28-38 triệu</span>
                              </div>
                              <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                          </div>
                          <div class="job-card-carousel">
                              <div class="d-flex align-items-center mb-3">
                                <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                                <div>
                                    <h5 class="h5">Frontend Developer</h5>
                                    <p class="text-muted mb-2">Tech Company A</p>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <span>Remote</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-dollar-sign text-primary me-2"></i>
                                <span>25-35 triệu</span>
                            </div>
                            <button class="btn btn-primary w-100">Ứng tuyển ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#jobCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#jobCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
</section>

<!-- Popular Categories Section with Enhanced Design -->
<section class="py-5 bg-light">
  <div class="container">
      <div class="row mb-4">
          <div class="col-lg-6">
              <h2 class="mb-0">Danh mục phổ biến</h2>
          </div>
          <div class="col-lg-6 text-lg-end">
              <a href="#" class="btn btn-outline-primary">Xem tất cả danh mục</a>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="category-card text-center">
                  <div class="category-icon">
                      <i class="fas fa-code"></i>
                  </div>
                  <h3 class="h5">Frontend Development</h3>
                  <p class="text-muted">125 việc làm</p>
                  <div class="mt-3">
                      <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="category-card text-center">
                  <div class="category-icon">
                      <i class="fas fa-database"></i>
                  </div>
                  <h3 class="h5">Backend Development</h3>
                  <p class="text-muted">98 việc làm</p>
                  <div class="mt-3">
                      <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="category-card text-center">
                  <div class="category-icon">
                      <i class="fas fa-mobile-alt"></i>
                  </div>
                  <h3 class="h5">Mobile Development</h3>
                  <p class="text-muted">87 việc làm</p>
                  <div class="mt-3">
                      <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="category-card text-center">
                  <div class="category-icon">
                      <i class="fas fa-cloud"></i>
                  </div>
                  <h3 class="h5">Cloud Computing</h3>
                  <p class="text-muted">76 việc làm</p>
                  <div class="mt-3">
                      <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Featured Companies -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Nhà tuyển dụng nổi bật</h2>
        <div class="row">
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="company-card text-center">
                    <div class="company-logo">
                        <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/100/100" alt="Company Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="company-card text-center">
                    <div class="company-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmOLEOQ_XnludV_s1NdGw4iyCWQdJ2Wcg7Dw&s/100/100" alt="Company Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="company-card text-center">
                    <div class="company-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmOLEOQ_XnludV_s1NdGw4iyCWQdJ2Wcg7Dw&s/100/100" alt="Company Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="company-card">
                    <div class="company-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPod2O0ZoGnz6h-8QaK90XcA0KrUaH3BE_6yd_G6-UsGvKg19B51cdBpdDySoeNOClixo&usqp=CAU/100/100" alt="Company Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
              <div class="company-card">
                  <div class="company-logo">
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPod2O0ZoGnz6h-8QaK90XcA0KrUaH3BE_6yd_G6-UsGvKg19B51cdBpdDySoeNOClixo&usqp=CAU/100/100" alt="Company Logo" class="img-fluid">
                  </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-4">
            <div class="company-card">
                <div class="company-logo">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPod2O0ZoGnz6h-8QaK90XcA0KrUaH3BE_6yd_G6-UsGvKg19B51cdBpdDySoeNOClixo&usqp=CAU/100/100" alt="Company Logo" class="img-fluid">
                </div>
            </div>
          </div>
        </div>
    </div>
</section>

<!-- Latest Jobs -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Việc làm mới nhất</h2>
        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="job-card">
                    <div class="favorite-icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="d-flex align-items ">
                      <div class="square-company-logo">
                        <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                      </div>
                      <div>
                        <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                        <p class="nav-link text-muted mb-2">Tech Company A</p>
                        <div class="nav-link text-muted mb-3">
                          <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                          <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items ">
                    <div class="square-company-logo">
                      <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    </div>
                    <div>
                      <a class="nav-link" href="#"><h5 class="">Frontend Developer</h5></a>
                      <p class="nav-link text-muted mb-2">Tech Company A</p>
                      <div class="nav-link text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Hà Nội
                        <i class="fas fa-dollar-sign ms-3 me-2"></i>15-20 triệu
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <!-- More job cards... -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="job-card">
                  <div class="favorite-icon">
                      <i class="far fa-heart"></i>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                    <img src="https://fptsoftware.com/-/media/project/fpt-software/fso/uplift/logo-fpt.png?modified=20241017090751/50/50" alt="Company Logo" class="job-logo">
                    <div>
                        <h5 class="">Frontend Developer</h5>
                        <p class="text-muted mb-2">Tech Company A</p>
                    </div>
                  </div>
                  <div class="mb-3">
                      <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Cái này là khi nhấn chi tiết nó sẽ ra full cái card như thế này, nhưng định dạng lại một xí cho bố cục nó đẹp</p>
                      <p class="mb-2"><i class="fas fa-dollar-sign me-2"></i>15-20 triệu</p>
                      <p class="mb-0"><i class="fas fa-clock me-2"></i>Full-time</p>
                  </div>
                  <div class="d-flex justify-content-between">
                      <button class="btn btn-outline-primary">Chi tiết</button>
                      <button class="btn btn-primary">Ứng tuyển</button>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Blog IT mới nhất</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card">
                <img src="https://blog.feedspot.com/wp-content/uploads/2017/06/IT.png" alt="Blog Image" class="img-fluid blog-img">
                <div class="p-4">
                    <h5>Xu hướng công nghệ 2024</h5>
                    <p class="text-muted mb-3">
                        <i class="far fa-calendar me-2"></i>20 Mar 2024
                        <i class="far fa-user ms-3 me-2"></i>John Doe
                    </p>
                    <p class="mb-3">Khám phá những xu hướng công nghệ mới nhất đang định hình ngành IT...</p>
                    <a href="#" class="btn btn-outline-primary">Đọc thêm</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="blog-card">
                <img src="https://www.constantcontact.com/blog/wp-content/uploads/2021/04/Social-4.jpg" alt="Blog Image" class="img-fluid blog-img">
                <div class="p-4">
                    <h5>Kỹ năng IT cần có năm 2024</h5>
                    <p class="text-muted mb-3">
                        <i class="far fa-calendar me-2"></i>18 Mar 2024
                        <i class="far fa-user ms-3 me-2"></i>Jane Smith
                    </p>
                    <p class="mb-3">Những kỹ năng quan trọng mà mọi lập trình viên cần có trong năm 2024...</p>
                    <a href="#" class="btn btn-outline-primary">Đọc thêm</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="blog-card">
                <img src="https://images.forbesindia.com/blog/wp-content/uploads/2024/06/AI-Skills_GettyImages-1449294937_BG.jpg?impolicy=website&width=900&height=600" alt="Blog Image" class="img-fluid blog-img">
                <div class="p-4">
                    <h5>Thị trường việc làm IT 2024</h5>
                    <p class="text-muted mb-3">
                        <i class="far fa-calendar me-2"></i>15 Mar 2024
                        <i class="far fa-user ms-3 me-2"></i>David Wilson
                    </p>
                    <p class="mb-3">Phân tích chi tiết về thị trường việc làm IT và những cơ hội trong năm 2024...</p>
                    <a href="#" class="btn btn-outline-primary">Đọc thêm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="#" class="btn btn-outline-primary">Xem thêm bài viết</a>
    </div>
</div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <h2 class="mb-4">Đăng ký nhận thông tin việc làm</h2>
            <p class="text-muted mb-4">Nhận thông báo về các cơ hội việc làm mới nhất phù hợp với bạn</p>
            <form class="d-flex gap-2">
                <input type="email" class="form-control form-control-lg" placeholder="Nhập email của bạn">
                <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
            </form>
        </div>
    </div>
</div>
</section>

<!-- Enhanced Footer -->
<footer class="bg-dark text-light py-5">
  <div class="container">
      <div class="row">
          <div class="col-lg-4 mb-4">
              <h5 class="mb-4">Về JobPortal</h5>
              <p>Nền tảng tuyển dụng IT hàng đầu Việt Nam, kết nối ứng viên với các cơ hội việc làm tốt nhất từ những công ty công nghệ hàng đầu.</p>
              <div class="mt-4">
                  <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" class="btn btn-outline-light"><i class="fab fa-instagram"></i></a>
              </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-4">
              <h5 class="mb-4">Liên kết</h5>
              <ul class="list-unstyled">
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Trang chủ</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Việc làm</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Công ty</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Blog</a></li>
              </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
              <h5 class="mb-4">Danh mục việc làm</h5>
              <ul class="list-unstyled">
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Frontend Development</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Backend Development</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">Full Stack Development</a></li>
                  <li class="mb-2"><a href="#" class="text-light text-decoration-none">DevOps Engineering</a></li>
              </ul>
          </div>
          <div class="col-lg-3 col-md-6">
              <h5 class="mb-4">Liên hệ</h5>
              <ul class="list-unstyled">
                  <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Tòa nhà Innovation, Khu Công nghệ cao, Hà Nội</li>
                  <li class="mb-2"><i class="fas fa-phone me-2"></i>(+84) 123-456-789</li>
                  <li class="mb-2"><i class="fas fa-envelope me-2"></i>contact@jobportal.vn</li>
              </ul>
          </div>
      </div>
      <hr class="my-4">
      <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-start">
              <p class="mb-0">&copy; 2024 JobPortal. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-center text-md-end">
              <a href="#" class="text-light text-decoration-none me-3">Điều khoản sử dụng</a>
              <a href="#" class="text-light text-decoration-none">Chính sách bảo mật</a>
          </div>
      </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
// Initialize tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Favorite job functionality
document.querySelectorAll('.favorite-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        const heart = this.querySelector('i');
        heart.classList.toggle('far');
        heart.classList.toggle('fas');
        heart.classList.toggle('text-danger');
    });
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
</body>
</html>
