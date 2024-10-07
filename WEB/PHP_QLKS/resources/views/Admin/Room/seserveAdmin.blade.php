@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý phiếu đăng ký</title>
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
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pdktt">Phiếu đăng ký trực tiếp</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pdkdt">Phiếu đăng ký đặt trước</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade active show profile-overview" id="pdktt">

                                        <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: bold;
                                        font-style: normal;">Phòng khả dụng</h5>
        
                                        @if (Session::has("errorDayPDK"))
                                            <h5 style="color:red">{{ Session::get("errorDayPDK") }}</h5>
                                        @endif
                                        @if (Session::has("errorRoomPDK"))
                                            <h5 style="color:red">{{ Session::get("errorRoomPDK") }}</h5>
                                        @endif
        
                                        <table class="table table-borderless datatable">
                                            <thead>
                                            <tr>
                                                <th scope="col">Mã phòng</th>
                                                <th scope="col">Tên phòng</th>
                                                <th scope="col">Tên loại</th>
                                                <th scope="col">Sức chứa</th>
                                                <th scope="col">Giá thuê</th>
                                                <th scope="col">Tình trạng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($room as $item)
                                                    <tr>
                                                        <th scope="row"><a href="#"><?php echo $item->MAPHONG ?></a></th>
                                                        <td><?php echo $item->TENPHONG ?></td>
                                                        <td><a href="#" class="text-primary"><?php echo $item->TENLOAIPHONG ?></a></td>
                                                        <td><?php echo $item->SUCCHUA ?></td>
                                                        <td><?php echo $item->GIATHUE?></td>
                                                        <td><span class="badge bg-success">Còn trống</span></td>
                                                    </tr>              
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: bold;
                                        font-style: normal;">Phiếu đăng ký trực tiếp</h5>
                                        <form class="needs-validation" novalidate method="POST" action="{{ route("rentAdmin") }}">
                                            @csrf
                                                @if (Session::has("errorDayPDK"))
                                                    <h5 style="color:red">{{ Session::get("errorDayPDK") }}</h5>
                                                    @php
                                                        Session::forget('errorDayPDK');
                                                    @endphp
                                                @endif
                                                @if (Session::has("errorRoomPDK"))
                                                    <h5 style="color:red">{{ Session::get("errorRoomPDK") }}</h5>
                                                    @php
                                                        Session::forget('errorRoomPDK');
                                                    @endphp
                                                @endif
                                                <div style="display:flex; justify-content: space-around;margin-bottom: 20px;">
                                                    <div style="width:100%;margin-right:20px;">
                                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Ngày thuê:</label>
                                                        <div class="col-md-8 col-lg-12">
                                                            <?php   
                                                                $now = new DateTime();
                                                                $DateN = $now->format('Y-m-d');
                                                            ?>
                                                        <input name="dater" type="date" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" value="{{ $DateN }}" readonly required>
                                                        <div class="invalid-feedback">Ngày tháng không hợp lệ</div>
                                                        </div>
                                                    </div>  
                
                                                    <div style="width:100%">
                                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Ngày trả:</label>
                                                        <div class="col-md-8 col-lg-12">
                                                            <input name="datep" type="date" min = 1 class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                                            <div class="invalid-feedback">Ngày tháng không hợp lệ</div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div style="width:100%">
                                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Mã phòng:</label>
                                                    <div class="col-md-8 col-lg-12">
                                                    <input name="roomname" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                                    <div class="invalid-feedback">Mã phòng không hợp lệ</div>
                                                    </div>
                                                </div>  
                                            <div class="text-center" style="margin-top:20px;">
                                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="pdkdt">
                                
                                <div class="tab-pane fade active show profile-overview" id="pdkt">
                                    <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                    font-optical-sizing: auto;
                                    font-weight: 400;
                                    font-style: normal;">Danh sách phiếu đăng ký trước</h5>

                                    @if (Session::has("errorDayPDK"))
                                    <h5 style="color:red">{{ Session::get("errorDayPDK") }}</h5>
                                    @endif
                                    @if (Session::has("errorRoomPDK"))
                                    <h5 style="color:red">{{ Session::get("errorRoomPDK") }}</h5>
                                    @endif


                                   <table class="table table-borderless datatable">
                                       <thead>
                                         <tr>
                                           <th scope="col">Mã phiếu</th>
                                           <th scope="col">Mã nhân viên</th>
                                           <th scope="col">Tên phòng</th>
                                           <th scope="col">Ngày đặt</th>
                                           <th scope="col">Ngày trả</th>
                                           <th scope="col">Tổng tiền</th>
                                           <th scope="col">Tình trạng</th>
                                           <th scope="col">Trạng thái</th> 
                                           <th scope="col">Chức năng</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($selectPDKT as $item)
                                               <tr>
                                                   <th scope="row"><a href="#"><?php echo $item->MAPHIEU ?></a></th>
                                                   <td><?php echo $item->MANV ?></td>
                                                   <td><a href="#" class="text-primary"><?php echo $item->TENPHONG ?></a></td>
                                                   <td><?php echo $item->NGAYDAT ?></td>
                                                   <td><?php echo $item->TRAPHONG?></td>
                                                   <td><?php echo $item->THANHTOAN?></td>
                                                   <td><span class="badge bg-warning"><?php echo $item->TINHTRANG ?></span></td>
                                                   @if ($item->TT_NHANPHONG == "Đang đợi")
                                                       <td><span class="badge bg-warning"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                   @elseif ($item->TT_NHANPHONG == "Đã nhận phòng")
                                                       <td><span class="badge bg-success"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                   @else
                                                       <td><span class="badge bg-danger"><?php echo $item->TT_NHANPHONG ?></span></td>
                                                   @endif
                                                   <td><a href="{{ route("ct_pdkdt",["idphieuurl" => $item->MAPHIEU]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a></td>
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
    </section>
    </main>
@endsection