@extends('User.container')
@section('body')
  <title>GTX - Đặt phòng khách sạn</title>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Trang chủ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">GTX</a></li>
          <li class="breadcrumb-item active">Trang chủ</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card" style="border-radius:20px">
                <div class="card-body">
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Số khách lưu trú <span>| Tất cả</span></h5>

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
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Số phòng còn trống <span>| Tất cả</span></h5>

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
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Lượt đánh giá <span>| Tất cả</span></h5>

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
              <div class="card-body">
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Phòng <span>/Loại phòng tiêu biểu</span></h5>
                  <div class="row bg-white" style="padding:20px;border-radius:20px;width:102%;display:flex;justify-content: space-around;
                  ">
                    @foreach($categoryFreatured as $r)
                    @php
                    $images = explode("|", $r->ANH);
                    $firstImage = $images[0];
                    $format_cost = number_format($r->GIATHUE, 0, ',', '.');
          
                    @endphp
          
                    <div class="col-md-6 mb-4" style="max-width:800px">
                        <div class="Ha card my-specific-card {{$r->ISDELETE==0 ? 'disabled':''}}">
                            <div class="card-img">
                                <img src="{{$firstImage}}" loading="lazy" alt="" class="{{$r->ISDELETE==0? 'grayscale':''}}">
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
                                      <p class="card-text"><i class="fa-solid fa-couch" style="color: #74C0FC;margin-right:10px"></i><span style="font-weight:bold;">Nội thất: </span>{{ $r->NOITHAT }}
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
                </div>
              </div>
          </div>
          <!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto" style="border-radius:20px">
                <div class="card-body pb-0">
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Những đánh giá  <span>| tiêu biểu</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Loại phòng</th>
                        <th scope="col">Đánh giá</th>
                        <th scope="col">Số sao</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($comment as $item)
                        <tr>
                          <td><a href="#" class="text-primary fw-bold">{{ $item->HOTEN }}</a></td>
                          <td>{{ $item->TENLOAIPHONG }}</td>
                          <td>{{ $item->BINHLUAN }}</td>
                          <td>
                          @for ($i = 0; $i < $item->SOSAO; $i++)
                              <i class="fa-solid fa-star" style="color: #ff4242;"></i>
                          @endfor
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->
        
        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card" style="border-radius:20px">
            <div class="card-body">
              <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
              font-optical-sizing: auto;
              font-weight: 600;
              font-style: normal;">Hoạt động của khách sạn<span> | các ngày trong tuần</span></h5>
              <div class="activity">
                @foreach ($lines as $x)
                 @php
                     $array = explode('|', $x);
                 @endphp
                  <div class="activity-item d-flex">
                    <div class="activite-label">@php echo $array[0] @endphp </div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start' style="color:#74C0FC"></i>
                    <div class="activity-content">
                        @php echo $array[1] @endphp 
                    </div>
                  </div><!-- End activity item-->
                @endforeach
              </div>
            </div>
          </div><!-- End Recent Activity -->

          <!-- Website Traffic --> 
          <div class="card" style="border-radius:20px">
            <div class="card-body pb-0">
              <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
              font-optical-sizing: auto;
              font-weight: 600;
              font-style: normal;">Số lượng <span>| từng loại phòng</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              @php
                  $cc = DB::table("loaiphong")->where("TENLOAIPHONG","LIKE","%"."cao cấp"."%")->sum("SOLUONG");
                  $pt = DB::table("loaiphong")->where("TENLOAIPHONG","LIKE","%"."phổ thông"."%")->sum("SOLUONG");
                  $gr = DB::table("loaiphong")->where("TENLOAIPHONG","LIKE","%"."giá rẻ"."%")->sum("SOLUONG");
              @endphp

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Số lượng',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: {{ $cc }},
                          name: 'Phòng cao cấp'
                        },
                        {
                          value: {{ $pt }},
                          name: 'Phòng phổ thông'
                        },
                        {
                          value: {{ $gr }},
                          name: 'Phòng giá rẻ'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card" style="border-radius:20px">
            <div class="card-body pb-0">
              <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
              font-optical-sizing: auto;
              font-weight: 600;
              font-style: normal;">Tin tức &amp; Thông báo <span>| Hôm nay</span></h5>

              <div class="news">
                  @foreach ($data as $x)
                      <div class="post-item clearfix">
                        <img src="{{ $x["image"] }}" alt="">
                        <h4><a href="#">@php echo $x["title"] @endphp</a></h4>
                        <p>@php echo $x["content"] @endphp</p>
                      </div>
                  @endforeach
              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@endsection