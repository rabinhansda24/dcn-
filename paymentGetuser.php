<?php
define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
require_once('includes/security.php')


?>
   <?php
   	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dcn";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
   	 $boxid = $_POST["boxid"];
   	 $sql = "SELECT * FROM payment WHERE boxid = '".$boxid."' ORDER BY id DESC LIMIT 1";
   	 $res = mysqli_query($conn, $sql);
   	 if($res) {
   	 	$rec = mysqli_fetch_assoc($res);

   	 	$id = mc_encrypt($rec['boxid'], ENCRYPTION_KEY);
      $mon = "";
      $m = substr($rec['month'],0,2);
      $y = substr($rec['month'],3);
      switch ($m) {
        case 1:
          $mon = "Jan";
          break;

        case 2:
          $mon = "Feb";
          break;
        case 3:
          $mon = "Mar";
          break;
        case 4:
          $mon = "Apr";
          break;
        case 5:
          $mon = "May";
          break;
        case 6:
          $mon = "Jun";
          break;
        case 7:
          $mon = "Jul";
          break;
        case 8:
          $mon = "Aug";
          break;
        case 9:
          $mon = "Sep";
          break;
        case 10:
          $mon = "Oct";
          break;
        case 11:
          $mon = "Nov";
          break;
        case 12:
          $mon = "Dec";
          break;

      }
      ?>
      <table id="example2 " class="table table-bordered table-hover">
        <?php
          echo "<tr><td>Month</td><td>". $mon ."-".$y ."</td></tr><tr><td>Payment Date:</td><td>".$rec['paymentdate']."</td></tr><tr><td>Amount:</td><td>".$rec['amount']."</td></tr>";
        ?>
      </table>
      <?php


   	 //echo json_encode($rec);
   	 } else {
			echo "Error :". mysqli_error($conn) . $boxid;
   	 }


    ?>
