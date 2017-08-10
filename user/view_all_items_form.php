

<?php

	include "../database.php";
	include "../connect.php";
	require_user();

	



		$query="SELECT * FROM AUCTION_ITEMS";
		
		$r= mysql_query($query);

	

?>