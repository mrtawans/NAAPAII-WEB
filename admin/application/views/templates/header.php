<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ADMINISTRATOR</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/node_modules/bootstrap/dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles.css">
</head>
<body>
<?php if(($this->session->userdata('logged_in'))) { ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">NAAPAII ADMIN</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(($this->session->userdata('logged_in'))) { ?>
        <li class="active"><a href="<?php echo base_url(); ?>">Overview<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url(); ?>/Article/Dashboard">Articles Dashboard</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url(); ?>/Article/Create">Create Articles</a></li>
            <li><a href="<?php echo site_url(); ?>/Article/Manange">Manange Articles</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url(); ?>/User/Dashboard">Users Dashboard</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url(); ?>/User/Create">Create Users</a></li>
            <li><a href="<?php echo site_url(); ?>/User/Manage">Manange Users</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
      <?php if(($this->session->userdata('logged_in'))) { ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Welcome, <?php echo strtoupper($this->session->userdata('username')); ?> 
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url(); ?>/Create/Issues">Issues</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url(); ?>/User/Setting">Account Setting</a></li>
            <li><a href="<?php echo site_url(); ?>/User/Logout">Logout</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } ?>
<div class="page">