<!DOCTYPE html>
<?php include "comments_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Comments on Seller by ID</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <form action="" method="post" class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="seller_user_id">Search by Seller ID</label>
                                <div class="col-lg-10">
                                 <input type="text" class="form-control" id="seller_user_id" name="seller_user_id" placeholder="Seller ID">


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
                echo '<div class="panel-heading">Seller User ID:'. htmlspecialchars($seller_user_id) .'</div>';
                echo '<div class="panel-body">';
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Auction ID #</th>';
                echo '<th>Comments</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';               

                while($row=mysql_fetch_array($r)){
                echo '<tr class="info">';
                echo '<td>'.$row['AUCTION_ID'].'</td>';
                echo '<td>'.$row['COMMENTS'].'</td>';
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



        <?php include "../../_footer.php"; ?>
        </html>