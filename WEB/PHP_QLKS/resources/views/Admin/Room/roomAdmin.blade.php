@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý phòng</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Phòng</li>
                <li class="breadcrumb-item active">Tùy chỉnh phòng</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách phòng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Thêm phòng mới</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Danh sách phòng hiện có</h5>

                            <!-- Bảng hiển thị danh sách loại phòng -->

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã phòng</th>
                                    <th scope="col">Tên phòng</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Sức chứa</th>
                                    <th scope="col">Giá thuê</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chức năng</th>
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
                                            @if ($item->TRANGTHAI == 0)
                                                <td><span class="badge bg-success">Còn trống</span></td>
                                            @elseif ($item->TRANGTHAI == 1)
                                                <td><span class="badge bg-warning">Được đặt</span></td>
                                            @elseif ($item->TRANGTHAI == 2)
                                                <td><span class="badge bg-secondary">Đang dọn</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Không hoạt động</span></td>
                                            @endif
                                            <td><a href="{{ route("updateroom",["idroom" => $item->MAPHONG]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a><a href="{{ route("deleteroomorrecoveryroom",["idroom" => $item->MAPHONG,"check" => "true"]) }}" type="button" title="Khôi phục" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-arrow-rotate-left" style="color: #ffffff;"></i></a><a href="{{ route("deleteroomorrecoveryroom",["idroom" => $item->MAPHONG,"check" => "false"]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                        </tr>              
                                    @endforeach
                                </tbody>
                              </table>

                          </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="lichSuDatPhong">
                                
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: bold;
                                font-style: normal;">Thêm một phòng</h5>
                                
                                @if (Session::has("erroraddmoreroom"))
                                <h5 style="color:red;marign-bottom:20px">{{ Session::get("erroraddmoreroom") }}</h5>
                                @endif

                             <!-- Form hiển thị thêm loại phòng -->
                                <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ route("addmoreroom") }}">
                                @csrf
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom: 20px">
                                    <div style="width:100%">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên loại:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" aria-label="Default select example" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" name="category">
                                                <option selected value="Chưa rõ">Lựa chọn loại phòng</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->MALP }}"><?php echo $item->TENLOAIPHONG ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                      <div style="width:100%">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên phòng:</label>
                                        <div class="col-md-8 col-lg-9">
                                          <input name="roomname" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Tên phòng không hợp lệ</div>
                                        </div>
                                      </div>  

                                      <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Vị trí:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="location" type="number" min = 1 class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Vị trí không hợp lệ</div>
                                        </div>
                                    </div>
                                  </div>  
              
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                  </div>
                                </form>
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