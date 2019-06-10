<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Four Nodes CRM</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/materialadmin.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/font-awesome.min.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/material-design-iconic-font.min.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/libs/rickshaw/rickshaw.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/libs/morris/morris.core.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>theme/assets/css/theme-default/chat.css" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/libs/utils/html5shiv.js"></script>
		<script type="text/javascript" src="assets/js/libs/utils/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="dashboard.html">
									<span class="text-lg text-bold text-primary">FOUR NODES CRM</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form>
						</li>
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="<?= base_url() ?>theme/assets/img/avatar1.jpg" alt="">
								<?php if($this->session->userdata('user') == 'admin'){ ?>
								<span class="profile-info">
									Four Nodes
									<small>Administrator</small>
								</span>
								<?php }else{?>
									<span class="profile-info">
									<?= $this->session->userdata('user') ?>
									<small>Client</small>
								</span>
								<?php } ?>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><a href="<?= base_url() ?>logout"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->