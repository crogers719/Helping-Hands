<?php
	include "database.php";
	include "connect.php";


	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];


	// strings for query functions
	$table_name = "USERS";
	$where_clause = "WHERE USER_ID = " . $user_id;

	//data for query functions
	$form_data = array(

		'USERNAME' => $username,
		'PASSWORD' => $password,
		'EMAIL' => $email
		);

	

	if(isset($_POST['sign_up']))
	{
		if(isFormComplete($form_data))
		{
			
			if($insert_resource=dbRowInsert($table_name, $form_data))
			{
				$uid = mysql_insert_id($connection);
				$security_form_data = array(
					'USER_ID' => $uid,
					'SECURITY_LEVEL' => 'G'
					);
				$table_name = "SECURITY";
				dbRowInsert($table_name, $security_form_data);
				echo '<script language="javascript">';
				echo 'alert("'.$username.' has been added to the database")';
				echo '</script>';
				echo '<h1>PAGE WILL BE REDIRECTED TO LOGIN IN 5 SECONDS!</h1>';
				header('Refresh: 5; URL=http://acadweb1.salisbury.edu/~CR1501/project_2/index.php');
		
 

			}
		}else
		{
			echo '<script language="javascript">';
			echo 'alert("When registering information all fields must be completed")';
			echo '</script>';
		}

	}

	

 ?>

 
