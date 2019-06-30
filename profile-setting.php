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
                  <h2>Profile Setting <small></small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of the organization *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="org" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="address" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" name="mobile" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" name="phone" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="first-name" name="email" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Favicon
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="favicon" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="logo" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Website <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="last-name" name="website" required="required" placeholder="https://www.website.com" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> API URL <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="last-name" name="url" required="required" placeholder="url" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> License Code <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="license" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-block btn-success" name="submit">Add Profile</button>
                      </div>
                    </div>

                  </form>
                  <?php

                  include 'inc/dbh.php';

                  if (isset($_POST['submit'])) {

                    $org = $_POST['org'];
                    $address = $_POST['address'];
                    $mobile = $_POST['mobile'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $website = $_POST['website'];
                    $url = $_POST['url'];
                    $license = $_POST['license'];

                    //favicon
                    $favicon = $_FILES['favicon'];
                    $favName = $_FILES['favicon']['name'];
                    $favTempName = $_FILES['favicon']['tmp_name'];
                    $favSize = $_FILES['favicon']['size'];
                    $favError = $_FILES['favicon']['error'];
                    $favType = $_FILES['favicon']['type'];

                    $fileExt = explode('.', $favName);
                    $fileActualExt = strtolower(end($fileExt));

                    $unique_image = md5(time());
                    $unique_image = substr($unique_image, 0, 10) . '.' . $fileActualExt;

                    $allowed = array( 'jpg', 'jpeg', 'png' );

                    if (!empty($favName)) {
                      if ( in_array($fileActualExt, $allowed) ) {
                        if ( $favError === 0 ) {

                          $fileDestination = 'uploads/'.$unique_image;
                          $favDestination = $fileDestination;

                          move_uploaded_file($favTempName, $fileDestination);

                        }
                      }
                    } else{
                      $favDestination = "";
                    }
                    //favicon


                    //logo
                    $logo = $_FILES['logo'];
                    $logoName = $_FILES['logo']['name'];
                    $logoTempName = $_FILES['logo']['tmp_name'];
                    $logoSize = $_FILES['logo']['size'];
                    $logoError = $_FILES['logo']['error'];
                    $logoType = $_FILES['logo']['type'];

                    $fileExt = explode('.', $logoName);
                    $fileActualExt = strtolower(end($fileExt));

                    $unique_image = md5(time());
                    $unique_image = substr($unique_image, 0, 10) . '.' . $fileActualExt;

                    $allowed = array( 'jpg', 'jpeg', 'png' );

                    if (!empty($logoName)) {
                      if ( in_array($fileActualExt, $allowed) ) {
                        if ( $logoError === 0 ) {

                          $str = rand();

                          $fileDestination = 'uploads/'.$str.$unique_image;
                          $logoDestination = $fileDestination;

                          move_uploaded_file($logoTempName, $fileDestination);

                        }
                      }
                    } else{
                      $logoDestination = "";
                    }
                    //logo

                    $sql = "INSERT INTO profile_setting(org, address, mobile, phone, email, favicon, logo, website, api, license) VALUES('$org', '$address', '$mobile', '$phone', '$email', '$favDestination', '$logoDestination', '$website', '$url', '$license');";
                    mysqli_query($conn, $sql);

                    //echo '<p class="text-center">New profile taken!</p>';
                    $new_profile="taken";

                  }

                   ?>
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
    <!-- jquery -->

    <?php
      if (isset($new_profile)) {
        ?>
          <script type="text/javascript">
          Swal.fire(
          'New Profile Added!',
          '',
          'success'
          )
          </script>
        <?php
      }
     ?>

  </body>
</html>
