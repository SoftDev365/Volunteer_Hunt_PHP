<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('asset/admin');?>assets/images/favicon.png">
    <title>Real Sur</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/jplayer.flat.css" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/');?>dist/css/pages/user-card.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/');?>dist/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/');?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/admin/');?>assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="<?php echo base_url('assets/admin/');?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body class="skin-megna fixed-layout">
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b>
                            <img src="<?php echo base_url('assets/front//images/logo/dark-logo.png') ?>" alt="homepage" class="dark-logo" style="width: 110px;" />
                            <img src="<?php echo base_url('assets/front//images/logo/dark-logo.png') ?>" alt="homepage" class="light-logo"  style="width: 110px;"/>
                        </b>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/admin/') ?>assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->producer_name;?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a href="pages-login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>