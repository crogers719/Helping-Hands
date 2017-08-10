<!DOCTYPE html>
<?php include "../../database.php"; ?>
<?php include "../../connect.php"; ?>
<html lang="en">
<?php include "../../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Security Log Reports </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                    <div class="btn-group-vertical">
                        <a href="/~CR1501/project_2/admin/reporting/activity_purged_history.php" class="btn btn-default">Report Purged History</a>
                        <a href="/~CR1501/project_2/admin/reporting/activity_time_range.php" class="btn btn-default">Report Based On Time Range</a>
                        <a href="/~CR1501/project_2/admin/reporting/activity_site_day.php" class="btn btn-default">Report Specific Site For a Day</a>
                        <a href="/~CR1501/project_2/admin/reporting/activity_today.php" class="btn btn-default">Report Security Log For Today</a>

                        <a href="/~CR1501/project_2/admin/reporting/activity_user_date.php" class="btn btn-default">Report Security Log By User and Date</a>
                        <a href="/~CR1501/project_2/admin/reporting/activity_user_today.php" class="btn btn-default">Report Security Log By User Today</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "../../_footer.php"; ?>
</html>