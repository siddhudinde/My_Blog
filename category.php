<?php  include 'header.php';?>  

<?php ob_start();?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <h1>Selected Category</h1>

          <table class="table table-bordered table-hover table-dark table">
              <thead>
                  <tr>
                  <td>Sr No </td>
                      <td>Category name </td>
                      <td>Category Created Time </td>
                      <td>Action</td>
                  </tr>
              </thead>

              <tfoot>
              <tr>
                      <!-- <td>Sr No </td>
                      <td>Category name </td>
                      <td>Category Created Time </td>
                      <td>Action</td> -->
                </tr>
                <tr>
                            <td>
                                <a href="create_blog.php">
                                    <button class="btn btn-primary">
                                       Create Blog
                                    </button>
                                </a>
                            </td>
                        </tr>
              </tfoot>
                    
              <tbody>
              <?php
                    
                    $read_category ="SELECT * FROM category";
                    $result_read_category = mysqli_query($connection,$read_category);

                    if($result_read_category)
                    {
                        $i=1;
                        while($row = mysqli_fetch_array($result_read_category))
                        { 
                           
                        ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $row['category_name']?></td>
                        <td><?php echo $row['created_at']?></td>
                        <td>
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'] ?>">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
      <div class="form-grup">
       
            <form action="" method ="POST">
            <label for="name">Category Name</label>
            <input type="text" value="<?php echo $row['category_name']?>" class="form-control" name="U_name" >
            <input type="hidden" value="<?php echo $row['id'] ?>" class="form-control" name="U_id">
            </div>
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_btn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'] ?>">
 Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
      Are you sure want to Delete <?php echo $row['category_name']?> User ??
      <input type="hidden" value="<?php echo $row['id'] ?>" class="form-control" name="delete_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
                        $name = $_POST['U_name'];
                       

                        $update_query = "UPDATE category SET category_name='$name' WHERE id='$id'";
                        $result_update_query= mysqli_query($connection,$update_query);

                        if($result_update_query)
                        {
                            header("Location:category.php");
                        }
                        else
                        {
                            echo "Error :".mysqli_error($connection);
                        }
                      }

                      if(isset($_POST['delete_btn']))
                      {
                        $id = $_POST['delete_id'];
                          

                        $delete_query = "DELETE FROM category WHERE id='$id' ";
                        $result_del = mysqli_query($connection,$delete_query);
                        if($result_del)
                        {
                            header("Location:category.php");
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
