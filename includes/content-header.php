    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            dbconnect();
            $sql1 = "SELECT * FROM users WHERE type = 'cable'";
  					$res1 = mysqli_query($conn, $sql1);
  					$cableUserCount = mysqli_num_rows($res1);

           ?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $cableUserCount; ?></h3>

              <p>Cable Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-television"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php
          $sql2 = "SELECT * FROM users WHERE type = 'internet'";
          $res2 = mysqli_query($conn, $sql2);
          $internetUserCount = mysqli_num_rows($res2);

         ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $internetUserCount; ?></h3>

              <p>Internet Customer</p>
            </div>
            <div class="icon">
              <i class="fa fa-internet-explorer"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <?php

					$sql = "SELECT * FROM users";
					$res = mysqli_query($conn, $sql);
					$userCount = mysqli_num_rows($res);
          ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $userCount; ?></h3>

              <p>Total Customer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="view_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">





      </div>
      <!-- /.row (main row) -->

    </section>
