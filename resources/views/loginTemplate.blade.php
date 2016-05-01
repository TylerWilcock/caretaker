
  <style>
    html{
      background: #73879C;
    }

    #login{
      background: #f8f8f8;
      border-color: #AD3F3F;
      border-width: 8px;
      border-style: solid;
      margin-top: 20px;
      font-size: 15px;
      padding: 25px;
      border-radius: 25px;
    }

    body{
       background: #73879C !important;
    }

  </style>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Care Teammate Login</title>

    <!-- Bootstrap core CSS -->

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icheck/flat/green.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
          <script src="../assets/js/ie8-responsive-file-warning.js"></script>
          <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

  </head>

  <body>

    <div class="">

      <div id="wrapper">
        <div id="login" class="animate form">
          <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
              {!! csrf_field() !!}
              
              <h1>Login</h1>
              
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif

              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif

              </div>

              <div>
                <button id="submit" class="btn btn-default submit" >
                  Log in
                </button>

                <!-- <a class="reset_pass" href="{{ url('/password/reset') }}">Forgot your password?</a> -->
              </div>
              
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">New to site?
                  <a href="/register" class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><img src="/assets/img/CT_LOGO.png"></img></h1>

                  <p>©2016 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </div>
  
  </body>

  </html>

  <!-- jQuery -->
  <script src="{{asset('assets/js/jquery.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>