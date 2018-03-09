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

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/color-scheme-1.css">
    <link rel="stylesheet" type="text/css" href="css/color-scheme-2.css">
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
                                <img src="images/bitflow-logo.png">
                                BitFlow
                            </a>
                        </div>
                        
                        <!-- Collect the nav links and other content for toggling -->
                        <div class="collapse navbar-collapse" id="site-menu">
                            <ul class="nav navbar-nav" id="main-menu">
                                <!-- If you change any link here you will also need to change the ID of its given section -->
                                <li class="active"><a href="#page">Home</a></li>
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
            
         