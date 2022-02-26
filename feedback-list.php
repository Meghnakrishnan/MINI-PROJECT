<?php
include('./header_footer/header.php');
if(isset($_SESSION['is_admin'==1])){
    header('Location:order_list.php');
}
$query = "select f.feedback,f.id,f.order_id, od.item_name,u.name from user_feedback f left join order_details od on od.order_id = f.order_id left join users u on u.u_id = od.user_id order by f.id desc;";
$orders = $db->query($query);
?>
<div class="container mt-5 mb-5">
    <?php
    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'true') {
        echo '<div class="alert alert-success">' . $_REQUEST['message'] . '</div>';
    }

    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'false') {
        echo '<div class="alert alert-danger">' .$_REQUEST['message'] . '</div>';
    }
    ?>
    <br>
    <div class="row">
                <div class="col-12">
                    <div id="home" class="container tab-pane active"><br>
                        <h3>User Feedbacks</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>User</th>
                                    <th>Feedback</th>
                                    <th>Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($orders->num_rows > 0) {
                                    $i = 1;
                                    while ($obj = $orders->fetch_object()) {
            
                                ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$obj->name?></td>
                                            <td><?=$obj->feedback?></td>
                                            <td><?=$obj->item_name?></td>
                                        </tr>
                                    <?php $i++; }
                                } else { ?>
                                    <tr>
                                        <td colspan="4">No Records Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
<?php
include('./header_footer/footer.php');
?>