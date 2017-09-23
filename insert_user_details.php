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
	<section class="content">
    <!-- Main content -->
   	<?php
			require_once('includes/dbconnection.php');

			dbconnect();

			if(isset($_POST['submit'])) {
				$boxid = filterThis($_POST['boxid']);
        $vcno = filterThis($_POST['vcno']);
				$name = filterThis($_POST['name']);
				$address = filterThis($_POST['address']);
        $area = filterThis($_POST['area']);
				$phone = filterThis($_POST['phone']);
				$email = filterThis($_POST['email']);
				$password = filterThis($_POST['password']);
				$password = md5($password, $raw_output = null);
				$plan = filterThis($_POST['plan']);
				$type = $_POST['type'];

				$sql = "INSERT INTO users VALUES('$boxid','$vcno','$name','$address','$area','$phone','$email','$password','$plan','$type')";

				if(mysqli_query($conn, $sql)) {
					?>
						<div class="callout callout-success">
                		<h4>User added successfully</h4>
                    

              		</div>
					<?php

				} else { ?>
					<div class="callout callout-warning">
                <h4>ERROR:</h4>

                <p><?php echo " Could not able to execute $sql. " . mysqli_error($conn); ?></p>
              </div>
				<?php

				}
			}

   	?>




    <!-- /.content -->
    </section>
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
