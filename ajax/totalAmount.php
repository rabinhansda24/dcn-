<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dcn";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
  $boxid = $_POST["boxid"];
  $months = $_POST["months"];
  $sql = "SELECT * FROM users WHERE boxid = '".$boxid."'";
  $res = mysqli_query($conn, $sql);
  if($res) {
    $rec = mysqli_fetch_assoc($res);
    $plan = $rec["planname"];
    $qry = "SELECT * FROM plan WHERE planname = '" . $plan . "'";
    $ress = mysqli_query($conn, $qry);
    $recc = mysqli_fetch_assoc($ress);
    $price = $recc["price"];
    $total = $price * $months;
    ?>

        <b>Total amount: </b>&#x20B9; <?php echo $total; ?>
    
    <?php
  } else {
   echo "Error :". mysqli_error($conn) . $boxid;
  }


 ?>
