<!DOCTYPE html>
<?php include "seller_comments_form.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Seller Comments Maintenance</h1>
                </div>
            </div>
        </div>
       <div class="row">
      <div class="col-lg-6">
        <div class="well bs-component">
          <form action="" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="comment_id" class="col-lg-2 control-label">Comment ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="comment_id" name="comment_id" placeholder="Comment ID" value="<?php if(isset($comment_id)){ echo htmlspecialchars($comment_id);} ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="seller_user_id" class="col-lg-2 control-label">Seller User ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="seller_user_id" name="seller_user_id" placeholder="Seller User ID" value="<?php if(isset($seller_user_id)){ echo htmlspecialchars($seller_user_id);} ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="user_id" class="col-lg-2 control-label">User ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" value="<?php if(isset($user_id)){ echo htmlspecialchars($user_id);} ?>">
                </div>
              </div>
       <div class="form-group">
                <label for="auction_id" class="col-lg-2 control-label">Auction ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="auction_id" name="auction_id" placeholder="Auction ID" value="<?php if(isset($auction_id)){ echo htmlspecialchars($auction_id);} ?>">
                </div>
              </div>
               <div class="form-group">
                                <label for="comment" class="col-lg-2 control-label">Comments</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="comment"  name="comment" ><?php if(isset($comment)){echo htmlspecialchars($comment);} ?> </textarea>
                                </div>
                            </div>
                   <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <!-- <button type="submit" class="btn btn-primary" name="add">Add</button> -->
                  <button type="submit" class="btn btn-primary" name="retrieve">Retrieve</button>
                  <button type="submit" class="btn btn-primary" name="delete" onclick="return confirm('You are about to delete. Do you want to continue?');">Delete</button>
                  <!-- <button type="submit" class="btn btn-primary" name="modify">Modify</button> -->
                </div>
              </div>
            </fieldset>
          </form>
      <div>
            <?php 

            if(!empty($insert_resource)){
              if($insert_resource){               
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Comment ID</th>';
                echo '<th>Seller ID</th>';
                echo '<th>Auction ID</th>';
                echo '<th>User ID</th>';
                echo '<th>Comments</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                 echo '<td>'.$comment_id.'</td>';
                echo '<td>'.$seller_user_id.'</td>';
                echo '<td>'.$auction_id.'</td>';
                 echo '<td>'.$user_id.'</td>';
                echo '<td>'.$comments.'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }
else if(!empty($delete_resource)){
              if($delete_resource){

                                
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Comment ID</th>';
                echo '<th>Seller ID</th>';
                echo '<th>Auction ID</th>';
                echo '<th>User ID</th>';
                echo '<th>Comments</th>';
                
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$row['COMMENT_ID'].'</td>';
                echo '<td>'.$row['SELLER_USER_ID'].'</td>';
                echo '<td>'.$row['AUCTION_ID'].'</td>';
                echo '<td>'.$row['USER_ID'].'</td>';
               echo '<td>'.$row['COMMENTS'].'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }

            else if(!empty($update_resource)){
              if($update_resource){               
                 echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
               echo '<th>Comment ID</th>';
                echo '<th>Seller ID</th>';
                echo '<th>Auction ID</th>';
                echo '<th>User ID</th>';
                echo '<th>Comments</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                 echo '<td>'.$comment_id.'</td>';
                echo '<td>'.$seller_user_id.'</td>';
                echo '<td>'.$auction_id.'</td>';
                 echo '<td>'.$user_id.'</td>';
                echo '<td>'.$comments.'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              }
            }

       ?>
      </div>            


                    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include "../../_footer.php"; ?>
</html>
