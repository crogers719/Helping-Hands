<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();


if (isset($_POST['report'])) {
	
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];	
	$query = "SELECT * FROM ACTIVITY_LOG_HISTORY WHERE DATE_TIME_START BETWEEN '".$start_date."' AND '".$end_date."'";
	$query2 = "SELECT * FROM ACTIVITY_LOG WHERE DATE_TIME_START BETWEEN '".$start_date."' AND '".$end_date."'";
	$r = mysql_query($query);
	$r2 = mysql_query($query2);
	}
?>