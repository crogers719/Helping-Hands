<!DOCTYPE html>
<?php include "items_sold_category_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">View Items Sold by Category</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <div class="panel panel-default">
            <div class="panel-heading">Categories</div>
            <div class="panel-body">
              
              <form action="" method="post" class="form-horizontal">
                <fieldset>
                <div class="form-group">
                  <label for="categories" class="col-lg-2 control-label">Filter by category</label>
                  <div class="col-lg-10">
                  <?php 
                  $category_query = "SELECT * FROM CATEGORY";
                  $category_r = mysql_query($category_query);
                  while($category_row = mysql_fetch_array($category_r)){
                    echo '<div class="checkbox">';
                    echo '<label>';
                    echo '<input type="checkbox" id="'.$category_row['CATEGORY_NAME'].'" name="category_id[]" value="'.$category_row['CATEGORY_ID'].'"';
                    if(is_array($category_id)&&in_array($category_row['CATEGORY_ID'], $category_id)) echo "checked";
                    echo '> '.$category_row['CATEGORY_NAME'];
                    echo '</label>';
                    echo '</div>';
                  }
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary" name="report">Report</button>
                  </div>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
          <?php 

            if(!empty($r)){
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';
                  echo '<div class="panel-heading">Auction Items</div>';
                  echo '<div class="panel-body">';
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Item Name</th>';
                echo '<th>Description</th>';
                echo '<th>Start Price</th>';
                echo '<th>Reserve Price</th>';
                echo '<th>Buy it Now Price</th>';
                echo '<th>Start Date</th>';
                echo '<th>End Date</th>';
                echo '<th>Seller</th>';
                echo '<th>Current Top Bidder</th>';
                echo '<th>Highest Bid</th>';
                echo '<th>Number of Bids</th>';
                echo '<th>Category</th>';
                echo '<th>Image</th>';
                
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';            

                while($row=mysql_fetch_array($r)){
                  $seller_username_query = "SELECT USERNAME FROM USERS WHERE USER_ID = ".$row['SELLER_USER_ID'];
                  $seller_username_r = mysql_query($seller_username_query);
                  $seller_username_array = mysql_fetch_array($seller_username_r);

                  $buyer_username_query = "SELECT USERNAME FROM USERS WHERE USER_ID = ".$row['CURRENT_BUYER_USER_ID'];
                  $buyer_username_r = mysql_query($buyer_username_query);
                  $buyer_username_array = mysql_fetch_array($buyer_username_r);
                  
                  $auction_item_category_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID = ".$row['AUCTION_ID'];
                  $auction_item_category_r = mysql_query($auction_item_category_query);
                  


                  echo '<tr class="info">';
                  echo '<td>'.$row['ITEM_NAME'].'</td>';
                  echo '<td>'.$row['DESCRIPTION'].'</td>';
                  echo '<td>'.$row['STARTING_PRICE'].'</td>';
                  echo '<td>'.$row['RESERVE_PRICE'].'</td>';
                  echo '<td>'.$row['BIN_PRICE'].'</td>';
                  echo '<td>'.$row['BEGIN_TIME'].'</td>';
                  echo '<td>'.$row['END_TIME'].'</td>';
                  echo '<td>'.$seller_username_array['USERNAME'].'</td>';
                  echo '<td>'.$buyer_username_array['USERNAME'].'</td>';
                  echo '<td>'.$row['HIGHEST_BID'].'</td>';
                  echo '<td>'.$row['NUM_OF_BIDS'].'</td>';
                  echo '<td>';
                  while($auction_item_category_array = mysql_fetch_array($auction_item_category_r))
                  {
                    $category_query = "SELECT CATEGORY_NAME FROM CATEGORY WHERE CATEGORY_ID = ".$auction_item_category_array['CATEGORY_ID'];
                    $category_r = mysql_query($category_query);
                    $i=0;
                    while($category_array = mysql_fetch_array($category_r)){
                      echo $category_array['CATEGORY_NAME']." ";
            
                    }                    
                  }

                echo '</td>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" />';
               
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