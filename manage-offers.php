<?php
include('./header_footer/header.php');
if(isset($_GET['delete'])){
    
    $delete = $db->query("delete from offers where offer_id=".$_GET['delete']);
    $message = 'Offer Deleted !';
    $location = 'manage-offers.php?status=true&message='.$message;
    header("Location: $location");
}
$query = "select * from offers order by offer_id desc";
$items = $db->query($query);
?>
<div class="container p-5">
    <?php
    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'true') {
        echo '<div class="alert alert-success">' . $_REQUEST['message'] . '</div>';
    }

    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'false') {
        echo '<div class="alert alert-danger">' . $_REQUEST['message'] . '</div>';
    }

    ?>
    <div class="row">
        <div class="col">
            <a href="add-offers.php" class="btn btn-primary">Add Offer</a>
            <br><br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Description</th>
                        <th>Expiry Date</th>
                        <th>Percentage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>	
                    <?php
                    if ($items->num_rows > 0) {
                        $i = 1;
                        while ($obj = $items->fetch_object()) {

                    ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$obj->description?></td>
                                <td><?=$obj->expiry_date?></td>
                                <td><?=$obj->percentage?></td>
                                <th>
                                    <a class="btn btn-outline-primary" href="edit-offers.php?update=<?=$obj->offer_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to edit ?')">
                                        <li class="fa fa-edit"></li>
                        </a>
                                    <a href="manage-offers.php?delete=<?=$obj->offer_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this offer?')">
                                        <li class="fa fa-trash"></li>
                                    </a>
                                </th>
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
<?php
include('./header_footer/footer.php');
?>