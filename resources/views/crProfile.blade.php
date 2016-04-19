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
  .ctTable>tbody>tr>td {
    vertical-align: middle;
  }

  #ctInfoWrapper, #addCtWrapper{
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
                                    Care Recipient Profile
                                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div id = "crInfoWrapper">
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <div class='form-box form-horizontal'>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" class="form-control col-md-7 col-xs-12" value = "{{$crInfo->full_name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="homeAddress" class="form-control col-md-7 col-xs-12" value = "{{$crInfo->address}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthdate: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="birthdate" class="form-control col-md-7 col-xs-12" value = "{{$crInfo->birthday}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor Contact: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="doctorPhone" class="form-control col-md-7 col-xs-12" value = "{{$crInfo->primary_doctor_phone}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Contact: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="emergencyPhone" class="form-control col-md-7 col-xs-12" value = "{{$crInfo->emergency_contact_phone}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Notes:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="notes" class="form-control col-md-7 col-xs-12" readonly>{{$crInfo->notes}}</textarea>
                            </div>
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Care Teammates <small>people taking care of this recipient</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered ctTable">
                                <tbody>
                                    @if($careTakersInfo != 0)
                                      @for ($i = 0; $i < count($careTakersInfo); $i++)
                                        <tr align="center">
                                            <td>
                                                {{$careTakersInfo[$i]->first_name.' '.$careTakersInfo[$i]->last_name}}
                                            </td>
                                            <td>
                                                <button type="button" data-id = "{{$careTakersInfo[$i]->id}}" data-name = "{{$careTakersInfo[$i]->first_name.' '.$careTakersInfo[$i]->last_name}}" data-phone = "{{$careTakersInfo[$i]->phone}}" data-ephone = "{{$careTakersInfo[$i]->emergency_phone}}" data-address = "{{$careTakersInfo[$i]->address}}" data-birthday = "{{$careTakersInfo[$i]->birthday}}" class="btn btn-primary caretaker">View Info</button>
                                            </td>
                                        </tr>
                                      @endfor
                                    @endif
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" id = "addCt">Add Caretaker</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div id = "ctInfoWrapper">
            <div class = "row">
              <div class = "x_panel">
                <div class = "x_title">
                  <h2> Caretaker Information </h2>
                  <div class="clearfix"></div>
                </div>
                <div class = "x_content">
                    <div class='form-box form-horizontal'>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ctName" class="form-control col-md-7 col-xs-12" value = "" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ctPhone" class="form-control col-md-7 col-xs-12" value = "" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Phone: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ctEmergencyPhone" class="form-control col-md-7 col-xs-12" value = "" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ctHomeAddress" class="form-control col-md-7 col-xs-12" value = "" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthdate: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ctBirthdate" class="form-control col-md-7 col-xs-12" value = "Add birthdate field" readonly>
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-danger" id = "back">Back</button>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div id = "addCtWrapper">
            <div class = "row">
              <div class = "x_panel">
                <div class = "x_title">
                  <h2> Add a Care Teammate <small>enter your care teammate's email to add them to your team</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class = "x_content">
                    <div class='form-box form-horizontal'>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="email" class="form-control col-md-7 col-xs-12" value = "">
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-danger" id = "back2">Back</button>
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

      $('#saveEvent').on('click', function(){

         // $.post('http://159.203.104.152/calendar', {type:"saveEvent",})

      });

  });

  </script>

  <script>
    $(window).load(function() {

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var started;
      var categoryClass;

      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          $('#fc_create').click();

          started = start;
          ended = end

          $(".antosubmit").on("click", function() {
            var title = $("#title").val();
            if (end) {
              ended = end
            }
            categoryClass = $("#event_type").val();

            if (title) {
              calendar.fullCalendar('renderEvent', {
                  title: title,
                  start: started,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            $('#title').val('');
            calendar.fullCalendar('unselect');

            $('.antoclose').click();

            return false;
          });
        },
        eventClick: function(calEvent, jsEvent, view) {
          // alert(calEvent.title, jsEvent, view);

          $('#fc_edit').click();
          $('#title2').val(calEvent.title);
          categoryClass = $("#event_type").val();

          $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
          });
          calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [{
          title: 'All Day Event',
          start: new Date(y, m, 1)
        }, {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2)
        }, {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false
        }, {
          title: 'Lunch',
          start: new Date(y, m, d + 14, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false
        }, {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false
        }, {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/'
        }]
      });

      $('.caretaker').click(function(){
        var ctName = $(this).data("name");
        var ctPhone = $(this).data("phone");
        var ctEPhone = $(this).data("ephone");
        var ctAddress = $(this).data("address");
        var ctBirthdate = $(this).data("birthday");

        $("#ctName").val(ctName);
        $("#ctPhone").val(ctPhone);
        $("#ctEmergencyPhone").val(ctEPhone);
        $("#ctHomeAddress").val(ctAddress);
        $("#ctBirthdate").val(ctBirthdate);

        $("#crInfoWrapper").hide();
        $("#ctInfoWrapper").show();
      });

      $('#addCt').click(function(){
        $("#crInfoWrapper").hide();
        $("#addCtWrapper").show();
      });

      $('#back').click(function(){
        $("#ctInfoWrapper").hide();
        $("#crInfoWrapper").show();
      });

      $('#back2').click(function(){
        $("#addCtWrapper").hide();
        $("#crInfoWrapper").show();
      });

    });
  </script>
</body>

</html>
