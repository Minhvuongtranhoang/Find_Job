<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Du Lịch Việt Nam</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/example.css">

</head>
<body>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="navbar">
    <div class="container">
      <a href="index.html"><img src="images/logo1.png" alt="Logo" class="logo"></a>
      <a class="navbar-brand" href="#" style="font-weight: 400;">Du Lịch Việt Nam</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <div style="text-align: center;">
          <input class="my-textfield inp-cent" id="searchInput" list="suggestions" type="text" placeholder="Tìm kiếm ở đây...">
          <datalist id="suggestions">
            <option value="Hà Nội">
            <option value="Tp Hồ Chí Minh">
            <option value="Hội An">
            <option value="Phú Quốc">
            <option value="Đà Nẵng">
            <option value="Nha Trang">
          </datalist>
          <button class="my-button" id="searchButton" style="border-radius: 500px;">Search</button>
        </div>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item active f-r">
            <a class="nav-link " href="index.html">Trang chủ</a>
          </li>
          <li class="nav-item f-r">
            <a class="nav-link" href="about.html">Giới thiệu</a>
          </li>
          <li class="nav-item dropdown f-r">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Danh mục
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="tour.html?id=dlb">Du lịch biển</a>
              <a class="dropdown-item" href="tour.html?id=dln">Du lịch núi</a>
              <a class="dropdown-item" href="tour.html?id=dlds">Du lịch di sản</a>
              <a class="dropdown-item" href="tour.html?id=dlhn">Du lịch Hot nhất</a>
            </div>
          </li>

          <li class="nav-item f-r ">
            <a class="nav-link" href="contact.html">Liên lạc</a>
          </li>
          <li class="nav-item f-r">
            <a class="nav-link"  onclick="logout()" id="languageToggle">Đăng xuất</a>
          </li>

          <div class="overlay" id="overlay">
            <div class="overlay-content" id="loginContent">
              <h2>Đăng nhập</h2>
              <form id="loginForm">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Đăng nhập</button>
              </form>
              <p>Bạn chưa có tài khoản? <a href="#" onclick="showRegister()">Đăng kí</a></p>
            </div>

            <div class="overlay-content" id="registerContent" style="display: none;">
              <h2>Đăng kí</h2>
              <form id="registerForm">
                <label for="fullName">Tên đầy đủ:</label>
                <input type="text" id="fullName" name="fullName" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="newUsername">Tên đăng kí:</label>
                <input type="text" id="newUsername" name="newUsername" required>
                <label for="newPassword">Mật khẩu mới:</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <label for="confirmPassword">Xác nhận mật khẩu:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <button type="submit">Đăng kí</button>
              </form>
              <p>Bạn đã có tài khoản? <a href="#" onclick="showLogin()">Đăng nhập</a></p>
            </div>
          </div>
          <script src="js/login.js"></script>


        </ul>
      </div>
    </div>
  </nav>


  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-8" style="margin-top: 160px;">
          <h1>Khám phá vẻ đẹp Việt Nam</h1>
          <p id="typewriter"></p>
          <a href="tour.html?id=dlhn" class="btn btn-primary">Khám phá ngay</a>
        </div>
        <div class="col-md-4" style="margin-top: 100px;">
          <img src="images/hero-bg.png" alt="Hero Image" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Destinations -->
  <section class="featured-destinations">
    <div class="container">
      <h2 style="font-weight: 600;">Điểm đến nổi bật</h2>
      <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-hn">
              <img src="https://1.bp.blogspot.com/--zWGQ4SlB2g/Vci4egSU5xI/AAAAAAACGLM/Vm7YuVHTPmo/s1600/hanoi.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Hà Nội</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Khám phá vẻ đẹp cổ kính và hiện đại của thủ đô Hà Nội.</p>
              <div class="bot_detail"><a href="detail.html?id=hn" class="btn btn-primary">Xem thêm</a>
              <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
            </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-dn">
              <img src="https://1.bp.blogspot.com/-mmy0pChqpw0/VEn54HLviDI/AAAAAAAAY8I/Ab9zoAuTxXI/s1600/db%2Bcaurong1.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Đà Nẵng</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Tận hưởng không khí trong lành và bãi biển tuyệt đẹp tại Đà Nẵng.</p>
              <div class="bot_detail"><a href="detail.html?id=dn" class="btn btn-primary">Xem thêm</a>
                <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-pq">
              <img src="https://vb.1cdn.vn/thumbs/900x600/2023/06/02/dem-phu-quoc.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Phú Quốc</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Hòn đảo xinh đẹp với bãi biển hoang sơ và làng chài yên bình.</p>
              <div class="bot_detail"><a href="detail.html?id=pq" class="btn btn-primary">Xem thêm</a>
                <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-ha">
              <img src="https://media1.nguoiduatin.vn/media/nguyen-hoang-yen/2019/07/11/pho-co-hoi-an.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Hội An</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Phố cổ xinh đẹp nhộn nhịp với bãi biển hoang sơ và làng chài yên bình.</p>
              <div class="bot_detail"><a href="detail.html?id=ha" class="btn btn-primary">Xem thêm</a>
                <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-hcm">
              <img src="https://i.makeagif.com/media/10-07-2019/mCMEf-.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Tp.Hồ Chí Minh</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Trung tâm kinh tế, giải trí, trung tâm văn hóa và giáo dục quan trọng tại Việt Nam</p>
              <div class="bot_detail"><a href="detail.html?id=hcm" class="btn btn-primary">Xem thêm</a>
                <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <div class="img-container img-static" id="gif-container-nt">
              <img src="https://i.makeagif.com/media/6-18-2014/0mT8Yn.gif" class="card-img-top" alt="Destination 3">
            </div>
            <div class="card-body">
              <div class="title-stars">
                <h5 class="card-title">Nha Trang</h5>
                <span class="stars">
                  &#9733; &#9733; &#9733; &#9733; &#9733;
                </span>
              </div>
              <p class="card-text">Thành phố biển xinh đẹp với bãi biển hoang sơ và khí hậu trong lành.</p>
              <div class="bot_detail"><a href="detail.html?id=nt" class="btn btn-primary">Xem thêm</a>
                <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12 d-none">
          <div class="card">
              <div class="img-container img-static" id="gif-container-hl">
                  <img src="https://gcs.tripi.vn/public-tripi/tripi-feed/img/476903Wxk/anh-mo-ta.png" class="card-img-top" alt="Destination 4">
              </div>
              <div class="card-body">
                  <div class="title-stars">
                      <h5 class="card-title">Hạ Long</h5>
                      <span class="stars">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
                  </div>
                  <p class="card-text">Kỳ quan thiên nhiên thế giới với những đảo đá và hang động kỳ vĩ.</p>
                  <div class="bot_detail">
                      <a href="detail.html?id=hl" class="btn btn-primary">Xem thêm</a>
                      <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 d-none">
          <div class="card">
              <div class="img-container img-static" id="gif-container-sapa">
                  <img src="https://2sao.vietnamnetjsc.vn/images/2017/02/15/15/32/Sapa1.gif" class="card-img-top" alt="Destination 5">
              </div>
              <div class="card-body">
                  <div class="title-stars">
                      <h5 class="card-title">Sapa</h5>
                      <span class="stars">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
                  </div>
                  <p class="card-text">Thị trấn vùng cao với cảnh quan hùng vĩ và văn hóa đa dạng.</p>
                  <div class="bot_detail">
                      <a href="detail.html?id=sp" class="btn btn-primary">Xem thêm</a>
                      <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 d-none">
          <div class="card">
              <div class="img-container img-static" id="gif-container-hue">
                  <img src="https://vb.1cdn.vn/2023/07/10/co-do-hue.gif" class="card-img-top" alt="Destination 6">
              </div>
              <div class="card-body">
                  <div class="title-stars">
                      <h5 class="card-title">Huế</h5>
                      <span class="stars">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
                  </div>
                  <p class="card-text">Cố đô Huế với di sản văn hóa và lịch sử phong phú.</p>
                  <div class="bot_detail">
                      <a href="detail.html?id=hu" class="btn btn-primary">Xem thêm</a>
                      <i class="fa-solid fa-eye" style="font-size: 10px; color: #e49132;"> 2.5 M<sup>+</sup> views</i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <button id="show-more" class="btn btn-secondary mt-3" style="position: absolute; left: 50%; transform: translateX(-50%);">Hiển thị thêm</button>
  <button id="show-less" class="btn btn-secondary mt-3 d-none" style="position: absolute; left: 50%; transform: translateX(-50%);">Thu gọn</button>
</div>
  </section>

<hr>

  <!-- Blog -->
  <section class="featured-destinations">
    <div class="container">
      <h2 style="font-weight: 600;">Bài viết </h2>
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="card" style="height: 470px;">
            <div class="facebook-header">
              <img src="https://www.vietnamworks.com/hrinsider/wp-content/uploads/2023/12/anh-den-ngau-001.jpg" style="font-size: xx-small;" class="profile-pic" alt="Profile Picture">
              <div class="profile-info">
                <span style="font-weight: bold; font-size: 1rem;">Minh Vương</span>
                <span style="color: #888; font-size: 0.875rem;">12 phút trước</span>
              </div>
            </div>
              <p class="card-text" style="margin-left: 20px; margin-top: 15px;">Thành phố biển xinh đẹp, trong lành mát mẻ<i class="fa-solid fa-heart" style="margin-left: 5px;"></i></p>
                  <img src="images/category1.jpg" style="height: 250px;"  alt="Nha Trang">
                  <div style="white-space: nowrap; margin-top: 20px; margin-left: 10px; text-align: center;">
                <i class="fa-solid fa-thumbs-up"></i> 1.2K <i class="fa-solid fa-heart" style="margin-left: 20px;"></i> 500 <i class="fa-regular fa-comment"style="margin-left: 20px;"></i> 500
              </div>
              <a href="https://www.facebook.com/minhh.vuongg.967" class="list-unstyled" style="text-align: center; color: #0a3ead; margin-top: 20px;"> xem thêm </a>
          </div>
        </div>


        <div class="col-lg-3 col-md-6">
          <div class="card" style="height: 470px;">
            <div class="facebook-header">
              <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2023/12/anh-dai-dien-zalo-21.jpg" style="font-size: xx-small;" class="profile-pic" alt="Profile Picture">
              <div class="profile-info">
                <span style="font-weight: bold; font-size: 1rem;">Bảo Kiệt</span>
                <span style="color: #888; font-size: 0.875rem;">30 phút trước</span>
              </div>
            </div>
              <p class="card-text" style="margin-left: 20px; margin-top: 15px;">Cố đô Huế thật nghiêm trang và cổ kính. <i class="fa-solid fa-hand-holding-heart"></i> </p>
                  <img src="https://ticotravel.com.vn/wp-content/uploads/2022/06/co-do-hue-3.jpg" style="height: 250px;"  alt="Đà Nẵng">
                  <div style="white-space: nowrap; margin-top: 20px; margin-left: 10px; text-align: center;">
                <i class="fa-solid fa-thumbs-up"></i> 1.2K <i class="fa-solid fa-heart" style="margin-left: 20px;"></i> 500 <i class="fa-regular fa-comment"style="margin-left: 20px;"></i> 500
              </div>
              <a href="https://www.facebook.com/baokiet.tran.56" class="list-unstyled" style="text-align: center; color: #0a3ead; margin-top: 20px;"> xem thêm </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card" style="height: 470px;">
            <div class="facebook-header">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRewNPwDxd5qeVABTFQujno3CoEqm8IqhLswRr0RLq2F6jQyhDPOMftjwuga2H_5X8rx5g&usqp=CAU" style="font-size: xx-small;" class="profile-pic" alt="Profile Picture">
              <div class="profile-info">
                <span style="font-weight: bold; font-size: 1rem;">Nhật Long</span>
                <span style="color: #888; font-size: 0.875rem;">1 giờ trước</span>
              </div>
            </div>
              <p class="card-text" style="margin-left: 20px; margin-top: 15px;">Chùa Hương Tích - Hà Tĩnh thiêng giữa đại ngàn <i class="fa-solid fa-tree"></i> <i class="fa-solid fa-tree"></i> <i class="fa-solid fa-tree"></i></p>
                  <img src="https://ik.imagekit.io/tvlk/blog/2023/07/chua-huong-tich-5.jpeg?tr=dpr-2,w-675" style="height: 250px;"  alt="Đà Nẵng">
                  <div style="white-space: nowrap; margin-top: 20px; margin-left: 10px; text-align: center;">
                <i class="fa-solid fa-thumbs-up"></i> 1.2K <i class="fa-solid fa-heart" style="margin-left: 20px;"></i> 500 <i class="fa-regular fa-comment"style="margin-left: 20px;"></i> 500
              </div>
              <a href="https://www.facebook.com/profile.php?id=100085355414813" class="list-unstyled" style="text-align: center; color: #0a3ead; margin-top: 20px;"> xem thêm </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card" style="height: 470px;">
            <div class="facebook-header">
              <img src="https://inkythuatso.com/uploads/thumbnails/800/2022/03/79d31e406fe3d3d7322b18666184911d-29-10-39-38.jpg" style="font-size: xx-small;" class="profile-pic" alt="Profile Picture">
              <div class="profile-info">
                <span style="font-weight: bold; font-size: 1rem;">Phước Tài</span>
                <span style="color: #888; font-size: 0.875rem;">2 giờ trước</span>
              </div>
            </div>
              <p class="card-text" style="margin-left: 20px; margin-top: 15px;">Thành phố Đáng sống bậc nhất Việt Nam <i class="fa-solid fa-paper-plane"></i></p>
                  <img src="images/destination2.jpg" style="height: 250px;"  alt="Đà Nẵng">
                  <div style="white-space: nowrap; margin-top: 20px; margin-left: 10px; text-align: center;">
                <i class="fa-solid fa-thumbs-up"></i> 1.2K <i class="fa-solid fa-heart" style="margin-left: 20px;"></i> 500 <i class="fa-regular fa-comment"style="margin-left: 20px;"></i> 500
              </div>
              <a href="https://www.facebook.com/profile.php?id=100075958387169" class="list-unstyled" style="text-align: center; color: #0a3ead; margin-top: 20px;"> xem thêm </a>
          </div>
        </div>

      </div>
    </div>


  </section>


<!-- Statistics Section -->
<section id="statistics" class="text-center py-5">
  <div class="container">
    <h2 style="text-align: center; font-weight: bold;">Thống Kê</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="statistic">
          <div class="stat-value-container"><br><br>
            <div id="visitorCount" class="stat-value">0</div><br><br><br>
            <p class="stat-label">Lượt Truy Cập</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statistic">
          <svg viewBox="0 0 36 36" class="circular-chart blue">
            <path class="circle-bg"
              d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <path class="circle"
              stroke-dasharray="80, 100"
              d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <text x="18" y="20.35" class="percentage">80%</text>
          </svg>
          <p>Chất Lượng Dịch Vụ</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statistic">
          <svg viewBox="0 0 36 36" class="circular-chart green">
            <path class="circle-bg"
              d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <path class="circle"
              stroke-dasharray="90, 100"
              d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            <text x="18" y="20.35" class="percentage">90%</text>
          </svg>
          <p>Mức Độ Hài Lòng</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Chat and ad -->
<section>
  <div class="chat-icon" style="margin-bottom: 70px; background-color: #39f033;">
    <a href="tel:+84966069848"><i class="fa-solid fa-phone" style="color: white;"></i></a>
  </div>

  <div class="chat-icon" id="chatIcon">
    <i class="fas fa-comment"></i>
  </div>

  <div class="chat-container" id="chatContainer">
    <div class="chat-header">
      <div class="facebook-header">
        <img class="profile-pic" src="https://www.boostability.com/content/wp-content/uploads/sites/2/2021/02/Feb.-17-Bots-e1614642771145.jpg" alt="Profile Picture">
        <div class="profile-info">
          <span>Travel Bot</span>
          <small>Online</small>
        </div>
      </div>
      <button class="close-button" id="closeButton">&#10005;</button>
    </div>
    <div class="chat-body" id="chatBody">
      <!-- Tin nhắn sẽ được thêm vào đây -->
    </div>
    <div class="chat-input">
      <input type="text" id="messageInput" placeholder="Nhập tin nhắn...">
      <button id="sendButton"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>

  <!-- Advertisement Section    -->
<div id="advertisement" class="advertisement">
<button class="btn btn-secondary ad-close" id="close-ad" >Đóng</button>
<div class="ad-content">
  <h4> MV Travel</h4>
  <p> Chúng tôi đồng hành cùng bạn</p>
  <img src="https://bestcargo.vn/wp-content/uploads/2018/02/dich-vu-van-tai-quoc-te-gia-re.jpg" alt="Ad Banner" class="img-fluid" style="height: 200px;" >
  <a href="https://www.etrip4u.com/"><i class="fa-solid fa-plane" style="color: #e49132; margin-left: 50px;"></i></a>
  <a href="https://dsvn.vn/#/"><i class="fa-solid fa-train-subway" style="margin-left: 15px; color: darkgreen; margin-left: 20px;"></i></a>
  <a href="https://vexere.com/"><i class="fa-solid fa-car-side" style="margin-left: 15px; color: gold; margin-left: 20px;"></i></a>
</div>
<hr>
<div class="ad-content">
  <h4>Mirindaaa</h4>
  <p>Tết cười thả ga</p>
  <img src="https://media1.giphy.com/media/BKllgcyQfOw7pLnnCL/200w.gif?cid=6c09b9524q4icqt0gsmc2sahm3apld3tuazoikk956lmv218&ep=v1_gifs_search&rid=200w.gif&ct=g" alt="Ad Banner" class="img-fluid" style="height: 200px;" >
  <a href="https://www.suntorypepsico.vn/product/index/mirinda" class="btn btn-primary" style="margin-top: 10px; font-size: smaller;">Xem thêm</a>
</div>
<hr>

<div class="ad-content">
  <h4>Heniken</h4>
  <p>Mở kết nối bừng sắc xuân!</p>
  <img src="https://toquoc.mediacdn.vn/zoom/320_200/280518851207290880/2023/12/11/avatar1702285375243-1702285375780662171633.gif" alt="Ad Banner" class="img-fluid" style="height: 200px;" >
  <a href="https://heineken-vietnam.com.vn/agegate/?return=%2F" class="btn btn-primary" style="margin-top: 10px; font-size: smaller;">Xem thêm</a>
</div>
<hr>

<div class="ad-content">
  <h4>Cocacola</h4>
  <p>Khoảng cách không làm chúng ta cách xa!</p>
  <img src="https://j.gifs.com/mZ01VO.gif" alt="Ad Banner" class="img-fluid" style="height: 200px;" >
  <a href="https://www.coca-cola.com/vn/vi" class="btn btn-primary" style="margin-top: 10px; font-size: smaller;">Xem thêm</a>
</div>
<hr>

<div class="ad-content">
  <h4>Pepsi</h4>
  <p>Cứ trẻ, cứ chất, cứ Pepsi!</p>
  <img src="https://media1.giphy.com/media/UV52jz9Q0cwg2Ib3ZF/giphy.gif?cid=6c09b952way5tor5fjwwqqz4xsenz4twfsjmrw63htsux86p&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="Ad Banner" class="img-fluid" style="height: 200px;" >
  <a href="https://www.pepsi.com/" class="btn btn-primary" style="margin-top: 10px; font-size: smaller;">Xem thêm</a>
</div>
<hr>

<div class="ad-content">
  <h4>2 ngày 1 đêm</h4>
  <p>Tự do, tự lo!</p>
  <img src="https://static2.vieon.vn/vieplay-image/poster_v4/2023/10/02/hpcc23x9_660x946-2n1d253f62d24c1423aefda77f75f56dfcb29.png" alt="Ad Banner" class="img-fluid" style="height: 500px;" >
  <a href="https://vi.wikipedia.org/wiki/2_ng%C3%A0y_1_%C4%91%C3%AAm_(ch%C6%B0%C6%A1ng_tr%C3%ACnh_truy%E1%BB%81n_h%C3%ACnh_Vi%E1%BB%87t_Nam)" class="btn btn-primary" style="margin-top: 10px; font-size: smaller;">Xem thêm</a>
</div>
<hr>

</div>
  <button id="ad-toggle" class="ad-toggle">
    <i class="fa-solid fa-rectangle-ad"></i>
  </button>

  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
  <script src="js/chat.js"></script>

</section>


  <!-- Footer -->
  <footer style="background-color: #e2dfdf; color: #0a0a0a; padding: 20px;">

    <div class="container">

      <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-12" style="text-align: center;">
          <img src="images/logo2.png" style="height: 300px; width: 300px;" alt="Logo" class="logo">
          <h2>Du Lịch Việt Nam</h2>
          <p>Chúng tôi cung cấp những trải nghiệm tuyệt vời nhất cho chuyến du lịch của bạn.<br>
            Hãy theo chân tôi để khám phá vẻ đẹp thiên nhiên hùng vĩ và nền văn hóa đa sắc màu của Việt Nam cùng chúng tôi.<br>
            <hr size="5" width="80%" color="#CCC" align="center">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6">
          <h5>Theo dõi tôi</h5>
          <img src="images/logo1.png" alt="Logo" class="logo">
          <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.facebook.com/minhh.vuongg.967"><i class="fab fa-facebook" style="color: blue;"></i></a></li>
            <li class="list-inline-item"><a href="https://zalo.me/0397151384"><i class="fab fa-twitter" style="color: rgb(23, 149, 233);"></i></a></li>
            <li class ="list-inline-item"><a href="http://www.instagram.com/vuongtranhoangminh"><i class="fab fa-instagram" style="color: rgb(228, 75, 151);"></i></a></li>
            <li class="list-inline-item"><a href="https://t.me/Minhvuong1384"><i class="fab fa-telegram" style="color: blue;"></i></a></li>
          </ul><br>
          <h5>Dự án của tôi</h5>
          <ul class="list-unstyled">
            <li><a href="index.html" style="font-size: x-small;">Du lịch Khánh Hòa</a></li>
            <li><a href="about.html" style="font-size: x-small;">Cửa hàng điện thoại</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>Liên kết nhanh</h5>
          <ul class="list-unstyled">
            <li><a href="index.html">Trang chủ</a></li>
            <li><a href="about.html">Giới thiệu</a></li>
            <li><a href="tour.html?id=dlhn">Gói tour</a></li>
            <li><a href="contact.html">Liên lạc</a></li>
            <a href="booking.html"><button class="my-button" style="border-radius: 10px;">Đặt tour</button></a>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>Điểm đến nổi bật</h5>
          <ul class="list-inline">
            <li><a href="detail.html?id=hn"><img src="images/destination1.jpg" alt="Course 1"></a></li>
            <li><a href="detail.html?id=pq"><img src="images/destination3.jpg" alt="Course 2"></a></li>
          </ul>
          <ul class="list-inline">
            <li><a href="detail.html?id=dn"><img src="images/destination2.jpg" alt="Course 1"></a></li>
            <li><a href="detail.html?id=nt"><img src="images/category1.jpg" alt="Course 2"></a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6">
          <h5>Liên lạc</h5>
          <ul class="list-unstyled">
          <li class="list-inline-item">
              <a href="mailto:vuongthm.23ns@vku.udn.vn"><i class="fa-regular fa-envelope" style="color: rgb(250, 154, 75);"></i> vuongthm.23ns@vku.udn.vn</a>
          </li>
          <li>
            <a href="tel:+84966069848"><i class="fas fa-phone" style="color: rgb(39, 238, 65);"></i> (+84) 966 069 848</a>
          </li>
          <li>
            <a href="https://maps.app.goo.gl/A3rHK6N8mkDGqkME6"><i class="fas fa-map-marker-alt" style="color: rgb(62, 147, 216);"></i> Ngũ Hành Sơn, TP.Đà Nẵng</a>
          </li>
          </ul>

          <div>
            <a href="#"><button class="my-button" style="border-radius: 10px;">Đăng kí</button></a><br><br>
        </div>
        <div class="list-unstyled"><a href="contact.html">Bạn cần trợ giúp gì không?</a></div>
        </div>
      </div>
    </div>
  </footer>
  <div class="full-width-footer bg-dark py-2">
    <div class="text-center">
      <p class="text-white mb-0">&copy; 2024 MV Travel. All rights reserved.</p>
    </div>
  </div>


  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap JS and Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Custom JavaScript -->
  <script src="js/scripts.js"></script>
  <script src="js/advertisement.js"></script>
</body>
</html>
