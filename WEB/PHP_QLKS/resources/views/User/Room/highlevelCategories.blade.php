@extends('User.container')
@section('body')
<title>GTX - Đặt phòng khách sạn</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">GTX</a></li>
                <li class="breadcrumb-item active">Phòng cao cấp</li>
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
                    <h5 class="card-title">Lượt đánh giá <span>| Tất cả</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-star" style="color: #fb5032;"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          @php
                            $countcmt = DB::table("danhgia")->count();
                            echo $countcmt;
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
                                <h5 class="card-title">Loại phòng <span>/Tất cả loại phòng</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">
                                  @foreach($caocap as $r)
                                  @php
                                  $images = explode("|", $r->ANH);
                                  $firstImage = $images[0];
                                  $format_cost = number_format($r->GIATHUE, 0, ',', '.');
                        
                                  @endphp
                        
                                    <div class="col-md-6 mb-4" style="max-width:800px">
                                      <div class="Ha card my-specific-card {{$r->ISDELETE==0 ? 'disabled':''}}">
                                          <div class="card-img">
                                              <img src="{{$firstImage}}" alt="" class="{{$r->ISDELETE==0? 'grayscale':''}}">
                                          </div>
                                          <div class="card-info">
                                              <p class="text-title"> {{ $r->TENLOAIPHONG }}</p>
                                              <p class="card-text">
                        
                                              </p>
                                              @if ($r->ISDELETE==0)
                                              <p class="card-text"><i class="fa-solid fa-couch"
                                                style="color:gray;margin-right:10px;"></i><span style="font-weight:bold;">Nội thất:</span>
                                                {{ $r->NOITHAT }}
                                             </p>

                                              <p class="card-text"><i class="fa-solid fa-hotel"
                                                      style="color:gray;margin-right:10px;"></i><span style="font-weight:bold;">Diện
                                                      tích:</span>
                                                  {{ $r->DIENTICH }}
                                              </p>
                        
                        
                                              <p class="card-text"><i class="fa-solid fa-box" style="color:#gray;"></i><span
                                                      style="font-weight:bold;margin-left:10px;">Sức chứa tối
                                                      đa:</span> {{ $r->SUCCHUA }}</p>
                                              <p class="card-text">
                                              <p class="card-text"><i class="fa-solid fa-ban" style="color:#gray;margin-right:5px;"></i>
                                                  {{ $r->QUYDINH }}
                                              </p>
                                              </p>
                        
                                          </div>
                                              <div class="card-footer" style="border-radius:20px;background-color:gray">
                                              <span class="text-title" style="color:white;">Không còn hoạt động</span>
                        
                                              @else
                                                    <p class="card-text"><i class="fa-solid fa-couch" style="color: #74C0FC;margin-right:10px"></i><span style="font-weight:bold;">Nội thất:</span>{{ $r->NOITHAT }}
                                                    </p>
                                                    <p class="card-text"><i class="fa-solid fa-hotel"
                                                            style="color:#74C0FC;margin-right:10px;"></i><span style="font-weight:bold;">Diện
                                                            tích:</span>
                                                        {{ $r->DIENTICH }}
                                                    </p>
                              
                              
                                                    <p class="card-text"><i class="fa-solid fa-box" style="color:#74C0FC;"></i><span
                                                            style="font-weight:bold;margin-left:10px;">Sức chứa tối
                                                            đa:</span> {{ $r->SUCCHUA }}</p>
                                                    <p class="card-text">
                                                    <p class="card-text"><i class="fa-solid fa-ban" style="color:#74C0FC;margin-right:5px;"></i>
                                                        {{ $r->QUYDINH }}
                                                    </p>
                                                    </p>
                              
                                                </div>
                                              <div class="card-footer" style="border-radius:20px">
                                              <span class="text-title" style="color:white;">{{ $format_cost }}<sup>đ</sup></span>
                                              @endif
                                              <a class="card-button" href="{{ route("overviewProduct",["idroom" => $r->MALP]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                      <path fill="#fafafa"
                                                          d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z" />
                                                  </svg>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                                  {{ $caocap->links("vendor.pagination.bootstrap-5") }}
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