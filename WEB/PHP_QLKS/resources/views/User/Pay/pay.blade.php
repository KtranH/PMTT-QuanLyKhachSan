@extends('User.container')
@section('body')
<title>GTX - Thanh toán</title>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Thanh toán</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">GTX</a></li>
                <li class="breadcrumb-item active">Thanh toán đặt phòng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->   

    <section class="section dashboard">
        <div class="row">
  
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
  
                    <div style="display:flex;">
                        <div style="width:80%">
                            <div class="col-12">
                                <div class="card" style="border-radius:20px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: 600;
                                        font-style: normal;">Phòng<span>/Danh sách phòng</span></h5>
                                        <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                        ">
                                        
                                        <table class="table table-borderless">
                                            <thead>                                         
                                                <tr>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Tên loại</th>
                                                    <th scope="col">Nội thất</th>
                                                    <th scope="col">Sức chứa</th>
                                                    <th scope="col">Giá thuê</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $count = 0;
                                                    $sum = 0;
                                                    if($duration == null)
                                                    {
                                                        $duration = 1;
                                                    }
                                                    foreach ($selectPay as $item) {
                                                        $count = $count + 1 + $more;
                                                        $selectImg = explode("|",$item->ANH);
                                                        $sum = $sum + $item->GIATHUE * $duration;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><img src="{{ $selectImg[0] }}" style="max-width:50px; height:50px; border-radius:10px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; object-fit: cover;" alt=""></th>
                                                        <td>{{ $item->TENLOAIPHONG }}.</td>
                                                        <td>{{ $item->NOITHAT }}.</td>
                                                        <td>{{ $item->SUCCHUA }}</td>
                                                        <td>{{ $item->GIATHUE }} VNĐ</td>
                                                    </tr>
                                                    <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div><!-- End Recent Sales -->
    
    
                            <div class="col-12">
                                <div class="card" style="border-radius:20px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: 600;
                                        font-style: normal;">Phương thức thanh toán<span>/Lựa chọn thanh toán</span></h5>
                                        <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                        ">
                                        
                                            <div class="plan">
                                                <div class="inner">
                                                    <span class="pricing">
                                                        <span>
                                                            {{ $sum }}<small>/ VNĐ</small>
                                                        </span>
                                                    </span>
                                                    <p class="title">Thanh toán chuyển khoản</p>
                                                    <p class="info">Vui lòng chuyển vào tài khoản sau, chúng tôi sẽ xác nhận sau 2 giờ chuyển khoản.</p>
                                                    <ul class="features">
                                                        <li>
                                                            <span class="icon">
                                                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                </svg>
                                                            </span>
                                                            <span><strong>Ngân hàng:</strong> ABCDF</span>
                                                        </li>
                                                        <li>
                                                            <span class="icon">
                                                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>Số tài khoản: <strong>0999xxx7777</strong></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon">
                                                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                </svg>
                                                            </span>
                                                            @php
                                                                $currentDate = date('Ymd');
                                                                $currentTime = date('His');
                                                            @endphp
                                                            <span>Nội dung:<strong> {{ $checkUser[0]->MAKH. $currentDate. $currentTime}} </strong></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon">
                                                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>Chuyển khoản: <strong>{{ $sum. " VNĐ" }}</strong></span>
                                                        </li>
                                                    </ul>
                                                    <div class="action">
                                                    <input type="date" id = "taker" hidden value={{ $DateR }}>
                                                    <input type="date" id = "takep" hidden value={{ $DateP }}>
                                                    @if ($count > 1)
                                                        <a id="pay" class="button" href="{{ route("confirmpaycart",["dater" => $DateR, "datep" => $DateP,"sumPay"=>$pay]) }}">
                                                            Xác nhận
                                                        </a>     
                                                    @else
                                                        <a id="pay" class="button" href="{{ route("confirmpay",["dater" => $DateR, "datep" => $DateP, "idroom" => $selectPay[0]->MALP,"sumPay"=>$pay]) }}">
                                                            Xác nhận
                                                        </a>
                                                    @endif
                                                    </div>
                                                    <script>
                                                        const a = document.getElementById('pay');
                                                        a.addEventListener('click', function(event) {
                                                            const inputValueDateR = document.getElementById('dater').value;
                                                            const inputValueDateP = document.getElementById('datep').value;
                                                            const inputTakeDateR = document.getElementById('taker').value;
                                                            const inputTakeDateP = document.getElementById('takep').value;
                                                            if (inputTakeDateR === '' || inputTakeDateP === '') {
                                                                event.preventDefault();
                                                                alert('Vui lòng xác nhận ngày nhận và trả phòng');
                                                            } 
                                                            else if (inputValueDateR === '' || inputValueDateP === '')
                                                            {
                                                                event.preventDefault();
                                                                alert('Vui lòng xác nhận ngày nhận và trả phòng');
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>                  
    
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
                                        font-style: normal;">Chú ý<span>/Lưu ý khi đặt phòng</span></h5>
                                        <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                        ">
                                          
                                         <p><i class="fa-solid fa-bell-concierge" style="color: #74C0FC;"></i> <span style="font-weight:bold">Dịch vụ</span>: Đối với các dịch vụ bạn phải đăng ký tại quầy.</li></p>
                                         <p><i class="fa-solid fa-door-open" style="color: #74C0FC;"></i> <span style="font-weight:bold">Đổi phòng</span>: Bạn không thể đổi phòng khi đã đặt. Nếu bạn muốn đổi phòng khác hãy hủy phòng hiện tại.</li></p>
                                         <p style="color:red"><i class="fa-solid fa-ban" style="color: #74C0FC;"></i> <span style="font-weight:bold">Hủy phòng: <br><br></span>Bạn chỉ có thể hủy phòng trước <span style="font-weight:bold">1 ngày</span> khi tới ngày nhận phòng và bị trừ 20 điểm tín nhiệm. <br><br> Nếu bạn hủy sau 24 tiếng thì bạn<span style="font-weight:bold">không thể hủy phòng</span>. Điểm tín nhiệm dưới 20 bạn không thể đặt phòng trước cũng như bị khóa tài khoản.</p>
        
                                        </div>
                                    </div>
        
                                </div>

                                <div class="card" style="border-radius:20px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: 600;
                                        font-style: normal;">Lựa chọn ngày<span>/nhận và trả</span></h5>
                                        <div class="row bg-white" style="padding:20px;border-radius:20px;width:100%;display:flex;justify-content: space-between;
                                        ">
                                          
                                         @if ($count > 1)
                                            @if (Session::has('failDate'))
                                                <div class="form-label" style="width:100%; color: red">{{ Session::get('failDate') }}</div>
                                                @php
                                                     Session::forget('failDate');
                                                @endphp
                                            @endif
                                            <form id="dateForm" method="post" action="{{ route("paymentUserCart",["sumPay" => $sum]) }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Ngày nhận phòng</span>
                                                    <input type="date" class="form-control" id="dater" placeholder="Username" name = "DateR" aria-label="Username" aria-describedby="basic-addon1" value="{{ $DateR }}" >
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Ngày trả phòng</span>
                                                    <input type="date" class="form-control" id="datep" placeholder="Username" name ="DateP" aria-label="Username" aria-describedby="basic-addon1" value="{{ $DateP }}">
                                                </div>


                                                <button type="submit" class="btn btn-info" style="border-radius:20px;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC;width:100%"><i class="fi fi-rr-file-edit"></i> Đồng ý</button>

                                            </form>

                                          
                                         @else
                                            @if (Session::has('failDate'))
                                                <div class="form-label" style="width:100%; color: red">{{ Session::get('failDate') }}</div>
                                                @php
                                                     Session::forget('failDate');
                                                @endphp
                                            @endif
                                            <form id="dateForm" method="POST" action="{{ route("payUser",["sumPay" => $sum]) }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Ngày nhận phòng</span>
                                                    <input type="date" class="form-control" id="dater" placeholder="Username" name = "DateR" aria-label="Username" aria-describedby="basic-addon1" value="{{ $DateR }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Ngày trả phòng</span>
                                                    <input type="date" class="form-control" id="datep" placeholder="Username" name ="DateP" aria-label="Username" aria-describedby="basic-addon1" value="{{ $DateP }}">
                                                </div>

                                                <input type="hidden" id="takeIdRoom" name="takeIdRoom" value="{{ $takeIdRoom }}">

                                                <button type="submit" class="btn btn-info" style="border-radius:20px;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC;width:100%"><i class="fi fi-rr-file-edit"></i> Đồng ý</button>

                                            </form>
                                            
                                         @endif

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
                                          
                                          <p style="display:flex; justify-content: space-between;margin-bottom:30px;"><span style="font-weight:bold">Tạm tính:</span> Bạn sẽ thuê trong  {{$duration. " đêm = " . $sum }} VNĐ</p>
                                          <p style="display:flex; justify-content: space-between;"><span style="font-weight:bold">Tổng tiền: </span><span style="margin-top:-10px; color: red;font-size:25px">{{ $sum }} VNĐ</span></p>
                                        </div>
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

</main><!-- End #main -->
@endsection