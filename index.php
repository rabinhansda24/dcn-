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
    <?php include 'includes/content-header.php'; ?>
    <?php
      $qry11 = "SELECT * FROM area";
      $res11 = mysqli_query($conn, $qry11);
      while ($recc = mysqli_fetch_assoc($res11)) {
        $qry22 = "SELECT * FROM users WHERE area = '". $recc["area"] ."'";
        $res22 = mysqli_query($conn, $qry22);
        $tmpCount = mysqli_num_rows($res22);
          ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $tmpCount; ?></h3>

                <p><?php echo $recc["area"]; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php

      }

    ?>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
