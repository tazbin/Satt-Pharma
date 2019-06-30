<?php
include_once('inc/header.php');
include_once("inc/topbody.php");
include_once('inc/sidebar.php');
include_once("inc/topbar.php");
 ?>

 <?php

 include 'inc/dbh.php';

 if (isset($_POST['submit'])) {

   $area = $_POST['area'];
   $org = $_POST['org'];
   $branch_no = $_POST['branch_no'];
   $address = $_POST['address'];
   $mobile = $_POST['mobile'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $userid = $_POST['userid'];
   $pass_one = $_POST['pass_one'];
   $pass_two = $_POST['pass_two'];
   $status = $_POST['status'];

   if ($pass_one!=$pass_two || empty($pass_one) || empty($pass_two)) {
    $msg = '<p class="text-center text-danger">Password did not matched!</p>';
    $msg_error = 'No Added!';

   } else{

     $pass = MD5($pass_one);

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

   if ( in_array($fileActualExt, $allowed) ) {
     if ( $favError === 0 ) {

       $fileDestination = 'uploads/branch/'.$unique_image;
       $favDestination = $fileDestination;

       move_uploaded_file($favTempName, $fileDestination);

     }
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

   if ( in_array($fileActualExt, $allowed) ) {
     if ( $logoError === 0 ) {

       $str = rand();

       $fileDestination = 'uploads/branch/'.$str.$unique_image;
       $logoDestination = $fileDestination;

       move_uploaded_file($logoTempName, $fileDestination);

     }
   }
   //logo

   $sql = "INSERT INTO branch(name, branch_no, address, mobile, phone, email, user_id, pass, favicon, logo, status) VALUES('$org', '$branch_no', '$address', '$mobile', '$phone', '$email', '$userid', '$pass', '$favDestination', '$logoDestination', '$status');";
   mysqli_query($conn, $sql);

   $last_id = mysqli_insert_id($conn);

   foreach ($area as $key => $value) {
     $sql ="INSERT INTO branch_has_area(branch_id, area_id) VALUES('$last_id', '$value');";
     mysqli_query($conn, $sql);
   }

   $msg_success = 'New Branch Added!';

   $area = [];
   $org = "";
   $branch_no = "";
   $address = "";
   $mobile = "";
   $phone = "";
   $email = "";
   $userid = "";
   $status = [];

  }

 }

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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select type="text" multiple id="first-name" name="area[]" class="form-control col-md-7 col-xs-12" required >
                          <?php
                          include 'inc/dbh.php';

                          $sql = "SELECT * FROM area";
                          $result = mysqli_query($conn, $sql);
                          $checkresult = mysqli_num_rows($result);

                          if ($checkresult>0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                                <option <?php echo isset($area)? in_array($row['id'], $area ) ? "selected" : "" : "" ?>  value="<?php echo $row['id']; ?>"> <?php echo $row['area'].", ".$row['district'].', '.$row['thana'] ; ?> </option>
                          <?php
                              }
                            }
                           ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of the Organization *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="org" required value="<?php echo isset($org)? $org:  ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Branch No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" name="branch_no" value="<?php echo isset($branch_no)? $branch_no:  ""; ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="address" value="<?php echo isset($address)? $address:  ""; ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" name="mobile" value="<?php echo isset($mobile)? $mobile:  ""; ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" name="phone" value="<?php echo isset($phone)? $phone:  ""; ?>"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> E-mail <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="first-name" name="email" required="required" value="<?php echo isset($email)? $email:  ""; ?>"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Id
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="userid" value="<?php echo isset($userid)? $userid:  ""; ?>"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password *
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="first-name" name="pass_one" required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password *
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="first-name" name="pass_two" required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Favicon <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name" name="favicon" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name" name="logo" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select type="varchar" id="first-name" name="status" value=""  class="form-control col-md-7 col-xs-12">
                              <option <?php echo isset($status) ? ($status == 'active')? 'selected':  "" :""; ?> value="active">Active</option>
                              <option <?php echo isset($status) ? ($status == 'deactive')? 'selected':  "" :""; ?> value="deactive">Deactive</option>
                            </select>
                          </div>
                        </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-block btn-success" name="submit" >Add Branch</button>
                      </div>
                    </div>

                  </form>
                  <?php

                    if (isset($msg))
                      echo $msg;
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
  if (isset($msg_success)) {
    ?>
    <script type="text/javascript">
    Swal.fire(
    'New Branch Added',
    '',
    'success'
    )
    </script>
    <?php
  }

  if (isset($msg_error)) {
    ?>
    <script type="text/javascript">
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Password did not matched!',
    })
    </script>
    <?php
  }
 ?>

  </body>
</html>
