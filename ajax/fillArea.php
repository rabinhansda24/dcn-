<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dcn";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM area ";
  $res = mysqli_query($conn, $sql);
  if($res) {

   ?>



<select class="form-control" name="area">
  <option>Select </option>
  <?php
    while ($rec = mysqli_fetch_assoc($res)) {
  ?>
 <option value="<?php echo $rec["area"] ?>"><?php echo $rec["area"] ?></option>
 <?php
} ?>
</select>
<?php


  //echo json_encode($rec);
  } else {
   echo "Error :". mysqli_error($conn) . $boxid;
  }


 ?>
