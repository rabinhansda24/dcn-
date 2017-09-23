<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dcn";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM area";
  $res = mysqli_query($conn, $sql);

    ?>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>
              #
            </th>
            <th>
              Area
            </th>

          </tr>
        </thead>
        <tbody>
          <?php
            $n = 1;
            while ($rec = mysqli_fetch_assoc($res)) {
            ?>
              <tr>
                <td>
                  <?php echo $n; ?>
                </td>
                <td>
                  <?php echo $rec["area"]; ?>
                </td>

              </tr>

            <?php
              $n += 1;
            }
           ?>
        </tbody>

      </table>
