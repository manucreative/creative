<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creative Admin panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('backend/assets/css/bootstrap.css');?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('backend/assets/css/font-awesome.css');?>" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url('backend/assets/js/morris/morris-0.4.3.min.css');?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('backend/assets/css/custom.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('backend/assets/css/styles.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('backend/assets/js/dataTables/datatables.net-bs4/dataTables.bootstrap4.css')?>">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('backend/tinymce/js/tinymce/skins/content/tinymce-5-dark/content.min.css') ?>"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>
<div id="overlay"></div>
<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('creative/dashboard');?>">Mr Kirui admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : Today 2023 &nbsp; <a href="<?php echo base_url('creative/admin/index/key/logOut');?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <br>
           <br>
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo base_url('backend/media/admin_images/' .$avatar);?>" class="user-image img-responsive"/>
					</li>

                    <li class="nav-item">
                            <a class="nav-link" id="dashboard-link" href="<?php echo base_url('creative/dashboard');?>">
                                <i class="fa fa-dashboard fa-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="#" id="viewService" data-action="viewService">
                                <i class="fa fa-desktop fa-2x"></i> Manage Services
                            </a>
                        </li>
                        <li class="nav-item" id="sliders-link">
                            <a class="nav-link" href="#" id="viewSliders" data-action="viewSliders">
                                <i class="fa fa-bar-chart-o fa-2x"></i> Manage Slider
                            </a>
                        </li>
                    <li class="nav-item" id="sliders-link">
                        <a class="nav-link"  href="#" id="myProfile" data-action="myProfile">
                            <i class="fa fa-user fa-2x"></i>My Profile </a>
                    </li>
                    <li class="nav-item" id="sliders-link">
                        <a class="nav-link" href="#" id="myFaqs" data-action="myFaqs">
                            <i class="fa fa-question fa-2x"></i> Manage FAQs </a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-table fa-2x"></i> Manage Portfolio </a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-money fa-2x"></i> Manage Pricing </a>
                    </li>

                    <li>
                        <a href="#" id="moreControls"><i class="fa fa-sitemap fa-3x"></i> More Controls<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                        <li class="nav-item">
                            <a class="nav-link" href="#" id="viewConfigs" data-action="viewConfigs">
                                <i class="fa fa-gear fa-2x"></i> Configurations
                            </a>
                        </li>
                        <li>
                        <a  href="#"><i class="fa fa-tag fa-3x"></i> Manage Quotes</a>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-user fa-3x"></i> Manage Blogs</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url('creative/addAdminForm');?>"><i class="fa fa-edit fa-3x"></i> Add Administrator</a>
                    </li>
                            <!-- <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li> -->
                        </ul>
                      </li>
                  <!-- <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	 -->
                </ul>
            </div>
        </nav>
        <center>
    <img src = "<?= base_Url('backend/assets/img/loader.gif')?>" id="loaderBanner" style="width: 100px; height:100px; display: none" >
    </center>
