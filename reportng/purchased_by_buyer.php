<!DOCTYPE html>
<?php include "purchased_by_buyer_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">All Items Purchased By User </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <form action="" method="post" class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="buyer_user_id">Search by Buyer User ID</label>
                                <div class="col-lg-10">
                                 <input type="text" class="form-control" id="buyer_user_id" name="buyer_user_id" placeholder="User ID">


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
           <?php      
            if(!empty($r)){
                echo '<div class="row">';
                echo '<div class="col-lg-12">';
                echo '<div class="well bs-component">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">Buyer User ID:'. htmlspecialchars($buyer_user_id) .'</div>';
                echo '<div class="panel-body">';
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Item Name</th>';
                echo '<th>Price Bought</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';               

                while($row=mysql_fetch_array($r)){
                echo '<tr class="info">';
                echo '<td>'.$row['ITEM_NAME'].'</td>';
                echo '<td>'.$row['HIGHEST_BID'].'</td>';
                echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

              }
              

 ?>

</div>
</div>

        <?php include "../../_footer.php"; ?>
        </html>