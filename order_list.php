<?php
include('./header_footer/header.php');
if(isset($_SESSION['is_admin'==1])){
    header('Location:order_list.php');
}
if(isset($_GET['update'])){
    $delete = $db->query("UPDATE order_details SET status='PLACED' where order_id=".$_GET['update']);
    $message = 'Item has been placed successfully !';
    $location = 'order_list.php?status=true&message='.$message;
    header("Location: $location");
}
if(isset($_GET['delete'])){
    $delete = $db->query("UPDATE order_details SET status='CANCELLED' where order_id=".$_GET['delete']);
    $message = 'Item has been cancelled successfully !';
    $location = 'order_list.php?status=true&message='.$message;
    header("Location: $location");
}
if(isset($_GET['delivered'])){
    $delete = $db->query("UPDATE order_details SET status='DELIVERED' where order_id=".$_GET['delivered']);
    $message = 'Item has been deleivered successfully !';
    $location = 'order_list.php?status=true&message='.$message;
    header("Location: $location");
}
$query = "select * from order_details order by order_id desc;";
$orders = $db->query($query);
?>
<div class="container-fluid mt-5 mb-5">
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
                        <h3>Orders</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Screenshot</th>
                                    <th>Shape</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
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
                                            <td><?=$obj->item_name?></td>
                                            <td><?=$obj->address?></th>
                                            <th><?=$obj->amount?></th>
                                            <th><?=$obj->note?></th>
                                            <td>
                                                <img src="data:image/png;base64,<?=base64_encode($obj->screenshot)?>" class="card-img-top1" alt="Product" style="max-height: 40px;">
                                            </td>
                                            <th><?=$obj->shape?></th>
                                            <td><?=$obj->quantity?></td>
                                            <td>
                                                <?=$obj->weight?>
                                            </td>
                                            <td><?=$obj->date?></td>
                                            <td>
                                            <?php if($obj->status == "PENDING"){
                                            ?>  
                                            <a href="order_list.php?update=<?=$obj->order_id?>" class="btn btn-outline-primary" onclick="return confirm('Are you sure want to approve ?')" title="Place Order">
                                                <li class="fa fa-edit"></li>
                                            </a>
                                            <a href="order_list.php?delete=<?=$obj->order_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to cancel ?')" title="Cancel Order">
                                                <li class="fa fa-trash"></li>
                                            </a>
                                            <?php }else if($obj->status == "PLACED"){ ?>
                                                <a href="order_list.php?delivered=<?=$obj->order_id?>" class="btn btn-outline-success" onclick="return confirm('Are you delivered this order ?')" title="Completed Order">
                                                <li class="fa fa-edit"></li>
                                            </a>
                                            <?php }else{ ?>
                                                <span><?=$obj->status?></span>
                                                <?php }?>

                                            </td>
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