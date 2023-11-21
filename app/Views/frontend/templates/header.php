<!DOCTYPE html>
<html ang="en">
    <head>
        <meta charset="utf-8">
        <title>Manwix -&nbsp;<?= esc($title)?> &nbsp;- Modern Artisans Network </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Emmanuel Kirui Developer website" name="keywords">
        <meta content="Emmanuel Kirui Developer website" name="description">

        <!-- Favicon -->
        <link href="<?php echo base_url('frontend/media/general_images/logos/big-red-fav.png')?>" rel="icon">

        <!-- Google Font -->
       
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="<?php echo base_url('frontend/manuu/flaticon/font/flaticon.css')?>" rel="stylesheet">  -->
        <link href="<?php echo base_url('frontend/manuu/animate/animate.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('frontend/manuu/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('frontend/manuu/lightbox/css/lightbox.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('frontend/manuu/slick/slick.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('frontend/manuu/slick/slick-theme.css')?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php  echo base_url('frontend/css/style2.css'); ?>">
        <link rel="stylesheet" href="<?php  echo base_url('frontend/css/myStyles.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('frontend/css/custom.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('frontend/css/responsive.css'); ?>">

            <!--===============================================================================================-->
	        <link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/iconic/css/material-design-iconic-font.min.css');?>">
            <!--===============================================================================================-->
                <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('backend/login/animate/animate.css');?>"> -->
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('adminResources/vendors/new/css-hamburgers/hamburgers.min.css');?>">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('backend/login/animsition/css/animsition.min.css');?>">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('backend/login/select2/select2.min.css');?>">
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('backend/login/daterangepicker/daterangepicker.css');?>">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mainLogin.css');?>">
            <!--===============================================================================================-->

         <link href="<?php echo base_url('frontend/css/style.css')?>" rel="stylesheet">
         <!-- slick -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

        <!-- Template Stylesheet -->
        
    <style>

    .main_content img {
    max-width: 500px;
    height: auto;
    padding: 10px; 
    }
    .main_content p{
        color: #000000;
    }
    </style>
    </head>

    <body>
    <div id="overlay"></div>
                    <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="logo">
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('frontend/media/general_images/logos/new-white.png')?>" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 d-none d-lg-block">
                            <div class="row">
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                        <img src="<?php echo base_url('frontend/media/general_images/coding4.png')?>" alt="Image" width="40" height="40">
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>My Linkedin profile</h3>
                                            <p><a href="https://www.linkedin.com/in/manugifted/">Find My profile here</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Contact me at;</h3>
                                            <p>+254-721827214</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Email me at</h3>
                                            <p>manwiks2@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Bar End -->
            <!-- Nav Bar Start -->
            <div class="nav-bar"style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="<?php echo base_url()?>" class="nav-link active">Home</a>
                                <a href="<?php echo base_url('team')?>" class="nav-link">Team</a>
                                <a href="<?php echo base_url('services')?>" class="nav-link">Services</a>
                                <a href="<?php echo base_url('portfolio')?>" class="nav-link">Projects</a>
                                <a href="<?php echo base_url('articles')?>" class="nav-link">Recent Articles</a>
                                <a href="<?php echo base_url('about')?>" class="nav-link">About Us</a>
                                <!-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                                    <div class="dropdown-menu">
                                        <a href="<?php echo base_url('articles')?>" class="dropdown-item">Recent Articles</a>
                                        <a href="<?php echo base_url('myPricing')?>" class="dropdown-item">My Pricing</a>
                                    </div>
                                </div> -->
                            </div> 
                            <div style="padding:2px;" class="">
                            <a href="<?php echo base_url('team/membershipForm')?>" class="btn nav-link">Become A Team Member</a>
                            </div>
                            <div style="padding:2px;" class="">
                            <a href="<?php echo base_url('contact')?>" class="btn nav-link">Contact me</a>
                            </div>
                            </div>
                    </nav>
                </div>
            </div>
    <center>
    <img src = "<?= base_Url('backend/assets/img/loader.gif')?>" id="loaderBanner" style="width: 100px; height:100px; display: none" >
    </center>
            <!-- Nav Bar End -->