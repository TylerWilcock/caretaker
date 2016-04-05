<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Care Teammate</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/landing-page.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Care Teammate</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="/register">Sign Up</a>
                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="landingPage"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <img src="assets/img/CT_LOGO_LARGE.png">
                        <hr class="intro-divider">
                        <!-- <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="about"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About Us</h2>
                    <p class="lead">
                        Careteammate was developed to meet the needs of people like my grandparents and friends of my parents who need more help as they age and need more care. I saw my mom spend hours trying to organize help for a friend who fell and broke her wrist. She had great network of friends who were willing to help with things like meals and car rides, but someone needed to communicate with everyone and organize her care. And that was tricky and took a lot of effort.
                        <br/>
                        <br/>
                        Then while I was working on the business plan for Careteammate, my roommate broke her leg and couldn’t do much for herself. Friends would try to assist her, but there was miscommunications on who was helping her and when. I then realized that Careteammate could work for anyone—from a student who needs to get through a short-term recovery to an elderly relative who wants to stay independent and out of a nursing home for as long as possible. 
                        <br/>
                        <br/>
                        Most people have family and friends who are more than happy to help when they are recovering from an illness or injury, now there’s an easy, affordable and convenient way to manage that help.
                        <br/>
                        <br/>
                        Careteammate is a startup out of the Whitewater Innovation Center. It is currently part of the spring Launch Pad Program out of the University of Wisconsin Whitewater. The idea of Careteammate started as a class project and is now currently being pursued through the Launch Pad Program.
                        <br/>
                        <br/>
                        <h3>Contact Us:</h3>
                        Email: founder@careteammate.com
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Benefits</h2>
                    <p class="lead">
                        - Manage the assistance that friends and family need in a simple manner
                        <br/>
                        <br/>
                        - Affordable ($5 per month)
                        <br/>
                        <br/>
                        - Several different applications that help organize your care recipient's assistance
                        <br/>
                        <br/>
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">Applications</h2>
                        <h4>Caretaker Profile</h4>
                        View the caretaker's profile information.  Here, you will also find the list of care recipients you are subscribed when visiting your own profile.
                        <h4>Care Recipient Profile</h4>
                        View a list of caretakers that are also caring for your care recipient.  Access their information by simply clicking on any of the caretakers.
                        <h4>Calendar</h4>
                        A calendar that displays the events of a particular care recipient.  Here, you may view, edit, or delete events to manage and document care.  The calendar is viewable by all care teammates subscribed to a care recipient.
                        <h4>Message Board</h4>
                        Post messages pertaining to a care recipient.  The messages are viewable by all care teammates subscribed to a care recipient.
                    </p>
                    <!-- <img class="img-responsive" src="{{asset('assets/img/ipad.png')}}" alt=""> -->
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <!-- <a  name="signup"></a>
    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Benefits</h2>
                    <p class="lead">Bullet points or list of benefits goes here</p>
                </div>
                <div class="col-lg-6 col-sm-pull-6 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Sign Up</h2>
                    <form class="form-horizontal form-label-left" novalidate="">
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="firstName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="firstName" placeholder="Please enter your first name" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="lastName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastName" placeholder="Please enter your last name" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Please enter your email address">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email2" name="email2" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Please re-enter your email address">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Birthdate <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="birthdate" name="birthdate" required="required" class="form-control col-md-7 col-xs-12" placeholder="Please enter your date of birth">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder="Please enter your home address">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="phoneNumber" name="phoneNumber" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="Please enter your phone number">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="number">Emergency Number <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="emergencyNumber" name="emergencyNumber" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="If different from phone number">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-4">Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" placeholder="Please create your password">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password2" class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required" placeholder="Please re-enter your password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Create Account</button>
                            </div>
                        </div>
                    </form> -->
                    <!-- <p class="lead">Bullet points or list of benefits goes here</p> -->
                    <!-- <img class="img-responsive" src="{{asset('assets/img/dog.png')}}" alt=""> -->
                <!-- </div>
            </div>

        </div> -->
        <!-- /.container -->

    <!-- </div> -->
    <!-- /.content-section-b -->

    <!-- <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Google Web Fonts and<br>Font Awesome Icons</h2>
                    <p class="lead">This template features the 'Lato' font, part of the <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{asset('assets/img/phones.png')}}" alt="">
                </div>
            </div>

        </div> -->
        <!-- /.container -->

    <!-- </div> -->
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Care Teammate</h2>
                </div>
                <div class="col-lg-6">
                    <!-- <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul> -->
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#signup">Sign Up</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/login">Login</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Care Teammate 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
