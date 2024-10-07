@extends('Admin.containerAdmin')
@section('body')
  <title>GTX - Trang quản lý</title>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Trang chủ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
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
                      <span class="text-success small pt-1 fw-bold">Đã</span><span class="text-muted small pt-2 ps-1"> ghé thăm</span>

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
           
            <!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto" style="border-radius:20px">

                <div class="card-body">
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Danh sách phiếu thuê phòng <span>| Tất cả</span></h5>

                  <h5 id="title" style="color:red;font-weight:bold"></h5>
                  <table class="table table-borderless datatable" id = "adminTable">
                    <thead>
                        <tr>
                          <th scope="col">Mã khách</th>
                          <th scope="col">Mã phòng</th>
                          <th scope="col">Tên khách</th>
                          <th scope="col">Mã phiếu</th>
                          <th scope="col">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($SelectPDK as $item)
                        <tr>
                          <th scope="row"><a href="#">{{ $item->MAKH }}</a></th>
                          <td>{{ $item->MAPHONG }}</td>
                          <td><a href="#" class="text-primary">{{ $item->HOTEN }}</a></td>
                          <td>{{ $item->MAPHIEU }}</td>
                          <td><span class="badge bg-warning">{{ $item->TINHTRANG }}</span></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
                  <script>
                     Pusher.logToConsole = true;
                    var pusher = new Pusher('f62486d98e8b35d383af', {
                      cluster: 'ap1'
                    });
                    var channel = pusher.subscribe('data-channel');
                    channel.bind('data-updated', function(data) {
                        // Check if data is an array
                        if (Array.isArray(data)) {
                            let title = document.getElementById('title');
                            let count = 0;
                            data.forEach(item => {
                                count = count + 1;
                                addRowToTable(item);
                            });
                            title.innerHTML = "Bạn có " + count + " phiếu đăng ký đặt trước mới!";
                        } else {
                            let title = document.getElementById('title');
                            title.innerHTML = "Bạn có 1 phiếu đăng ký đặt trước mới!";
                            addRowToTable(data);
                        }
                    });
                    function addRowToTable(item) {
                        let table = document.getElementById('adminTable');
                        let row = table.insertRow();
                        let tMAKH = row.insertCell(0);
                        let tMAP = row.insertCell(1);
                        let tTENKH = row.insertCell(2);
                        let tMAPHIEU = row.insertCell(3);
                        let tTINHTRANG = row.insertCell(4);
                        let makha = document.createElement('a');
                        makha.href = '#';
                        makha.innerHTML = item.MAKH;
                        tMAKH.appendChild(makha);
                        let hotena = document.createElement('a');
                        hotena.href = '#';
                        hotena.className = 'text-primary';
                        hotena.innerHTML = item.HOTEN;
                        tTENKH.appendChild(hotena);
                        tMAP.innerHTML = item.MAPHONG;
                        tMAPHIEU.innerHTML = item.MAPHIEU;
                        let noteSpan = document.createElement('span');
                        noteSpan.className = 'badge bg-warning';
                        noteSpan.innerHTML = item.TINHTRANG;
                        tTINHTRANG.appendChild(noteSpan);
                    }

                </script>
                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto" style="border-radius:20px">

                <div class="card-body pb-0">
                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                  font-optical-sizing: auto;
                  font-weight: 600;
                  font-style: normal;">Những loại phòng tiêu biểu <span>| Tất cả</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Mã loại</th>
                        <th scope="col">Tên loại</th>
                        <th scope="col">Giá thuê</th>
                        <th scope="col">Tổng số lần thuê</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($selectRoom as $item)
                      <?php $count = 0; ?>
                        <tr>
                          <td>{{ $item->MALP }}</td>
                          <td><a href="#" class="text-primary fw-bold">{{ $item->TENLOAIPHONG }}</a></td>
                          <td>{{ $item->GIATHUE }}</td>
                          <?php 
                            $selectpdk = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP");
                            foreach ($selectpdk as $item2) 
                            {
                                if($item->MALP == $item2->MALP)
                                {
                                   $count = $count + 1;
                                }
                            }
                          ?>
                          <td>{{ $count }}</td>
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
         
         
         
          <!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card" style="border-radius:20px">


            <div class="card-body pb-0">
              <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
              font-optical-sizing: auto;
              font-weight: 600;
              font-style: normal;">Thống kê nhận phòng và hủy phòng <span>| Tất cả</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>


              @php
                  $nhanphong = DB::table("phieudangky")->WHERE("TINHTRANG","Đã xác nhận")->count();
                  $huyphong = DB::table("phieudangky")->WHERE("TINHTRANG","Đã hủy")->count();
              @endphp

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                      type: 'shadow'
                    }
                  },
                    legend: {},
                    xAxis: {
                    type: 'category',
                    data: ['Số lượng']
                  },
                  yAxis: {
                    type: 'value'
                  },
                  series: [
                    {
                      name: "Nhận phòng",
                      data: [{{ $nhanphong }}],
                      type: 'bar'
                    },
                    {
                      name: "Hủy phòng",
                      data: [{{ $huyphong }}],
                      type: 'bar'
                    }
                  ]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card" style="border-radius:20px">
  
            <div class="card-body pb-0">
              <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
              font-optical-sizing: auto;
              font-weight: 600;
              font-style: normal;">Số lượng các loại phòng <span>| Tất cả</span></h5>

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
                      name: 'Đang hiển thị',
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
         
         
          <!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

@endsection