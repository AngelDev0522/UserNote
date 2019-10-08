<?php $this->load->view('includes/header'); ?>
<div class="navbar navbar-dark blue-background">  
  <a href="<?php echo site_url('dashboard'); ?>" class="nav-logout logo_title"><i class="fa fa-th"></i></a>
  <a class="navbar-brand" href="#">Driftverktyg</a>
  <a href="<?php echo site_url('dashboard/librarynote'); ?>" class="nav-logout logo_title"><i class="fa fa-book pull-right"></i></a>
</div>
<div class="container white-back">
  <ul class="nav nav-tabs">
    <li class="nav-item">      
      <a class="nav-link active" data-toggle="tab" href="#home"><i class="fas fa-file-alt"></i>  Textnotis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1"><i class="fa fa-industry"></i>  Objektsnotis</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div id="home" class="container tab-pane active">
        <br>
        <!-- <div class="input-group m-b"><span class="input-group-addon">@</span> <input type="text" placeholder="Username" class="form-control"></div> -->
        <div class="icon-field">
            <i class="fa fa-header"></i>
            <input type="text" id="title" class="text-field green-field form-control" name="title" placeholder="Title" required maxlength="40" autofocus />
        </div>
        <div class="icon-field">
          <i class="fa fa-comment"></i>
          <textarea id="notis" class="text-field noteTextarea form-control" rows="5" name="notis" placeholder="Notis" id="comment"></textarea>
        </div>
        <div class="upload-btn-wrapper">
            <button class="button button-big button-icon"><i class="fa fa-camera"></i>Bifoga bild</button>
            <input id="file" type="file" name="myfile">
        </div>
        <div class="upload-btn-wrapper">
          <button id = "saveNote" class="button button-big button-icon button-save"><i class="fa fa-check"></i>Spara</button>
        </div>
      </div>
      <div id="menu1" class="container tab-pane">
        <div class="icon-field">
            <i class="fa fa-barcode"></i>
            <input type="text" id="kks" class="text-field green-field form-control" name="kks" placeholder="KKS" required maxlength="40" autofocus />
        </div>
        <div class="icon-field">
            <i class="fa fa-header"></i>
            <input type="text" id="titlek" class="text-field green-field form-control" name="title" placeholder="Title" required maxlength="40" autofocus />
        </div>
        <div class="icon-field">
          <i class="fa fa-comment"></i>
          <textarea id="notisk" class="text-field noteTextarea form-control" rows="5" name="notis" placeholder="Notis" id="comment"></textarea>
        </div>
        <div class="upload-btn-wrapper">
            <button class="button button-big button-icon"><i class="fa fa-camera"></i>Bifoga bild</button>
            <input id="filek" type="file" name="myfile">
        </div>
        <div class="upload-btn-wrapper">
            <button id = "saveNoteK" class="button button-big button-icon button-save"><i class="fa fa-check"></i>Spara</button>
        </div>
      </div>
  </div>
</div>
<div class="note-col">
  <p>Har du synpunkter pa webappen?</p>
  <p>Gor ett supportarende genom att klicka har</p>
  <hr>
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
$( "#saveNote" ).click(function() {
  var title = $('#title').val();
  var notis = $('#notis').val();
  if(title=="")
  {
    alert("Insert Title.");
    $('#titlek').focus();
    return;
  }
  if(notis=="")
  {
    alert("Insert Notis.");
    $('#notisk').focus();
    return;
  }
  var formData = new FormData();

  formData.append("title", title);
  formData.append("notis", notis); // number 123456 is immediately converted to a string "123456"

  // HTML file input, chosen by user
  if(($('#file').prop('files')).length!=0)
    formData.append("file", $('#file').prop('files')[0]);
  // else
  // {
  //   formData.append("file", $('#file').prop('files')[0]);
  // }
  // var url = '<?php echo site_url();?>Notes/savenote';
  $.ajax({
      type:'POST',
      url:'<?php echo site_url();?>Notes/savenote',
      data:formData,
      dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        if(data=="true")
        {
          alert("Successfully Added.");
          window.location.href = '<?php echo site_url();?>Notes/createnote';
        }
        else{
          alert("DB Insert Error.");
        }
      }
  });
});
$( "#saveNoteK" ).click(function() {
  var kks = $('#kks').val();
  var title = $('#titlek').val();
  var notis = $('#notisk').val();
  if(kks=="")
  {
    alert("Insert KKS.");
    $('#kks').focus();
    return;
  }
  if(title=="")
  {
    alert("Insert Title.");
    $('#titlek').focus();
    return;
  }
  if(notis=="")
  {
    alert("Insert Notis.");
    $('#notisk').focus();
    return;
  }
  var formData = new FormData();

  formData.append("kks", kks);
  formData.append("title", title);
  formData.append("notis", notis); // number 123456 is immediately converted to a string "123456"

  // HTML file input, chosen by user
  if(($('#filek').prop('files')).length!=0)
    formData.append("file", $('#filek').prop('files')[0]);
    
  // var url = '<?php echo site_url();?>Notes/savenote';
  $.ajax({
      type:'POST',
      url:'<?php echo site_url();?>Notes/savenotek',
      data:formData,
      dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        if(data=="true")
        {
          alert("Successfully Added.");
          window.location.href = '<?php echo site_url();?>Notes/createnote';
        }
        else{
          alert("DB Insert Error.");
        }
      }
  });
});
</script>
<?php $this->load->view('includes/footer'); ?>
