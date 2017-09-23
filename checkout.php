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
        <li><a href="#"><i class="fa fa-dashboard"></i> Checkout</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->

    <?php
      if (isset($_POST["submit"])) {
        $boxid = $_POST["boxid"];
        $months = $_POST["months"];
        $N = count($months);
        dbconnect();
        $sql = "SELECT * FROM users WHERE boxid = '". $boxid ."'";
        $res = mysqli_query($conn, $sql);
        $rec = mysqli_fetch_assoc($res);

      }
    ?>
    <section class="content">
      <div class="box">
        <div class="box-header">
            Bill Details
        </div>
        <div class="box-body">
          <div class="" id="bill">
            <page size="A4">
              <div class="invoice">
                <div class="company-info">
                  <h1>Das Cable Network</h1>
                  <b>Address: </b> <br>
                  <b>Tbel: </b>1234567890 <br>
                  <b>Email:</b> contact@dascable.com,<b> Website:</b> www.dascable.com <br>
                  <b>Tax registration no. #:</b> 21321231133222 <br>
                </div>
                <div class="company-logo">
                  DCN <br>
                  LOGO <br>

                </div>
                <div class="invoice-text">
                  <h2>INVOICE</h2>
                </div>
                <div class="bill-to">
                  <i>Bill to:</i> <br> <br>
                  <img src="barcodeGenerate.php?text=<?php echo $boxid; ?>&print=true" alt="" /> <br>
                  <b>Name:</b> <?php echo $rec["name"]; ?> <br>
                  <b>Address:</b> <?php echo $rec["address"]; ?> <br>
                  <b>Phone no.:</b> <?php echo $rec["phone"]; ?>
                </div>
                <?php
                  $sql5 = "SELECT * FROM payment ORDER BY id DESC LIMIT 1";
                  $res5 = mysqli_query($conn, $sql5);
                  $rec5 = mysqli_fetch_assoc($res5);
                  $invoiceNo = "";
                  if ($rec5["transactionno"] != "") {
                    $invoiceNo = $rec5["transactionno"] + 1;
                  } else {
                    $invoiceNo = "1210192101";
                  }
                 ?>
                <div class="bill-info">
                  <h3>Invoice No #: <?php echo $invoiceNo; ?></h3>
                  <b>Date: </b> <?php echo date('d-m-Y'); ?> <br>
                  <b>Mode:</b> Credit/Debit Card <br>
                  <b>Card no.:</b> xxxx xxxx 1234 <br>
                </div>
                <div class="bill-details">
                  <table class="table">
                    <tr border="1">
                      <td>
                        #
                      </td>
                      <td class="bill-details-particular">
                        Moths
                      </td>
                      <td class="bill-amount">
                        Amount (&#x20B9;)
                      </td>
                    </tr>
                    <?php

                      $qry = "SELECT * FROM plan WHERE planname = '". $rec["plan"] ."'";
                      $ress = mysqli_query($conn, $qry);
                      $recc = mysqli_fetch_assoc($ress);
                      $total = 0;
                      $str1 = "SELECT * FROM payment WHERE boxid = '".$boxid."' ORDER BY id DESC LIMIT 1";
                      $result = mysqli_query($conn, $str1);
                      $record = mysqli_fetch_assoc($result);
                      $m = substr($record['month'],0,2);
                      $y = substr($record['month'],3);
                      $year = $y;
                      if ($m == 12) {
                        $year = $y + 1;

                      }
                      for($i = 0; $i < $N; $i++)
                      {
                        ?>
                          <tr>
                            <td>
                              <?php echo $i; ?>
                            </td>
                            <td class="bill-details-particular">
                          <?php
                              $mon = "";
                              $tmp = $months[$i];

                              switch ($tmp) {
                              case 1:
                                $mon = "January";
                                break;

                              case 2:
                                $mon = "February";
                                break;
                              case 3:
                                $mon = "March";
                                break;
                              case 4:
                                $mon = "April";
                                break;
                              case 5:
                                $mon = "May";
                                break;
                              case 6:
                                $mon = "June";
                                break;
                              case 7:
                                $mon = "July";
                                break;
                              case 8:
                                $mon = "August";
                                break;
                              case 9:
                                $mon = "September";
                                break;
                              case 10:
                                $mon = "October";
                                break;
                              case 11:
                                $mon = "November";
                                break;
                              case 12:
                                $mon = "December";
                                break;

                            }



                              echo $mon . ", " . $year;
                              $price1 = $recc["price"];
                              $d = date('Y-m-d');
                              $month = $tmp . "-" . $year;
                              $flag = 0;
                              $sql11 = "INSERT INTO payment VALUES('','$boxid', '$month','$d','$price1','$invoiceNo')";
                              if (mysqli_query($conn, $sql11)) {
                                $flag = 1;
                                //echo "<script>alert('Payment successfull.');</script>";
                              } else {
                                $flag = 0;
                                $er = mysqli_error($conn);
                                //echo "<script>alert('Something went wrong. $er')";
                              }
                              if ($tmp == 12) {
                                $year = $y + 1;

                              }
                            ?>
                            </td>
                            <td class="bill-amount">
                              <?php echo $recc["price"]; ?>
                            </td>
                          </tr>
                        <?php
                        $total += $recc["price"];

                      }
                      if ($flag == 1) {
                        echo "<script type='text/javascript'>alert('Payment successfull.');</script>";
                      } else {
                        echo "<script type='text/javascript'>alert('Something went wrong. $er');</script>";
                      }

                     ?>

                     <tr>
                       <td>
                         &nbsp;
                       </td>
                       <td>
                         &nbsp;
                       </td>
                       <td>
                         &nbsp;
                       </td>
                     </tr>
                     <tr>
                       <td>
                         &nbsp;
                       </td>
                       <td style="text-align: right">
                         <b>Total:</b>
                       </td>
                       <td class="bill-amount">
                         <?php echo $total; ?>
                       </td>
                     </tr>
                  </table>
                </div>


              </div>
            </page>
          </div>


          <button type="button" id="print" name="print" onclick="printBill('bill')" class="btn btn-info"> Print</button>
        </div>

      </div>
      <script type="text/javascript">
          function printBill(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
          }
      </script>
    </section>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
