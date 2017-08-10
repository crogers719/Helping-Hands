<?php
    include "../../database.php";
    include "../../connect.php";
    require_admin();

    

        $query="SELECT * FROM ACTIVITY_LOG_HISTORY";
        
        $r= mysql_query($query);
                                
        
                
   
?>