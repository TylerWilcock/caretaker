<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Care Teammate</title>

  <!-- Bootstrap core CSS -->
  
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/icheck/flat/green.css')}}" rel="stylesheet">

  <link href="{{asset('assets/css/calendar/fullcalendar.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/calendar/fullcalendar.print.css')}}" rel="stylesheet" media="print">

  <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


<style>
  #medicationTable>tbody>tr>td {
    vertical-align: middle;
  }

  #addMedicationWrapper{
    display:none;
  }

</style>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Care Teammate</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{asset('assets/img/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{ url('/cr/profile/'.$crInfo->id) }}"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/cr/calendar/'.$crInfo->id) }}"><i class="fa fa-calendar"></i> Calendar</a></li>
                <li><a href="{{ url('/cr/messageboard/'.$crInfo->id) }}"><i class="fa fa-comment"></i> Message Board</a></li>
                <li><a href="{{ url('/cr/notes/'.$crInfo->id) }}"><i class="fa fa-pencil"></i> Notes</a></li>
                <li><a href="{{ url('/cr/medication/'.$crInfo->id) }}"><i class="fa fa-medkit"></i> Medication</a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('assets/img/img.jpg')}}" alt="">{{Auth::user()->first_name}} {{Auth::user()->last_name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="{{ url('/ct/profile/'.$ctID) }}"> My Profile</a>
                  </li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                                    Medication
                                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div id = "medicationWrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Care Recipient's Medication</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="medicationTable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align:center">Medication</th>
                          <th style="text-align:center">Dosage</th>
                          <th style="text-align:center">Prescribed Date</th>
                          <th style="text-align:center">Refill Date</th>
                          <th style="text-align:center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($medication != 0)
                          @for ($i = 0; $i < count($medication); $i++)
                            <tr align="center">
                                <td>
                                    {{$medication[$i]->medication_name}}
                                </td>
                                <td>
                                    {{$medication[$i]->dosage}}
                                </td>
                                <td>
                                    {{$medication[$i]->prescribed_date}}
                                </td>
                                <td>
                                    {{$medication[$i]->refill_date}}
                                </td>
                                <td>
                                    <button type="button" data-id = "{{$medication[$i]->carerecipient_id}}" class="btn btn-success editButton">Edit</button>
                                    <button type="button" data-id = "{{$medication[$i]->carerecipient_id}}" class="btn btn-danger deleteButton">Delete</button>
                                </td>
                            </tr>
                          @endfor
                        @endif
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id = "addMedication">Add Medication</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id = "addMedicationWrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a Medication</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="medForm" method="POST" action = "{{ url('/cr/medication/'.$crInfo->id) }}" class="form-horizontal form-label-left">
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Medication Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="medicationName" name = "medicationName" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dosage <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="dosage" name = "dosage" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Prescribed Date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="prescribedDate" name = "prescribedDate" placeholder = "YYYY-MM-DD" class="form-control col-md-7 col-xs-12" type="text" required="required">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Refill Date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="refillDate" name = "refillDate" placeholder = "YYYY-MM-DD" class="form-control col-md-7 col-xs-12" type="text" required="required">
                          </div>
                      </div>
                      <input type="hidden" name="crID" value="{{$crInfo->id}}">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-danger" id = "back">Back</button>
                              <button type="submit" class="btn btn-primary" id = "add">Add</button>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Care Teammate
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>

      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('assets/js/moment/moment.js')}}"></script>
  <script src="{{asset('assets/js/datepicker/daterangepicker.js')}}"></script>

  <script src="{{asset('assets/js/nprogress.js')}}"></script>
  <!-- chart js -->

  <!-- bootstrap progress js -->
  
  <script src="{{asset('assets/js/progressbar/bootstrap-progressbar.min.js')}}"></script>

  <script src="{{asset('assets/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <!-- icheck -->
  <script src="{{asset('assets/js/icheck/icheck.min.js')}}"></script>

  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script src="{{asset('assets/js/moment/moment.min.js')}}"></script>

  <script src="{{asset('assets/js/chartjs/chart.min.js')}}"></script>

  <script src="{{asset('assets/js/calendar/fullcalendar.min.js')}}"></script>
  <!-- pace -->
  <script src="{{asset('assets/js/pace/pace.min.js')}}"></script>

  <script type='text/javascript'>

  $(document).ready(function(){

      // $('#saveEvent').on('click', function(){

      //    // $.post('http://159.203.104.152/calendar', {type:"saveEvent",})

      // });


      $('#addMedication').click(function(){
        $("#medicationWrapper").hide();
        $("#addMedicationWrapper").show();
      });

      $('#back').click(function(){
        $("#addMedicationWrapper").hide();
        $("#medicationWrapper").show();
      });

      $('.editButton').click(function(){
        alert("add functionality");
      });

      $('.deleteButton').click(function(){
        alert("add functionality");
      });

  });

  </script>

  <script>
    $(window).load(function() {


    });
  </script>
</body>

</html>