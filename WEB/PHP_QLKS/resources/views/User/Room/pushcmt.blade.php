@extends('User.container')
@section('body')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Đánh giá</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Viết đánh giá phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                <li class="breadcrumb-item">Đánh giá phòng</li>
                <li class="breadcrumb-item active">Viết đánh giá phòng</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Lượt đánh giá của bạn</button>
                            </li>
                        </ul>
                    <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Hãy viết cảm nhận của bạn</h5>

                                <form action="{{ route("writeComment",["idphong" => $idphong, "idkh" => $idkh, "idphieu" => $idphieu]) }}" method="post">
                                    @csrf
                                    <div style="display:flex; justify-content: space-around;margin-bottom: 20px;">
                                        <div style="width:100%;margin-right:20px">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên phòng bạn đã đặt:</label>
                                        <div class="col-md-8 col-lg-12">
                                            <input name="roomname" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" value="{{ $roomname[0]->TENPHONG }}" readonly disabled>
                                        </div>
                                        </div>
                                        <div style="width:100%">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Loại phòng bạn đã đặt:</label>
                                            <div class="col-md-8 col-lg-12">
                                                <input name="catename" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" value="{{ $roomname[0]->TENLOAIPHONG }}" readonly disabled>
                                            </div>
                                        </div>
                                    </div>  
                                    <div style="display:flex; justify-content: space-around;margin-bottom: 20px;">
                                        <div style="width:100%;margin-right:20px">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Số sao đánh giá:<i class="fa-solid fa-star" style="color: #74C0FC;"></i></label>
                                        <div class="col-md-8 col-lg-12">
                                            <input name="start" type="number" min="1" max="5" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                            <div class="invalid-feedback">Số sao không hợp lệ</div>
                                        </div>
                                        </div>  
                                    <div style="width:100%">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Nội dung đánh giá:<i class="fa-solid fa-feather" style="color: #74C0FC;"></i></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="content" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Nội dung không hợp lệ</div>
                                    </div>
                                    </div>  
                                </div>
                                    <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-primary">Gửi đánh giá</a>
                                    </div>
                                </form>                                                
                          </div>        
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection