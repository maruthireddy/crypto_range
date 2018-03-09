<!-- === BEGIN HEADER === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>BitFlow - Crypto-currency</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/color-scheme-1.css">
    <link rel="stylesheet" type="text/css" href="../css/color-scheme-2.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Request google Open Sans font family -->
    <!-- This must be here to overide fonts from file if request is sucessful -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<!-- 
=== QUICK GUIDE ===

* Switch between (color-scheme-1) or (color-scheme-2) to change color of the template or empty to use template default on the <body> element.

* Toggle Scroll Animation with (data-enable-scroll-animate="true/false") on the <body> element and then 
    (data-scroll-animate="" with you prefered animation class name from animate.css. eg "fadeIn") on any element you want to animate.

* Swap (section id="header-video"), (section id="header-slider") and (section id="header-image") for your prefered welcome banner 
    in the header id="masthead"

* If you are using (section id="header-video") or (section id="header-slider") add 'top-menu-absolute' class to the >>>header id="masthead" 
    else remove it.

* If you are using (section id="header-image") add your background image to the >>>header id="masthead" instead of (section id="header-image") itself.

* All forms in this template need to intracted with to make it work 

YOU CAN DELETE THIS IN YOUR COPIED FILE
 -->
<body class="color-scheme" data-enable-scroll-animate="true">
    <div id="page" class="site">

        <header id="masthead" class="site-header bg margin-bottom-60 top-menu-absolute" role="banner">
            <div class="top-menu">
                <!-- Using the bootstrap navbar-default and navbar-inverse class may block parts of the image -->
                <nav class="navbar navbar-theme">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">
                                <img src="../images/bitflow-logo.png">
                                BitFlow
                            </a>
                        </div>
                        
                        <!-- Collect the nav links and other content for toggling -->
                        <div class="collapse navbar-collapse" id="site-menu">
                            <ul class="nav navbar-nav" id="main-menu">
                                <!-- If you change any link here you will also need to change the ID of its given section -->
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="#about">About</a></li>
                               
                                <li><a href="#prices">plans</a></li>
                                <li><a href="#numbers">Trading Volumes</a></li>
                                <li><a href="#features">Affiliate </a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>

                            <div class="nav navbar-nav navbar-right">
                                <!-- Toggles modal id="sign-in" -->
                                <button class="btn btn-default btn-curved navbar-btn margin-horiz-16" data-toggle="modal" data-target="#sign-in">
                                     <li><a href="/signin">signin</a></li>
                                     
                                </button>
                            </div>

                           
                        </div><!-- .navbar-collapse -->
                    </div>
                </nav> <!-- .navbar -->
            </div> <!-- .top-menu -->
            
         
	<!--/w3_short-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div class="services-breadcrumb_w3ls">
		<div class="inner_breadcrumb">

			<ul class="short">
				<li><a href="index.html">Home</a><span>|</span></li>
				<li>Reset Password</li>
			</ul>
		</div>
	</div>
	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
	@endif

	@if($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
          	<li>{{ $error }}</li>
     	@endforeach
    </div>
	@endif

	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="banner-bottom">
		<center><div class="container">
			<div class="tittle_head_w3layouts"><br/>

				<h3 class="tittle three">Reset <span>Password </span></h3>
			</div>
			<div class="inner_sec_info_agileits_w3">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="/reset_user_password" method="post">
							{{ csrf_field() }}
							<input type="password"class="form-control" name="password" id="password1" placeholder="Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br/>
							<input type="password"class="form-control" name="password1" id="password2" placeholder="Confirm Password" required=""><br/>
							<input type="text" name="key" value="{{$key}}" placeholder="Confirm Password" hidden><br/>
							<div class="tp">
								<input type="submit" class="btn btn-theme btn-curved btn-block form-control" value="Reset Password">
							</div>
						</form>
					</div>
					<div class="login-social-grids">

					</div>
                    <p><a href="/signin"><strong style="color:#000">Click here to login</strong></a></p>
				</div>
			</div>
            </div></center>
	</div>
	
	<!-- js -->

	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<!-- password-script -->
	<script type="text/javascript">
		// window.onload = function () {
		// 	document.getElementById("password1").onchange = validatePassword;
		// 	document.getElementById("password2").onchange = validatePassword;
		// }

		// function validatePassword() {
		// 	var pass2 = document.getElementById("password2").value;
		// 	var pass1 = document.getElementById("password1").value;
		// 	if (pass1 != pass2)
		// 		document.getElementById("password2").setCustomValidity("Passwords Don't Match");
		// 	else
		// 		document.getElementById("password2").setCustomValidity('');
		// 	//empty string means no validation error
		// }
	</script>
	<!-- //password-script -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <section id="contact" class="section bg" style="background-image: url('../images/pexels-photo-618550.jpeg');">
                <div class="overlay-black"></div> <!-- Used for a see through background and also maintain text visiblity -->
                <div class="container">
                    <h2 class="section-title">Need to ask questions?</h2>
                    <div class="row">

                        <div class="col-sm-6 margin-bottom-50" role="address" data-scroll-animate="fadeIn">
                            <h5 class="block-title">Visit our office at</h5>
                            <p class="margin-bottom-40">1230 Willson Park Avenue, str 10999,<br>Limekas Roda, NGA</p>
                            <a class="btn btn-lg btn-curved btn-theme" href="#" role="button">Get Direction</a>
                        </div>

                        <div class="col-sm-6" data-scroll-animate="fadeIn">
                            <h5 class="block-title">Send a massage</h5>
                            <div><a href="mailto:#">info@bitflowcorperation.com</a></div>
                            <span class="sr-only">or call</span><div class="margin-bottom-40">(+399) 0898 9098 676</div>
                            <span class="sr-only">social networks</span>
                            <ul class="social-networks">
                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Like BitFlow on Facebook">
                                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Follow BitFlow on Twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Subscribe to BitFlow Youtube channel">
                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Like BitFlow On Instagram">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul> <!-- .social-networks -->
                        </div>

                    </div>
                </div>
            </section> <!-- #contact -->
<!-- === BEGIN FOOTER === -->
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
                <p class="text-center margin-vert-30 copyright">&copy;2018 BitFLow. All Rights Reserved</p>
                <a id="btt-btn" href="#page"><span class="sr-only">Back to top</span><i class="fa fa-arrow-up btt-icon" aria-hidden="true"></i></a>
            </div>
        </footer> <!-- #colophon -->

    </div> <!-- #page -->

    <!-- jQuery Library -->
    <script src="../js/jquery.min.js"></script>

    <!-- Include files dependent on jQuery below -->
    
    <!-- Bootstrap Js Plugin -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- slick.min.js - carousel slider - src = https://github.com/kenwheeler/slick -->
    <script src="../js/slick.min.js"></script>

    <script src="../js/jquery.countTo.js"></script>

    <!-- jquery.waypoints.min.js - executes function when scrolling - src = http://imakewebthings.com/waypoints -->
    <script src="../js/jquery.waypoints.min.js"></script>

    <!-- Template global javascript - *Must be here!!!* -->
    <script src="../js/bitflow.js"></script>
</body>
</html>
<!-- === END FOOTER === -->
