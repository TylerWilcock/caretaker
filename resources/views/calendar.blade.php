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

  .fc-event-container{
    cursor: pointer; 
    cursor: hand;
  }

</style>


</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Care Teammate</span></a>
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
                                    Calender
                                    <small>
                                        Click to add/edit events
                                    </small>
                                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Calender Events</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id = "calendarForm">
                    @if($calendarEvents != 0)
                      @for($i = 0; $i < count($calendarEvents); $i++)
                        <div id = "{{'event'.$calendarEvents[$i]->id}}" class="event" style="display: none;">
                          <input type="hidden" class="eventID" value="{{$calendarEvents[$i]->id}}"/>
                          <input type="hidden" class="crID" value="{{$calendarEvents[$i]->carerecipient_id}}"/>
                          <input type="hidden" class="title" value="{{$calendarEvents[$i]->title}}"/>
                          <input type="hidden" class="date" value="{{$calendarEvents[$i]->date}}" />
                          <input type="hidden" class="time" value="{{$calendarEvents[$i]->time}}" /> 
                          <input type="hidden" class="description" value="{{$calendarEvents[$i]->description}}" />
                          <input type="hidden" class="repeat" value="{{$calendarEvents[$i]->repeat_id}}" />
                          <input type="hidden" class="location" value="{{$calendarEvents[$i]->location}}" />
                          <input type="hidden" class="notes" value="{{$calendarEvents[$i]->notes}}" />
                        </div>
                      @endfor
                    @endif
                  </form>
                  <div id='calendar'></div>

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


      <!-- Start Calender modals -->
      <!-- calendar new -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">New Calender Entry</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="newForm" method="POST" action = "{{ url('/cr/calendar/'.$crInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" id = "submitType" name = "submitType" value="addEvent"/>
                  <input type="hidden" id = "submitType" name = "addCRID" value="{{$crInfo->id}}"/>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="newTitle" name="newTitle">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="newDescription" name="newDescription"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                      <input id="newDate" name = "newDate" class="form-control " type="date" data-parsley-id="4825">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Time</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="newTime" name="newTime" >
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Repeat?</label>
                      <div class="col-sm-9 btn-group" data-toggle="buttons">
                        <label class="btn btn-default">
                          <input type="radio" name="newRepeatRadioSelection" id="newRepeatNone" value='0'> None
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="newRepeatRadioSelection" id="newRepeatWeekly" value='1'> Weekly
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="newRepeatRadioSelection" id="newRepeatMonthly" value='2'> Monthly
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="newRepeatRadioSelection" id="newRepeatYearly" value='3'> Yearly
                        </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="newLocation" name="newLocation">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Notes</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="newNotes" name="newNotes"></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success addButton">Add Event</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /calendar new -->

      <!-- calendar edit/view -->
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">×</button>
              @if($admin != 0)
                <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
              @else
                <h4 class="modal-title" id="myModalLabel2">View Calender Entry</h4>
              @endif
            </div>
            <div class="modal-body">
              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="editForm" method="POST" action = "{{ url('/cr/calendar/'.$crInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" id = "submitType" name = "submitType" value="editEvent"/>
                  <input type="hidden" id = "editID" name = "editID" value=""/>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="editTitle" name="editTitle">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="editDescription" name="editDescription"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                      <input id="editDate" name = "editDate" class="form-control " type="date" data-parsley-id="4825">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Time</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="editTime" name="editTime" >
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Repeat?</label>
                      <div class="col-sm-9 btn-group" data-toggle="buttons">
                        <label id = "editNoneLabel" class="btn btn-default">
                          <input type="radio" name="editRepeatRadioSelection" id="editRepeatNone" value='0'> None
                        </label>
                        <label id = "editWeeklyLabel" class="btn btn-default">
                          <input type="radio" name="editRepeatRadioSelection" id="editRepeatWeekly" value='1'> Weekly
                        </label>
                        <label id = "editMonthlyLabel" class="btn btn-default">
                          <input type="radio" name="editRepeatRadioSelection" id="editRepeatMonthly" value='2'> Monthly
                        </label>
                        <label id = "editYearlyLabel" class="btn btn-default">
                          <input type="radio" name="editRepeatRadioSelection" id="editRepeatYearly" value='3'> Yearly
                        </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="editLocation" name="editLocation">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Notes</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="editNotes" name="editNotes"></textarea>
                    </div>
                  </div>
                </form>
                <form id = deleteForm method="POST" action = "{{ url('/cr/calendar/'.$crInfo->id) }}">
                  <input type="hidden" id = "submitType" name = "submitType" value="deleteEvent"/>
                  <input type="hidden" id = "deleteID" name = "deleteID" value=""/>
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                  @if($admin != 0)
                    <button type="button" class="btn btn-danger deleteButton">Delete</button>
                    <button type="button" class="btn btn-success editButton">Update Event</button>
                  @endif
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /calendar edit/view -->
      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

      <!-- End Calender modals -->
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

      //    var title = $('#title').val();
      //    var desc = $('#description').val();
      //    var date = $('#date').val();
      //    var time = $('#time').val();
      //    var repeat = $('#repeat').val();
      //    var location = $('#location').val();
      //    var notes = $('#notes').val();

      //    $.post('http://159.203.104.152/calendar', {type:"addEvent", title:title, descritption:desc,date:date,time:time,repeat:repeat,location:location,notes:notes}, function(data){

      //       console.log(data);

      //    });

      // });

      $(".addButton").on("click", function() {
        //add a new event
        $("#newForm").submit();
      });

      $(".editButton").on("click", function() {
        //edit the event
        $("#editForm").submit();
      });

      $(".deleteButton").on("click", function() {
        //delete the event
        $("#deleteForm").submit();
      });

  });

  </script>

  <script>
    $(window).load(function() {

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

        },
        eventClick: function(calEvent, jsEvent, view) {
          // alert(calEvent.title, jsEvent, view);

          $('#editNoneLabel').removeClass('active');
          $('#editWeeklyLabel').removeClass('active');
          $('#editMonthlyLabel').removeClass('active');
          $('#editYearlyLabel').removeClass('active');
          $("#editRepeatNone").prop('checked', false);
          $("#editRepeatWeekly").prop('checked', false);
          $("#editRepeatMonthly").prop('checked', false);
          $("#editRepeatYearly").prop('checked', false);

          $('#fc_edit').click();

          var id = calEvent.id;
          $("#deleteID").val(id);
          $("#editID").val(id);

          var editTitle = $('#event'+id).find('.title').val();
          var editDate = $('#event'+id).find('.date').val();
          var editTime = $('#event'+id).find('.time').val();
          var editDescription = $('#event'+id).find('.description').val();
          var editRepeat = $('#event'+id).find('.repeat').val();
          var editLocation = $('#event'+id).find('.location').val();
          var editNotes = $('#event'+id).find('.notes').val();

          $("#editTitle").val(editTitle);
          $("#editDate").val(editDate);
          $("#editTime").val(editTime);
          $("#editDescription").val(editDescription);
          //find out what button should be selected for repeat
          if(editRepeat == 0){ //select none
            $("#editRepeatNone").prop('checked', true);
            $('#editNoneLabel').addClass('active');
          }
          else if(editRepeat == 1){ //select weekly
            $("#editRepeatWeekly").prop('checked', true);
            $('#editWeeklyLabel').addClass('active');
          }
          else if(editRepeat == 2){ //select monthly
            $("#editRepeatMonthly").prop('checked', true);
            $('#editMonthlyLabel').addClass('active');
          }
          else{ //select yearly
            $("#editRepeatYearly").prop('checked', true);
            $('#editYearlyLabel').addClass('active');
          }
          $("#editLocation").val(editLocation);
          $("#editNotes").val(editNotes);

        },
        editable: false,
      });


      //add the events from the database to the calendar
      var crEvents = new Array();

      $.each( $( '.event' ), function(){
          var eventID = $(this).find( '.eventID' ).val();
          var crID = $(this).find( '.crID' ).val();
          var title = $(this).find( '.title' ).val();

          var date = $(this).find( '.date' ).val();
          //break up the date into year, month, day
          var dateArray = date.split("-");

          var time = $(this).find( '.time' ).val();
          //break up the time into hours, minutes, seconds
          var timeArray = time.split(":");

          var description = $(this).find( '.description' ).val();
          var repeat = $(this).find( '.repeat' ).val();
          var location = $(this).find( '.location' ).val();
          var notes = $(this).find( '.notes' ).val();

          if(repeat == 0){ //no recurrence
            //now create the date object
            //note: subtract 1 from the month field because the javascript Date object ranges from 0-11
            var dateObject = new Date(dateArray[0], parseInt(dateArray[1]) - 1, dateArray[2], timeArray[0], timeArray[1], timeArray[2]);

            crEvents.push({
              title : title,
              start : dateObject,
              allDay : false,
              id : eventID
            }); 
          }
          else if(repeat == 1){ //recurs weekly
            for(var week = 0; week < 1825; week+=7){ //loop for 5 years; add a week each iteration
              //now create the date object
              //note: subtract 1 from the month field because the javascript Date object ranges from 0-11
              var dateObject = new Date(dateArray[0], parseInt(dateArray[1]) - 1, parseInt(dateArray[2]) + week, timeArray[0], timeArray[1], timeArray[2]);

              crEvents.push({
                title : title,
                start : dateObject,
                allDay : false,
                id : eventID
              }); 
            }
          }
          else if(repeat == 2){ //recurs monthly
            for(var month = 0; month < 60; month++){ //loop for 5 years; add a month each iteration
              //now create the date object
              //note: subtract 1 from the month field because the javascript Date object ranges from 0-11
              var dateObject = new Date(dateArray[0], parseInt(dateArray[1]) - 1 + month, dateArray[2], timeArray[0], timeArray[1], timeArray[2]);

              crEvents.push({
                title : title,
                start : dateObject,
                allDay : false,
                id : eventID
              }); 
            }
          }
          else{ //recurs yearly
            for(var year = 0; year < 5; year++){ //loop for 5 years; add a year each iteration
              //now create the date object
              //note: subtract 1 from the month field because the javascript Date object ranges from 0-11
              var dateObject = new Date(parseInt(dateArray[0]) + year, parseInt(dateArray[1]) - 1, dateArray[2], timeArray[0], timeArray[1], timeArray[2]);

              crEvents.push({
                title : title,
                start : dateObject,
                allDay : false,
                id : eventID
              }); 
            }
          }
      });

      console.log(crEvents);
      $('#calendar').fullCalendar( 'addEventSource', crEvents );

    });
  </script>
</body>

</html>
