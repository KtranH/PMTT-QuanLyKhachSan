@extends('User.container')
@section('body')
  <title>GTX - Tạo ảnh bằng AI</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Tạo ảnh bằng AI</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                <li class="breadcrumb-item">AI tạo sinh</li>
                <li class="breadcrumb-item active">Tạo ảnh bằng AI</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card" style="border-radius:20px">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" style="height:100vh">
                      
                        <iframe src="https://5c74-2402-800-63a6-9102-9df6-d419-8028-ae19.ngrok-free.app" allowfullscreen frameborder="0" style="width:100%;height:100vh"></iframe>

                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection