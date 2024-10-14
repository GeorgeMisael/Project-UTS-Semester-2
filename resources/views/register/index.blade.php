<html lang="en"><head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('skydash-free/dist') }}/assets/images/favicon.png">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('skydash-free/dist') }}/assets/images/logo.svg" alt="logo">
              </div>
              <h4>Pengguna baru?</h4>
              <h6 class="font-weight-light">Register sanga mudah. hanya beberapa langkah saja</h6>

              <form action="{{ route('register.submit') }}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg @error('name')
                    is-invalid
                  @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                  @error('name')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg @error('username')
                    is-invalid
                  @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                  @error('username')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg @error('email')
                    is-invalid
                  @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                  @error('email')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg @error('password')
                    is-invalid
                  @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
                  @error('password')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> I agree to all Terms &amp; Conditions <i class="input-helper"></i></label>
                  </div>
                </div>

                <div class="mt-3 d-grid gap-2">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign Up</button> 
                </div>
                <div class="text-center mt-4 font-weight-light"> Sudah memiliki akun? <a href="/" class="text-primary">Login</a>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('skydash-free/dist') }}/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('skydash-free/dist') }}/assets/js/off-canvas.js"></script>
  <script src="{{ asset('skydash-free/dist') }}/assets/js/template.js"></script>
  <script src="{{ asset('skydash-free/dist') }}/assets/js/settings.js"></script>
  <script src="{{ asset('skydash-free/dist') }}/assets/js/todolist.js"></script>
  <!-- endinject -->

</body></html>