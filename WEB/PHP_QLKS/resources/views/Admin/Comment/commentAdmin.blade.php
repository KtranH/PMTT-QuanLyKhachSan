@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>

  <title>GTX - Quản lý đánh giá</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Đánh giá</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Đánh giá</li>
                <li class="breadcrumb-item active">Tùy chỉnh đánh giá</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách đánh giá</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Đánh giá cần duyệt</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Danh sách đánh giá được duyệt</h5>

                            <!-- Bảng hiển thị danh sách đánh giá được duyệt -->

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã đánh giá</th>
                                    <th scope="col">Tên phòng</th>
                                    <th scope="col">Loại phòng</th>
                                    <th scope="col">Mã khách</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col">Số sao</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commentsChecked as $item)
                                        <tr>
                                            <th scope="row"><a href="#"><?php echo $item->MADG ?></a></th>
                                            <td><?php echo $item->TENPHONG ?></td>
                                            <td><a href="#" class="text-primary"><?php echo $item->TENLOAIPHONG ?></a></td>
                                            <td><?php echo $item->MAKH ?></td>
                                            <td><?php echo $item->BINHLUAN?></td>
                                            <td><?php echo $item->SOSAO?></td>
                                            @foreach ($check as $item2)
                                                    @if ($item2->MADG == $item->MADG)
                                                        @if ($item2->ISDELETE === 0)
                                                             <td><span class="badge bg-success">Đã duyệt</span></td>
                                                        @endif
                                                    @endif
                                            @endforeach
                                            <td><a href="{{ route("checkcomment",["iddg" => $item->MADG,"check" => "false"]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                        </tr>              
                                    @endforeach
                                </tbody>
                              </table>

                          </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="lichSuDatPhong">
                                
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: normal;">Danh sách đánh giá chờ duyệt</h5>
                                
                                <!-- Bảng hiển thị danh sách đánh giá chờ duyệt -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã đánh giá</th>
                                        <th scope="col">Tên phòng</th>
                                        <th scope="col">Loại phòng</th>
                                        <th scope="col">Mã khách</th>
                                        <th scope="col">Bình luận</th>
                                        <th scope="col">Số sao</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Chức năng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commentsNotChecked as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><?php echo $item->MADG ?></a></th>
                                                <td><?php echo $item->TENPHONG ?></td>
                                                <td><?php echo $item->TENLOAIPHONG ?></td>
                                                <td><?php echo $item->MAKH ?></td>  
                                                <td><a href="#" class="text-primary"><?php echo $item->BINHLUAN?></a></td>
                                                <td><?php echo $item->SOSAO?></td>
                                                @foreach ($checknot as $item2)
                                                    @if ($item2->MADG == $item->MADG)
                                                        @if ($item2->ISDELETE === 1)
                                                             <td><span class="badge bg-warning">Chưa duyệt</span></td>
                                                        @elseif ($item2->ISDELETE === 2)
                                                            <td><span class="badge bg-danger">Từ chối</span></td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <td><a href="{{ route("checkcomment",["iddg" => $item->MADG,"check" => "true"]) }}" type="button" class="btn btn-success" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-check"></i></a><a href="{{ route("checkcomment",["iddg" => $item->MADG,"check" => "false"]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
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