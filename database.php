<?php 
function require_user(){
    if (!isset($_SESSION['user'])) {
        header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/index.php");
    }

}

function require_admin(){
if ($_SESSION['security_level']!='A') {
        header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/index.php");
    }

}



function dbRetrieve($table_name, $where, $id){
    
	$query = "SELECT * FROM " . $table_name . " WHERE " . $where . " = '$id'";
	return mysql_query($query);
}

function dbRowInsert($table_name, $form_data){
	// retrieve the keys of the array (column titles)
	$fields = array_keys($form_data);

	//build the query
	$sql = "INSERT INTO " . $table_name . "(`" . implode('`,`', $fields) . "`)
			VALUES('" . implode("','", $form_data) . "');";
    $unlock_query="UNLOCK TABLES;";

	return mysql_query($sql);

}

// the where clause is left optional incase the user wants to delete every row!
function dbRowDelete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
    ?>
    <pre>
        <?php var_dump($sql); ?>
    </pre>
    <?php

    // run and return the query result resource
    return mysql_query($sql);
}

// again where clause is left optional
function dbRowUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;



    
    
   

    // run and return the query result
    return mysql_query($sql);
}

//check for empty fields
function isFormComplete($form_data)
{
    foreach ($form_data as $column => $value) {
        if (empty($value))
        {
            return false;
        }
    }
    return true;
}
 ?>
