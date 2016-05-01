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



</head>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/ct/profile/'.$ctID) }}" class="site_title"><img src="{{asset('assets/img/CT_LOGO_TEXT.png')}}"></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{asset('assets/img/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Viewing Messages</span>
              <h2><b>{{$crInfo->full_name}}</b></h2>
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
                  Message Board
                  <small>
                      Type a message and submit to post it.
                  </small>
              </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
                      <!-- start of user messages -->
                      <div class="messages">
                      @if(!empty($messages))
                        @for($i=0; $i < count($messages); $i++)
                        <div class="x_panel">
                            <div class="x_title">
                              <div class = "row">
                                <div class = "col-md-12">
                                  @if($admin != 0)
                                    <ul class="nav navbar-right panel_toolbox">
                                      <button type="button" class="btn btn-success btn-xs editButton" data-toggle="modal" data-target="#editModal" data-id = "{{$messages[$i]->id}}" data-message = "{{$messages[$i]->message}}">Edit</button>
                                      <button type="button" class="btn btn-danger btn-xs deleteButton" data-toggle="modal" data-target="#deleteModal" data-id = "{{$messages[$i]->id}}">Delete</button>
                                    </ul>
                                  @endif
                                  <h2> 
                                  <img class = "img-circle msg-board-icon" src="http://159.203.104.152/assets/img/img.jpg" alt=""> 
                                    {{$messages[$i]->first_name.' '.$messages[$i]->last_name }} 
                                      <small> 
                                        {{date('h:i:s a', strtotime($messages[$i]->time)) . ' &bull; ' . date('F d, Y', strtotime($messages[$i]->date))}} 
                                      </small>
                                  </h2>
                                </div>
                              </div>
                            </div>

                          <div class="x_content">
                            <div class = "row">
                              <div class = "col-md-12">
                                {{$messages[$i]->message}}
                              </div>
                            </div>
                          </div>
                        </div>
                        @endfor
                      @endif
                      </div>
                      <form class="form-horizontal" method='post'>
                          <div class="form-group">
                              <textarea type="text" name='userMessage' class="form-control col-md-6" placeholder="Type a message here"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit Message</button>
                          </div>
                          <input type='hidden' name='crID' value='{{$crInfo->id}}'>
                          <input type='hidden' name='ctID' value='{{$ctID}}'>
                          <input type='hidden' name='submitType' value='addMessage'>
                      </form>
                      <!-- end of user messages -->
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

      <!-- delete modal -->
      <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Delete</h4>
            </div>
            <div class="modal-body">

              <div id="modal1" style="padding: 5px 20px;">
                <form id="deleteForm" method="POST" action = "{{ url('/cr/messageboard/'.$crInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" name="submitType" value="deleteMessage">
                  <input type="hidden" id = "deleteID" name="deleteID" value="">
                  Are you sure you want to delete the Message?
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger antosubmit" id='yesDelete'>Delete</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /delete modal -->

      <!-- edit modal -->
      <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Message</h4>
            </div>
            <div class="modal-body">

              <div id="modal2" style="padding: 5px 20px;">
                <form id="editForm" method="POST" action = "{{ url('/cr/messageboard/'.$crInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" name="submitType" value="editMessage">
                  <input type="hidden" id = "editID" name="editID" value="">
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Message
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea type="text" id="editMessage" name = "editMessage" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success antosubmit" id='yesEdit'>Update</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /edit modal -->

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

      $('.deleteButton').click(function(){
        var messageID = $(this).data('id');
        $("#deleteID").val(messageID);
      });

      $('#yesDelete').click(function(){
        $("#deleteForm").submit();
      });

      $('.editButton').click(function(){
        var messageID = $(this).data('id');
        var message = $(this).data('message');
        $("#editID").val(messageID);
        $("#editMessage").val(message);
      });

      $('#yesEdit').click(function(){
        $("#editForm").submit();
      });

  });

  </script>

  <script>
    $(window).load(function() {

    });
  </script>
</body>

</html>
