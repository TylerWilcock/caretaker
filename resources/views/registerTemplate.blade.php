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

    <title>Care Teammate Sign Up</title>

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

<!-- action-"{{ url('/register') }}"
 -->  </head>

  <body>

    <div class="">

      <div id="wrapper">
        <div id="login">
          <section class="login_content">
            <form role="form" method="POST" >
              {!! csrf_field() !!}
              <h1>Create Account</h1>
              
              <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" id="first_name">

                @if ($errors->has('first_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
                @endif

              </div>
              
              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">

                @if ($errors->has('last_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
                @endif

              </div>

              <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="birthday" placeholder="Birthday YYYY-MM-DD" value="{{ old('birthday') }}">

                @if ($errors->has('birthday'))
                  <span class="help-block">
                      <strong>{{ $errors->first('birthday') }}</strong>
                  </span>
                @endif

              </div>

              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">

                @if ($errors->has('address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif

              </div>

              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">

                @if ($errors->has('phone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                @endif

              </div>

              <div class="form-group{{ $errors->has('emergency_phone') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="emergency_phone" placeholder="Emergency Number" value="{{ old('emergency_phone') }}">

                @if ($errors->has('emergency_phone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('emergency_phone') }}</strong>
                  </span>
                @endif

              </div>
              
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif

              </div>
              
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" >

                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif

              </div>
              
              <div>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="submit">

                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif

              </div>
              
              <div>
                <button class="btn btn-default submit">
                  Register
                </button>
              </div>
              
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Already a member ?
                  <a href="/login" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1>Care Teammate</h1>

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

    <script type='text/javascript'>

  $(document).ready(function(){

      $("#submit").on('click', function()
      {
        console.log($("#first_name").val());
      });

  });

  </script>