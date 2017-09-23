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
      <div class="box">
        <div class="box-header">
          Plans
        </div>
        <div class="box-boady">
          <?php
            dbconnect();
            $sql = "SELECT * FROM plan";
            $res = mysqli_query($conn, $sql);

              ?>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Plan Name
                      </th>
                      <th>
                        Price
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $n = 1;
                      while ($rec = mysqli_fetch_assoc($res)) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $n; ?>
                          </td>
                          <td>
                            <?php echo $rec["planname"]; ?>
                          </td>
                          <td>
                            <?php echo $rec["price"]; ?>
                          </td>
                        </tr>

                      <?php
                        $n += 1;
                      }
                     ?>
                  </tbody>

                </table>


        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
