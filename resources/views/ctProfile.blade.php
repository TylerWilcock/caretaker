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
  .crTable>tbody>tr>td {
    vertical-align: middle;
  }

  #addCRWrapper{
    display: none;
  }

</style>


</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col">

          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/ct/profile/'.$caretakerInfo->id) }}" class="site_title"><img src="{{asset('assets/img/CT_LOGO_TEXT.png')}}"></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{asset('assets/img/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{$caretakerInfo->first_name}} {{$caretakerInfo->last_name}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <!-- <li><a href="{{ url('/crprofile') }}"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/calendar') }}"><i class="fa fa-calendar"></i> Calendar</a></li>
                <li><a href="{{ url('/messageboard') }}"><i class="fa fa-comment"></i> Message Board</a></li>
                <li><a href="{{ url('/notes') }}"><i class="fa fa-pencil"></i> Notes</a></li> -->
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
                  <img src="{{asset('assets/img/img.jpg')}}" alt="">{{$caretakerInfo->first_name}} {{$caretakerInfo->last_name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="{{ url('/ct/profile/'.$caretakerInfo->id) }}"> My Profile</a>
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
                                    Your Profile
                                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div id = "profileInfoWrapper">
            @if(Session::has('success')) 
              <div class="alert alert-success alert-dismissible fade in"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{Session::get('success')}} 
              </div> 
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <div class='form-box form-horizontal'>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="name" class="form-control col-md-7 col-xs-12" value = "{{$caretakerInfo->first_name}} {{$caretakerInfo->last_name}}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="phone" class="form-control col-md-7 col-xs-12" value = "{{$caretakerInfo->phone}}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Phone: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="emergencyPhone" class="form-control col-md-7 col-xs-12" value = "{{$caretakerInfo->emergency_phone}}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="homeAddress" class="form-control col-md-7 col-xs-12" value = "{{$caretakerInfo->address}}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthdate: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="birthdate" class="form-control col-md-7 col-xs-12" value = "{{$caretakerInfo->birthday}}" readonly>
                          </div>
                      </div>
                    </div>
                    <!-- dd($caretakerInfo->getAttributes()) -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Care Recipients <small>recipients you are subscribed to</small></h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <table class="table table-bordered crTable">
                              <tbody>
                                  @if($careRecipientInfo != 0)
                                    @for ($i = 0; $i < count($careRecipientInfo); $i++)
                                      <tr align="center">
                                          <td>
                                              {{$careRecipientInfo[$i]->full_name}}
                                          </td>
                                          <td>
                                              <button type="button" data-id = "{{$careRecipientInfo[$i]->id}}" class="btn btn-primary recipient">View Profile</button>
                                              @if($careRecipientInfo[$i]->admin != 0)
                                                <button type="button" data-id = "{{$careRecipientInfo[$i]->id}}" data-name = "{{$careRecipientInfo[$i]->full_name}}" data-birthday = "{{$careRecipientInfo[$i]->birthday}}" data-address = "{{$careRecipientInfo[$i]->address}}" data-phone = "{{$careRecipientInfo[$i]->phone}}" data-emergency = "{{$careRecipientInfo[$i]->emergency_contact_phone}}" data-notes = "{{$careRecipientInfo[$i]->notes}}" data-doctor = "{{$careRecipientInfo[$i]->primary_doctor_phone}}" class="btn btn-success editButton" data-toggle="modal" data-target="#editModal">Edit</button>
                                                <button type="button" data-id = "{{$careRecipientInfo[$i]->id}}" data-name = "{{$careRecipientInfo[$i]->full_name}}" class="btn btn-danger adminDeleteButton" data-toggle="modal" data-target="#adminDeleteModal">Delete</button>
                                              @else
                                                <button type="button" data-id = "{{$careRecipientInfo[$i]->id}}" data-name = "{{$careRecipientInfo[$i]->full_name}}" class="btn btn-danger deleteButton" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                              @endif
                                          </td>
                                      </tr>
                                    @endfor
                                  @endif
                              </tbody>
                          </table>
                          <button type="button" class="btn btn-primary" id = "addCr">Add Care Recipient</button>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div id = "addCRWrapper">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Care Recipient <small>Enter Care Recipient's Information</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="crForm" method="POST" action = "{{ url('/ct/profile/'.$caretakerInfo->id) }}" class="form-horizontal form-label-left">
                                <input type="hidden" name="submitType" value="addRecipient">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="crName" name = "crName" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthdate <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="crBirthday" name = "crBirthday" placeholder = "YYYY-MM-DD" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="crHomeAddress" name = "crHomeAddress" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="crPhoneNumber" name = "crPhoneNumber" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Contact
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="crEmergencyContact" name = "crEmergencyContact" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor's Contact <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="crDrContact" name = "crDrContact" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Notes
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="crNotes" name = "crNotes" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Credit Card Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="creditCard" name = "creditCard" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <input type="hidden" name="ctID" value="{{$caretakerInfo->id}}">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="button" class="btn btn-danger" id = "back">Back</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>

                            </form>
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
                <form id="deleteForm" method="POST" action = "{{ url('/ct/profile/'.$caretakerInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" name="submitType" value="deleteCr">
                  <input type="hidden" id = "deleteID" name="deleteID" value="">
                  <input type="hidden" id = "ctID" name="ctID" value="{{$caretakerInfo->id}}">
                  Are you sure you want to delete the Care Recipient: <b><span id = "deleteCr"></span></b>?
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

      <!-- admin delete modal -->
      <div id="adminDeleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="adminDeleteModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Delete</h4>
            </div>
            <div class="modal-body">

              <div id="modal1" style="padding: 5px 20px;">
                <form id="adminDeleteForm" method="POST" action = "{{ url('/ct/profile/'.$caretakerInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" name="submitType" value="adminDeleteCr">
                  <input type="hidden" id = "adminDeleteID" name="adminDeleteID" value="">
                  Are you sure you want to delete the Care Recipient: <b><span id = "adminDeleteCr"></span></b>?
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger antosubmit" id='yesAdminDelete'>Delete</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /admin delete modal -->

      <!-- edit modal -->
      <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Care Recipient Information</h4>
            </div>
            <div class="modal-body">

              <div id="modal2" style="padding: 5px 20px;">
                <form id="editForm" method="POST" action = "{{ url('/ct/profile/'.$caretakerInfo->id) }}" class="form-horizontal calender" role="form">
                  <input type="hidden" name="submitType" value="editCr">
                  <input type="hidden" id = "editID" name="editID" value="">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="editCrName" name = "editCrName" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthdate
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="editCrBirthday" name = "editCrBirthday" placeholder = "YYYY-MM-DD" class="date-picker form-control col-md-7 col-xs-12" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Address
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="editCrHomeAddress" name = "editCrHomeAddress" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="editCrPhoneNumber" name = "editCrPhoneNumber" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Contact
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="editCrEmergencyContact" name = "editCrEmergencyContact" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor's Contact
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="editCrDrContact" name = "editCrDrContact" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Notes
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="editCrNotes" name = "editCrNotes" class="form-control col-md-7 col-xs-12"></textarea>
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

      // $('.deleteButton').click(function(){
        
      // });

      // $('#yesDelete').click(function(){
      //   $("#deleteForm").submit();
      // });

      $('.adminDeleteButton').click(function(){
        var name = $(this).data('name');
        var crID = $(this).data("id");

        $("#adminDeleteCr").empty();
        $("#adminDeleteCr").append(name);
        $("#adminDeleteID").val(crID);
      });

      $('#yesAdminDelete').click(function(){
        $("#adminDeleteForm").submit();
      });

      $('.deleteButton').click(function(){
        var name = $(this).data('name');
        var crID = $(this).data("id");

        $("#deleteCr").empty();
        $("#deleteCr").append(name);
        $("#deleteID").val(crID);
      });

      $('#yesDelete').click(function(){
        $("#deleteForm").submit();
      });

      $('.editButton').click(function(){
        var crID = $(this).data("id");
        var name = $(this).data("name");
        var birthday = $(this).data("birthday");
        var address = $(this).data("address");
        var phone = $(this).data("phone");
        var emergency = $(this).data("emergency");
        var notes = $(this).data("notes");
        var doctor = $(this).data("doctor");

        $("#editID").val(crID);
        $("#editCrName").val(name);
        $("#editCrBirthday").val(birthday);
        $("#editCrHomeAddress").val(address);
        $("#editCrPhoneNumber").val(phone);
        $("#editCrEmergencyContact").val(emergency);
        $("#editCrDrContact").val(doctor);
        $("#editCrNotes").val(notes);
      });

      $('#yesEdit').click(function(){
        $("#editForm").submit();
      });

      $('.recipient').click(function(){
        var crID = $(this).data("id");
        window.location.href  = "/cr/profile/" + crID;
      });

      $('#addCr').click(function(){
        $("#profileInfoWrapper").hide();
        $("#addCRWrapper").show();
      });

      $('#back').click(function(){
        $("#addCRWrapper").hide();
        $("#profileInfoWrapper").show();
      });

  });

  </script>

  <script>
    $(window).load(function() {

    });
  </script>
</body>

</html>
