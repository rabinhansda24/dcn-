<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dcn";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$area = $_POST["area"];
$sql = "INSERT INTO area VALUES('', '$area')";
$r = mysqli_query($conn, $sql);
if ($r > 0) {
  echo "Area added successfully";
}
else {
  echo "Something went wrong" . mysqli_error($conn);
}
 ?>
