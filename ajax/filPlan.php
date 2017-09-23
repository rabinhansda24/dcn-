<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dcn";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM plan ";
  $res = mysqli_query($conn, $sql);
  if($res) {

   ?>



<select class="form-control" name="plan">
  <option>Select </option>
  <?php
    while ($rec = mysqli_fetch_assoc($res)) {
  ?>
    <option value="<?php echo $rec["planname"] ?>"><?php echo $rec["planname"] . "(&#x20B9;". $rec['price'] .")"; ?></option>
    <?php
  } ?>
</select>
  <?php


  //echo json_encode($rec);
  } else {
   echo "Error :". mysqli_error($conn) . $boxid;
  }


 ?>
