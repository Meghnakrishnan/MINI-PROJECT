<?php
include('./header_footer/header.php');
if(isset($_GET['delete'])){
    $delete = $db->query("UPDATE category SET status=false where category_id=".$_GET['delete']);
    $message = 'Category has been updated successfully !';
    $location = 'manage-category.php?status=true&message='.$message;
    header("Location: $location");
}
$query = "select * from category";
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
            <a href="add_category.php" class="btn btn-primary">Add Category</a>
            <br><br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Name</th>
                        <th>Status</th>
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
                                <td><?=$obj->category?></td>
                                <td><?=$obj->status?></td>
                                <th>
                                    <button class="btn btn-outline-primary">
                                        <li class="fa fa-edit"></li>
                                    </button>
                                    <a href="manage-category.php?delete=<?=$obj->category_id?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete ?')">
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