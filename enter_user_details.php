<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enter User Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Enter User Details</li>
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
		<div class="col-sm-7">
			<div>

						<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Enter User Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="insert_user_details.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="boxid" class="col-sm-2 control-label">Box ID</label>

                  <div class="col-sm-10">
                    <input type="text" onchange="generateBarcode();" class="form-control" id="boxid" name="boxid" placeholder="Box ID">
                  </div>
                </div>
                <div class="form-group">
                  <label for="vcno" class="col-sm-2 control-label">VC No.:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="vcno" name="vcno" placeholder="VC No.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" onchange="fillArea();" id="address" name="address" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="area" class="col-sm-2 control-label">Area</label>

                  <div class="col-sm-10" id="fillarea">
                    <select class="form-control">
                     <option value="">Select</option>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone No.</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control"  id="email" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" onchange="fillPlan();" id="password" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="plan" class="col-sm-2 control-label">Plan</label>

                  <div class="col-sm-10" id="fillplan">
                    <select class="form-control">
                     <option value="">Select</option>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">User Type</label>

                  <div class="col-sm-10">
                    <input type="radio"  id="type" name="type" value="cable"> Cable
                     <input type="radio"  id="type" name="type" value="internet"> Internet
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" class="btn btn-info pull-right" name="submit" id="submit">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
			</div>
		</div>
		<div>
			<div class="col-sm-4">
				<div class="box box-solid box-primary">
					<div class="box-header"> Barcode	</div>
					<div class="box-body">
    						<div id="barcodeTarget" class="barcodeTarget"></div>
							<canvas id="canvasTarget" width="150" height="150"></canvas>
              <!--<button type="button" id="print" onclick="print();" class="btn btn-info hide-dues" name="button">Print</button> -->
  					</div>
				</div>
			</div>
		</div>
    </section>
    <script type="text/javascript">

      function generateCode() {

      }

      function generateBarcode(){
          var value = $("#boxid").val();
          var data = "text=" + value + "&print=true";
          var url = 'barcodeGenerate.php?' + data;
          var t = "<img src='" + url + "' alt=" + value + "/>";
        /* $.ajax({
          url: 'barcodeGenerate.php',
          data: data,
          method: 'GET',
          success: function(data) {
            $("#barcodeTarget").html(data);
          }
        });*/
        $("#barcodeTarget").html(t);
        //fillPlan();
        /*var value = $("#barcodeValue").val();
        var btype = "code128";
        var renderer = $("input[name=renderer]:checked").val();

		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }

        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: $("#barHeight").val(),
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }



      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
        $("#print").removeClass("hide-dues");
      });
      function print() {
        w=window.open();
        w.document.write($('.barcodeTarget').html());
        w.print();
      }
      */
    }
      function fillPlan() {
        $.ajax({
          url: 'ajax/filPlan.php',
          method: 'GET',
          success: function(data) {
            $("#fillplan").html(data);
          }
        });
      }
      function fillArea(){
        $.ajax({
          url: 'ajax/fillArea.php',
          method: 'GET',
          success: function(data) {
            $("#fillarea").html(data);
          }
        });
      }
      //w.close();
    </script>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
