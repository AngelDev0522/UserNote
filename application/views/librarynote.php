<?php $this->load->view('includes/header'); ?>
<div class="navbar navbar-dark blue-background">  
  <a href="<?php echo site_url('dashboard'); ?>" class="nav-logout logo_title"><i class="fa fa-th pull-right"></i></a>
  <a class="navbar-brand" href="#">Driftverktyg</a>
  <a href="<?php echo site_url('dashboard/createnote'); ?>" class="nav-logout logo_title"><i class="fas fa-plus pull-right"></i></a>
</div>
<div class="container white-back">
  <ul class="nav nav-tabs">
    <li class="nav-item">      
      <a class="nav-link active" data-toggle="tab" href="#home"><i class="fas fa-file-alt"></i>  Notiser</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1"><i class="fa fa-archive"></i>  Arkiverade</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <!-- <div class="input-group m-b"><span class="input-group-addon">@</span> <input type="text" placeholder="Username" class="form-control"></div> -->
      <div id="tab-1" class="tab-content active-tab-content" style="display: block;">
        <div class="store-item-list">
          <?php for($i = 0; $i < count($noneArchieved); $i++) {
          ?>
            <a href="#myModal" data-toggle="modal" class="simple-modal" id="<?php echo $noneArchieved[$i]->id?>" onclick="noneArchieved('<?php echo $noneArchieved[$i]->id?>')">
                <img src="<?=base_url()?>uploads/<?php echo $noneArchieved[$i]->imgurl?>" alt="img">
                <strong><?php echo $noneArchieved[$i]->title?></strong>
                <em>
                  <?php echo $noneArchieved[$i]->notis?><br><?php echo $noneArchieved[$i]->created_at?>
                </em>
                <span>
                  <?php if($noneArchieved[$i]->new == 1){?>
                    <u class="bg-blue-light"><i class="fa fa-exclamation-circle"></i></u><br>
                  <?php } ?>
                  <?php if($noneArchieved[$i]->new == 0){?>
                    <u class="bg-green-dark"><i class="fa fa-check"></i></u><br>
                  <?php } ?>
                  <?php if($noneArchieved[$i]->error == 1){?>
                    <u class="bg-orange-dark"><i class="fas fa-ticket-alt"></i></u><br>
                  <?php } ?>
                </span>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div id="tab-2" class="tab-content" style="display: block;">
        <div class="store-item-list">
        <?php for($i = 0; $i < count($archieved); $i++) {
          ?>
          <a href="#myModal" data-toggle="modal" class="simple-modal" id="<?php echo $archieved[$i]->id?>" onclick="archieved('<?php echo $archieved[$i]->id?>')">
              <img src="<?=base_url()?>uploads/<?php echo $archieved[$i]->imgurl?>" alt="img">
              <strong><?php echo $archieved[$i]->title?></strong>
              <em>
                <?php echo $archieved[$i]->notis?><br><?php echo $archieved[$i]->created_at?>
              </em>
              <span>
                <u class="label bg-red-dark"><i class="fa fa-archive"></i></u><br>
                <?php if($archieved[$i]->new == 1){?>
                  <u class="bg-blue-light"><i class="fa fa-exclamation-circle"></i></u><br>
                <?php } ?>
                <?php if($archieved[$i]->new == 0){?>
                  <u class="bg-green-dark"><i class="fa fa-check"></i></u><br><br>
                <?php } ?>
                <?php if($archieved[$i]->error == 1){?>
                  <u class="bg-orange-dark"><i class="fas fa-ticket-alt"></i></u><br>
                <?php } ?>
              </span>
          </a>
        <?php } ?>
        </div>
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
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <img id="mimg" src="<?=base_url()?>img/1.jpg" alt="img">
          <input id="mid" type="text" style="display:none;">
          <div class="settingsWrapper">
            <p id="settingsButton" onclick="settingvisible()" class="bg-blue-light color-white"><span id="settingsButtonTextOff" style="display: inline;"><i class="fa fa-sliders"></i> Inställningar för notis</span><span id="settingsButtonTextOn" style="display: none;"><i class="fa fa-times"></i> Dölj inställningar</span></p>
            <table id="settingsBox" cellspacing="0" class="table" style="display: none;">
              <tbody>
                <tr>
                  <td class="table-sub-title">Status <span style="font-weight: normal;">(Arkivera)</span><!--<br><span style="font-weight: normal;">(Arkivera notis)</span>--></td>
                  <td>
                    <div class="lcs_wrap"><input id="switchButtonStatus" type="checkbox" name="switchButtonStatus" value="1" class="lcs_check" autocomplete="off"><div class="lcs_switch lcs_status  lcs_off lcs_checkbox_switch"><div class="lcs_cursor"><i class="fa fa-check color-green-light" style="display: none;"></i></div><div class="lcs_label lcs_label_on">Arkiverad</div><div class="lcs_label lcs_label_off">NY!</div></div></div>
                  </td>
                </tr>
                <tr class="multi-row-upper">
                  <td class="table-sub-title">Felanmäld?</td>
                  <td>
                    <div class="lcs_wrap"><input id="switchButtonErrorTicket" type="checkbox" name="switchButtonErrorTicket" value="2" class="lcs_check" autocomplete="off"><div class="lcs_switch undefined  lcs_off lcs_checkbox_switch"><div class="lcs_cursor"><i class="fa fa-check color-green-light" style="display: none;"></i></div><div class="lcs_label lcs_label_on">JA</div><div class="lcs_label lcs_label_off">NEJ</div></div></div>
                  </td>
                </tr>
                <tr id="switchButtonErrorTicketBox" class="multi-row-lower" style="display: none;">
                  <td class="table-sub-title" colspan="2">
                    AO-nummer på felanmäla (som ref.)
                    <input id="referenceN" class="text-field" type="text" placeholder="31056">
                  </td>
                </tr>
                <tr class="multi-row-upper">
                  <td class="table-sub-title">Publik?</td>
                  <td>
                    <div class="lcs_wrap"><input id="switchButtonMakePublic" type="checkbox" name="switchButtonMakePublic" value="3" class="lcs_check" autocomplete="off"><div class="lcs_switch undefined  lcs_off lcs_checkbox_switch"><div class="lcs_cursor"><i class="fa fa-check color-green-light" style="display: none;"></i></div><div class="lcs_label lcs_label_on">JA</div><div class="lcs_label lcs_label_off">NEJ</div></div></div>
                  </td>
                </tr>
                <tr id="switchButtonMakePublicBox" class="multi-row-lower" style="display: none;">
                  <td class="table-sub-title" colspan="2">
                    Publik länk för denna notis
                    <input id="publicLink" class="text-field" type="text" placeholder="http://opkit48/note/X5YU57D">
                    <a href="#" class="button button-blue bbutton-small round-button">Kopiera länken till urklipp</a>
                  </td>
                </tr>
                <tr>
                  <td class="table-sub-title" colspan="2">
                    Maila notisen till:
                    <input id="email" class="text-field" type="text" placeholder="dan@frontneck.se">
                    <a href="#" class="button button-blue bbutton-small round-button">Skicka</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="menu1" class="mcontainer tab-pane active">
            <div class="icon-field">
                <i class="fa fa-barcode"></i>
                <input type="text" id="kks" style="display:none;" class="text-field green-field form-control" name="kks" placeholder="KKS" required="" maxlength="40" autofocus="">
            </div>
            <div class="icon-field">
                <i class="fa fa-header"></i>
                <input type="text" id="titlek" class="text-field green-field form-control" name="title" placeholder="Title" required="" maxlength="40" autofocus="">
            </div>
            <div class="icon-field">
              <i class="fa fa-comment"></i>
              <textarea id="notisk" class="text-field noteTextarea form-control" rows="5" name="notis" placeholder="Notis"></textarea>
            </div>
          </div>
          <a href="#" onclick="saveValues()" class="button button-red button-small round-button modal-close button-center">Save $ Close</a>
          <a href="#" onclick="removeItem()" class="button-center color-gray-dark" onclick="deleteItem('001')"><i class="fa fa-trash"></i> Radera notis</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/lc_switch.js"></script>
<script>
$(document).ready(function() {
  $('.content').fadeIn(1000);  
  $('input').lc_switch();
  $(document).on('lcs-statuschange', '.lcs_check', function() {
    var status 	= ($(this).is(':checked')) ? 'checked' : 'unchecked',
        subj 	= $(this).attr('name');
    if(subj == "switchButtonStatus")
    {
      if(status == "checked")
      {}
      else
      {}
    }
    if(subj == "switchButtonErrorTicket") 
    {
      if(status == "checked")
      {
        $('#switchButtonErrorTicketBox').css('display', 'table-row');
      }
      else
      {
        $('#switchButtonErrorTicketBox').css('display', 'none');
      }
    }
    if(subj == "switchButtonMakePublic") 
    {
      if(status == "checked")
      {
        $('#switchButtonMakePublicBox').css('display', 'table-row');
      }
      else
      {
        $('#switchButtonMakePublicBox').css('display', 'none');
      }
    }
  });
});
function formatModal()
{
  $('#switchButtonStatus').lcs_off();
  $('#switchButtonErrorTicket').lcs_off();
  $('#switchButtonMakePublic').lcs_off();
  $('#referenceN').val("");
  $('#publicLink').val("");
  $('#email').val("");
  $('#settingsBox').css('display', 'none');
  $('#settingsButtonTextOff').css('display', 'inline');
  $('#settingsButtonTextOn').css('display', 'none');
  $('#kks').css('display', 'none');
  $('#kks').val("");
  $('#titlek').val("");
  $('#notisk').val("");
}
function setModalValues(data)
{
  $('#titlek').val(data['title']);
  $('#notisk').val(data['notis']);
  if(data['kks']!="")
  {
    $('#kks').css('display', 'block');
    $('#kks').val(data['kks']);
  }
  if(data['archived']==1)
  {
    $('#switchButtonStatus').lcs_on();
  }
  if(data['error']==1)
  {
    $('#switchButtonErrorTicket').lcs_on();
    $('#referenceN').val(data['referenceN']);
  }
  if(data['public']==1)
  {
    $('#switchButtonMakePublic').lcs_on();
    $('#publicLink').val(data['purl']);
  }
  $('#email').val(data['email']);
  var imgsrc = "<?=base_url()?>uploads/"+data['imgurl'];
  $("#mimg").attr("src",imgsrc);

}
function removeItem()
{
  var id = $('#mid').val();
  $.ajax({
    url : "<?php echo base_url(); ?>Notes/removeItem",
    type : "POST",
    dataType : "json",
    data : {"id" : id},
      success : function(data1) {
        console.log(data1);
        if(data1==true)
        {
          alert("Successfully removed.");
          $('#myModal').modal('toggle');
          window.location.href = '<?php echo site_url();?>Notes/librarynote';
        }
      },
      error : function(data) {
          // do something
      }
  });  
}
function saveValues()
{
  var kks = $('#kks').val();
  var title = $('#titlek').val();
  var notis = $('#notisk').val();
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
  var archieved = ($('#switchButtonStatus').is(':checked')) ? '1' : '0';
  var error = ($('#switchButtonErrorTicket').is(':checked')) ? '1' : '0';
  var publics = ($('#switchButtonMakePublic').is(':checked')) ? '1' : '0';
  var referenceN = "";
  var publicLink = "";
  var email = "";
  if(error == 1)
    referenceN = $('#referenceN').val();
  else
    referenceN = "";
  if(publics == 1)
    publicLink = $('#publicLink').val();
  else
    publicLink = "";
  var email = $('#email').val();
  var id = $('#mid').val();
  $.ajax({
    url : "<?php echo base_url(); ?>Notes/updateItem",
    type : "POST",
    dataType : "json",
    data : {"id" : id,
      "kks" : kks,
      "title" : title,
      "notis" : notis,
      "archieved" : archieved,
      "error" : error,
      "publics" : publics,
      "referenceN" : referenceN,
      "publicLink" : publicLink,
      "email" : email},
      success : function(data1) {
        console.log(data1);
        if(data1==true)
        {
          alert("Successfully updated.");
          $('#myModal').modal('toggle');
          window.location.href = '<?php echo site_url();?>Notes/librarynote';
        }
      },
      error : function(data) {
          // do something
      }
  });  
  // alert(status);
  // alert("save & close");
}
function noneArchieved(id)
{
  $('#mid').val(id);
  formatModal();
  $.ajax({
    url : "<?php echo base_url(); ?>Notes/getItem",
    type : "POST",
    dataType : "json",
    data : {"id" : id},
    success : function(data) {
      setModalValues(data);
    },
    error : function(data) {
        // do something
    }
  });  
}
function archieved(id)
{
  $('#mid').val(id);
  formatModal();
  $.ajax({
    url : "<?php echo base_url(); ?>Notes/getItem",
    type : "POST",
    dataType : "json",
    data : {"id" : id},
    success : function(data) {
      setModalValues(data);
    },
    error : function(data) {
        // do something
    }
  });
}
var state = 0;
function settingvisible()
{
  var contents = $('#contents');
  if(state==0)
  {
    $('#settingsBox').css('display', 'table');
    $('#settingsButtonTextOff').css('display', 'none');
    $('#settingsButtonTextOn').css('display', 'inline');
    state = 1;
  }
  else
  {
    $('#settingsBox').css('display', 'none');
    $('#settingsButtonTextOff').css('display', 'inline');
    $('#settingsButtonTextOn').css('display', 'none');
    state = 0;
  }
}
</script>
<?php $this->load->view('includes/footer'); ?>
