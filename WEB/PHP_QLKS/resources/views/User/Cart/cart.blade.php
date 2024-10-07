@extends('User.container')
@section('body')
<title>GTX - Giỏ hàng của bạn</title>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Giỏ hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">GTX</a></li>
                <li class="breadcrumb-item active">Giỏ hàng của bạn</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
  
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
  
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card" style="border-radius:20px">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;">Giỏ hàng<span>/Tất cả loại phòng</span></h5>
                                <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                ">
                                   @if ($selectCart != null)
                                   @php
                                       $sum = 0;
                                   @endphp
                                    <table class="table table-borderless datatable">
                                        <thead>
                                        <tr>
                                            <th scope="col">Mã loại</th>
                                            <th scope="col">Tên loại</th>
                                            <th scope="col">Sức chứa</th>
                                            <th scope="col">Giá thuê</th>
                                            <th scope="col">Diện tích</th>
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($selectCart as $item)
                                                @php
                                                    $sum = $sum + $item->GIATHUE;
                                                @endphp
                                                <tr>
                                                    <th scope="row"><a href="#" class="text-primary"><?php echo $item->MALP ?></a></th>
                                                    <td><?php echo $item->TENLOAIPHONG ?></td>
                                                    <td><?php echo $item->SUCCHUA ?></td>
                                                    <td><?php echo $item->GIATHUE ?></td>
                                                    <td><?php echo $item->DIENTICH ?></td>
                                                    <td><a type="button" href="{{ route("overviewProduct",["idroom" => $item->MALP]) }}" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a><a type="button" class="btn btn-danger" href="{{ route("updateCart",["idroom" => $item->MALP]) }}" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                                </tr>              
                                            @endforeach
                                        </tbody>
                                    </table>        
                                    <div style="width:100%;display:flex; justify-content: flex-end;">
                                        <h5 style="margin-right:20px">Tổng tiền trong giỏ: <span style="font-weight:bold;color:#fb5032">{{ $sum }} VNĐ</span></h5>
                                        <a class="button_over_khoi" href="{{ route("paymentUserCart") }}" style="outline: 0;
                                        border: 0;
                                        background: none;
                                        border-radius: 10px;
                                        background-color: #74C0FC;
                                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                                        padding: 15px;
                                        margin-top:-20px;
                                        color: white;
                                        width: 130px;
                                        font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: 600;
                                        font-style: normal;
                                        margin-right: 5px;
                                        transition: all 0.3s ease;" href="#">Xác nhận <i class="fa-solid fa-hotel"></i></a>
                                    </div>
                                    <h5 style="color: red">
                                        @if(Session::has('notfoundroomcart'))
                                        <div class="form-label" style="width:100%; color: red">{{ Session::get('notfoundroomcart') }}</div>
                                        @php
                                             Session::forget('notfoundroomcart');
                                        @endphp
                                        @endif
                                        @if(Session::has('updateaccountcart'))
                                        <div class="form-label" style="width:100%; color: red">{{ Session::get('updateaccountcart') }}</div>
                                        @php
                                             Session::forget('updateaccountcart');
                                        @endphp
                                        @endif
                                    </h5>
                                   @else
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
                                        <span style="font-size:20px">Không tìm thấy phòng nào trong giỏ của bạn! Nếu bạn chưa đặt phòng hãy chọn loại phòng bạn thích và đặt ngay.</span>
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
                                   @endif

                                   <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        window.addEventListener('load', function() {
                                            // Lấy URL hiện tại
                                            const currentUrl = new URL(window.location);
                                
                                            // Kiểm tra xem URL có chứa tham số takeIdRoom hay không
                                            if (currentUrl.searchParams.has('takeIdRoom')) {
                                                // Xóa tham số takeIdRoom khỏi URL
                                                currentUrl.searchParams.delete('takeIdRoom');
                                
                                                // Cập nhật URL mà không tải lại trang
                                                window.location.href = currentUrl.toString();
                                            }
                                        });
                                    });
                                   </script>
                        
                                </div>
                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
@endsection