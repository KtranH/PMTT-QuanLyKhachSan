@extends('User.container')
@section('body')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <title>GTX - Đặt phòng</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Đặt phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                <li class="breadcrumb-item">Đặt phòng</li>
                <li class="breadcrumb-item active">Danh sách đặt phòng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-8" style="width:100%">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách đặt phòng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Lịch sử thuê phòng</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Danh sách phòng của bạn</h5>

                            @if ($checkUser2 == null)
                            <div class="card_dp_khoi">
                                <div class="header_dp_khoi">
                                  <span class="icon_dp_khoi">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
                                    </svg>
                                  </span>
                                  <p class="alert_dp_khoi">Thông báo!</p>
                                </div>
                                <img src="assets/img/night-time2.png" alt="" style="max-width:168px">

                                <p class="message_dp_khoi">
                                  <h1>Opps :( </h1>
                                  <span style="font-size:20px">Bạn chưa tạo danh sách đặt phòng nào, hãy lựa các loại phòng bạn thích và đặt ngay cho chuyến du lịch của bạn.</span>
                                </p>
                              
                                <div class="actions_dp_khoi">
                                  <a class="read_dp_khoi" href="{{ route("all.category") }}">
                                    Xem các loại phòng
                                  </a>
                              
                                  <a class="mark-as-read_dp_khoi" href="{{ route("home") }}">
                                    Quay lại trang chủ
                                  </a>
                                </div>
                              </div>    
                            @else
                              <table class="table table-borderless datatable" id = "adminTable">
                                <thead>
                                    <tr>
                                      <th scope="col">Mã khách</th>
                                      <th scope="col">Tên loại phòng</th>
                                      <th scope="col">Tên khách</th>
                                      <th scope="col">Mã phiếu</th>
                                      <th scope="col">Tình trạng</th>
                                      <th scope="col">Trạng thái</th>
                                      <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($checkUser2 as $item)
                                    <tr>
                                      <th scope="row"><a href="#">{{ $item->MAKH }}</a></th>
                                      <td>{{ $item->TENLOAIPHONG }}</td>
                                      <td><a href="#" class="text-primary">{{ $item->HOTEN }}</a></td>
                                      <td>{{ $item->MAPHIEU }}</td>
                                      @if ($item->TINHTRANG == "Đặt trước")
                                        <td><span class="badge bg-warning">{{ $item->TINHTRANG }}</span></td>
                                      @elseif ($item->TINHTRANG == "Đã xác nhận")
                                        <td><span class="badge bg-success">{{ $item->TINHTRANG }}</span></td>
                                      @else
                                        <td><span class="badge bg-danger">{{ $item->TINHTRANG }}</span></td>
                                      @endif
                                      @if ($item->TT_NHANPHONG == "Đang đợi")
                                        <td><span class="badge bg-warning">{{ $item->TT_NHANPHONG }}</span></td>
                                      @elseif ($item->TT_NHANPHONG == "Đã nhận phòng")
                                        <td><span class="badge bg-success">{{ $item->TT_NHANPHONG }}</span></td>
                                      @else
                                        <td><span class="badge bg-danger">{{ $item->TT_NHANPHONG }}</span></td>
                                      @endif
                                      <td><a href="{{ route("cancel_seserve",["idphieu" => $item->MAPHIEU]) }}" title="Hủy phòng" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                    </tr>
                                  @endforeach
                                </tbody>
                                @if (Session::has("errorCancel"))
                                  <h5 style="color:red;marign-bottom:20px">{{ Session::get("errorCancel") }}</h5>
                                @endif
                              </table>                              
                            @endif
                          </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="lichSuDatPhong">
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Lịch sử phòng bạn từng đặt</h5>
                                
                                @if ($checkUser == null)
                                <div class="card_dp_khoi">
                                    <div class="header_dp_khoi">
                                      <span class="icon_dp_khoi">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
                                        </svg>
                                      </span>
                                      <p class="alert_dp_khoi">Thông báo!</p>
                                    </div>
                                    <img src="assets/img/night-time.png" alt="" style="max-width:168px">

                                    <p class="message_dp_khoi">
                                       <h1>Opps :( </h1>
                                       <span style="font-size:20px">Không tìm thấy danh sách bạn từng thuê phòng! Nếu bạn chưa đặt phòng hãy chọn loại phòng bạn thích và đặt ngay.</span>
                                    </p>
                                  
                                    <div class="actions_dp_khoi">
                                      <a class="read_dp_khoi" href="{{ route("all.category") }}">
                                        Xem các loại phòng
                                      </a>
                                  
                                      <a class="mark-as-read_dp_khoi" href="{{ route("home") }}">
                                        Quay lại trang chủ
                                      </a>
                                    </div>
                                  </div>   
                                @else
                                <table class="table table-borderless datatable" id = "adminTable">
                                  <thead>
                                      <tr>
                                        <th scope="col">Mã khách</th>
                                        <th scope="col">Tên loại phòng</th>
                                        <th scope="col">Tên khách</th>
                                        <th scope="col">Mã phiếu</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Ngày trả</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($checkUser as $item)
                                      <tr>
                                        <th scope="row"><a href="#">{{ $item->MAKH }}</a></th>
                                        <td>{{ $item->TENLOAIPHONG }}</td>
                                        <td><a href="#" class="text-primary">{{ $item->HOTEN }}</a></td>
                                        <td>{{ $item->MAPHIEU }}</td>
                                        <td><a href="#" class="text-primary">{{ $item->TONGTIEN }} VNĐ</a></td>
                                        <td>{{ $item->NGAYDAT }}</td>
                                        <td>{{ $item->TRAPHONG }}</td>
                                      </tr>
                                    @endforeach
                                    @foreach ($checkUser3 as $item)
                                      <tr>
                                        <th scope="row"><a href="#">{{ $item->MAKH }}</a></th>
                                        <td>{{ $item->TENLOAIPHONG }}</td>
                                        <td><a href="#" class="text-primary">{{ $item->HOTEN }}</a></td>
                                        <td>{{ $item->MAPHIEU }}</td>
                                        <td><span class="badge bg-danger">{{ $item->TT_NHANPHONG }}</span></td>
                                        <td>{{ $item->NGAYDAT }}</td>
                                        <td>{{ $item->TRAPHONG }}</td>
                                      </tr>
                                    @endforeach

                                  </tbody>
                                </table>                                      
                                @endif

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