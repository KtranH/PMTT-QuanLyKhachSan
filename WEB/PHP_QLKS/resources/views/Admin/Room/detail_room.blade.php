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
                <li class="breadcrumb-item active">Chi tiết phiếu đăng ký</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ctpdkt">Chi tiết phiếu đăng ký trước</button>
                            </li>
                        </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade active show profile-overview" id="ctpdkt">

                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 400;
                                font-style: bold;">Nhận phòng từ <span style="font-weight:bold;color:red">{{ $phieu[0]->NGAYDAT }}</span> đến <span style="font-weight:bold;color:red">{{ $phieu[0]->TRAPHONG}}</span> - Tổng tiền:  <span style="font-weight:bold;color:red">{{ $phieu[0]->THANHTOAN }}</span> VNĐ</h5>

                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: bold;
                                font-style: normal;">Danh sách khách thuê phòng {{ $phieu[0]->TENPHONG}} (sức chứa: <span style="color:red;font-weight:bold">{{ $phieu[0]->SUCCHUA }})</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Mã khách</th>
                                        <th scope="col">Tên khách</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">CCCD</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ct as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><?php echo $item->MAKH ?></a></th>
                                                <td><?php echo $item->HOTEN ?></td>
                                                <td><a href="#" class="text-primary"><?php echo $item->SDT ?></a></td>
                                                <td><?php echo $item->CCCD ?></td>
                                                <td><a type="button" href="{{ route("removekh",["makh" => $item->MAKH]) }}" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
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