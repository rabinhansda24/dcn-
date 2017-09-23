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
   	 $boxid = $_GET["boxid"];
   	 $sql = "SELECT * FROM users WHERE boxid = '".$boxid."'";
   	 $res = mysqli_query($conn, $sql);
   	 if($res) {
   	 	$rec = mysqli_fetch_assoc($res);

   	 	$id = mc_encrypt($rec['boxid'], ENCRYPTION_KEY);
   	 echo "<td> <a href='view_user_details.php?boxid=".$rec['boxid']."'>".$rec['name'] ."</a></td><td> ".$rec['boxid'] ."</td>";

   	 //echo json_encode($rec);
   	 } else {
			echo "Error :". mysqli_error($conn) . $boxid;
   	 }


    ?>
