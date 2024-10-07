@extends('User.container')
@section('body')
    <title>GTX - Đặt phòng khách sạn</title>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Trang Chủ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">GTX</a></li>
                    <li class="breadcrumb-item active">Trang Chủ</li>
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

                        <div class="col-12">
                            <div class="card" style="border-radius:20px">
                                <div class="card-body">
                                    <h5 class="card-title">Dịch Vụ <span>/Tất cả dịch vụ</span></h5>
                                    <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                    ">
                                        @foreach($allDichVu as $dv)
                                        @php
                                        $images = explode("|", $dv->HINHANH);
                                        $firstImage = $images[0];
                                        $format_cost = number_format($dv->GIA, 0, ',', '.');
                                        @endphp
                        
                                        <div class="col-md-6 mb-4" style="max-width:400px">
                                             <div class="Ha card my-specific-card {{ $dv->ISDELETE == 0 ? 'disabled' : '' }}">
                                                <div class="card-img">
                                                    <img src="{{$firstImage}}" loading="lazy" alt="" class="{{ $dv->ISDELETE == 0 ? 'grayscale' : '' }}"> 
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-title"> {{ $dv->TENDV }}</p>
                                                    <p class="card-text"><span style="font-weight:bold;">Mô tả:</span>
                                                        {{ Str::limit($dv->MOTA, 180, $end='...') }}
                                                    </p>
                                                </div>
                                                @if($dv->ISDELETE == 0)
                                                    <div class="card-footer" style="border-radius:20px;background-color:gray">
                                                @else
                                                    <div class="card-footer" style="border-radius:20px">
                                                @endif
                                                        @if($dv->ISDELETE == 0)
                                                        <span class="text-title rend-cost">
                                                            Không còn hoạt động
                                                        </span>
                                                        @else
                                                        <span class="text-title rend-cost" style="color:white">
                                                            {{ $format_cost }}<sup>đ</sup>
                                                        </span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{ $allDichVu->links("vendor.pagination.bootstrap-5") }}
                                    </div>
                                </div>
                        
                            </div>
                        </div><!-- End Recent Sales -->

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Những đánh giá <span>| tiêu biểu</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Đánh giá</th>
                                                <th scope="col">Khách hàng</th>
                                                <th scope="col">Số ngày ở</th>
                                                <th scope="col">Số sao</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng tốt</a>
                                                </td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">2</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng tốt</a>
                                                </td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">2</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng
                                                        tốt</a></td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">2</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng
                                                        tốt</a></td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">1</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng
                                                        tốt</a></td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">3</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="https://www.vanorohotel.com/wp-content/uploads/2021/07/drz-vanoro_6737.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Phòng chất lượng
                                                        tốt</a></td>
                                                <td>Nguyễn Văn A</td>
                                                <td class="fw-bold">3</td>
                                                <td><i class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i><i
                                                        class="fa-solid fa-star" style="color: #ff4242;"></i></td>
                                            </tr>
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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hoạt động của khách sạn<span> | các ngày trong tuần</span></h5>
                            <div class="activity">
                                @foreach ($lines as $x)
                                    @php
                                        $array = explode('|', $x);
                                    @endphp
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">@php echo $array[0] @endphp </div>
                                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'
                                            style="color:#74C0FC"></i>
                                        <div class="activity-content">
                                            @php echo $array[1] @endphp
                                        </div>
                                    </div><!-- End activity item-->
                                @endforeach
                            </div>
                        </div>
                    </div><!-- End Recent Activity -->

                    <!-- Budget Report -->
                   <!-- End Budget Report -->

                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Số lượng <span>| từng loại phòng</span></h5>

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
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Tin tức &amp; Thông báo <span>| Hôm nay</span></h5>

                            <div class="news">
                                @foreach ($data as $x)
                                    <div class="post-item clearfix">
                                        <img src="@php echo $x["image"] @endphp" alt="">
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
