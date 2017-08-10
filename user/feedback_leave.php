<!DOCTYPE html>
<?php include "feedback_leave_form.php"; ?>
<html lang="en">
<?php include "../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Leave Feedback</h1>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
             <form action="" method="post" class="form-horizontal">
               <fieldset>
                 <div class="form-group">
                  <label for="auction_id">Search by Auction ID</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="auction_id" name="auction_id" placeholder="Auction ID">
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
        <div class="row" <?php if(!isset($seller_user_id)) echo 'style="display: none;"' ?>>
            <div class="col-lg-6">
                <div class="well bs-component">
                  <div class="panel panel-default">
                    <div class="panel-heading">Auction ID: <?php if(isset($auction_id)){echo htmlspecialchars($auction_id);} ?></div>
                    <div class="panel-heading">Seller ID: <?php if(isset($seller_user_id)){echo htmlspecialchars($seller_user_id);} ?></div>
                    <div class="panel-body">
                      <form action="" method="post" class="form-horizontal">
                          <fieldset>
                              <input type="hidden" name="auction_id" value=" <?php if(isset($auction_id)){echo htmlspecialchars($auction_id);} ?>">
                              <input type="hidden" name="seller_user_id" value=" <?php if(isset($seller_user_id)){echo htmlspecialchars($seller_user_id);} ?>">

                              <div class="form-group">
                                  <label for="comments" class="col-lg-2 control-label">Leave Comments</label>
                                  <div class="col-lg-10">
                                      <textarea class="form-control" rows="3" id="comments"  name="comments" value="<?php if(isset($comments)){echo htmlspecialchars($comments);} ?>"> </textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                      <button type="submit" name="list_comment" class="btn btn-primary">List Comment</button>
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
                echo '<th>Seller ID</th>';
                echo '<th>Auction ID</th>';
                echo '<th>Comments</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr class="info">';
                echo '<td>'.$seller_user_id.'</td>';
                echo '<td>'.$auction_id.'</td>';
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

</html>
