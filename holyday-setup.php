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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Holyday type
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select type="text" id="first-name" name="type" class="form-control col-md-7 col-xs-12">
                          <option value="gov">Government Holyday</option>
                          <option value="nongov">Non-Government Holyday</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Holyday name *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="name" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select date
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                <input type="text" style="width: 200px" name="date" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016" />
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 text-center col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-block btn-success" name="submit" >Add holyday</button>
                      </div>
                    </div>

                  </form> <br>

                  <?php

                    include 'inc/dbh.php';

                    if (isset($_POST['submit'])) {

                      $type = $_POST['type'];
                      $name = $_POST['name'];
                      $rangeDate = $_POST['date'];

                      // Start date
                    	$date = '2009-12-06';

                      $sty = $rangeDate[6].$rangeDate[7].$rangeDate[8].$rangeDate[9];
                      $std = $rangeDate[3].$rangeDate[4];
                      $stm = $rangeDate[0].$rangeDate[1];

                      $date = $sty."-".$stm."-".$std;

                    	// End date
                    	$end_date = '2020-12-31';

                      $sty = $rangeDate[19].$rangeDate[20].$rangeDate[21].$rangeDate[22];
                      $std = $rangeDate[16].$rangeDate[17];
                      $stm = $rangeDate[13].$rangeDate[14];

                      $end_date = $sty."-".$stm."-".$std;

                      while (strtotime($date) <= strtotime($end_date)) {

                        $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
                        // echo $date."<br>";

                       $sql = "INSERT INTO holyday(type, name, date) VALUES('$type', '$name', '$date');";
                       mysqli_query($conn, $sql);

                        }

                        //echo '<p class="text-center text-success">Holyday added!</p>';
                        $new_holyday_added = "";

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
  if (isset($new_holyday_added)) {
    ?>
    <script type="text/javascript">
    Swal.fire(
    'Holyday added!',
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
