<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
  </head>
<body>
  <div class="home-btn d-none d-sm-block">
    <a href="{{ url('/') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
  </div>
  <div class="account-pages my-5 pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          @if (Session::get('errorLogin'))
            <div class="alert alert-solid alert-danger" role="alert">{{ Session::get('errorLogin') }}</div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card overflow-hidden">
            <div class="bg-primary">
              <div class="text-primary text-center p-2">
                <h5 class="text-white font-size-20">{{ env('APP_NAME') }}</h5>
                <!-- <p class="text-white-50">Sign in to continue to Veltrix.</p> -->
              </div>
            </div>
            <div class="card-body p-4">
              <div class="p-3">
                <form action="{{ url('login') }}" method="POST" class="mt-4">
                  <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username', '') }}" placeholder="username anda">
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="userpassword">Password</label>
                      <input type="password" name="password" class="form-control" id="userpassword" placeholder="password anda">
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-6">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="customControlInline">Ingat Saya!</label>
                      </div>
                    </div>
                    <div class="col-sm-6 text-end">
                      <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JAVASCRIPT -->
  <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>