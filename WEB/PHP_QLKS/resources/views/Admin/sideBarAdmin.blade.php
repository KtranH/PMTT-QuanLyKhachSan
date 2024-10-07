
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
  
        <li class="nav-item">
          <a class="nav-link " href="{{ route("homeAdmin") }}">
            <i class="fa-solid fa-house" style="color: #74C0FC;"></i>
            <span>Trang chủ</span>
          </a>
        </li><!-- End Dashboard Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="fa-solid fa-door-open" style="color: #74C0FC;"></i><span>Phòng và loại phòng</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{ $url = route('categoryAdmin') }}">
                      <i class="bi bi-circle"></i><span>Danh sách loại phòng</span>
                  </a>
              </li>
              <li>
                  <a href="{{ $url = route('roomAdmin') }}">
                      <i class="bi bi-circle"></i><span>Danh sách phòng</span>
                  </a>
              </li>
          </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item"> 
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-brands fa-servicestack" style="color: #74C0FC;"></i><span>Dịch vụ</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('serviceadmin')}}">
                    <i class="bi bi-circle"></i><span>Danh sách dịch vụ</span>
                </a>
            </li>
        </ul>
    </li><!-- End Charts Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="fa-solid fa-magnifying-glass-dollar" style="color: #74C0FC;"></i><span>Quản lý đặt và thuê phòng</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{route('reserveAdmin')}}">
                      <i class=" bi bi-circle"></i><span>Xử lý đăng ký</span>
                  </a>
              </li>
              <li>
                <!--<a href="route("ct_reserve",["idphieuurl" => $item->MAPHIEU,"tt" => $item->TINHTRANG])">-->
                <a href="{{ route("editctroom") }}">
                   <i class=" bi bi-circle"></i><span>Tùy chỉnh phiếu đăng ký</span>
                </a>
            </li>
          </ul>
      </li><!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-receipt" style="color: #74C0FC;"></i><span>Hóa đơn</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('selectinvoice')}}">
                    <i class="bi bi-circle"></i><span>Thanh toán hóa đơn</span>
                </a>
            </li>
        </ul>
    </li><!-- End Icons Nav -->

        <li class="nav-heading">Thông tin</li>
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route("homeaccountadmin") }}">
            <i class="fa-solid fa-user" style="color: #74C0FC;"></i>
            <span>Trang cá nhân</span>
          </a>
        </li><!-- End Profile Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route("commentadmin") }}">
            <i class="fa-solid fa-tag" style="color: #74C0FC;"></i>
            <span>Quản lý đánh giá</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route("emloyeeAdmin") }}">
            <i class="fa-solid fa-people-arrows" style="color: #74C0FC;"></i>
            <span>Quản lý nhân viên</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route("informationadmin") }}">
            <i class="fa-solid fa-magnifying-glass" style="color: #74C0FC;"></i>
            <span>Tra cứu</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route("logoutAdmin") }}">
            <i class="fa-solid fa-tag" style="color: #74C0FC;"></i>
            <span>Đăng xuất</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

      </ul>
  
    </aside><!-- End Sidebar-->