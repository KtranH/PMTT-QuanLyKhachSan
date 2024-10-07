<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route("home") }}" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">GTX</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center">
        <input type="text" name="search" id="search" placeholder="Tìm kiếm phòng" class="form-control" onfocus="this.value=''">
        <button type="submit" title="Search" name="search_items" class="btnS"><i class="bi bi-search"></i></button>
      </form>
      <div id="search_list" class="dropdown-content"></div>
    </div><!-- End Search Bar -->
  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <?php
              $takeName = "";
              $flag = false;
              $cookie = request()->cookie('remember');
              $cookie2 = request()->cookie('remember_notSave');
              $cookie3 = request()->cookie('remember_google');
              if ($cookie) {
                  $data = json_decode($cookie, true);
                  $takeName = $data['user'];     
              }
              else if($cookie2)
              {
                  $data = json_decode($cookie2, true);
                  $takeName = $data['user'];
              }
              else if($cookie3)
              {
                $data = json_decode($cookie3, true);
                $takeName = $data['user'];
                $flag = true;
              }
        ?>
        <?php 
            $checkUser = DB::select("SELECT * FROM khachhang WHERE EMAIL = ? OR USERNAME = ?", [$takeName,$takeName]);
            if($checkUser != null)
            {
                ?>
                @php
                    $countGioHang = DB::table("giohang")->where("MAKH",$checkUser[0]->MAKH)->count();
                @endphp
                    <li>
                      <a class="button_cart_khoi" href="{{ route("cartUser") }}" style="height:5px;margin-right: 20px"  title="<?php echo "Bạn đang có ".$countGioHang." sản phẩm trong giỏ" ?>">
                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> {{ $countGioHang }}
                        <div class="arrow-wrapper_cart_khoi">
                            <div class="arrow_cart_khoi"></div>   
                        </div>
                      </a>
                    </li>
                    <li class="nav-item dropdown pe-3">
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if ($flag == true)
                          <img src="{{ $checkUser[0]->AVATAR }}" alt="Profile" class="rounded-circle">
                        @else
                          <img src="{{ Storage::url('public/img/' . $checkUser[0]->AVATAR ) }}" alt="Profile" class="rounded-circle">
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $takeName ?></span>
                      </a><!-- End Profile Iamge Icon -->
            
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                          <h6><?php echo $takeName ?></h6>
                          <span>Xin chào bạn trở lại</span>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("home_account") }}">
                            <i class="bi bi-person"></i>
                            <span>Tài khoản của bạn</span>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("edit_account") }}">
                            <i class="bi bi-gear"></i>
                            <span>Tùy chỉnh</span>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("contact") }}">
                            <i class="bi bi-question-circle"></i>
                            <span>Cần giúp đỡ?</span>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>

                        <li>
                          <hr class="dropdown-divider">
                        </li>


                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route("logout") }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Đăng xuất</span>
                          </a>
                        </li>
            
                      </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                <?php
            }
            else {
                ?>
                <li> <a class="Button_Khoi" href="{{ route("Formlogin") }}"> Đăng nhập </a></li>
                <li> <a class="Button_Khoi" style="background-color:#74C0FC;color:white" href="{{ route("FormSignUp") }}"> Đăng ký </a></li>
                <?php
            }
        ?>
      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script>
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      var query = $(this).val();
      if (query.length > 0) {
        $.ajax({
          url: "/search",
          type: "GET",
          data: {
            'search': query
          },
          success: function(data) {
            $('#search_list').html(data);
            $('#search_list').css('display', 'block');
          }
        });
      } else {
        $('#search_list').css('display', 'none');
      }
    });

    $(document).click(function(e) {
      if (!$(e.target).closest('#search, #search_list').length) {
        $('#search_list').css('display', 'none');
      }
    });

    $('#search_list').on('click', 'li', function() {
      $('#search').val($(this).text());
      $('#search_list').css('display', 'none');
    });

    $('.search-form').on('submit', function(e) {
      e.preventDefault();
      var query = $('#search').val();
      if (query.length > 0) {
        window.location.href = "/search_results/" + encodeURIComponent(query);
      } else {
        $('#search_list').css('display', 'none');
      }
    });
  });
</script>
