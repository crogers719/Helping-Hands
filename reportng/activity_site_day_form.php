<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

$start_date = $_POST['start_date'];
	$page=$_POST['page'];

if (isset($_POST['report'])) {
	
	
	$query = "SELECT * FROM ACTIVITY_LOG WHERE DATE(DATE_TIME_START) = '".$start_date."' AND PAGE ='".$page."'";
	$query2 = "SELECT * FROM ACTIVITY_LOG_HISTORY WHERE DATE(DATE_TIME_START) = '".$start_date."' AND PAGE ='".$page."'"; 
	?>
	<pre><?php var_dump($query2);?></pre>

	<?php 
	
	$r = mysql_query($query);
	$r2 = mysql_query($query2);
}
?>