<!DOCTYPE html>
<html lang="en">
<?php include "database.php"; ?>
<?php include "connect.php" ?>
<?php include "_header.php"; ?> 

<?php require_user(); ?>

<div class="container">
<div class="row">
	<div class="col-lg-12">
<?php
echo '<center><h1>You have successfully logged out. You will now be re-directed to the login screen.</h1></center>';
session_destroy();
?>


<?php 
$page = $_SESSION['page'];
$date_time_start = $_SESSION['start_date'];
$now = new DateTime();
$date_time_end = $now -> format('Y-m-d H:i:s');
$activity_log_form_data = array(
	'USER_ID' => $_SESSION['user_id'],
	'PAGE'    => $page,
	'DATE_TIME_START' => $date_time_start,
	'DATE_TIME_END' => $date_time_end
	);
	
$table_name = "ACTIVITY_LOG";
mysql_query("LOCK TABLES ACTIVITY_LOG WRITE;"); 
dbRowInsert($table_name, $activity_log_form_data);
mysql_query("UNLOCK TABLES;");

header("Refresh: 3; URL=index.php");
		
 ?> 

</div>
</div>
</div>



<?php






?>
	
<?php include "_footer.php"; ?>