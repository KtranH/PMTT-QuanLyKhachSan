@extends('Admin.containerAdmin')
@section('body')
@php
    $sum = 0;
@endphp
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
          
   <!-- Left side columns -->
   <div class="col-lg-12">
    <div class="row">

            <div style="display:flex;">
                <div style="width:60%">
                    <div class="col-12">
                        <div class="card" style="border-radius:20px">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Hóa đơn thanh toán cho phòng: <span style="font-weight:bold">{{ $infinvoice[0]->TENPHONG }}</span></h5>

                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Dịch vụ<span>/Danh sách dịch vụ</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">
                                 
                                <table class="table table-borderless datatable">
                                    <thead>
                                      <tr>
                                        <th scope="col">Mã dịch vụ</th>
                                        <th scope="col">Tên dịch vụ</th>
                                        <th scope="col">Đơn giá</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($select as $item)
                                                <tr>
                                                    <th scope="row"><a href="#"><?php echo $item->MADV ?></a></th>
                                                    <td><?php echo $item->TENDV ?></td>
                                                    <td><a href="#" class="text-primary"><?php echo $item->GIA ?> VNĐ</a></td>
                                                </tr>              
                                            @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
                <div style="width:40%; margin-left:30px">
                    <div class="col-12">
                        <div class="card" style="border-radius:20px">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Chi tiết<span>/Các dịch vụ</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">
                                  
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Tên dịch vụ</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền VNĐ</th>                                  
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($selectService as $item)
                                        <tr>
                                            <td>{{ $item->TENDV }}</td>
                                            <td>{{ $item->SOLUONG }}</td>
                                            <td>{{ $item->SOLUONG * $item->GIA }} VNĐ</td>
                                            <?php $sum = $sum + $item->SOLUONG * $item->GIA ?>
                                            <td><a href="{{ route("removeServiceInvoice",["service" => $item->MADV]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                    <p>Thời gian: <span style="font-weight:bold">{{ $infinvoice[0]->NGAYDAT }}</span> tới <span style="font-weight:bold">{{ $infinvoice[0]->TRAPHONG }}</span> tổng cộng: {{ $duration }} Ngày</p>
                                    <p>Tiền phòng: <span style="font-weight:bold">{{ $infinvoice[0]->THANHTOAN }} VNĐ</span></p>
                                    <?php $sum = $sum + $infinvoice[0]->THANHTOAN ?>
                                  </table>

                                </div>
                            </div>

                        </div>

                        <div class="card" style="border-radius:20px">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Tổng tiền<span>/Tạm tính</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">
                                  
                                  <p style="display:flex; justify-content: space-between;margin-bottom:30px;"><span style="font-weight:bold">Tạm tính:</span> {{ $sum }} VNĐ</p>
                                  <p style="display:flex; justify-content: space-between;"><span style="font-weight:bold">Tổng tiền: </span><span style="margin-top:-10px; color: red;font-size:25px">{{ $sum }} VNĐ</span></p>
                                </div>
                            </div>
                            <div class="text-center" style="margin-bottom:20px">
                                <button type="submit" class="btn btn-primary" style="border-radius:20px;width:90%"><i class="fa-solid fa-check" style="color: #ffffff;"></i> Đã thanh toán</button>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>

            <!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <!-- End Right side columns -->

        </div>
    </section>
    </main>
@endsection