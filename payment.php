<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-6">
    			<div class="box">
    				<div class="box-header">
    					Enter Box ID
    				</div>
    				<div class="box-body">
    					<div class="">
    						<div class="form-group">
                  		<label for="boxid" class="col-sm-2 control-label">Box ID</label>

                  		<div class="col-sm-10">
                    			<input type="text" id="barcodeValue" onchange="getUser();" class="form-control" id="boxid" name="boxid" placeholder="Box ID">
                          <br>
                          <br>
                          <br>
                  		</div>

                		</div>
    					</div>
    				</div>
    			</div>
    		</div>
        <script type="text/javascript" >
          function checkDues(boxid) {
            var data = "boxid=" + boxid;
            $.ajax({
              url: 'checkDues.php',
              type: 'POST',
              data: data,
              success: function(data) {
                $("#dues").html(data);
              }
            });
          }


          function userDetails(boxid) {
            var data = "boxid=" + boxid;
            $.ajax({
              url: 'getUserPayment.php',
              type: 'POST',
              data: data,
              success: function (data) {
                $("#user-details").html(data);
              }
            });
          }


          function montheDues(boxid) {
            var data = "boxid=" + boxid;
            $.ajax({
              url: 'userDetails.php',
              type: 'POST',
              data: data,
              success: function(data) {
                $("#months-dues").html(data);
              }
            });
          }



    			function getUser() {
					var boxid = $("#barcodeValue").val();

					var data = "boxid=" + boxid;
					$.ajax({
						url:'paymentGetuser.php',
						type:'POST',
						data:data,

						success: function (data) {


							$("#last-payment").removeClass("hide-last-payment");
							$("#last-payment").addClass("show-last-payment");
							$("#last-payment-info").html(data)
              $("#detais").removeClass("hide-dues");
              $("#payment").removeClass("hide-dues");


              checkDues(boxid);
              montheDues(boxid);
              userDetails(boxid);

						},
					});
    			}

    		</script>
        <div class="col-sm-4 last-payment hide-last-payment" id="last-payment">
  				<div class="box box-solid box-info">
  					<div class="box-header"> Last Payment	</div>
  					<div class="box-body" id="last-payment-info">

    				</div>
  				</div>
  			</div>



      </div>

      <div class="" id="temp">

      </div>
      <div class="clo-sm-6" id="dues">


      </div>

      <div class="box hide-dues" id="detais" >
        <div class="box-header">
          Details
        </div>

        <div class="box-body " id="">
          <div class="col-sm-7" >
            <div class="box box-solid box-info">
              <div class="box-header">
                User Details
              </div>
              <div class="box-body" id="user-details">

              </div>
            </div>
          </div>
          <form action="checkout.php" method="post">
          <div class="col-sm-4" >
            <div class="box box-solid box-info">
              <div class="box-header">
                Months to be paid
              </div>
              <div class="box-body" id="months-dues">

              </div>


            </div>
            <div id="total-amount"> <!-- Calculate the total Amount -->

            </div>
            <div class="box box-solid box-info">
              <div class="box-header">
                Billing Details
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="area" class="col-sm-2 control-label">Mode of Payment</label>

                  <div class="col-sm-10" >
                    <select name="mode" id="paymentmode" onchange="paymentMode();" class="form-control">
                     <option value="">Select</option>
                      <option value="cash">Cash</option>
                       <option value="card">Debit/Credit Card</option>
                    </select>
                  </div>

                </div>
                <div class="hide-dues" id="card-details">
                  <table class="table">
                    <tr>
                      <td>
                        Bank:
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="area" class="col-sm-2 control-label">Mode of Payment</label>

                          <div class="" >
                            <select name="mode" id="paymentmode" onchange="paymentMode();" class="form-control">
                             <option value="">Select</option>
                              <option value="axix">Axix Bank</option>
                               <option value="boi">Bank of India</option>
                            </select>
                          </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <script type="text/javascript">
                  function paymentMode() {
                    var mode = $("#paymentmode").val();
                    if (mod == "card") {
                      $("#card-details").removeClass("hide-dues");
                    }
                  }

                </script>
              </div>
            </div>
          </div>
          <script type="text/javascript">
            $("input[type='checkbox']").onchange(function() {
              calTotal();
            });
              function calTotal() {
                var id = $("#barcodeValue").val();

                var months;
                months = $('input[type=checkbox]:checked').length;
                var str1;
                str1 = 'boxid=' + id + '&months=' + months;
                $.ajax({
                  url: 'ajax/totalAmount.php',
                  data: str1,
                  method: 'POST',
                  success: function(data) {
                    $("#total-amount"),html(data);
                  }
                });
              }

              $(document).onready(function() {
                $("userid").val(boxid);
              });
            </script>
          <div class="col-sm-4 hide-dues" id="payment">

              <input type="submit" name="submit" value="Payment" >

          </div>
        </form>
        </div>
      </div>

    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
