<?php
include_once('inc/header.php');
include_once("inc/topbody.php");
include_once('inc/sidebar.php');
include_once("inc/topbar.php");

date_default_timezone_set('Asia/Dhaka');
 ?>

 <?php

 include 'inc/dbh.php';

 if (isset($_POST['submit'])) {

   //office Information
   $emp_id = $_POST['empid'];
   $designation = $_POST['designation'];
   $joining_date = $_POST['joiningdate'];
   $basic_salary = $_POST['basic_salary'];
   $house_rent = $_POST['house_rent'];
   $medical_allowance = $_POST['medical_allowance'];
   $transport_allowance = $_POST['transport_allowance'];
   $insurance = $_POST['insurance'];
   $commission = $_POST['commission'];
   $extra_over_time = $_POST['extra_over_time'];
   $total_salary = $_POST['total_salary'];
   $user_id = $_POST['userid'];
   $pass_one = $_POST['passone'];
   $pass_two = $_POST['passtwo'];

   $area = array();
   $area = $_POST['area'];

   if ($pass_one!=$pass_two) {
     $pass_miss = "password not matched!";
     //abort

   } else{

     $pass = MD5($pass_one);

     $sql = "INSERT INTO emp_office_info VALUES(
       '$emp_id',
       '$designation',
       '$joining_date',
       '$basic_salary',
       '$house_rent',
       '$medical_allowance',
       '$transport_allowance',
       '$insurance',
       '$commission',
       '$extra_over_time',
       '$total_salary',
       '$user_id',
       '$pass'
     );";

     mysqli_query($conn, $sql);
     //office information

   //area information
   foreach ($area as $key => $value) {
     $sql = "INSERT INTO employee_has_area (emp_id, area_id) VALUES(
       '$emp_id',
       '$value'
     );";

     mysqli_query($conn, $sql);
   }
   //area information

   //basic information
   $name = $_POST['name'];
   $father = $_POST['fathername'];
   $mother = $_POST['mothername'];
   $spouse = $_POST['spousename'];
   $dob = $_POST['dateofbirth'];
   $gender = $_POST['gender'];
   $nid = $_POST['nid'];
   $birth_cer_no = $_POST['birthno'];
   $nationality = $_POST['nationality'];
   $religion = $_POST['religion'];
   //photo
   $favicon = $_FILES['photo'];
   $favName = $_FILES['photo']['name'];
   $favTempName = $_FILES['photo']['tmp_name'];
   $favSize = $_FILES['photo']['size'];
   $favError = $_FILES['photo']['error'];
   $favType = $_FILES['photo']['type'];

   if (!empty($favName)) {
     $fileExt = explode('.', $favName);
     $fileActualExt = strtolower(end($fileExt));

     $unique_image = md5(time());
     $unique_image = substr($unique_image, 0, 10) . '.' . $fileActualExt;

     $allowed = array( 'jpg', 'jpeg', 'png' );

     if ( in_array($fileActualExt, $allowed) ) {
       if ( $favError === 0 ) {

         $fileDestination = 'uploads/employee/'.'pro'.$unique_image;
         $favDestination = $fileDestination;

         move_uploaded_file($favTempName, $fileDestination);

       }
     }
   } else{
     $favDestination="";
   }
   //photo
   $sql = "INSERT INTO emp_basic_info VALUES(
     '$emp_id',
     '$name',
     '$father',
     '$mother',
     '$spouse',
     '$dob',
     '$gender',
     '$nid',
     '$birth_cer_no',
     '$nationality',
     '$religion',
     '$favDestination'
   );";

   mysqli_query($conn, $sql);
   //basic information

   //contact information
   $pre_house = $_POST['pre_house'];
   $pre_road = $_POST['pre_road'];
   $pre_village = $_POST['pre_village'];
   $pre_post = $_POST['pre_post'];
   $pre_police_station = $_POST['pre_policestation'];
   $pre_district = $_POST['pre_district'];
   $pre_post_code = $_POST['pre_postcode'];

   $per_house = $_POST['per_house'];
   $per_road = $_POST['per_road'];
   $per_village = $_POST['per_village'];
   $per_post = $_POST['per_post'];
   $per_police_station = $_POST['per_policestation'];
   $per_district = $_POST['per_district'];
   $per_post_code = $_POST['per_postcode'];

   $mobile = $_POST['mobile'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];

   $sql = "INSERT INTO emp_contact_info VALUES(
     '$emp_id',
     '$pre_house',
     '$pre_road',
     '$pre_village',
     '$pre_post',
     '$pre_police_station',
     '$pre_district',
     '$pre_post_code',
     '$per_house',
     '$per_road',
     '$per_village',
     '$per_post',
     '$per_police_station',
     '$per_district',
     '$per_post_code',
     '$mobile',
     '$phone',
     '$email'
   );";

   mysqli_query($conn, $sql);
   //contact information

   //academic Information
   $exam_name = array();
   $institute = array();
   $board = array();
   $group = array();
   $result = array();
   $passing_year = array();

   $exam_name = $_POST['examname'];
   $institute = $_POST['institute'];
   $board = $_POST['board'];
   $group = $_POST['group'];
   $result = $_POST['result'];
   $passing_year = $_POST['passing'];

   $num = count($exam_name);

   for ($i=0; $i < $num; $i++) {
     $sql = "INSERT INTO emp_academic_info(
        emp_id,
        exam_name,
        institute,
        board,
        groupp,
        result,
        passing_year
     )
     VALUES(
      '$emp_id',
      '$exam_name[$i]',
      '$institute[$i]',
      '$board[$i]',
      '$group[$i]',
      '$result[$i]',
      '$passing_year[$i]'
     );";

     mysqli_query($conn, $sql);
   }
   //academic information

   //document Information
   $docname = array();
   $doctype = array();
   $description = array();
   $up = array();

   $docname = $_POST['docname'];
   $doctype = $_POST['doctype'];
   $description = $_POST['description'];

   $num = count($docname);

   for ($i=0; $i < $num; $i++) {

     $favicon = $_FILES['up'];
     $favName = $favicon['name'][$i];
     $favTempName = $favicon['tmp_name'][$i];
     $favSize = $favicon['size'][$i];
     $favError = $favicon['error'][$i];
     $favType = $favicon['type'][$i];
     $favDestination = "";
     if (!empty($favName)) {
       $fileExt = explode('.', $favName);
       $fileActualExt = strtolower(end($fileExt));

       $unique_image = md5(time());
       $unique_image = substr($unique_image, 0, 10) . '.' . $fileActualExt;


       $allowed = array( 'jpg', 'jpeg', 'png' );

       if ( in_array($fileActualExt, $allowed) ) {
         if ( $favError === 0 ) {

           $fileDestination = 'uploads/document/'.$i.$unique_image;
           $favDestination = $fileDestination;

           move_uploaded_file($favTempName, $fileDestination);

         }
       }
     }

     $sql = "INSERT INTO emp_document_info(
        emp_id,
        doc_name,
        doc_type,
        description,
        photo
     )
     VALUES(
      '$emp_id',
      '$docname[$i]',
      '$doctype[$i]',
      '$description[$i]',
      '$favDestination'
     );";

     mysqli_query($conn, $sql);
   }
   //document information

   //account Information
   $acc_name = array();
   $bank_name = array();
   $branch_name = array();
   $acc_number = array();

   $acc_name = $_POST['accname'];
   $bank_name = $_POST['bankname'];
   $branch_name = $_POST['branchname'];
   $acc_number = $_POST['accnumber'];

   $num = count($acc_name);

   for ($i=0; $i < $num; $i++) {
     $sql = "INSERT INTO emp_account_info(
        emp_id,
        acc_name,
        bank_name,
        branch_name,
        acc_number
     )
     VALUES(
      '$emp_id',
      '$acc_name[$i]',
      '$bank_name[$i]',
      '$branch_name[$i]',
      '$acc_number[$i]'
     );";

     mysqli_query($conn, $sql);
   }
   //account information

   //health Information

   $height_feet = $_POST['height_feet'];
   $height_inch = $_POST['height_inch'];
   $weight = $_POST['weight'];
   $blood = $_POST['blood'];
   $mark = $_POST['mark'];
     $sql = "INSERT INTO emp_health_info(
        emp_id,
        weight,
        blood,
        mark,
        height_feet,
        height_inch
     )
     VALUES(
      '$emp_id',
      '$weight',
      '$blood',
      '$mark',
      '$height_feet',
      '$height_inch'
     );";

     mysqli_query($conn, $sql);
   //health information

   $msg_success = "emp added!";
 }

 }

  ?>

        <!-- page content -->
        <div class="right_col" role="main">

          <!-- my code goes here -->

          <!-- office information -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Office Information <small>Insert data</small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="id_no" name="empid" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo('EMP-'.substr(uniqid('', true), -6).substr(number_format(time() * rand(),0,'',''),0,2)) ?>" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Area Name *
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" value="<?php echo isset($designation)? $designation: "" ?>" name="designation" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Joining date
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="joiningdate" value="<?php echo date('d-m-Y'); ?>" readonly class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <!-- salary -->
                    <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Basic Salary (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="basic_salary" class="form-control col-md-7 col-xs-12" value="<?php echo isset($basic_salary)? $basic_salary: "" ?>" type="number" min="0" name="basic_salary" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">House Rent (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="house_rent" class="form-control col-md-7 col-xs-12" value="<?php echo isset($house_rent)? $house_rent: "" ?>" type="number" min="0" name="house_rent" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Medical Allowance (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="medical_allowance" class="form-control col-md-7 col-xs-12" type="number" min="0" value="<?php echo isset($medical_allowance)? $medical_allowance: "" ?>" name="medical_allowance" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Transport Allowance (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="transport_allowance" class="form-control col-md-7 col-xs-12" type="number" min="0" value="<?php echo isset($transport_allowance)? $transport_allowance: "" ?>" name="transport_allowance" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Insurance (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="insurance" class="form-control col-md-7 col-xs-12" type="number" min="0" name="insurance" value="<?php echo isset($insurance)? $insurance: "" ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Commission (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" min="0" id="commission" class="form-control col-md-7 col-xs-12" name="commission" value="<?php echo isset($commission)? $commission: "" ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Exra Over Time (tk)<span class="required" style="color: red">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="extra_over_time" class="form-control col-md-7 col-xs-12" type="number" min="0" name="extra_over_time" value="<?php echo isset($extra_over_time)? $extra_over_time: "" ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Total Salary (tk)</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="total_salary" class="form-control col-md-7 col-xs-12" type="number" min='0' name="total_salary" readonly="" value="<?php echo isset($total_salary)? $total_salary: "" ?>" style="background: #2996A5;color: white;text-align: center;" value="0">
                  </div>
                </div>
                    <!-- salary -->

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">User ID<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="userid" required="required" value="<?php echo isset($user_id)? $user_id: "" ?>" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="passone" required="required" type="password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="passtwo" required="required" type="password">
                      </div>
                    </div>

          <!-- office information -->

          <!-- basic information -->
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 50px; padding-bottom: 50px">
                        <div class="x_title">
                          <h2>Basic Information <small>Insert data</small></h2>

                          <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="name" value="<?php echo isset($name)? $name:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Father's Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="fathername" value="<?php echo isset($father)? $father:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mother's Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="mothername" value="<?php echo isset($mother)? $mother:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Spouse's Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" value="<?php echo isset($spouse)? $spouse:""; ?>" name="spousename" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of birth
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="dateofbirth" value="<?php echo isset($dob)? $dob:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select type="text" id="last-name" name="gender" class="form-control col-md-7 col-xs-12">
                          <option <?php isset($gender)? $gender=="male" ? 'selected':"": "" ?> value="male">Male</option>
                          <option <?php isset($gender)? $gender=="female" ? 'selected':"": "" ?> value="female">Female</option>
                          <option <?php isset($gender)? $gender=="others" ? 'selected':"": "" ?> value="others">Others</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NID No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="nid" value="<?php echo isset($nid)? $nid:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Birth Certificate No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="birthno" value="<?php echo isset($birth_cer_no)? $birth_cer_no:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nationality
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="nationality" value="<?php echo isset($nationality)? $nationality:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Religion
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="religion" value="<?php echo isset($religion)? $religion:""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="last-name" name="photo" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
          <!-- basic information -->

          <!-- contact information -->
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 50px; padding-bottom: 50px">
                        <div class="x_title">
                          <h2>contact Information <small>Insert data</small></h2>
                          <div class="clearfix"></div>
                        </div>
                    </div>

                    <h2 class="text-center">Present address</h2>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">House
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_house" value="<?php echo isset($pre_house)? $pre_house: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Road
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_road" value="<?php echo isset($pre_road)? $pre_road: ""; ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Village
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_village" value="<?php echo isset($pre_village)? $pre_village: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_post" value="<?php echo isset($pre_post)? $pre_post: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Police Station
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_policestation" value="<?php echo isset($pre_police_station)? $pre_police_station: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_district" value="<?php echo isset($pre_district)? $pre_district: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post Code
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="pre_postcode" value="<?php echo isset($pre_post_code)? $pre_post_code: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <br><br>

                    <h2 class="text-center">Permanent address</h2>
                    <hr style="width: 50%">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">House
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_house" value="<?php echo isset($per_house)? $per_house: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Road
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_road" value="<?php echo isset($per_road)? $per_road: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Village
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_village" value="<?php echo isset($per_village)? $per_village: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_post" value="<?php echo isset($per_post)? $per_post: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Police Station
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_policestation" value="<?php echo isset($per_police_station)? $per_police_station: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_district" value="<?php echo isset($per_district)? $per_district: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post Code
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="per_postcode" value="<?php echo isset($per_post_code)? $per_post_code: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="last-name" name="mobile" value="<?php echo isset($mobile)? $mobile: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone NO
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="last-name" name="phone" value="<?php echo isset($phone)? $phone: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E mail
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="last-name" name="email" value="<?php echo isset($email)? $email: ""; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
          <!-- contact information -->

          <!-- academic information -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br><br><br>
                <div class="x_title">
                  <h2>Academic Information <small>Insert data</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Exam Name</th>
                        <th>Institute</th>
                        <th>Board/University</th>
                        <th>Group</th>
                        <th>Result</th>
                        <th>Passing year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="acatable">
                      <tr>
                        <td>
                          <input type="text" id="last-name" name="examname[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="institute[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="board[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="group[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="result[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="passing[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-danger" name="button" id="removeacarow">Remove</button>
                        </td>
                      </tr>
                    </tbody>
                    <button type="button" class="btn btn-sm btn-success" name="button" id="addacarow">Add more field</button>
                  </table>
                </div>

            </div>
          </div>
          <!-- academic information -->

          <!-- documentattion information -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br><br><br>
                <div class="x_title">
                  <h2>Documentation Information <small>Insert data</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Document Name</th>
                        <th>Document Type</th>
                        <th>Description</th>
                        <th>Upload Document</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="doctable">
                      <tr>
                        <td>
                          <input type="text" id="last-name" name="docname[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="doctype[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="description[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="file" id="last-name" name="up[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-danger" name="button" id="removedocrow">Remove</button>
                        </td>
                      </tr>
                    </tbody>
                    <button type="button" class="btn btn-sm btn-success" name="button" id="adddocrow">Add more field</button>
                  </table>
                </div>

            </div>
          </div>
          <!-- documentation information -->

          <!-- account information -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br><br><br>
                <div class="x_title">
                  <h2>Account Information <small>Insert data</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Account Name</th>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <th>Account Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id='acctable'>
                      <tr>
                        <td>
                          <input type="text" id="last-name" name="accname[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="bankname[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="branchname[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <input type="text" id="last-name" name="accnumber[]" class="form-control col-md-7 col-xs-12">
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-danger" id="removeacc">Remove</button>
                        </td>
                      </tr>
                    </tbody>
                    <button type="button" class="btn btn-sm btn-success" id="addacc">Add more field</button>
                  </table>
                </div>

            </div>
          </div>
          <!-- account information -->

          <!-- health information -->
                <div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 50px; padding-bottom: 50px">
                        <div class="x_title">
                          <h2>Health Information <small>Insert data</small></h2>
                          <div class="clearfix"></div>
                        </div>
                    </div>

                    <h2 class="container text-center">Health Information</h2>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Height
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select type="text" id="last-name" name="height_feet" class="form-control col-md-7 col-xs-12">
                          <option value="1">1 feet</option>
                          <option value="2">2 feet</option>
                          <option value="3">3 feet</option>
                          <option value="4">4 feet</option>
                          <option value="5">5 feet</option>
                          <option value="6">6 feet</option>
                          <option value="7">7 feet</option>
                          <option value="8">8 feet</option>
                          <option value="9">9 feet</option>
                          <option value="10">10 feet</option>
                          <option value="11">11 feet</option>
                          <option value="12">12 feet</option>
                        </select>
                        <select type="text" id="last-name" name="height_inch" style="margin-top: 10px" class="form-control col-md-7 col-xs-12">
                          <option value="1">1 inch</option>
                          <option value="2">2 inch</option>
                          <option value="3">3 inch</option>
                          <option value="4">4 inch</option>
                          <option value="5">5 inch</option>
                          <option value="6">6 inch</option>
                          <option value="7">7 inch</option>
                          <option value="8">8 inch</option>
                          <option value="9">9 inch</option>
                          <option value="10">10 inch</option>
                          <option value="11">11 inch</option>
                          <option value="12">12 inch</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Weight
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="weight" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blood group
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="blood" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Body Identify Mark
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="mark" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-block btn-success">Add Employee</button>
                      </div>
                    </div>
                  </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- health information -->


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
      $(document).ready(function(){
        $(document).on('keyup blur', "#basic_salary", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#house_rent", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#medical_allowance", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#transport_allowance", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#insurance", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#commission", function() {
            calculate_salary();
          });

          $(document).on('keyup blur', "#extra_over_time", function() {
            calculate_salary();
          });
      }); // end of document ready function

      // the folllowing function is for claculating total Salary
      function calculate_salary() {
          var basic_salary = $("#basic_salary").val();
          var house_rent = $("#house_rent").val();
          var medical_allowance = $("#medical_allowance").val();
          var transport_allowance = $("#transport_allowance").val();
          var insurance = $("#insurance").val();
          var commission = $("#commission").val();
          var extra_over_time = $("#extra_over_time").val();

          if (basic_salary == "") {
            basic_salary = 0;
          }

          if (house_rent == "") {
            house_rent = 0;
          }

          if (medical_allowance == "") {
            medical_allowance = 0;
          }

          if (transport_allowance == "") {
            transport_allowance = 0;
          }

          if (insurance == "") {
            insurance = 0;
          }

          if (commission == "") {
            commission = 0;
          }

          if (extra_over_time == "") {
            extra_over_time = 0;
          }

          var total_salary = parseFloat(basic_salary) + parseFloat(house_rent) + parseFloat(medical_allowance) + parseFloat(transport_allowance) + parseFloat(insurance) + parseFloat(commission) + parseFloat(extra_over_time);
          //console.log(total_salary);
          $("#total_salary").val(total_salary);
        }

      </script>

      <script type="text/javascript">
      //academic add row
        var addAcaRow = '<tr><td><input type="text" id="last-name" name="examname[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="institute[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="board[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="group[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="result[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="passing[]" class="form-control col-md-7 col-xs-12"></td><td><button type="button" class="btn btn-sm btn-danger" name="button" id="removeacarow">Remove</button></td></tr>';

        $(document).ready(function(){

          $('#addacarow').click(function(){
            $('#acatable').append(addAcaRow);
          });

          $(document).on('click', '#removeacarow', function(){
            $(this).parents('tr').remove();
          })

        });
        //academic add row
      </script>

      <script type="text/javascript">
      //document add row
        var addDocRow = '<tr><td><input type="text" id="last-name" name="docname[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="doctype[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="description[]" class="form-control col-md-7 col-xs-12"></td><td><input type="file" id="last-name" name="up[]" class="form-control col-md-7 col-xs-12"></td><td><button type="button" class="btn btn-sm btn-danger" name="button" id="removedocrow">Remove</button></td></tr>';

        $(document).ready(function(){

          $('#adddocrow').click(function(){
            $('#doctable').append(addDocRow);
          });

          $(document).on('click', '#removedocrow', function(){
            $(this).parents('tr').remove();
          })

        });
        //document add row
      </script>

      <script type="text/javascript">
      //account add row
        var addAccRow = '  <tr><td><input type="text" id="last-name" name="accname[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="bankname[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="branchname[]" class="form-control col-md-7 col-xs-12"></td><td><input type="text" id="last-name" name="accnumber[]" class="form-control col-md-7 col-xs-12"></td><td><button type="button" class="btn btn-sm btn-danger" id="removeacc">Remove</button></td></tr>';

        $(document).ready(function(){

          $('#addacc').click(function(){
            $('#acctable').append(addAccRow);
          });

          $(document).on('click', '#removeacc', function(){
            $(this).parents('tr').remove();
          })

        });
        //account add row
      </script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <?php
      if (isset($pass_miss)) {
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


          if (isset($msg_success)) {
            ?>

            <script type="text/javascript">
            Swal.fire(
            'New Employee Added',
            '',
            'success'
            )
            </script>
            <?php

          }
     ?>

      </body>
      </html>
