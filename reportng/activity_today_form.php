<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();




		$query="SELECT * FROM ACTIVITY_LOG";

		$r= mysql_query($query);


?>