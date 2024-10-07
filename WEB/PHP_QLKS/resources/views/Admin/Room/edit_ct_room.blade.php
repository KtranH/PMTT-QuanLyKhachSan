@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Tùy chỉnh phiếu đăng ký</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Phiếu đăng ký</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Phiếu đăng ký</li>
                <li class="breadcrumb-item active">Tùy chỉnh phiếu đăng ký</li>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#phieudatphong">Danh sách tùy chỉnh</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-1">

                          <div class="tab-pane fade active show profile-overview" id="phieudatphong">
                 
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Tùy chỉnh phiếu đăng ký</h5>
                                
                                <!-- Bảng hiển thị danh sách đánh giá chờ duyệt -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã phiếu</th>
                                        <th scope="col">Mã nhân viên</th>
                                        <th scope="col">Tên loại</th>
                                        <th scope="col">Tên phòng</th>
                                        <th scope="col">Ngày đăng ký</th>
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
                                                @else
                                                    <td><span class="badge bg-danger"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                @endif
                                                <td><a href="{{ route("ct_reserve",["idphieuurl" => $item->MAPHIEU,"tt" => $item->TINHTRANG]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a></td>
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