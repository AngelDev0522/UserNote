<?php $this->load->view('admin/includes/header'); ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<a class="nav-link" href="<?php echo site_url('admin'); ?>">">
        <div class="sidebar-brand-icon rotate-n-15">
        <img src="<?=base_url()?>img/logo.png" class="wow fadeInUp d075" style="max-height: 50px; max-width: auto;">
        </div>
        <div class="sidebar-brand-text mx-3">UserNote</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/companies'); ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Companies</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Users</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php $this->load->view('admin/includes/nli_navbar'); ?>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
              <a href="#" data-toggle="modal" data-target="#addUser" onclick="addUser()" class="button button-blue button-small round-button modal-close button-add">Add</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>UserName</th>
                      <th>Email</th>
                      <th>CompanyName</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i = 0; $i < count($users); $i++) {?>
                      <tr>
                        <td><?php echo $i+1?></td>
                        <td><?php echo $users[$i]->user_id?></td>
                        <td><?php echo $users[$i]->email?></td>
                        <td><?php echo $users[$i]->CName?></td>
                        <td class="table-settings">
                          <a class="table-setting" data-toggle="modal" data-target="#editUser" onclick="editUser('<?php echo $users[$i]->id?>','<?php echo $users[$i]->user_id?>','<?php echo $users[$i]->email?>','<?php echo $users[$i]->CName?>')" href="#" title="Edit">
                            <i class="fas fa-book"></i></a>
                          <a class="table-setting" onclick="removeUser('<?php echo $users[$i]->id?>')" title="Remove">
                            <i class="fas fa-fw fa-trash trash-red"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view('admin/includes/modal'); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo site_url()?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo site_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo site_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo site_url()?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo site_url()?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo site_url()?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo site_url()?>js/demo/datatables-demo.js"></script>
  <script>
  function addUser()
  {
    $('#aUID').val("");
    $('#aPassword').val("");
    $('#aEmail').val("");
    $('#companyName').val("");
  }
  $( "#addUserB" ).click(function() {
    var uid = $('#aUID').val();
    var password = $('#aPassword').val();
    var email = $('#aEmail').val();
    var companyName = $('#companyName').val();
    if(uid=="")
    {
      alert("Enter UserID");
      $('#aUID').focus();
      return;
    }
    if(password=="")
    {
      alert("Enter Password");
      $('#aPassword').focus();
      return;
    }
    if(email=="")
    {
      alert("Enter Email");
      $('#aEmail').focus();
      return;
    }
    if(companyName=="")
    {
      alert("Select CompanyName");
      $('#companyName').focus();
      return;
    }
    $.ajax({
      url : "<?php echo base_url(); ?>admin/addUser",
      type : "POST",
      dataType : "json",
      data : {"uid" : uid,"password" : password,"email" : email,"companyName" : companyName},
      success : function(data) {
        alert("Successfully added.");
        $('#addUser').modal('toggle');
        window.location.href = '<?php echo site_url();?>admin/users';
      },
      error : function(data) {
          // do something
      }
    }); 
  });
  function editUser(id,uid,email,cname)
  {
    $('#aid').val(id);
    $('#eUID').val(uid);
    $('#eEmail').val(email);
    $('#ecompanyName').val(cname);
  }
  $( "#updateUser" ).click(function() {
    var id = $('#aid').val();
    var uid = $('#eUID').val();
    var email = $('#eEmail').val();
    var companyName = $('#ecompanyName').val();
    $.ajax({
      url : "<?php echo base_url(); ?>admin/updateUser",
      type : "POST",
      dataType : "json",
      data : {"id" : id,"uid" : uid,"email" : email,"companyName" : companyName},
      success : function(data) {
        alert("Successfully updated.");
        $('#editUser').modal('toggle');
        window.location.href = '<?php echo site_url();?>admin/users';
      },
      error : function(data) {
          // do something
      }
    }); 
  });
  function removeUser(id)
  {
    $.ajax({
      url : "<?php echo base_url(); ?>admin/removeUser",
      type : "POST",
      dataType : "json",
      data : {"id" : id},
      success : function(data) {
        alert("Successfully removed.");
        window.location.href = '<?php echo site_url();?>admin/users';
      },
      error : function(data) {
          // do something
      }
    }); 
  }
  </script>
<?php $this->load->view('admin/includes/footer'); ?>
