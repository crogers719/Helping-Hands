<!DOCTYPE html>
<?php include "activity_site_day_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Report Specific Site For a Day</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="page" class="col-lg-2 control-label">URL Page</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="page" name="page" placeholder="" value="<?php if(isset($page)){ echo htmlspecialchars($page);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="start_date" class="col-lg-2 control-label">Start Date</label>
                <div class="col-lg-10">
                  <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" value="<?php if(isset($start_date)){ echo htmlspecialchars($start_date);} ?>" required>
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

            if(mysql_num_rows($r)!= 0 ||mysql_num_rows($r2)!= 0){
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';
                  echo '<div class="panel-heading">URL Page: '.$page.'</div>';
                  echo '<div class="panel-body">';

             echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>User ID</th>';
                 echo '<th>Date Entered</th>';
                echo '<th>Date Exit</th>';
               
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';            
      

               while($row=mysql_fetch_array($r)){
                  

                 echo '<tr class="info">';
                  echo '<td>'.$row['USER_ID'].'</td>';
                  echo '<td>'.$row['DATE_TIME_END'].'</td>';
                  
                }
               while($row=mysql_fetch_array($r2)){
                  

                 echo '<tr class="info">';
                  echo '<td>'.$row['USER_ID'].'</td>';
                  echo '<td>'.$row['DATE_TIME_START'].'</td>';
                  echo '<td>'.$row['DATE_TIME_END'].'</td>';
                  
                }
                echo '</tbody>';
                echo '</table>';

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }else
              {
              echo '<script language="javascript">';
              echo 'alert("Invalid! Enter in a Valid URL and Date!!")';
             echo '</script>';;
              }
             
          
          ?>

  </div>
</div>



<?php include "../../_footer.php"; ?>

</html>