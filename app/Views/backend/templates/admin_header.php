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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">a
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('creative/admin/dashboard/index/key/'.$session_key);?>">Mr Kirui admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : Today 2023 &nbsp; <a href="<?php echo base_url('creative/admin/logOut/index/key');?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                            <a class="nav-link" id="dashboard-link" href="<?php echo base_url('creative/admin/dashboard/index/key/'.$session_key);?>">
                                <i class="fa fa-dashboard fa-2x"></i> Dashboard
                            </a>
                        </li>
              <!-- Profile Controls -->
              <li>
            <a href="#" id="manageProfile"><i class="fa fa-sitemap fa-3x"></i> Manage Profile<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if($role == 'super_admin'): ?>
                        <li class="nav-item" id="sliders-link">
                             <a class="nav-link"  href="#" id="allUsers" data-action="allUsers">
                            <i class="fa fa-user fa-2x"></i>All Admins </a>
                        </li>

                     <!-- <li class="nav-item" id="sliders-link">
                        <a  href=""id="addAdmin" data-action="addAdmin">
                        <i class="fa fa-edit fa-2x"></i> Add Administrator</a>
                    </li> -->
                <?php endif?>
                    <?php if($role === 'super_admin' || $role === 'admin' || $role === 'user'):?>
                         <li class="nav-item" id="sliders-link">
                            <a class="nav-link"  href="#" id="myProfile" data-action="myProfile">
                         <i class="fa fa-user fa-2x"></i>My Profile </a>
                 </li>
                 <?php endif ?>
            </ul>
            </li>

                <!-- Service Control -->
            <li>
            <a href="#" id="manageServices"><i class="fa fa-sitemap fa-3x"></i> Manage Service<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                <?php if($role === 'super_admin'): ?>
                                <li class="nav-item" >
                                    <a class="nav-link" href="#" id="viewService" data-action="viewService">
                                        <i class="fa fa-desktop fa-2x"></i> Manage All Services
                                    </a>
                                </li>
                         <?php endif ?>
                                <?php if($role === 'super_admin' || $role === 'admin' || $role === 'user'):?>
                                <li class="nav-item" >
                                    <a class="nav-link" href="#" id="viewMyServices" data-action="viewMyServices">
                                        <i class="fa fa-desktop fa-2x"></i> Manage My Services
                                    </a>
                                </li>
                                <?php endif?>

            </ul>
            </li>
                            <?php if($role === 'super_admin' || $role === 'admin' || $role === 'user'):?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" id="viewConfigs" data-action="viewConfigs">
                                                <i class="fa fa-gear fa-2x"></i> Configurations
                                            </a>
                                        </li>
                            <?php endif ?>

                <!-- Service Blogs -->
                <li>
            <a href="#" id="manageServices"><i class="fa fa-sitemap fa-3x"></i> Manage Blogs<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                <?php if($role === 'super_admin'): ?>
                                <li class="nav-item" >
                                    <a class="nav-link" href="#" id="viewAllBlogs" data-action="viewAllBlogs">
                                        <i class="fa fa-desktop fa-2x"></i> Manage All Blogs
                                    </a>
                                </li>
                        <?php endif ?>
                                <?php if($role === "super_admin" || $role === "admin"):?>
                                <li class="nav-item" >
                                    <a class="nav-link" href="#" id="viewMyBlogs" data-action="viewMyBlogs">
                                        <i class="fa fa-desktop fa-2x"></i> Manage My Blogs
                                    </a>
                                </li>
                                <?php endif?>
                            
            </ul>
            </li>

            <?php if($role === 'super_admin'): ?>
                        <li class="nav-item" id="sliders-link">
                            <a class="nav-link" href="#" id="viewSliders" data-action="viewSliders">
                                <i class="fa fa-bar-chart-o fa-2x"></i> Manage Slider
                            </a>
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

                    
                        <li>
                        <a  href="#"><i class="fa fa-tag fa-3x"></i> Manage Quotes</a>
                    </li>
                    
                        </ul>
                      </li>
                      <?php endif?>
                </ul>
            </div>
        </nav>
        <center>
    <img src = "<?= base_Url('backend/assets/img/loader.gif')?>" id="loaderBanner" style="width: 100px; height:100px; display: none" >
    </center>
