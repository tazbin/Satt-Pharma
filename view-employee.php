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
                  <h2>Profile Details <small></small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <?php
                  include 'inc/dbh.php';

                  $emp_id = $_GET['id'];

                  $sql = "SELECT * FROM emp_office_info WHERE id='$emp_id';";
                  $result = mysqli_query($conn, $sql);
                  $checkresult = mysqli_num_rows($result);

                  if ($checkresult>0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $designation = $row['designation'];
                    $joining_date = $row['joining_date'];
                    $basic_salary = $row['basic_salary'];
                    $house_rent = $row['house_rent'];
                    $medical_allowance = $row['medical_allowance'];
                    $trasnport_allowance = $row['trasnport_allowance'];
                    $insurance = $row['insurance'];
                    $commission = $row['commission'];
                    $extra_over_time = $row['extra_over_time'];
                    $total_salary = $row['total_salary'];
                    $user_id = $row['user_id'];
                    }
                  }

                  $area = array();
                  $sql = "SELECT * from employee_has_area WHERE emp_id='$emp_id';";
                  $result = mysqli_query($conn, $sql);
                  $checkresult = mysqli_num_rows($result);

                  if ($checkresult>0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    array_push($area, $row['area_id']);
                    }
                   }

                  $sql = "SELECT * FROM emp_basic_info WHERE emp_id='$emp_id';";
                  $result = mysqli_query($conn, $sql);
                  $checkresult = mysqli_num_rows($result);

                  if ($checkresult>0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $father = $row['father'];
                    $mother = $row['mother'];
                    $spouse = $row['spouse'];
                    $dob = $row['date_of_birth'];
                    $gender = $row['gender'];
                    $nid = $row['nid'];
                    $birth_cer_no = $row['birth_cer_no'];
                    $nationality = $row['natioinality'];
                    $religion = $row['religion'];
                    $photo = $row['photo'];
                    }
                  }

                  $sql = "SELECT * FROM emp_contact_info WHERE emp_id='$emp_id';";
                  $result = mysqli_query($conn, $sql);
                  $checkresult = mysqli_num_rows($result);

                  if ($checkresult>0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $pre_house = $row['pre_house'];
                    $pre_road = $row['pre_road'];
                    $pre_village = $row['pre_village'];
                    $pre_post = $row['pre_post'];
                    $pre_police_station = $row['pre_police_station'];
                    $pre_district = $row['pre_district'];
                    $pre_post_code = $row['pre_post_code'];

                    $per_house = $row['per_house'];
                    $per_road = $row['per_road'];
                    $per_village = $row['per_village'];
                    $per_post = $row['per_post'];
                    $per_police_station = $row['per_police_station'];
                    $per_district = $row['per_district'];
                    $per_post_code = $row['per_post_code'];

                    $mobile = $row['mobile'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    }
                  }

                  $sql = "SELECT * FROM emp_health_info WHERE emp_id='$emp_id';";
                  $result = mysqli_query($conn, $sql);
                  $checkresult = mysqli_num_rows($result);

                  if ($checkresult>0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $height_feet = $row['height_feet'];
                    $height_inch = $row['height_inch'];
                    $weight = $row['weight'];
                    $blood = $row['blood'];
                    $mark = $row['mark'];
                    }
                  }

                   ?>

                   <div class="" role="main">
                     <div class="">
                       <div class="page-title">
                         <div class="title_left">
                           <h3>Tables <small>Some examples to get you started</small></h3>
                         </div>


                       </div>

                       <div class="clearfix"></div>

                       <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Photo</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>

                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td><img src="<?php echo $photo; ?>" height="130px"  style="border-radius: ;" class="" alt=""></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Health Info</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>
                                   <tr>
                                     <th>Field</th>
                                     <th>Info</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>Height</td>
                                     <td><?php echo $height_feet." feet ".$height_inch." inch"; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Weight</td>
                                     <td><?php echo $weight; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Blood group</td>
                                     <td><?php echo $blood; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Identity mark</td>
                                     <td><?php echo $mark; ?></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                         <div class="clearfix"></div>
                       </div>

                       <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Office Info</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>
                                   <tr>
                                     <th>Field</th>
                                     <th>Info</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>EMP ID</td>
                                     <td><?php echo $emp_id; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Designation</td>
                                     <td><?php echo $designation; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Joining date</td>
                                     <td><?php echo $joining_date; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Basic salary</td>
                                     <td><?php echo $basic_salary." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>House rent</td>
                                     <td><?php echo $house_rent." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Medical allowance</td>
                                     <td><?php echo $medical_allowance." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Transport allowance</td>
                                     <td><?php echo $trasnport_allowance." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Insurance</td>
                                     <td><?php echo $insurance." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Commission</td>
                                     <td><?php echo $commission." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Extra over time</td>
                                     <td><?php echo $extra_over_time." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Total salary</td>
                                     <td><?php echo $total_salary." /="; ?></td>
                                   </tr>
                                   <tr>
                                     <td>User ID</td>
                                     <td><?php echo $user_id; ?></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Basic Info</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>
                                   <tr>
                                     <th>Field</th>
                                     <th>Info</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>Name</td>
                                     <td><?php echo $name; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Father's name</td>
                                     <td><?php echo $father; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Mother's name</td>
                                     <td><?php echo $mother; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Spouse's name</td>
                                     <td><?php echo $spouse ?></td>
                                   </tr>
                                   <tr>
                                     <td>Date of birth</td>
                                     <td><?php echo $dob; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Gender</td>
                                     <td><?php echo $gender; ?></td>
                                   </tr>
                                   <tr>
                                     <td>NID No</td>
                                     <td><?php echo $nid; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Birth Certificate No</td>
                                     <td><?php echo $birth_cer_no; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Nationality</td>
                                     <td><?php echo $nationality; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Religion</td>
                                     <td><?php echo $religion; ?></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                         <div class="clearfix"></div>
                       </div>

                       <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Present address</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>
                                   <tr>
                                     <th>Field</th>
                                     <th>Info</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>House</td>
                                     <td><?php echo $per_house; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Road</td>
                                     <td><?php echo $pre_road; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Village</td>
                                     <td><?php echo $pre_village; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Post</td>
                                     <td><?php echo $pre_post; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Police Station</td>
                                     <td><?php echo $pre_police_station; ?></td>
                                   </tr>
                                   <tr>
                                     <td>District</td>
                                     <td><?php echo $pre_district; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Post code</td>
                                     <td><?php echo $pre_post_code; ?></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Permanent address</h2>
                               <div class="clearfix"></div>
                             </div>
                             <div class="x_content">

                               <table class="table">
                                 <thead>
                                   <tr>
                                     <th>Field</th>
                                     <th>Info</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>House</td>
                                     <td><?php echo $per_house; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Road</td>
                                     <td><?php echo $per_road; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Village</td>
                                     <td><?php echo $per_village; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Post</td>
                                     <td><?php echo $per_post; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Police Station</td>
                                     <td><?php echo $per_police_station; ?></td>
                                   </tr>
                                   <tr>
                                     <td>District</td>
                                     <td><?php echo $per_district; ?></td>
                                   </tr>
                                   <tr>
                                     <td>Post code</td>
                                     <td><?php echo $per_post_code; ?></td>
                                   </tr>
                                 </tbody>
                               </table>

                             </div>
                           </div>
                         </div>

                       </div>

                       <div class="row">
                         <div class="clearfix"></div>

                         <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Academic information</h2>
                               <div class="clearfix"></div>
                             </div>

                             <div class="x_content">

                               <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                   <thead>
                                     <tr class="headings">
                                       <th class="column-title">Exam name </th>
                                       <th class="column-title">Institute </th>
                                       <th class="column-title">Board/University</th>
                                       <th class="column-title">group</th>
                                       <th class="column-title">Result</th>
                                       <th class="column-title">Passing Year</th>
                                     </tr>
                                   </thead>

                                   <tbody>
                                       <?php
                                       $sql = "SELECT * FROM emp_academic_info WHERE emp_id='$emp_id';";
                                       $result = mysqli_query($conn, $sql);
                                       $checkresult = mysqli_num_rows($result);

                                       if ($checkresult>0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                         ?>
                                          <tr class="even pointer">
                                          <td class=" "><?php echo $row['exam_name']; ?></td>
                                          <td class=" "><?php echo $row['institute']; ?></td>
                                          <td class=" "><?php echo $row['board']; ?></td>
                                          <td class=" "><?php echo $row['groupp']; ?></td>
                                          <td class=" "><?php echo $row['result']; ?></td>
                                          <td class=" "><?php echo $row['passing_year']; ?></td>
                                          </tr>
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

                       <div class="row">
                         <div class="clearfix"></div>

                         <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Documentation information</h2>
                               <div class="clearfix"></div>
                             </div>

                             <div class="x_content">

                               <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                   <thead>
                                     <tr class="headings">
                                       <th class="column-title">Document name </th>
                                       <th class="column-title">Document type </th>
                                       <th class="column-title">Description</th>
                                       <th class="column-title">Document file</th>
                                     </tr>
                                   </thead>

                                   <tbody>
                                       <?php
                                       $sql = "SELECT * FROM emp_document_info WHERE emp_id='$emp_id';";
                                       $result = mysqli_query($conn, $sql);
                                       $checkresult = mysqli_num_rows($result);

                                       if ($checkresult>0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                         ?>
                                          <tr class="even pointer">
                                          <td class=" "><?php echo $row['doc_name']; ?></td>
                                          <td class=" "><?php echo $row['doc_type']; ?></td>
                                          <td class=" "><?php echo $row['description']; ?></td>
                                          <td class=" "><img src="<?php echo $row['photo']; ?>" height="100px" alt=""></td>
                                          </tr>
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

                       <div class="row">
                         <div class="clearfix"></div>

                         <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="x_panel">
                             <div class="x_title">
                               <h2>Account information</h2>
                               <div class="clearfix"></div>
                             </div>

                             <div class="x_content">

                               <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                   <thead>
                                     <tr class="headings">
                                       <th class="column-title">Account name </th>
                                       <th class="column-title">Bank name </th>
                                       <th class="column-title">Branch name</th>
                                       <th class="column-title">Account Number</th>
                                     </tr>
                                   </thead>

                                   <tbody>
                                       <?php
                                       $sql = "SELECT * FROM emp_account_info WHERE emp_id='$emp_id';";
                                       $result = mysqli_query($conn, $sql);
                                       $checkresult = mysqli_num_rows($result);

                                       if ($checkresult>0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                         ?>
                                          <tr class="even pointer">
                                          <td class=" "><?php echo $row['acc_name']; ?></td>
                                          <td class=" "><?php echo $row['bank_name']; ?></td>
                                          <td class=" "><?php echo $row['branch_name']; ?></td>
                                          <td class=" "><?php echo $row['acc_number']; ?></td>
                                          </tr>
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
                     </div>
                   </div>

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title">All Order List</th>
                          <th class="column-title">Order Due List</th>
                          <th class="column-title">Salary Statement</th>
                          <th class="column-title">Attendance</th>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
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

      </body>
      </html>
