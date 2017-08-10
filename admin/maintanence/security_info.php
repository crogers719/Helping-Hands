<!DOCTYPE html>
<?php include "security_info_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>

<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Security Form</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="user_id" class="col-lg-2 control-label">User ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" value="<?php if(isset($user_id)){ echo htmlspecialchars($user_id);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="security_level" class="col-lg-2 control-label">Security Level</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="security_level" name="security_level" placeholder="Security Level" value="<?php if(isset($security_level)){ echo htmlspecialchars($security_level);} ?>">
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
                echo '<th>User ID</th>';
                echo '<th>Security Level</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$user_id.'</td>';
                echo '<td>'.$security_level.'</td>';
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
                echo '<th>User ID</th>';
                echo '<th>Security Level</th>';
                
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$row['USER_ID'].'</td>';
                echo '<td>'.$row['SECURITY_LEVEL'].'</td>';
               
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
                echo '<th>User ID</th>';
                echo '<th>Security Level</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$user_id.'</td>';
                echo '<td>'.$security_level.'</td>';
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