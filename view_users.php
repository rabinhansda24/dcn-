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
    <section class="content">
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="box">
    				<div class="box-header">
    					Enter Box ID
    				</div>
    				<div class="box-body">
    					<div class="">
    						<div class="form-group">
                  		<label for="boxid" class="col-sm-2 control-label">Box ID</label>

                  		<div class="col-sm-10">
                    			<input type="text" id="barcodeValue" onchange="getUser();" class="form-control" id="boxid" name="boxid" placeholder="Box ID">
                  		</div>
                		</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<script type="text/javascript" >
    			function getUser() {
					var boxid = $("#barcodeValue").val();

					var data = "boxid=" + boxid;
					$.ajax({
						url:'getUserdetail.php',
						type:'GET',
						data:data,

						success: function (data) {


							$("#user").removeClass("hideuser");
							$("#user").addClass("showuser");
							$("#muser").html(data)

						},
					});
    			}
    		</script>
    		<div class="col-sm-6">
    			<div class="box">
    				<div class="box-header">
    					View All Users
    				</div>
    				<div class="box-body">
    					<div class="">
    						<center>
    						<form action="#" method="post">
    							<button class="btn bg-aqua color-palette" id="alluser" name="alluser"> View All Users </button>
    						</form>
    						</center>
    					</div>
    				</div>
    			</div>
    		</div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class="hideuser" id="user">
						<table id="example2" class="table table-bordered table-hover">

                	<thead>
                <tr>
                  <th>Name</th>
                  <th>Box ID</th>

                </tr>
                </thead>
                	<tr id="muser">
							<td id="usrname"></td>
							<td id="boxid"></td>
                	</tr>



              </table>
					</div>

					<?php
						if(isset($_POST['alluser'])) {
							dbconnect();
							$sql = "SELECT * FROM users";
							$res = mysqli_query($conn, $sql);
							?>
				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Box ID</th>

                </tr>
                </thead>
                <tbody>
                <?php
						while($rec = mysqli_fetch_assoc($res)) {
							?>
						<tr>
                  	<td> <a href="view_user_details.php?boxid=<?php echo $rec["boxid"]; ?>"><?php echo $rec["name"]; ?></a>  </td>

                  	<td><?php echo $rec["boxid"]; ?></td>

                	</tr>

							<?php

						}
                ?>

                </tbody>

              </table>
							<?php
						}
					?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
