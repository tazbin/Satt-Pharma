<?php
include_once('inc/header.php');
include_once("inc/topbody.php");
include_once('inc/sidebar.php');
include_once("inc/topbar.php");
 ?>

 <?php

if (isset($_POST['delete'])) {

  $emp_id = $_POST['id'];

  include 'inc/dbh.php';

  //delete photo
  $sql = "SELECT * FROM emp_basic_info WHERE emp_id='$emp_id';";
  $result = mysqli_query($conn, $sql);
  $checkresult = mysqli_num_rows($result);

  if ($checkresult>0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $photo = $row['photo'];
    }
  }

  if (!empty($photo)) {
    unlink($photo);
  }
  //photo delete

  $sql = "DELETE FROM emp_office_info WHERE id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM employee_has_area WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM emp_basic_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM emp_contact_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM emp_academic_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  //photo delete
  $sql = "SELECT * FROM emp_document_info WHERE emp_id='$emp_id';";
  $result = mysqli_query($conn, $sql);
  $checkresult = mysqli_num_rows($result);

  if ($checkresult>0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $img = $row['photo'];
    if (!empty($img)) {
      unlink($img);
    }
    }
  }
  //photo delete

  $sql = "DELETE FROM emp_document_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM emp_account_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

  $sql = "DELETE FROM emp_health_info WHERE emp_id='$emp_id';";
  mysqli_query($conn, $sql);

}

  ?>

        <!-- page content -->
        <div class="right_col" role="main">

          <!-- my code goes here -->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee List <small></small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID No</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Area</th>
                            <th class="column-title">Designation</th>
                            <th class="column-title">Mobile</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Address</th>
                            <th class="column-title">User ID</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                            include 'inc/dbh.php';

                                $sql = "SELECT * FROM emp_office_info INNER JOIN emp_basic_info ON emp_office_info.id=emp_basic_info.emp_id INNER JOIN emp_contact_info ON emp_office_info.id= emp_contact_info.emp_id INNER JOIN emp_health_info ON
                              emp_contact_info.emp_id  =emp_health_info.emp_id;";
                                $result = mysqli_query($conn, $sql);
                                $checkresult = mysqli_num_rows($result);

                                if ($checkresult>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $emp_id = $row['id'];
                                  $designation = $row['designation'];
                                  $user_id = $row['user_id'];
                                  $name = $row['name'];

                                  $mobile = $row['mobile'];
                                  $email = $row['email'];

                                  $house = $row['pre_house'];
                                  $road = $row['pre_road'];
                                  $village = $row['pre_village'];
                                  $post = $row['pre_post'];
                                  $police_station = $row['pre_police_station'];
                                  $district = $row['pre_district'];
                                  $post_code = $row['pre_post_code'];

                                  ?>
                                  <form class="" action="" method="post" id="form_<?php echo $emp_id; ?>">
                                    <?php echo '<input type="hidden" name="id" value='.$emp_id.'>'; ?>
                                    <?php echo '<input type="hidden" name="delete" value="delete">'; ?>

                                  <?php
                                  echo '<tr class="even pointer">';
                                  echo '<td class=" ">'.$emp_id.'</td>';
                                  echo '<td class=" ">'.$name.'</td>';
                                  echo '<td class=" ">';

                                  $sql2 = "SELECT * FROM employee_has_area JOIN area ON employee_has_area.area_id=area.id WHERE employee_has_area.emp_id='$emp_id';";
                                  $result2 = mysqli_query($conn, $sql2);
                                  $checkresult2 = mysqli_num_rows($result2);

                                  if ($checkresult2>0) {
                                  while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo $row2['area'].", ".$row2['district'].", ".$row2['thana']."<br>";
                                    }
                                  }
                                  echo '</td>';
                                  echo '<td class=" ">'.$designation.'</td>';
                                  echo '<td class=" ">'.$mobile.'</td>';
                                  echo '<td class=" ">'.$email.'</td>';
                                  echo '<td class=" ">'.
                                  "House: ".$house.
                                  "<br>Road: ".$road.
                                  "<br>Village: ".$village.
                                  "<br>Post: ".$post.
                                  "<br>Police Station: ".$police_station.
                                  "<br>District: ".$district.
                                  "<br>Post Code: ".$post_code
                                  .'</td>';
                                  echo '<td class=" ">'.$user_id.'</td>';

                                  ?>
                                  <td class=" ">
                                    <a class="btn btn-sm btn-success" style="width: 70px" name="view" href="view-employee.php?id=<?php echo $emp_id; ?>">View</a><br>
                                    <a class="btn btn-sm btn-primary" style="width: 70px" name="edit" href="edit-employee.php?id=<?php echo $emp_id; ?>">Edit</a> <br>
                                    <button class="btn btn-sm btn-danger" type="submit" style="width: 70px" data-id="<?php echo $emp_id; ?>" id="delete" name="delete">Delete</button>
                                  </td>
                                </tr>

                                  </form>

                                  <?php

                                  }
                                }

                                  ?>

                        </tbody>
                      </table>
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
      <!-- jquery -->

      <script type="text/javascript">

      $(document).on('click', '#delete', function(e){
        e.preventDefault();
        var id= $(this).data('id');
        var form_id = '#form_'+id;
        console.log(form_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
            $(form_id).submit();
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
        })
      });

      </script>

      </body>
      </html>
