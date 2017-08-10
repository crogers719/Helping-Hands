<?php

	include "database.php";
	include "connect.php";


if($_SERVER['REQUEST_METHOD']=='POST')
{
	$problem=FALSE;
	if(empty($_POST['email']))
	{
		$problem=TRUE;
		echo '<h1>Please enter an e-mail address!</h1>';
	}
	if(!$problem)
	{
		$email=$_POST['email'];
		mysql_query("LOCK TABLES USERS READ");
		$query = mysql_query("SELECT * FROM USERS WHERE EMAIL='$email'");
		$numrows = mysql_num_rows($query);
		$rs = mysql_fetch_array($query);
		


		if ($email==0)
		{
			echo '<h1>E-mail address does not exist in the database!</h1>';
		}
  		else
  		{
   			$username=$rs['USERNAME'];
   			$password=$rs['PASSWORD'];
		 	$to = $email;
		 	$subject = "Helping Hands Password";
		 	$body = "Hi '$username', your password is: '$password'";

		 	if (mail($to, $subject, $body)) {
		   		echo("<h1>Password successfully sent to '$to'!</h1> You will be automatically redirected to the log-in screen in 5 seconds.");
		   		header('Refresh: 5; URL=http://acadweb1.salisbury.edu/~CR1501/project_2/index.php');

		  	} 
		  	else {
		   		echo("<h1>Message delivery failed...</h1>");
		  	}
   			$_POST=array();
		}
  	}
}
?>