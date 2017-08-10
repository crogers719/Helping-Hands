
<?php 
	include "database.php";
	include "connect.php";

mysql_query("CALL closeAuctions()");
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$problem=FALSE;
	if(empty($_POST['username']))
	{
		$problem=TRUE;
		echo '<h1>Please enter your user name!</h1>';
	}
	if(empty($_POST['password']))
	{
		$problem=TRUE;
		echo '<h1>Please enter a password!</h1>';
	}
	if(!$problem)
	{
		$uname=$_POST['username'];
		$pass=$_POST['password'];
		mysql_query("LOCK TABLES USERS READ");
		$query = mysql_query("SELECT * FROM USERS WHERE USERNAME='$uname'");
		$numrows = mysql_num_rows($query);
		mysql_query("UNLOCK TABLES");

		if ($numrows!=0)
		{
			//while loop
 			while ($row = mysql_fetch_assoc($query))
  			{
    			$dbusername = $row['USERNAME'];
    			$dbpassword = $row['PASSWORD'];
    			$dbemail = $row['EMAIL'];
    			$dbid = $row['USER_ID'];
    			
  			}
  			if($dbpassword != $pass)
  				echo '<h1>Incorrect password!</h1>';
  			else
  			{
  				session_start();
  				$_SESSION['user']=$dbusername;
  				$_SESSION['email']=$dbemail;
  				$_SESSION['user_id']=$dbid;
				$_SESSION['page'] = "{$_SERVER['PHP_SELF']}";
				$now = new DateTime();
				$_SESSION['start_date'] = $now -> format('Y-m-d H:i:s');

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
				$query = mysql_query("SELECT * FROM SECURITY WHERE USER_ID='$dbid'");
				$row = mysql_fetch_assoc($query);

				$_SESSION['security_level']=$row['SECURITY_LEVEL'];

  				$_POST=array();

  				if($_SESSION ['security_level'] =='G'){
					header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/user/index.php");
				}
				else{
					header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/admin/index.php");
				}
			}
  		}
  		else
  			echo '<h1>Username does not exist!</h1>';
	}
}
 ?>
