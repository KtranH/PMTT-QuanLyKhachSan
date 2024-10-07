@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý loại phòng</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Loại phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Loại phòng</li>
                <li class="breadcrumb-item active">Tùy chỉnh loại phòng</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách loại phòng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Thêm loại phòng</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Danh sách loại phòng hiện có</h5>

                            <!-- Bảng hiển thị danh sách loại phòng -->

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã loại phòng</th>
                                    <th scope="col">Tên loại phòng</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Sức chứa</th>
                                    <th scope="col">Giá thuê</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <th scope="row"><a href="#"><?php echo $item->MALP ?></a></th>
                                            <td><?php echo $item->TENLOAIPHONG ?></td>
                                            <td><a href="#" class="text-primary"><?php echo $item->SOLUONG ?></a></td>
                                            <td><?php echo $item->SUCCHUA ?></td>
                                            <td><?php echo $item->GIATHUE ?></td>
                                            @if ($item->ISDELETE == 0)
                                                <td><span class="badge bg-danger">Không hoạt động</span></td>
                                            @else
                                                <td><span class="badge bg-success">Còn hoạt động</span></td>
                                            @endif
                                            <td><a href="{{ route("updatecate",["idcate" => $item->MALP]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a><a href="{{ route("deletecateorrecoverycate",["idcate" => $item->MALP,"check" => "true","check" => "true"]) }}" type="button" title="Khôi phục" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-arrow-rotate-left" style="color: #ffffff;"></i></a><a href="{{ route("deletecateorrecoverycate",["idcate" => $item->MALP,"check" => "false"]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
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
                                font-style: normal;">Thêm một loại phòng</h5>
                              
                                @if (Session::has("erroraddmorecate"))
                                <h5 style="color:red;marign-bottom:20px">{{ Session::get("erroraddmorecate") }}</h5>
                                @endif


                             <!-- Form hiển thị thêm loại phòng -->
                                <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ route("addmorecate") }}">
                                @csrf
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom: 20px">
                                    <div style="width:100%">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên loại:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="namecategory" type="text" class="form-control" id="company" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Tên loại không hợp lệ</div>
                                        </div>
                                    </div>
    
                                      <div style="width:100%">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Sức chứa:</label>
                                        <div class="col-md-8 col-lg-9">
                                          <input name="capacity" type="number" min = 1 class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Sức chứa không hợp lệ</div>
                                        </div>
                                      </div>  

                                      <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Diện tích:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="area" type="number" min = 20 class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Diện tích không hợp lệ</div>
                                        </div>
                                    </div>
                                  </div>  
                                             
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom: 50px">

                                    <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label" style="font-weight:bold">Tiện ích:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="service" type="text" class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Tiện ích không hợp lệ</div>
                                        </div>
                                    </div>

                                    <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Nội thất:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="interior" type="text" class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Nội thất không hợp lệ</div>
                                        </div>
                                    </div>

                                    <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Quy định:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="regulations" type="text" class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Quy định không hợp lệ</div>
                                        </div>
                                    </div>
                                  </div>
                                
                                    <div style="width:100%;margin-bottom:40px">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Giá thuê:</label>
                                        <div class="col-md-8 col-lg-11">
                                        <input name="price" type="number" min = 1 class="form-control" id="Job" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Giá thuê không hợp lệ</div>
                                        </div>
                                    </div>
              

                                  <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-2 col-form-label"  style="font-weight:bold">Mô tả:</label>
                                    <div class="col-md-8 col-lg-9">
                                      <textarea name="about" class="form-control" id="about" style="height: 100px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;margin-bottom:50px"required></textarea>
                                      <div class="invalid-feedback">Mô tả không hợp lệ</div>
                                    </div>
                                  </div>

                                  <hr>

                                  <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                  font-optical-sizing: auto;
                                  font-weight: bold;
                                  font-style: normal;">Thêm hình ảnh loại phòng</h5>
                                  
                                  
                                  <div class="row mb-3">
                                    <div class="col-md-8 col-lg-9">
                                        <img id="avatarPreview1" src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Profile" style="max-width:120px;">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-2 col-form-label"  style="font-weight:bold">Đường dẫn hình ảnh 1:</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="image1" type="text" class ="form-control" id="image1" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                      <div class="invalid-feedback">Hình ảnh không hợp lệ</div>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <div class="col-md-8 col-lg-9">
                                        <img id="avatarPreview2" src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" alt="Profile" style="max-width:120px;">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-2 col-form-label"  style="font-weight:bold">Đường dẫn hình ảnh 2:</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="image2" type="text" class ="form-control" id="image2" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                      <div class="invalid-feedback">Hình ảnh không hợp lệ</div>
                                    </div>
                                  </div>

                                  <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                        
                                        const imageInput1 = document.getElementById('image1');
                                        const previewImage1 = document.getElementById('avatarPreview1');

                                        const imageInput2 = document.getElementById('image2');
                                        const previewImage2 = document.getElementById('avatarPreview2');

                                        const imageInput3 = document.getElementById('image3');
                                        const previewImage3 = document.getElementById('avatarPreview3');

                                        imageInput1.addEventListener('input', function () {
                                            const imageUrl = imageInput1.value;

                                            if (imageUrl) {
                                                previewImage1.src = imageUrl;
                                                previewImage1.style.display = 'block';
                                            } else {
                                                previewImage1.style.display = 'none';
                                            }
                                        });

                                        imageInput2.addEventListener('input', function () {
                                            const imageUrl = imageInput2.value;

                                            if (imageUrl) {
                                                previewImage2.src = imageUrl;
                                                previewImage2.style.display = 'block';
                                            } else {
                                                previewImage2.style.display = 'none';
                                            }
                                        });

                                        imageInput3.addEventListener('input', function () {
                                            const imageUrl = imageInput3.value;

                                            if (imageUrl) {
                                                previewImage3.src = imageUrl;
                                                previewImage3.style.display = 'block';
                                            } else {
                                                previewImage3.style.display = 'none';
                                            }
                                        });
                                    });
                                  </script>


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