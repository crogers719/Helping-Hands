<!DOCTYPE html>
<?php include "user_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>

<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">User Form</h1>
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
                <label for="username" class="col-lg-2 control-label">User Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php if(isset($username)){ echo htmlspecialchars($username);} ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(isset($email)){ echo htmlspecialchars($email);} ?>" >
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)){ echo htmlspecialchars($password);} ?>">
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
                echo '<th>User Name</th>';
                 echo '<th>Email</th>';
                echo '<th>Password</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$user_id.'</td>';
                echo '<td>'.$username.'</td>';
                 echo '<td>'.$email.'</td>';
                echo '<td>'.$password.'</td>';
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
                echo '<th>User Name</th>';
                 echo '<th>Email</th>';
                echo '<th>Password</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$row['USER_ID'].'</td>';
                echo '<td>'.$row['USER_NAME'].'</td>';
               echo '<td>'.$row['EMAIL'].'</td>';
                echo '<td>'.$row['PASSWORD'].'</td>';
               
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
                echo '<th>User Name</th>';
                 echo '<th>Email</th>';
                echo '<th>Password</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$user_id.'</td>';
                echo '<td>'.$username.'</td>';
                 echo '<td>'.$email.'</td>';
                echo '<td>'.$password.'</td>';
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