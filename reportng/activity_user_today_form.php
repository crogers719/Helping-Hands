<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();
	$user_id = $_POST['user_id'];


	if (isset($_POST['report'])) {



		$query="SELECT * FROM ACTIVITY_LOG_HISTORY WHERE USER_ID = ".$user_id;

		$r= mysql_query($query);

	}

?>