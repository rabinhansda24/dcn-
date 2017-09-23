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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-solid box-info">
            <div class="box-header">
              Enter new area
            </div>
            <div class="box-body">
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Enter new area
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" action="index.html" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Enter an area</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="area" class="col-sm-2 control-label">Enter area</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="area" placeholder="Enter area">
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" onclick="insertArea();" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function insertArea() {
          var area = $("#area").val();
          var data = 'area=' + area;
          $.ajax({
            url: 'ajax/insertArea.php',
            method: 'POST',
            data: data,
            success: function (data) {
              alert(data);
            }
          });
        }
        $(document).ready(function() {
          $.ajax({
            url: 'ajax/loadArea.php',
            method: 'GET',
            success: function(data) {
              $("#loadArea").html(data);
            }
          });
        });
      </script>

      <div class="box">
        <div class="box-header">
          Areas
        </div>
        <div class="box-boady" id="loadArea">


        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'includes/footer.php'; ?>
