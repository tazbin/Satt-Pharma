<?php
include_once('inc/header.php');
include_once("inc/topbody.php");
include_once('inc/sidebar.php');
include_once("inc/topbar.php");
 ?>
        <!-- page content -->
        <div class="right_col" role="main">

          <!-- my code goes here -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title text-center">
                  <h2>Area Setting <small></small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area name *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="area" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District name *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="district" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Thana name *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="thana" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 text-center col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-block btn-success" name="submit">Add Area</button>
                      </div>
                    </div>

                  </form> <br>

                  <?php

                    include 'inc/dbh.php';

                    if (isset($_POST['submit'])) {

                      $area = $_POST['area'];
                      $district = $_POST['district'];
                      $thana = $_POST['thana'];

                        $sql = "INSERT INTO area (area, district, thana) VALUES('$area', '$district', '$thana');";
                        mysqli_query($conn, $sql);

                        //echo '<p class="text-center text-success">New area added!</p>';
                        $new_area_added = "";

                    }

                   ?>

                   <div class="" style="height: 300px">

                   </div>

              </div>
            </div>
          </div>
        </div>

          <!-- my code goes here -->

        </div>
        <!-- /page content -->

        <!-- footer content -->
    <?php include_once("inc/footer.php"); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
<?php include_once("inc/js.php"); ?>

<?php
  if (isset($new_area_added)) {
    ?>
      <script type="text/javascript">
      Swal.fire(
      'New Area Added!',
      '',
      'success'
      )
      </script>
    <?php
  }
 ?>
    <!-- jquery -->

  </body>
</html>
