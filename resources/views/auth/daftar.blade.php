
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/app.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('assets')}}/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets')}}/img/favicon.ico' />
</head>

<body>
  <<div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5 ">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form action="/auth/daftar" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name" id="name" required value="{{old('name')}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="username" id="username"
                            class="form-control  @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="Username" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                      @if ($errors->has('g-recaptcha-response'))
                          <span class="help-block">
                              <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                          </span>
                      @endif
                      {!! NoCaptcha::renderJs('g-recaptcha-response') !!}
                      {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                  </div>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                          Register
                        </button>
                      </div>
                </form>
              
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="/auth/login">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets')}}/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{asset('assets')}}/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets')}}/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>