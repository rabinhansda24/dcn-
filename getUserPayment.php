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
   	 $sql = "SELECT * FROM users WHERE boxid = '".$boxid."'";
   	 $res = mysqli_query($conn, $sql);
   	 if($res) {
   	 	$rec = mysqli_fetch_assoc($res);

   	 	$id = mc_encrypt($rec['boxid'], ENCRYPTION_KEY);
      ?>
      <table id="example2" class="table table-bordered table-hover">

        <tr>
              <td>
                Box Id:
              </td>
              <td><?php echo $rec["boxid"]; ?></td>


        </tr>
        <tr>
              <td>
                VC No.:
              </td>
              <td><?php echo $rec["vcno"]; ?></td>


        </tr>
        <tr>
          <td>
            Name:
          </td>
          <td>
          <?php echo $rec["name"]; ?>
          </td>
        </tr>
        <tr>
          <td>
            Address:
          </td>
          <td>
          <?php echo $rec["address"]; ?>
          </td>
        </tr>
        <tr>
          <td>
            Area:
          </td>
          <td>
          <?php echo $rec["area"]; ?>
          </td>
        </tr>
        <tr>
          <td>
            Phone:
          </td>
          <td>
          <?php echo $rec["phone"]; ?>
          </td>
        </tr>
        <tr>
          <td>
            User Type:
          </td>
          <td>
          <?php echo $rec["type"]; ?>
          </td>
        </tr>
        <tr>
          <td>
            Plan:
          </td>
          <td>
          <?php
              $sql2 = "SELECT * FROM plan WHERE planname = '".$rec["plan"]."'";
              $res2 = mysqli_query($conn, $sql2);
              //echo $sql2;
              //echo $res2;
              if ($rec2 = mysqli_fetch_assoc($res2)) {
                echo $rec2["planname"] . ' ( &#x20B9;' .$rec2["price"]. ')';
              }



          ?>
          </td>
        </tr>
        <tr>
          <td>
            Email:
          </td>
          <td>
          <?php echo $rec["email"]; ?>
          </td>
        </tr>
        </table>
      <?php
   	 } else {
			echo "Error :". mysqli_error($conn) . $boxid;
   	 }


    ?>
