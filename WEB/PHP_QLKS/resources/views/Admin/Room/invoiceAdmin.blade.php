@extends('Admin.containerAdmin')
@section('body')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý hóa đơn</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Thanh toán hóa đơn</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("homeAdmin") }}">Home</a></li>
                <li class="breadcrumb-item">Hóa đơn</li>
                <li class="breadcrumb-item active">Xử lý hóa đơn</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#hoadon">Lựa chọn hóa đơn</button>
                            </li>
                        </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade active show profile-overview" id="hoadon">
                                    <table class="table table-borderless datatable">
                                        <thead>
                                          <tr>
                                            <th scope="col">Tên loại phòng</th>
                                            <th scope="col">Tên phòng</th>
                                            <th scope="col">Mã phiếu</th>
                                            <th scope="col">Tình trạng</th>
                                            <th scope="col">Chức năng</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($select as $item)
                                                <tr>
                                                    <th scope="row"><a href="#"><?php echo $item->TENLOAIPHONG ?></a></th>
                                                    <td><?php echo $item->TENPHONG ?></td>
                                                    <td><a href="#" class="text-primary"><?php echo $item->MAPHIEU ?></a></td>
                                                    <td><span class="badge bg-danger" style="color: white">Chưa thanh toán</span></td>
                                                    <td><a href="{{ route("ct_invoice",["idinvoice" => $item->MAHD]) }}" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a></td>
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