<?php
include('./header_footer/header.php');
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}
$query = "select * from users where u_id=" . $_SESSION['id'] . "";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
}
if (isset($_POST['update_profile'])) {
    unset($_POST['update_profile']);
    $valueSets = array();
    foreach ($_POST as $key => $value) {
        $valueSets[] = $key . " = '" . $value . "'";
    }
    $query = "UPDATE users SET " . join(",", $valueSets) . " WHERE u_id = " . $_SESSION['id'] . "";
    $result = mysqli_query($db, $query);
    header("Location: my-profile.php?status=true&message=Your profile has been updated ");
}
if (isset($_POST['change_password'])) {
    $result = mysqli_query($db, "SELECT *from users WHERE u_id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    if($_POST["new_password"]==$_POST["confirm_password"]){
        if ($_POST["current_password"] == $row["password"]) {
            mysqli_query($db, "UPDATE users set password='" . $_POST["new_password"] . "' WHERE u_id='" . $_SESSION["id"] . "'");
            
            $message = "Your password has been Changed";
            header('Location:user-dashboard.php?status=true&message='.$message);
        } else {
            $message = "Current Password is not correct";
            header('Location:user-dashboard.php?status=false&message='.$message);
        }
    }else{
        $message = "New password and Confirm password dosen't match";
        header('Location:user-dashboard.php?status=false&message='.$message);
    }
    
}
$query = "select * from order_details where user_id=" . $_SESSION['id'] . "";
$orders = $db->query($query);
?>
<div class="container mt-5 mb-5">
    <h2>Welcome <?= $_SESSION['name'] ?></h2>
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
                        <h3>My Orders</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
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
                                            <td><?=$obj->quantity?></td>
                                            <td>
                                                <?=$obj->weight?>
                                            </td>
                                            <td><?=$obj->date?></td>
                                            <td>
                                                <?php if($obj->status=="DELIVERED"){ ?>
                                                    <?=$obj->status?>
                                                    <a href="add-feedback.php?feedback=<?=$obj->order_id?>" class="btn btn-outline-primary" onclick="return confirm('Are you sure want to add feedback ?')" title="Add FeedBack">
                                                        <li class="fa fa-edit"></li>
                                                    </a>
                                                <?php }else{ ?>
                                                    <?=$obj->status?>
                                                <?php } ?>
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