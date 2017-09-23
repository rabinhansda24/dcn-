<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->

    <?php



   	 dbconnect();
   	 //$boxid = mc_decrypt($_GET['boxid'], ENCRYPTION_KEY);
     $boxid = $_GET['boxid'];
   	 //echo $boxid;
   	 $sql = "SELECT * FROM users WHERE boxid = '".$boxid."'";
   	 $res = mysqli_query($conn, $sql);
   	 $rec = mysqli_fetch_assoc($res);


    ?>
    <section class="content">
    	<div class="row">
    		<div class="col-sm-7">
    			<div class="box box-solid box-info">
    				<div class="box-header with-border">
              		<h3 class="box-title">User Details</h3>
            	</div>
            	<div class="box-body">
            		<table id="example2" class="table table-bordered table-hover">

        					<tr>
                        <td>
                          Box Id:
                        </td>
								        <td><?php echo $rec["boxid"]; ?></td>


        					</tr>
                  <tr>
                    <td>
                      Vc No.:
                    </td>
                    <td>
                    <?php echo $rec["vcno"]; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Name:
                    </td>
                    <td>
                    <?php echo $rec["name"]; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Address:
                    </td>
                    <td>
                    <?php echo $rec["address"]; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Phone:
                    </td>
                    <td>
                    <?php echo $rec["phone"]; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      User Type:
                    </td>
                    <td>
                    <?php echo $rec["type"]; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Plan:
                    </td>
                    <td>
                    <?php
                    $sql2 = "SELECT * FROM plan WHERE planname = '".$rec["plan"]."'";
                    $res2 = mysqli_query($conn, $sql2);
                    //echo $sql2;
                    //echo $res2;
                    if ($rec2 = mysqli_fetch_assoc($res2)) {
                      echo $rec2["planname"] . ' ( &#x20B9;' .$rec2["price"]. ')';
                    }
                     ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Email:
                    </td>
                    <td>
                    <?php echo $rec["email"]; ?>
                    </td>
                  </tr>
              		</table>
            	</div>
    			</div>
    		</div>
    	</div>
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
