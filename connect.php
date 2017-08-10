<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//attemp to connect

if($connection = @mysql_connect ('localhost', 'CR1501', 'crogers719'))
	{
		// print '<p>Successfully connected to MySQL. </p>';
	}
else{
	die('<p>Could not connect to MySQL becasue: <b>' .mysql_error(). 
	'</b></p>');
	}
if(@mysql_select_db("ROGERS_PROJECT2", $connection))
	{
		
	}
else{
	die('<p>Could not select the NameOfYourDatabase database because:
	<b>' .mysql_error(). '</b></p>');
	}	

	session_start();
	if(!empty($_SESSION['user_id'])){
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
		$_SESSION['page'] = "{$_SERVER['PHP_SELF']}";
		$_SESSION['start_date'] = $date_time_end;

	}

?>

