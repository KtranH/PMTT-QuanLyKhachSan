@extends('User.container')
@section('body')
  <title>GTX - Tài khoản</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Tài khoản</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                <li class="breadcrumb-item">Tài khoản người dùng</li>
                <li class="breadcrumb-item active">Tài khoản</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if ($flag == true)
                            <img src="{{ $checkUser[0]->AVATAR }}" class="rounded-circle">
                        @else
                            <img src="{{ Storage::url('public/img/' . $checkUser[0]->AVATAR ) }}" class="rounded-circle">
                        @endif
                        <h2>@php
                            echo $checkUser[0]->HOTEN;
                        @endphp</h2>
                        <h3>@php
                            echo $checkUser[0]->EMAIL;
                        @endphp</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="card_accountkhoi">
                        <div class="header_account_khoi"></div>
                        <div class="info_account_khoi">
                          <p class="title_account_khoi">Bạn muốn tạo ảnh đại diện bằng AI?</p>
                          <p>Nếu bạn muốn tải ảnh đại diện nhưng không có ảnh để thực hiện điều đó thì chúng tôi cung cấp cho bạn một chức năng tạo ảnh đại diện bằng AI, chỉ cần nhấp vào nút bên dưới. </p>
                        </div>
                        <div class="footer_account_khoi">
                          <p class="tag_account_khoi">Tạo ảnh bằng AI </p>
                          <a href="{{ route("generativeAI") }}" type="button" class="action_account_khoi">Bắt đầu ngay </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-8">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Tổng quan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Ghi chú</h5>
                                <p class="small fst-italic">
                                    Ohh. Bạn chưa có ghi chú nào! :(
                                </p>
                                <h5 class="card-title">Chi tiết tài khoản <i class="fa-solid fa-pen-to-square" style="color: #74C0FC;margin-left:20px"></i> <a href="{{ route("edit_account") }}" style="font-size: 15px">Chỉnh sửa trang cá nhân</a></h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tên tài khoản:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->USERNAME;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Họ và tên:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->HOTEN;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Giới tính:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->GIOITINH;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ngày sinh:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->NGAYSINH;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Địa chỉ:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->DIACHI;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->SDT;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Căn cước công dân</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->CCCD;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email:</div>
                                    <div class="col-lg-9 col-md-8">@php
                                        echo $checkUser[0]->EMAIL;
                                    @endphp</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Điểm tín nhiệm:</div>
                                    <div class="col-lg-9 col-md-8" style="color: red;font-weight:bold">@php
                                        echo $checkUser[0]->DIEMTINNHIEM;
                                    @endphp</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection