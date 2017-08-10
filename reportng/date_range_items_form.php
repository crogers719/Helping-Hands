<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();


if (isset($_POST['report'])) {
	
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];	
	$query = "SELECT * FROM HISTORY WHERE DATE_TIME_BOUGHT BETWEEN '".$start_date."' AND '".$end_date."' AND HIGHEST_BID >= RESERVE_PRICE";
	$order_row_r = mysql_query($query);
	}
?>