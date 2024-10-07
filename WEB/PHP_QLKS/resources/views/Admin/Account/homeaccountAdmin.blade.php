@extends('Admin.containerAdmin')
@section('body')
  <title>GTX - Tùy chỉnh tài khoản</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Cập nhật thông tin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Tài khoản người dùng</li>
                <li class="breadcrumb-item active">Cập nhật thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="https://e7.pngegg.com/pngimages/81/570/png-clipart-profile-logo-computer-icons-user-user-blue-heroes-thumbnail.png" alt="Profile" class="rounded-circle">
                        <h2><?php echo $checkUser[0]->HOTEN ?></h2>
                        <h3><?php echo $checkUser[0]->EMAIL ?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card_edit_khoi">
                  <div class="card-image_edit_khoi"></div>
                  <div class="category_edit_khoi"> Thông báo quan trọng </div>
                  <div class="heading_edit_khoi"> Vui lòng bảo mật tài khoản của bạn, không để lộ thông tin quan trọng như cookie, email, số điện thoại!
                      <div class="author_edit_khoi"> Cảnh báo <span class="name_edit_khoi">Bảo mật</span></div>
                  </div>
              </div>
            </div>
            <div class="col-xl-8" style="border-radius:20px;">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Cập nhật thông tin</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Đổi mật khẩu</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                          
                              @if (Session::has("errorupdateaccount"))
                                <h5 style="color:red;marign-bottom:20px">{{ Session::get("errorupdateaccount") }}</h5>
                              @endif
                              @if (Session::has("errorgender"))
                              <h5 style="color:red;marign-bottom:20px">{{ Session::get("errorgender") }}</h5>
                              @endif

                                <!-- Profile Edit Form -->
                               <form action="{{ route("updateaccountadmin") }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Chức vụ</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="position" type="text" class="form-control" id="company" value="<?php echo $checkUser[0]->CHUCNANG ?>" disabled>
                                  </div>
                                </div>

                                    <div class="row mb-3">
                                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $checkUser[0]->HOTEN ?>" required>
                                        <div class="invalid-feedback">Họ tên không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="company" value="<?php echo $checkUser[0]->DIACHI ?>" required>
                                        <div class="invalid-feedback">Địa chỉ không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="number" min = 1 minlength= 10 class="form-control" id="Job" value="<?php echo $checkUser[0]->SDT ?>" required>
                                        <div class="invalid-feedback">Điện thoại không hợp lệ</div>
                                      </div>
                                    </div>
        
                                    <div class="row mb-3">
                                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Address" value="<?php echo $checkUser[0]->EMAIL ?>"   required>
                                        <div class="invalid-feedback">Email không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Ngày Sinh</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="birthday" type="date" class="form-control" id="Phone" value="<?php echo $checkUser[0]->NGAYSINH ?>" required>
                                        <div class="invalid-feedback">Ngày sinh không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                                      <div class="col-md-8 col-lg-9">
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                          @if ($checkUser[0]->GIOITINH == "Nam")
                                            <option selected value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                          @endif
                                          @if ($checkUser[0]->GIOITINH == "Nữ")
                                            <option selected value="Nữ">Nữ</option>
                                            <option value="Nam">Nam</option>
                                          @endif
                                          @if ($checkUser[0]->GIOITINH == "Chưa rõ")
                                          <option selected value="Chưa rõ">Lựa chọn giới tính của bạn</option>
                                          <option value="Nữ">Nữ</option>
                                          <option value="Nam">Nam</option>
                                        @endif
                                        </select>
                                        <div class="invalid-feedback">Giới tính không hợp lệ</div>
                                      </div>
                                    </div>            
                                    <div class="text-center">
                                      <button type="submit" name = "check" class="btn btn-primary" style="border-radius:20px">Lưu và thay đổi</button>
                                    </div>
                                  </form>
                                <!-- End Profile Edit Form -->
                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                @if (Session::has("errorPass"))
                                <h5 style="color:red;marign-bottom:20px">{{ Session::get("errorPass") }}</h5>
                                @endif
                                @if (Session::has("errorNewPass"))
                                <h5 style="color:red;marign-bottom:20px">{{ Session::get("errorNewPass") }}</h5>
                                @endif
                                <form method="post" action="{{ route("updateaccountadminpass") }}">
                                  @csrf
                                    <div class="row mb-3">
                                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                      </div>
                                    </div>
                
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-primary">Lưu và thay đổi</button>
                                    </div>
                                  </form>
                                <!-- End Change Password Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection