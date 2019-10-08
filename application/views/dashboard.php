<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LoginDemo</title>
  <meta name="description" content="A simpple app demonstrating a login">
  <meta name="author" content="">
  <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  <!-- Le styles -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="<?php echo base_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('css/logindemo.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('css/tablesorter.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Le fav and touch icons -->
  <link href="<?php echo base_url('css/ico/favicon.ico'); ?>" rel="shortcut icon">
</head>
<body class="blue-background">
<div class="navbar navbar-dark">
  <a class="navbar-brand" href="#">Driftverktyg</a>
  <a href="<?php echo site_url('user/logout'); ?>" class="nav-logout logo_title"><i class="fas fa-sign-out-alt pull-right"></i></a>
</div>
<hr>
<div class="container">
  <div class="row dash-padding">
    <div class="col-4 dash-col">
      <a href="<?php echo site_url('dashboard/createnote'); ?>" class="btn dash-menu logo_title">
        <i class="fas fa-plus pull-right icon-blue"></i>
      </a>
    </div>
    <div class="col-4 dash-col">
      <a href="<?php echo site_url('dashboard/librarynote'); ?>" class="btn dash-menu logo_title">
        <i class="fas fa-book pull-right icon-blue"></i>
      </a>
    </div>
    <div class="col-4 dash-col">
      <a href="#" class="btn dash-menu logo_title">
        <i class="fas fa-exchange-alt pull-right icon-blue"></i>
      </a>
    </div>
  </div>
  <div class="row dash-padding">
  <div class="col-4 dash-col">
      <a href="<?php echo site_url('dashboard/profile'); ?>" class="btn dash-menu logo_title">
        <i class="fas fa-user pull-right icon-blue"></i>
      </a>
    </div>
    <div class="col-4 dash-col">
      <a href="#" class="btn dash-menu logo_title">
        <i class="fas fa-bookmark pull-right icon-blue"></i>
      </a>
    </div>
    <div class="col-4 dash-col">
      <a href="#" class="btn dash-menu logo_title">
        <i class="fas fa-ticket-alt pull-right icon-blue"></i>
      </a>
    </div>
  </div>
</div>
<hr>
<div class="dash-col">
  <a href="#" class="btn logo_title">
    <i class="fas fa-copyright"></i>Driftverktyg
  </a>
</div>
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script>
$(document).ready(function() {
  $('.content').fadeIn(1000);
});
</script>
<?php $this->load->view('includes/footer'); ?>
