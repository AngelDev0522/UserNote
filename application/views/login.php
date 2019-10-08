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
  <link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('css/logindemo.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('css/tablesorter.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Le fav and touch icons -->
  <link href="<?php echo base_url('css/ico/favicon.ico'); ?>" rel="shortcut icon">
</head>
<body class="blue-background">
<div class="container">
<br />
<div class="content parentbackground logintitle" style="display:none">
  <div class="row parentbackground blank">
  </div>
	<div class="row parentbackground">
    <img src="<?=base_url()?>img/logo.png" class="wow fadeInUp d075" style="max-height: 100px; max-width: auto;">
		<h2 class="logo_title">DRIFTVERKTYG</h2>
	</div>
  <div class="row parentbackground">
    <!-- <div class="span4"> -->
      <form class="well parentbackground" action="<?php echo site_url('user/login'); ?>" method="post" accept-charset="utf-8">
        <input type="text" class="form-control" name="UserID" placeholder="UserID" required maxlength="40" autofocus />
        <input type="password" class="form-control" name="pwd" placeholder="Password" required maxlength="20" />
        <button type="submit" class="btn btn-success btn-block">
        <i class="icon-home icon-white"></i> Log in</button>
      </form>
    <!-- </div> -->
  </div>
  <?php if (isset($error)): ?>
  <div class="row">
    <div class="span4">
      <div class="alert alert-error">
        <strong>Login</strong> failed!.
      </div>
    </div>
  </div>
  <?php else: ?>
  <!-- <div class="row">
    <div class="span4">
      <div class="alert alert-info">
        <small>Registrera dig här &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
        <a href="<?php echo site_url('signup'); ?>" class="btn btn-info"><i class="icon-arrow-right icon-white"></i> Registera dig nu</a>
      </div>
    </div>
  </div> -->
  <?php endif; ?>
  <div class="row">
   
  </div>
</div>
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script>
$(document).ready(function() {
  $('.content').fadeIn(1000);
});
</script>
  <footer>
    <!-- <p>&copy; 2013 LoginDemo</p> -->
  </footer>
</div><!-- /container -->
</body>
</html>

