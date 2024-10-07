@extends('User.container')
@section('body')
    <title>GTX - Đặt phòng khách sạn</title>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bản Đồ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">GTX</a></li>
                    <li class="breadcrumb-item active">Cơ sở 1</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard ">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="titleCS"> <i class="fa-solid fa-location-dot"> </i> KHÁCH SẠN GTX CƠ SỞ 2</div>
                        <div class="col-lg-6 infoKS" style="background-color:white;border-radius:20px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;padding:20px">
                            <div class=nameHotel>KHÁCH SẠN GTX</div>
                            <div class="nameLocation">PHẠM XUÂN HÒA</div>
                            <div class="underscore "></div>
                            <div class="infoLocation"><i class="fa-solid fa-house"></i> 351 Phạm Xuân Hòa, Phổ Cường, Thị Xã
                                Đức Phổ, Tỉnh Quảng Ngãi</div>
                            <div class="infoLocation"><i class="fa-solid fa-calendar-days"></i> Thời gian làm việc: 8 -
                                22:00 | Thứ 2 - Chủ Nhật</div>
                            <div class="infoLocation"><i class="fa-brands fa-facebook"></i> Truy cập Fanpage Khách Sạn GTX
                            </div>
                            <div class="mapLocation">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3857.917944988521!2d108.97347607577557!3d14.773651772815034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3168e547d850596f%3A0x71022e96943e102a!2zMzUxIFBo4bqhbSBYdcOibiBIw7JhLCBQaOG7lSBDxrDhu51uZywgxJDhu6ljIFBo4buVLCBRdeG6o25nIE5nw6NpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1715325406534!5m2!1svi!2s"
                                    width="100%" height="500px" style="margin-top: 20px; border-radius:20px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 infoSlide">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner" style="border-radius:20px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                    <div class="carousel-item active">
                                        <img src="https://cdn3.ivivu.com/2023/07/Vinpearl-Resort-Spa-H%E1%BA%A1-Long-ivivu.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://cdn3.ivivu.com/2017/05/nguoc-dong-thoi-gian-chiem-nguong-5-khach-san-lau-doi-nhat-viet-nam-ivivu-24.jpeg"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://vcdn1-kinhdoanh.vnecdn.net/2021/01/22/A-nh-8-1611316998.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=Xl1JZNZ73wAmNSxJYSUmuA"
                                            class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
