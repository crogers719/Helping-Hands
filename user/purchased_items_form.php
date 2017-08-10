<?php 
	include "../database.php";
	include "../connect.php";
	
	require_user();


		$query="SELECT * FROM HISTORY WHERE CURRENT_BUYER_USER_ID=".$_SESSION['user_id']." AND HIGHEST_BID >= RESERVE_PRICE";
		
		$r= mysql_query($query);





?>

