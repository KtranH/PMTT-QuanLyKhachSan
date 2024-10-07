@extends('User.container')
@section('body')
<title>GTX - Chi tiết loại phòng</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Chi tiết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">GTX</a></li>
                <li class="breadcrumb-item active">Chi tiết loại phòng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
  
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
  
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card" style="border-radius:20px">
                  <div class="card-body">
                    <h5 class="card-title">Số khách lưu trú <span>| Hôm nay</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users" style="color: #74C0FC;"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          @php
                            $countkh = DB::table("khachhang")->where("LUUTRU","YES")->count();
                            echo $countkh;
                          @endphp
                        </h6>
                        <span class="text-success small pt-1 fw-bold">Đã</span><span class="text-muted small pt-2 ps-1">ghé thăm</span>
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->
  
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card" style="border-radius:20px">
                  <div class="card-body">
                    <h5 class="card-title">Số phòng còn trống <span>| Hôm nay</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-table-list" style="color: #63E6BE;"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          @php
                            $countroom = DB::table("phong")->where("TRANGTHAI",0)->count();
                            echo $countroom;
                          @endphp
                        </h6>
                        <span class="text-success small pt-1 fw-bold">Vẫn còn</span><span class="text-muted small pt-2 ps-1">trống</span>
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->
  
              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card" style="border-radius:20px">
                  <div class="card-body">
                    <h5 class="card-title">Số sao đánh giá <span>| Tất cả</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-star" style="color: #fb5032;"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          @php
                            $countstar = DB::table("danhgia")->count();
                            echo $countstar;
                          @endphp
                        </h6>
                        <span class="text-danger small pt-1 fw-bold">Đánh giá</span><span class="text-muted small pt-2 ps-1">trải nghiệm</span>
  
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card" style="border-radius:20px">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Loại phòng <span>/Tất cả loại phòng</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">

                                        <nav class="nav_over_khoi">
                                            Chúng tôi hi vọng bạn thích
                                            <svg class="heart_over_khoi" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" stroke="#727272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z" stroke="#727272"/></svg>
                                        </nav>
                                        <div class="photo_over_khoi">
                                            <!-- Phần side ảnh -->
                                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" style="border-radius:20px">
                                                        <img src={{ $takeImage[0] }} class="d-block w-100" alt="..." style="height: 600px;object-fit: cover;border-radius:20px">
                                                    </div>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                 @foreach ($takeImage as $item)
                                                    @if ($count != 0)
                                                        <div class="carousel-item" style="border-radius:20px">
                                                            <img src={{ $item }} class="d-block w-100" alt="..." style="height: 600px;object-fit: cover;border-radius:20px">
                                                        </div>
                                                    @endif
                                                    @php
                                                        $count = 1;
                                                    @endphp
                                                 @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="description_over_khoi">
                                            <h2 class="h2_over_khoi">{{ $room[0]->TENLOAIPHONG }}<img src="{{ Storage::url('public/img/hotel-sign.gif' ) }}" style="max-width:80px;margin-left:20px" alt=""></h2>
                                            <h4 class="h4_over_khoi">Mã loại: {{ $room[0]->MALP }}</h4>
                                            <h1 class="h1_over_khoi">Giá 1 đêm: {{ $room[0]->GIATHUE }} VNĐ</h1>
                                            <p  class="p_over_khoi" style="font-size: 16px">Mô tả: {{ $room[0]->MOTA }}.</p>
                                            <p  class="p_over_khoi"><i class="fa-solid fa-couch" style="color: #74C0FC;margin-right:10px"></i><span style="font-weight:bold;">Nội thất: </span>{{ $room[0]->NOITHAT }}.</p>
                                            <p  class="p_over_khoi" style="margin-right:20px"><i class="fa-solid fa-hotel"
                                                style="color:#74C0FC;margin-right:10px;"></i><span style="font-weight:bold;">Diện
                                                tích:</span> {{ $room[0]->DIENTICH }}.</p>

                                            <p  class="p_over_khoi"><i class="fa-solid fa-wand-magic-sparkles" style="color: #74C0FC;"></i>
                                                <span style="font-weight:bold;">Tiện ích:
                                                </span>{{ $room[0]->TIENICH }}.</p>
                                            <p  class="p_over_khoi"><i class="fa-solid fa-box" style="color:#74C0FC;"></i><span
                                                style="font-weight:bold;margin-left:10px;">Sức chứa tối
                                                đa:</span> {{ $room[0]->SUCCHUA }}.</p>
                                            <p  class="p_over_khoi" style="font-weight:bold;"><i class="fa-solid fa-ban" style="color:#74C0FC;margin-right:5px;"></i>Quy định:
                                                {{ $room[0]->QUYDINH }}.</p>

                                            <p style="margin-bottom:40px;"></p>

                                            <a class="button_over_khoi" href="{{ route("cartUser",["takeIdRoom" => $room[0]->MALP]) }}">Thêm vào giỏ! <i class="fa-solid fa-cart-shopping"></i></a>
                                            <a class="button_over_khoi" href="{{ route( "payUser",["takeIdRoom" => $room[0]->MALP]) }}"> Đặt ngay! <i class="fa-solid fa-receipt"></i></a>
                                            <h5 style="color: red;margin-top:20px">
                                              @if(Session::has('notfoundroom'))
                                              <div class="form-label" style="width:100%; color: red">{{ Session::get('notfoundroom') }}</div>
                                              @php
                                                   Session::forget('notfoundroom');
                                              @endphp
                                              @endif
                                              @if(Session::has('updateaccount'))
                                              <div class="form-label" style="width:100%; color: red">{{ Session::get('updateaccount') }}</div>
                                              @php
                                                   Session::forget('updateaccount');
                                              @endphp
                                              @endif
                                            </h5>
                                        </div>                                          
                                </div>
                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
@endsection