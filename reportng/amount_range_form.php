<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();


if (isset($_POST['report'])) {
	
	$amount_one = $_POST['amount_one'];
	$amount_two = $_POST['amount_two'];	
	$query = "SELECT * FROM HISTORY WHERE HIGHEST_BID BETWEEN '".$amount_one."' AND '".$amount_two."' AND HIGHEST_BID >= RESERVE_PRICE";
	$order_row_r = mysql_query($query);
	}
?>