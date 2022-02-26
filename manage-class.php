<?php
include('./header_footer/header.php');
if(isset($_GET['delete'])){
    
    $delete = $db->query("delete from cources where class_id=".$_GET['delete']);
    $message = 'Course Deleted !';
    $location = 'manage-class.php?status=true&message='.$message;
    header("Location: $location");
}
$query = "select * from cources order by class_id desc";
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
            <a href="add-class.php" class="btn btn-primary">Add Courses</a>
            <br><br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Slots</th>
                        <th>Amount</th>
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
                                <td><?=$obj->start_date?></td>
                                <td><?=$obj->end_date?></td>
                                <td><?=$obj->slots?></td>
                                <td><?=$obj->amount?></td>
                                <th>
                                    <!-- <a class="btn btn-outline-primary" href="edit-offers.php?update=<?=$obj->class_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to edit ?')">
                                        <li class="fa fa-edit"></li>
                        </a> -->
                                    <a href="manage-class.php?delete=<?=$obj->class_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this offer?')">
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