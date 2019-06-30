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
                  <h2>Add User <small></small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <?php
                  $name = $designation = $mobile = $address = $email = $user = "";

                  //form data
                  include 'inc/dbh.php';

                  if (isset($_POST['submit'])) {

                    $name = $_POST['name'];
                    $designation = $_POST['designation'];
                    $mobile = $_POST['mobile'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass_one = $_POST['pass_one'];
                    $pass_two = $_POST['pass_two'];

                    if ($pass_one!=$pass_two || empty($pass_one) || empty($pass_two)) {
                      //echo '<p class="text-center text-danger">Password did not matched!</p>';
                      $pass_didnot_matched = "";
                    } else{
                      $pass = MD5($pass_one);

                      $sql = "INSERT INTO user(name, designation, mobile, address, email, user, pass) VALUES('$name', '$designation', '$mobile', '$address', '$email','$user', '$pass');";
                      mysqli_query($conn, $sql);

                      //echo '<p class="text-center text-success">New user added!</p>';
                      $new_user_added = "";
                      $name = $designation = $mobile = $address = $email = $user = "";
                    }

                  }

                   ?>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="name" value="<?php echo "$name"; ?>" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="designation" value="<?php echo "$designation"; ?>" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" name="mobile" value="<?php echo "$mobile"; ?>" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="address" value="<?php echo "$address"; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail *
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="first-name" name="email" value="<?php echo "$email"; ?>" required class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="user" value="<?php echo "$user"; ?>" class="form-control col-md-7 col-xs-12">
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


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 text-center col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-block btn-success" name="submit">Add user</button>
                      </div>
                    </div>

                  </form> <br>

                  <?php



                   ?>

                   <div class="" style="height: 200px">

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
  if (isset($pass_didnot_matched)) {
    ?>
    <script type="text/javascript">
    Swal.fire({
    type: 'error',
    title: 'Password did not matched!',
    text: '',
    footer: ''
    })
    </script>
    <?php
  }
 ?>

 <?php
  if (isset($new_user_added)) {
    ?>
    <script type="text/javascript">
    Swal.fire(
    'New User Added!',
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
