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
      $y = substr($rec['month'],2);
      $today = date('Y-m-d');
      $ty = substr($today,0,4);
      $tm = substr($today,5,2);
      $td = substr($today,8);
      //echo $m ." " . $y ." ". $tm . " ". $ty;
      //echo strlen($m);
  
        if (($ty - $y) >= 1)
        {
          $tmp = ($tm + 12) - $m;
          if ($m < 12) {
            $mo = $m + 1;
          } else {
            $mo = 1;
          }
          $t = $tmp - 1;
          if ($t > 0) {
            for ($i=$t; $i >= 0 ; $i--) {
              switch ($mo) {
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
            ?>

                    <div class="checkbox">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="months[]" onclick="calTotla();" value="<?php echo $mo; ?>">
                        <?php echo $mon; ?>
                      </label>
                    </div>
            <?php
            if ($mo < 12) {
              $mo = $mo + 1;
            } else {
              $mo = 1;
            }
          }
          ?>
          <input type="hidden" name="boxid" id="userid" value="<?php echo $boxid; ?>">
          <?php
        } else {
          //echo $m;
          if ($m < 12) {
            $mo = $m + 1;
          } else {
            $mo = 1;
          }
          switch ($mo) {
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

          }?>

                  <div class="checkbox">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="months[]" onclick="calTotla();" value="<?php echo $mo; ?>">
                      <?php echo $mon; ?>
                    </label>
                  </div>

                  <input type="hidden" name="boxid" id="userid" value="<?php echo $boxid; ?>">

          <?php
        }
      } else {
        $tmp = $tm - $m;
        if ($m < 12) {
          $mo = $m + 1;
        } else {
          $mo = 1;
        }
        $t = $tmp - 1;
        if ($t > 0) {
          for ($i=$t; $i >= 0 ; $i--) {
            switch ($mo) {
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
          ?>

                  <div class="checkbox">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="months[]" onclick="calTotla();" value="<?php echo $mo; ?>">
                      <?php echo $mon; ?>
                    </label>
                  </div>
          <?php
          if ($mo < 12) {
            $mo = $mo + 1;
          } else {
            $mo = 1;
          }
        }
        ?>
        <input type="hidden" name="boxid" id="userid" value="<?php echo $boxid; ?>">
        <?php
      } else {
        //echo $m;
        if ($m < 12) {
          $mo = $m + 1;
        } else {
          $mo = 1;
        }
        switch ($mo) {
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

        }?>

                <div class="checkbox">
                  <label class="checkbox-inline">
                    <input type="checkbox" name="months[]" onclick="calTotla();" value="<?php echo $mo; ?>">
                    <?php echo $mon; ?>
                  </label>
                </div>

                <input type="hidden" name="boxid" id="userid" value="<?php echo $boxid; ?>">

        <?php
      }

    }



  }
    else {
			echo "Error :". mysqli_error($conn) . $boxid;
   	 }
    ?>
