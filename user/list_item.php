<!DOCTYPE html>
<?php include "list_item_form.php"; ?>
<html lang="en">
<?php include "../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">List an Item</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                  <div class="panel panel-default">
                    <div class="panel-heading">New Item Form</div>
                    <div class="panel-body">
                      <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <fieldset>
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
                                    $r = mysql_query($category_query);
                                    while($row = mysql_fetch_array($r)){
                                      echo '<div class="checkbox">';
                                      echo '<label>';
                                      echo '<input type="checkbox" id="'.$row['CATEGORY_NAME'].'" name="category_id[]" value="'.$row['CATEGORY_ID'].'"';
                                      if(is_array($category_id)&&in_array($row['CATEGORY_ID'], $category_id)) echo "checked";
                                      echo '> '.$row['CATEGORY_NAME'];
                                      echo '</label>';
                                      echo '</div>';
                                    }
                                    ?>

                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="description" class="col-lg-2 control-label">Description with 50 characters or less</label>
                                  <div class="col-lg-10">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php if(isset($description)){ echo htmlspecialchars($description);} ?></textarea>
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
                                  <label for="image" class="col-lg-2 control-label">Upload Photo</label>
                                  <div class="col-lg-10">
                                      <input name="image" accept="image/jpeg" type="file">
                                      <!--         <input type="submit" value="Upload Image" name="submit">  -->     
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                      <button type="submit" name="list_item" class="btn btn-primary">List Item</button>
                                  </div>
                              </div>
                          </fieldset>
                      </form>                      
                    </div>

                  </div>
                    <div>
</div>
</div>
</div>
</div>

<?php  


  
    if(!empty($insert_resource)){
                $query="SELECT * FROM AUCTION_ITEMS WHERE AUCTION_ID=".$aid;
                $r=mysql_query($query);
            if($row=mysql_fetch_array($r)){
                  $auction_item_category_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID = ".$row['AUCTION_ID'];
                  $auction_item_category_r = mysql_query($auction_item_category_query);
                echo '<div class="row">';
                echo '<div class="col-lg-12">';
                echo '<div class="well bs-component">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">Auction ID: '.$row['AUCTION_ID'].'</div>';
                echo '<div class="panel-body">';
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
                echo '<th>Category</th>';
                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';    


              echo '<tr class="info">';
                  echo '<td>'.$aid.'</td>';
                  echo '<td>'.$row['ITEM_NAME'].'</td>';
                  echo '<td>'.$row['DESCRIPTION'].'</td>';
                  echo '<td>'.$row['STARTING_PRICE'].'</td>';
                  echo '<td>'.$row['RESERVE_PRICE'].'</td>';
                  echo '<td>'.$row['BIN_PRICE'].'</td>';
                  echo '<td>'.$row['BEGIN_TIME'].'</td>';
                  echo '<td>'.$row['END_TIME'].'</td>';
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
                  echo '<td><img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" /></td>';
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


<?php include "../_footer.php"; ?>
</html>
