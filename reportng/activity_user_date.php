<!DOCTYPE html>
 <?php include "activity_user_date_form.php"; ?>  

<html lang="en">

<?php include "../../_header.php"; ?>  

<div class="container">
	<div class="bs-docs-section">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="forms">Security Log By User Today</h1>
				</div>
			</div>
		</div>
    <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="user_id" class="col-lg-2 control-label">Seller ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Seller ID" value="<?php if(isset($user_id)){ echo htmlspecialchars($user_id);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="start_date" class="col-lg-2 control-label">Start Date</label>
                <div class="col-lg-10">
                  <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" value="<?php if(isset($start_date)){ echo htmlspecialchars($start_date);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="end_date" class="col-lg-2 control-label">End Date</label>
                <div class="col-lg-10">
                  <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" value="<?php if(isset($end_date)){ echo htmlspecialchars($end_date);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary" name="report">Report</button>                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
						<?php 

				if(mysql_num_rows($r)!= 0){
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';
                  echo '<div class="panel-heading">';
                  echo '<div class="panel-body">';

             echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>User ID</th>';
                echo '<th>Page</th>';
                echo '<th>Time Entered</th>';
                 echo '<th>Time Exited</th>';

                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';            
      

               while($row=mysql_fetch_array($r)){


                  echo '<tr class="info">';
                  echo '<td>'.$row['USER_ID'].'</td>';
                  echo '<td>'.$row['PAGE'].'</td>';
                  echo '<td>'.$row['DATE_TIME_START'].'</td>';
                  echo '<td>'.$row['DATE_TIME_END'].'</td>';
                  echo '</tr>';
                }
                  echo '</tbody>';
                  echo '</table>';

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }
             
          
          ?>


  </div>
</div>



<?php include "../../_footer.php"; ?>

</html>