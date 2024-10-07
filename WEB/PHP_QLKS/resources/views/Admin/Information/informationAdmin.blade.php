@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý thông tin</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Thông tin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Thông tin</li>
                <li class="breadcrumb-item active">Tùy chỉnh thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-8" style="width:100%">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-4">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#luutru">Khách hàng lưu trú</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#taikhoan">Tài khoản khách hàng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#phieudatphong">Danh sách phiếu đặt phòng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hoadon">Danh sách hóa đơn</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-1">

                          <div class="tab-pane fade active show profile-overview" id="luutru">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Khách hàng lưu trú</h5>

                            <!-- Bảng hiển thị danh khách hàng từng lưu trú -->

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã khách</th>
                                    <th scope="col">Tên khách</th>
                                    <th scope="col">Căn cước</th>
                                    <th scope="col">Điện thoại</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($occlusive as $item)
                                        <tr>
                                            <th scope="row"><a href="#"><?php echo $item->MAKH ?></a></th>
                                            <td><?php echo $item->HOTEN ?></td>
                                            <td><a href="#" class="text-primary"><?php echo $item->CCCD ?></a></td>
                                            <td><?php echo $item->SDT ?></td>
                                        </tr>              
                                    @endforeach
                                </tbody>
                              </table>

                          </div>
                          <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="taikhoan">
                                
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Tài khoản khách hàng</h5>
                                
                                <!-- Bảng hiển thị tài khoản khách hàng -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã khách</th>
                                        <th scope="col">Tên khách</th>
                                        <th scope="col">Tên đăng nhập</th>
                                        <th scope="col">Căn cước</th>
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Chức năng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($account as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><?php echo $item->MAKH ?></a></th>
                                                <td><?php echo $item->HOTEN ?></td>
                                                <td><a href="#" class="text-primary"><?php echo $item->USERNAME ?></a></td>
                                                <td><?php echo $item->CCCD ?></td>
                                                <td><?php echo $item->SDT?></td>
                                                <td><?php echo $item->EMAIL?></td>
                                                @if ($item->ISDELETE == 0)
                                                    <td><span class="badge bg-danger">Đã khóa</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Hoạt động</span></td>
                                                @endif
                                                <td><a href="{{ route("unlockorlockaccountkh",["idkh" => $item->MAKH,"check" => "true"]) }}" type="button" title="Khôi phục" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-arrow-rotate-left" style="color: #ffffff;"></i></a><a href="{{ route("unlockorlockaccountkh",["idkh" => $item->MAKH,"check" => "false"]) }}" title="Khóa tài khoản" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                            </tr>              
                                        @endforeach
                                    </tbody>
                                  </table>

                            </div>
                        </div>  
                        <div class="tab-content pt-3">

                            <div class="tab-pane fade show profile-overview" id="phieudatphong">
                                
                                <h5 class="card-title" style="margin-top:-25px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Phiếu đăng ký hiện có</h5>
                                
                                <!-- Bảng hiển thị danh sách đánh giá chờ duyệt -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã phiếu</th>
                                        <th scope="col">Mã nhân viên</th>
                                        <th scope="col">Tên loại</th>
                                        <th scope="col">Tên phòng</th>
                                        <th scope="col">Ngày nhận phòng</th>
                                        <th scope="col">Ngày trả phòng</th>
                                        <th scope="col">Tiền phòng</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Tình thái nhận phòng</th>
                                        <th scope="col">Chức năng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcription as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><?php echo $item->MAPHIEU ?></a></th>
                                                <td><?php echo $item->MANV ?></td>
                                                <td><?php echo $item->TENLOAIPHONG ?></td>
                                                <td><?php echo $item->TENPHONG ?></td>
                                                <td><?php echo $item->NGAYDAT ?></td>
                                                <td><a href="#" class="text-primary"><?php echo $item->TRAPHONG?></a></td>
                                                <td><?php echo $item->THANHTOAN?></td>
                                                @if ($item->TINHTRANG == "Đặt trước")
                                                    <td><span class="badge bg-secondary"><?php echo $item->TINHTRANG ?></span></td>
                                                @elseif($item->TINHTRANG == "Đã xác nhận")  
                                                    <td><span class="badge bg-success"><?php echo $item->TINHTRANG ?></span></td>
                                                @else
                                                    <td><span class="badge bg-danger"><?php echo $item->TINHTRANG ?></span></td>
                                                @endif
                                                @if ($item->TT_NHANPHONG == "Đang đợi")
                                                    <td><span class="badge bg-warning" style="color: white"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                @elseif($item->TT_NHANPHONG == "Đã nhận phòng")  
                                                    <td><span class="badge bg-success"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                @elseif($item->TT_NHANPHONG == "Đã trả phòng")  
                                                    <td><span class="badge bg-success"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                @else
                                                    <td><span class="badge bg-danger"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                @endif
                                                <td><a href="{{ route("detailroom",["idphieuurl" => $item->MAPHIEU]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></a></td>
                                            </tr>              
                                        @endforeach
                                    </tbody>
                                  </table>

                            </div>
                        </div>  
                        <div class="tab-content pt-4">

                            <div class="tab-pane fade show profile-overview" id="hoadon">
                                
                                <h5 class="card-title" style="margin-top:-50px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Danh sách hóa đơn</h5>
                                
                                <!-- Bảng hiển thị danh sách đánh giá chờ duyệt -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã hóa đơn</th>
                                        <th scope="col">Mã nhân viên</th>
                                        <th scope="col">Mã phiếu</th>
                                        <th scope="col">Ngày lập</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Chức năng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reception as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><?php echo $item->MAHD ?></a></th>
                                                <td><?php echo $item->MANV ?></td>
                                                <td><?php echo $item->MAPHIEU ?></td>
                                                <td><?php echo $item->NGAYLAP ?></td>
                                                <td><?php echo $item->TONGTIEN ?></td>
                                                <td><a href="{{ route("detailInvoice",["invoice" => $item->MAHD]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></a></td>
                                            </tr>              
                                        @endforeach
                                    </tbody>
                                  </table>

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