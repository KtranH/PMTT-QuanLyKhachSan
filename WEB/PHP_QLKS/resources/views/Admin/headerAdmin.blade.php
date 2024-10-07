<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route("homeAdmin") }}" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">GTX</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <?php
              $takeName = "";
              $cookie = request()->cookie('accountadmin');
              if ($cookie) {
                  $data = json_decode($cookie, true);
                  $takeName = $data['user'];     
              }
        ?>
        <?php 
            $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?", [$takeName]);
            if($checkUser != null)
            {
                ?>
                    <li class="nav-item dropdown pe-3">
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="https://e7.pngegg.com/pngimages/81/570/png-clipart-profile-logo-computer-icons-user-user-blue-heroes-thumbnail.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $takeName ?></span>
                      </a><!-- End Profile Iamge Icon -->
            
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                          <h6><?php echo $checkUser[0]->HOTEN ?></h6>
                          <span>Xin chào bạn trở lại</span>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("homeaccountadmin") }}">
                            <i class="bi bi-person"></i>
                            <span>Tài khoản của bạn</span>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("logoutAdmin") }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Đăng xuất</span>
                          </a>
                        </li>
            
                      </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                <?php
            }
        ?>
      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
