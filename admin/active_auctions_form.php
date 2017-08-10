

<?php

	include "../database.php";
	include "../connect.php";
	require_admin();

	



		$query="SELECT * FROM AUCTION_ITEMS";
		
		$r= mysql_query($query);

	

?>