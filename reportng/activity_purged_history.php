<!DOCTYPE html>
 <?php include "activity_purged_history_form.php"; ?>  

<html lang="en">

<?php include "../../_header.php"; ?>  

<div class="container">
	<div class="bs-docs-section">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="forms">Complete Security Log Including Purged History</h1>
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
