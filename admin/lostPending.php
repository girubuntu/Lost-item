
<?php
 session_start();
 require('../config/config.php');
 require('../config/db.php');

 $lost_query = "SELECT * FROM lost_item ORDER BY created_at DESC";
 $found_query = "SELECT * FROM founditem ORDER by created_at DESC";
 $user_query = "SELECT * FROM userlogin ORDER by created_at DESC";
//  $pending_query = "SELECT * FROM lost_item ORDER by created_at DESC WHERE verify='false'";
//  $pending_query2 = "SELECT * FROM founditem ORDER by created_at DESC WHERE verify='false'";

 

 $lost_result = mysqli_query($conn, $lost_query);

 $found_result = mysqli_query($conn, $found_query);
 $user_result = mysqli_query($conn, $user_query);
//  $pending_result = mysqli_query($conn, $pending_query);
//  $pending_result2 = mysqli_query($conn, $pending_query2);
 
 $lost_count = mysqli_num_rows($lost_result);

 $found_count = mysqli_num_rows($found_result );
 $user_count = mysqli_num_rows($user_result );
//  $pendig_count = $pending_result-> mysqli_num_rows();
//  $pendig_count2 = $pending_result2-> mysqli_num_rows();

//  $pending_total = $pendig_count + $pendig_count2;

// echo $pending_total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../img/irihano.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IRIHANO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info d-flex">
        <i class="fas fa-user w-auto"></i>
          <div>
                <a href="https://irihanolostandfound.herokuapp.com/login.php" class="d-block ml-3">LOG OUT</a>
          </div>
        
        </div>
      </div> 
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="all_lost_item.php" class="d-block">Lost Items</a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="all_found_item.php" class="d-block">Found Items</a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="all_users.php" class="d-block">Users</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pending Actions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="foundPending.php" class="nav-link">
                <i class="fas fa-arrow-circle-right"></i>
                  <p>Found Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-arrow-circle-right"></i>
                  <p>Lost Item</p>
                </a>
              </li>
            </ul>
          </li>
         
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="modal fade" id="addLostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Lost Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_POST['approveUserBtn'])) {
  
  $user_id = $_POST['user_id'];
  
  
  $query = "UPDATE lost_item SET verify='approved' WHERE item_id ='$user_id'";
  $result = mysqli_query($conn, $query);
  if($result) {
    $_SESSION['status'] = 'approve complete!';
    
  } else {
    $_SESSION['status'] = 'approve failed!';
    // header(" Location: all_found_tem.php");
  }
}
?>

<!-- approve modal-->
<div class="modal fade" id="approveUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="user_id" class="approveBtn">
          <p>Are you sure, you want to approve this user? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="approveUserBtn" class="btn btn-primary">approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- view modal-->
<div id="viewUserModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View item details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

        <div class="viewModalBody">
          
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
  </div>
</div>
</div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lost Items</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Item name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>incident_date</th>
                    <th>Province</th>
                    <th>status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query = "SELECT * FROM lost_item WHERE verify='pending'";
                      $data = mysqli_query($conn, $query);

                      if(mysqli_num_rows($data) > 0 ) {
                        foreach($data as $row) {
                          ?>
                            <tr>
                                <td><?php echo $row['item_name'] ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['brand'] ?></td>
                                <td><?php echo $row['incident_date'] ?></td>
                                <td><?php echo $row['province'] ?></td>
                                <td><?php echo $row['verify'] ?></td>
                                <td>
                                <button type="button" value="<?php echo $row['item_id'];?>" class="btn btn-success btn-sm approveBtn">Approve</button>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <button type="button" value="<?php echo $row['item_id'];?>" class="btn btn-info btn-sm viewBtn">View item details</button>
                              </td>
                            </tr>
                            <?php
                        }
                      } else {
                        ?>
                          <tr>
                            <td>No record found</td>
                          </tr>
                          <?php
                      }
                    ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script>
  $(document).ready(function() {
    $('.approveBtn').click(function (e) {
      e.preventDefault();

      var user_id = $(this).val();

      $('.approveBtn').val(user_id);
      $('#approveUserModal').modal('show');
    })
  });
</script>

<script>
  $(document).ready(function() {
    $('.viewBtn').click(function (e) {
      e.preventDefault();
      
      var view_id = $(this).val();

      $.ajax({
        url: "pendingLostViewCode.php",
        type: "post",
        data: {
          view_id: view_id,
        },
        success: function (data) {
          $('.viewModalBody').html(data);
          $('#viewUserModal').modal("show");          
        }
      });
      
      
    });
  });
</script>
</body>
</html>
