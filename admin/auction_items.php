<!DOCTYPE html>
<?php   include"auction_items_form.php" ?>
<html lang="en">
<?php include "../../_header.php"; ?>


<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Auction Item Maintenance</h1>
                </div>
            </div>
        </div>
        
        
            <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
              <div class="form-group">
                <label for="auction_id" class="col-lg-2 control-label">Auction ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="auction_id" name="auction_id" placeholder="Auction ID" value="<?php if(isset($auction_id)){ echo htmlspecialchars($auction_id);} ?>" required>
                </div>
              </div>
                              <div class="form-group">
                                  <label for="itemname" class="col-lg-2 control-label">Item Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item Name" value="<?php if(isset($itemname)){echo htmlspecialchars($itemname);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="categories" class="col-lg-2 control-label">Categories</label>
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
                                  <label for="description" class="col-lg-2 control-label">Description with 50 characters or less</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php if(isset($description)){ echo htmlspecialchars($description);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="start_price" class="col-lg-2 control-label">Start Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="start_price" name="start_price" placeholder="Start Price" value="<?php if(isset($start_price)){ echo htmlspecialchars($start_price);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="reserve_price" class="col-lg-2 control-label">Reserve Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="reserve_price" name="reserve_price" placeholder="Reserve Price" value="<?php if(isset($reserve_price)){ echo htmlspecialchars($reserve_price);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="buy_it_now" class="col-lg-2 control-label">Buy It Now Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="buy_it_now" name="buy_it_now" placeholder="Buy It Now Price" value="<?php if(isset($buy_it_now)){ echo htmlspecialchars($buy_it_now);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="start_date" class="col-lg-2 control-label">Start Date</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="start_date" name="start_date" placeholder="year month date" value="<?php if(isset($start_date)){ echo htmlspecialchars($start_date);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="end_date" class="col-lg-2 control-label">End Date</label>
                                  <div class="col-lg-10">
                                      <input type="datetime" class="form-control" id="end_date" name="end_date" placeholder="year month date" value="<?php if(isset($end_date)){ echo htmlspecialchars($end_date);} ?>">
                                  </div>
                              </div>
                    <div class="form-group">
                <label for="seller_user_id" class="col-lg-2 control-label">Seller User ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="seller_user_id" name="seller_user_id" placeholder="Seller User ID" value="<?php if(isset($seller_user_id)){ echo htmlspecialchars($seller_user_id);} ?>">
                </div>
              </div>
            <div class="form-group">
                <label for="current_top_bidder" class="col-lg-2 control-label">Current Top Bidder ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="current_top_bidder" name="current_top_bidder" placeholder="Current Top Bidder" value="<?php if(isset($current_top_bidder)){ echo htmlspecialchars($current_top_bidder);} ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="highest_bid" class="col-lg-2 control-label">Highest Bid</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="highest_bid" name="highest_bid" placeholder="Highest Bid" value="<?php if(isset($highest_bid)){ echo htmlspecialchars($highest_bid);} ?>">
                </div>
              </div>
               <div class="form-group">
                <label for="num_of_bids" class="col-lg-2 control-label">Number of Bids</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="num_of_bids" name="num_of_bids" placeholder="Number of Bids" value="<?php if(isset($num_of_bids)){ echo htmlspecialchars($num_of_bids);} ?>">
                </div>
              </div>
              <div class="form-group">
                                  <label for="image" class="col-lg-2 control-label">Upload Photo</label>
                                  <div class="col-lg-10" id="suggested_items">
                                       <input name="image" accept="image/jpeg" type="file">
          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" />'; ?>
            
                                      <!--         <input type="submit" value="Upload Image" name="submit">
   -->
                                  </div>
                              </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
                  <button type="submit" class="btn btn-primary" name="retrieve">Retrieve</button>
                  <button type="submit" class="btn btn-primary" name="delete" onclick="return confirm('You are about to delete. Do you want to continue?');">Delete</button>
                  <button type="submit" class="btn btn-primary" name="modify">Modify</button>
                </div>
              </div>
            </fieldset>
          </form>
          <div>
          </div>
        </div>
      </div>
    </div>
            <?php 
              $auction_item_category_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID = ".$auction_id;
              $auction_item_category_r = mysql_query($auction_item_category_query);

            if(!empty($insert_resource)){
              if($insert_resource){               
                         

                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';

                 echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Auction ID</th>';
                echo '<th>Item Name</th>';
                echo '<th>Description</th>';
                echo '<th>Start Price</th>';
                echo '<th>Reserve Price</th>';
                echo '<th>Buy it Now Price</th>';
                echo '<th>Start Date</th>';
                echo '<th>End Date</th>';
                echo '<th>Seller User ID</th>';
                echo '<th>Current Top Bidder ID</th>';
                echo '<th>Highest Bid</th>';
                echo '<th>Number of Bids</th>';
                echo '<th>Category</th>';
                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                   
                  echo '<tr class="info">';
                echo '<td>'.$auction_id.'</td>';
                echo '<td>'.$itemname.'</td>';
                echo '<td>'.$description.'</td>';
                echo '<td>'.$start_price.'</td>';
                echo '<td>'.$reserve_price.'</td>';
                echo '<td>'.$buy_it_now.'</td>';
                echo '<td>'.$start_date.'</td>';
                echo '<td>'.$end_date.'</td>';
                echo '<td>'.$seller_user_id.'</td>';
                echo '<td>'.$current_top_bidder.'</td>'; 
                echo '<td>'.$highest_bid.'</td>';
                echo '<td>'.$num_of_bids.'</td>';
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
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($image) . '" />';
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
             
            else if(!empty($delete_resource)){
              if($delete_resource){
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';

               echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Auction ID</th>';
                echo '<th>Item Name</th>';
                echo '<th>Description</th>';
                echo '<th>Start Price</th>';
                echo '<th>Reserve Price</th>';
                echo '<th>Buy it Now Price</th>';
                echo '<th>Start Date</th>';
                echo '<th>End Date</th>';
                echo '<th>Seller User ID</th>';
                echo '<th>Current Top Bidder ID</th>';
                echo '<th>Highest Bid</th>';
                echo '<th>Number of Bids</th>';
                echo '<th>Category</th>';
                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$row['AUCTION_ID'].'</td>';
               echo '<td>'.$row['ITEM_NAME'].'</td>';

                echo '<td>'.$row['DESCRIPTION'].'</td>';
                  echo '<td>'.$row['STARTING_PRICE'].'</td>';
                  echo '<td>'.$row['RESERVE_PRICE'].'</td>';
                  echo '<td>'.$row['BIN_PRICE'].'</td>';
                  echo '<td>'.$row['BEGIN_TIME'].'</td>';
                  echo '<td>'.$row['END_TIME'].'</td>';
                  echo '<td>'.$row['SELLER_USER_ID'].'</td>';
                  echo '<td>'.$row['CURRENT_BUYER_USER_ID'].'</td>';
                  echo '<td>'.$row['HIGHEST_BID'].'</td>';
                  echo '<td>'.$row['NUM_OF_BIDS'].'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }
            }

            else if(!empty($update_resource)){
              if($update_resource){               
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';

                 echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Auction ID</th>';
                echo '<th>Item Name</th>';
                echo '<th>Description</th>';
                echo '<th>Start Price</th>';
                echo '<th>Reserve Price</th>';
                echo '<th>Buy it Now Price</th>';
                echo '<th>Start Date</th>';
                echo '<th>End Date</th>';
                echo '<th>Seller User ID</th>';
                echo '<th>Current Top Bidder ID</th>';
                echo '<th>Highest Bid</th>';
                echo '<th>Number of Bids</th>';
                echo '<th>Category</th>';
                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                   
                  echo '<tr class="info">';
                echo '<td>'.$auction_id.'</td>';
                echo '<td>'.$itemname.'</td>';
                echo '<td>'.$description.'</td>';
                echo '<td>'.$start_price.'</td>';
                echo '<td>'.$reserve_price.'</td>';
                echo '<td>'.$buy_it_now.'</td>';
                echo '<td>'.$start_date.'</td>';
                echo '<td>'.$end_date.'</td>';
                echo '<td>'.$seller_user_id.'</td>';
                echo '<td>'.$current_top_bidder.'</td>';
                echo '<td>'.$highest_bid.'</td>';
                echo '<td>'.$num_of_bids.'</td>';
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
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode( $image) . '" />';
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