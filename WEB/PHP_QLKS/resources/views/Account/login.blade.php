<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="{{ url('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
   
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ url('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ url('assets/css/khoi.css')}}" rel="stylesheet">
  
</head>
<body>
      <main>
      
          <div class="container">
    
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="assets/img/logo.png" alt="">
                      <span class="d-none d-lg-block">Khách sạn - GTX</span>
                    </a>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3" style="border-radius:20px">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4" style="font-family: Montserrat, sans-serif;font-optical-sizing: auto;font-weight: 500;">Đăng nhập tài khoản của bạn</h5>
                        <p class="text-center small">Vui lòng nhập tên tài khoản và mật khẩu.</p>
                      </div>
    
                      <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Tên tài khoản hoặc email</label>
                          <div class="input-group has-validation">
                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">Vui lòng nhập tên tài khoản hoặc email!</div>
                            @if(Session::has('error'))
                                  <div class="form-label" style="width:100%; color: red">{{ Session::get('error') }}</div>
                            @endif
                          </div>
                        </div>
    
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Mật khẩu</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
                          @if(Session::has('error'))
                                <div class="form-label" style="width:100%; color: red">{{ Session::get('error') }}</div>
                          @endif
                        </div>
    
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ghi nhớ tài khoản</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" style="border-radius:20px" type="submit">Đăng nhập</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Chưa có tài khoản? <a href="{{ route("FormSignUp") }}">Tạo tài khoản ở đây</a></p>
                        </div>
                        <p class="p_khoi" style="width:100%;text-align:center">Hoặc đăng nhập với</p>
                              <a class="google-login-button" href={{ route("loginByGoogle") }} style="margin-top:-5px; color:black">
                                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                          c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                          c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                          C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                          c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                          c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                  </svg>
                                  <span class="font_google">Đăng nhập bằng Google</span>
                              </a>
                      </form>
    
                    </div>
                  </div>
    
                  <div class="credits">
                    Chào mừng bạn đến <a href="{{ route("home") }}">Khách sạn GTX</a>
                  </div>
    
                </div>
              </div>
            </div>
    
          </section>
    
        </div>
      </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ url('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ url('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ url('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js')}}"></script>
</body>
</html>