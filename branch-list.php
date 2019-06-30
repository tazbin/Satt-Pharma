<?php
include_once('inc/header.php');
include_once("inc/topbody.php");
include_once('inc/sidebar.php');
include_once("inc/topbar.php");
 ?>

        <!-- page content -->
        <div class="right_col" role="main">

          <!-- my code goes here -->

          <?php

          include 'inc/dbh.php';

            if (isset($_POST['delid'])) {
              $delid = $_POST['delid'];
              $sql = "SELECT * FROM branch WHERE id=$delid;";
              $result = mysqli_query($conn, $sql);
              $checkresult = mysqli_num_rows($result);

              if ($checkresult>0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $delfav=$row['favicon'];
                $dellogo=$row['logo'];
                }
              }

              unlink($delfav);
              unlink($dellogo);

              $sql = "DELETE FROM branch WHERE id=$delid;";
              mysqli_query($conn, $sql);

              $sql = "DELETE FROM branch_has_area WHERE branch_id=$delid;";
              mysqli_query($conn, $sql);
            }

            if (isset($_POST['edit'])) {
              $editid = $_POST['id'];

              header("Location: edit-branch.php?editid='.$editid.");
              exit();
            }

           ?>



            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Branch List <small></small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Name</th>
                            <th class="column-title">Logo </th>
                            <th class="column-title">Branch No </th>
                            <th class="column-title">Address </th>
                            <th class="column-title">Mobile </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">User Id </th>
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

                                $sql = "SELECT * FROM branch";
                                $result = mysqli_query($conn, $sql);
                                $checkresult = mysqli_num_rows($result);

                                if ($checkresult>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  ?>

                                  <form class="" action="" method="post" id="form_<?php echo $row['id']; ?>">
                                    <?php echo '<input type="hidden" name="delid" value="'.$row['id'].'">' ?>

                                  <?php
                                  echo '<tr class="even pointer">';
                                  echo '<td class=" ">'.$row['name'].'</td>';
                                  echo '<td class=" "><img src='.$row['logo'].' width="50px" alt=""></td>';
                                  echo '<td class=" ">'.$row['branch_no'].'</td>';
                                  echo '<td class=" ">'.$row['address'].'</td>';
                                  echo '<td class=" ">'.$row['mobile'].'</td>';
                                  echo '<td class=" ">'.$row['email'].'</td>';
                                  echo '<td class=" ">'.$row['user_id'].'</td>';

                                  ?>
                                  <td class=" ">
                                    <a name="edit" class="btn btn-sm btn-primary" name="button" href="edit-branch.php?id=<?php echo $row['id']; ?>">Edit</a>
                                    <input type="submit" name="delete" class="btn btn-sm btn-danger" data-id="<?php echo $row['id']; ?>" id="delete" value="Delete">
                                  </td>

                                  </form>

                                  <?php
                                  echo '</tr>';
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
