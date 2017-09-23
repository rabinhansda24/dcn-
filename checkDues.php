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
       $m = substr($rec['month'],0,2);
       $y = substr($rec['month'],2);
       $today = date('Y-m-d');
       //echo $m ." ". $y;
       $ty = substr($today,0,4);
       $tm = substr($today,5,2);
       $td = substr($today,8);
       if ($m == $tm && $y == $ty) {
         ?>
         <div class="callout callout-success">
                 <h4>No Dues</h4>

         </div>
         <?php
       } else {
         if (($ty - $y) > 0)
         {
           $tmp = ($tm + 12) - $m;
           //echo $tm;
           $t = $tmp -1;
           //echo $t;


         //$tmp = $tm - $m;
         //echo $tm;
         //$t = $tmp - 1;
         //echo $t;
         if ($t > 0) {
           ?>
           <div class="callout callout-danger">
                 <h4>Total Dues</h4>
                 <div id="dues">
                   <?php
                      $qry ="SELECT * FROM users WHERE boxid = '".$boxid."'";
                      $res1 = mysqli_query($conn, $qry);
                      $rec1 = mysqli_fetch_assoc($res1);
                      $plan = $rec1['plan'];
                      $qry2 = "SELECT * FROM plan WHERE planname = '".$plan."'";
                      //echo $qry2;
                      $res3 = mysqli_query($conn, $qry2);
                      $rec3 = mysqli_fetch_assoc($res3);
                      $price = $rec3["price"];
                      $total = 0;
                      for ($i=0; $i < $t; $i++) {
                        $total += $price;
                      }
                      //echo $tm ." ".$m;

                      echo "<b>&#x20B9; ".$total;
                   ?>
                 </div>

           </div>
           <?php
         } else {
           ?>
           <div class="callout callout-success">
                   <h4>No Dues</h4>

           </div>
           <?php
         }
       } else {
         $sql11 = "SELECT * FROM payment WHERE boxid = '".$boxid."' ORDER BY id DESC LIMIT 1";
       	 $res11 = mysqli_query($conn, $sql);
         if ($res11) {
           $rec11 = mysqli_fetch_assoc($res11);

           $id = mc_encrypt($rec['boxid'], ENCRYPTION_KEY);
           $m = substr($rec['month'],0,2);
           $y = substr($rec['month'],3);
           $today = date('Y-m-d');

           $ty = substr($today,0,4);
           $tm = substr($today,5,2);
           $td = substr($today,8);

           $tmp = $tm - $m;
           //echo $tm;
           $t = $tmp -1;
           //echo $t;
           if ($t > 0) {
             ?>
             <div class="callout callout-danger">
                   <h4>Total Dues</h4>
                   <div id="dues">
                     <?php
                        $qry ="SELECT * FROM users WHERE boxid = '".$boxid."'";
                        $res1 = mysqli_query($conn, $qry);
                        $rec1 = mysqli_fetch_assoc($res1);
                        $plan = $rec1['plan'];
                        $qry2 = "SELECT * FROM plan WHERE planname = '".$plan."'";
                        $res3 = mysqli_query($conn, $qry2);
                        $rec3 = mysqli_fetch_assoc($res3);
                        $price = $rec3["price"];
                        $total = 0;
                        for ($i=0; $i < $t; $i++) {
                          $total += $price;
                        }
                        //echo $tm ." ".$m;

                        echo "<b>&#x20B9; ".$total;
                     ?>
                   </div>

             </div>
  <?php
         }  else {
           ?>
           <div class="callout callout-success">
                   <h4>No Dues</h4>

           </div>
           <?php
     	 }
     }
   }
  }

}


    ?>
