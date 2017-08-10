<!DOCTYPE html>
<?php include "category_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>

<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Category Form</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="category_id" class="col-lg-2 control-label">Category ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Category ID" value="<?php if(isset($category_id)){ echo htmlspecialchars($category_id);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="category_name" class="col-lg-2 control-label">Category Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?php if(isset($category_name)){ echo htmlspecialchars($category_name);} ?>">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
                  <button type="submit" class="btn btn-primary" name="retrieve">Retrieve</button>
                  <button type="submit" class="btn btn-primary" name="delete" onclick="return confirm('You are about to delete. Do you want to continue?');">Delete</button>
                  <button type="submit" class="btn btn-primary" name="modify">Modify</button>
                </div>
              </div>
            </fieldset>
          </form>
          <div>
            <?php 

            if(!empty($insert_resource)){
              if($insert_resource){               
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Category ID</th>';
                echo '<th>Category Name</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$category_id.'</td>';
                echo '<td>'.$category_name.'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }
            else if(!empty($delete_resource)){
              if($delete_resource){

                                
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Category ID</th>';
                echo '<th>Category Name</th>';
                
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$row['CATEGORY_ID'].'</td>';
                echo '<td>'.$row['CATEGORY_NAME'].'</td>';
               
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }

            else if(!empty($update_resource)){
              if($update_resource){               
                 echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Category ID</th>';
                echo '<th>Category Name</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$category_id.'</td>';
                echo '<td>'.$category_name.'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }

             ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include "../../_footer.php"; ?>

</html>