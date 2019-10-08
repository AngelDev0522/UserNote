<script>
  $( "#updateProfile" ).click(function() {
    var UserID = $('#UserID').val();
    var Password = $('#password').val();
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
            $('#profileModal').modal('toggle');
          }
        },
        error : function(data) {
            // do something
        }
    });  
  });
</script>
</body>

</html>