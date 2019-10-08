<?php $this->load->view('includes/header'); ?>
<div class="navbar navbar-dark blue-background">  
  <a href="<?php echo site_url('dashboard'); ?>" class="nav-logout logo_title"><i class="fa fa-th"></i></a>
  <a class="navbar-brand" href="#">Driftverktyg</a>
  <a href="<?php echo site_url('dashboard/librarynote'); ?>" class="nav-logout logo_title"><i class="fa fa-book pull-right"></i></a>
</div>
<div class="container white-back">
  <div id="home" class="container tab-pane profile">
    <br>
    <!-- <div class="input-group m-b"><span class="input-group-addon">@</span> <input type="text" placeholder="Username" class="form-control"></div> -->
    <div class="icon-field">
      <input type="text" id="UserID" class="green-field form-control" name="UserID" placeholder="UserID" required maxlength="40" autofocus />
    </div>
    <br>
    <div class="icon-field">
      <input type="password" id="password" class="green-field form-control" name="password" placeholder="Password" required maxlength="40" autofocus />
    </div>
    <br>
    <div class="upload-btn-wrapper">
      <button id = "updateProfile" class="button button-big button-icon button-savepro"><i class="fa fa-check"></i>Spara</button>
    </div>
  </div>
</div>
<div class="note-col">
  <p href="#" class="btn">
    <i class="fas fa-copyright"></i>Driftverktyg
  </p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  $('.content').fadeIn(1000);
});
$( "#updateProfile" ).click(function() {
  var UserID = $('#UserID').val();
  var Password = $('#password').val();
  if(UserID=="")
  {
    alert("Insert UserID.");
    $('#UserID').focus();
    return;
  }
  if(Password=="")
  {
    alert("Insert password.");
    $('#password').focus();
    return;
  }
  $.ajax({
    url : "<?php echo base_url(); ?>User/updateProfile",
    type : "POST",
    dataType : "json",
    data : {"UserID" : UserID,"Password" : Password},
      success : function(data1) {
        console.log(data1);
        if(data1==true)
        {
          alert("Successfully updated.");
        }
      },
      error : function(data) {
          // do something
      }
  });  
});
</script>
<?php $this->load->view('includes/footer'); ?>
