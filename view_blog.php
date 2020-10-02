<?php  include 'header.php';?>  
<?php ob_start();?>

  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-primary">DashBoard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <h1>View Blog</h1>

    <table class="table-bordered table table-hover table-dark">
    <thead>
        <tr>
            <td>Sr No</td>
            <td>Category Name</td>
            <td>Blog Title</td>
            <td>Blog Description</td>
            <td>Blog Date</td>
            <td>Blog image</td>
            <td>Action</td> 

        </tr>
    </thead>
    <tfoot>
    <tr>
                            <td>
                                <a href="create_blog.php">
                                    <button class="btn btn-primary">
                                       Insert Blog
                                    </button>
                                </a>
                            </td>
                        </tr>
    </tfoot>
    <tbody>
        <?php
        $read_blog="SELECT * FROM blog";
        $result_read_blog= mysqli_query($connection,$read_blog);

        if($result_read_blog)
        {
            $i=1;
            while($row = mysqli_fetch_array($result_read_blog))
            {
                $id = $row['id'];
                $cat_name = $row['cat_name'];
                $title = $row['blog_title'];
                $description = $row['blog_description'];
                $date = $row['blog_date'];
                $file = $row['blog_image'];

                ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $cat_name; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $file; ?></td>
                    <td>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateModal<?php echo $id ?>">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="updateModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel"> Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">

      <div class="form-group">
    <form action="" method ="POST">

        <label for="name">Category name</label>
        <input type="text" value="<?php echo $cat_name; ?>" class="form-control" name="U_name" >
        <input type="hidden" value="<?php echo $i; ?>" class="form-control" name="U_id">
        </div>
        <div class="form-group">
            <label for="">Blog Title</label>
            <input type="text" class="form-control" value="<?php echo $title; ?>" name="U_title">
        </div>
        <div class="form-group">
            <label for="">Blog Description</label>
            <input type="text" class="form-control" value="<?php echo $description; ?>" name="U_description">
        </div>
        <div class="form-group">
            <label for="">Blog Date</label>
            <input type="text" class="form-control" value="<?php echo $date; ?>" name="U_date">
        </div>
        <div class="form-group">
            <label for="">File</label>
            <input type="text" class="form-control" value="<?php echo $file; ?>" name="U_file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="update_btn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal<?php echo $id ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="DeleteModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Delete User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        Are you sure do you want to delete <?php echo $cat_name; ?>
        <input type="hidden" value="<?php echo $id;?>" name="U_delete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger" name="delete_btn">Yes</button>
      </div>
    </div>
  </div>
</div>
                    </td>
                
                </tr>



                <?php
                $i++;
            }
        }
        else
        {
            echo "Error :".mysqli_error($connection);
        }
        
        ?>

        <?php
            if(isset($_POST['update_btn']))
            {
                $id = $_POST['U_id'];
                $cat_name = $_POST['U_name'];
                $title = $_POST['U_title'];
                $description = $_POST['U_description'];
                $date = $_POST['U_date'];
                $file = $_POST['U_file'];

                $update_query = "UPDATE blog SET cat_name='$cat_name' ,blog_title='$title' ,blog_description='$description' ,blog_date='$date' ,blog_image='$file' WHERE id='$id'";
                $result_update_query= mysqli_query($connection,$update_query);
                
                if($result_update_query)
                {
                   echo "success";
                }
                 else
                {
                    echo "Error".mysqli_error($connection);
                }
            }

            if(isset($_POST['delete_btn']))
            {
              $id = $_POST['U_delete'];
                

              $delete_query = "DELETE FROM blog WHERE id='$id' ";
              $result_del = mysqli_query($connection,$delete_query);
              if($result_del)
              {
                  header("Location:view_blog.php");
              }
              else
              {
                  echo "Error :".mysqli_error($connection);
              }
            }
          
        ?>
    </tbody>
    </table>
    <?php  include 'footer.php';?>  

