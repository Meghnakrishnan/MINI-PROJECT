<?php
include('./header_footer/header.php');
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}
if($_SESSION['is_admin']==1){
    header('Location:admin/dashboard.php');
}
else{
    header('Location:my-profile.php');
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
    header("Location: user-dashboard.php?status=true&message=Your profile has been updated ");
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
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" style="color: #007bff;">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1"  style="color: #007bff;">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2"  style="color: #007bff;">Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3"  style="color: #007bff;">Feedback</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu4"  style="color: #007bff;">About</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
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
        <div id="menu1" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input name="name" value="<?= $user['name'] ?>" type="text" class="form-control" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input name="email" value="<?= $user['email'] ?>" type="email" class="form-control" placeholder="Email" readonly>
                        </div>
                        <div class="form-group">
                            <input name="phone" value="<?= $user['phone'] ?>" type="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <input name="house" value="<?= $user['house'] ?>" type="text" class="form-control" placeholder="house" required>
                        </div>

                        <div class="form-group">
                            <input name="street" value="<?= $user['street'] ?>" type="text" class="form-control" placeholder="Street" required>
                        </div>
                        <div class="form-group">
                            <input name="post" value="<?= $user['post'] ?>" type="text" class="form-control" placeholder="Post" required>
                        </div>
                        <div class="form-group">
                            <input name="pin" value="<?= $user['pin'] ?>" type="text" class="form-control" placeholder="PIN" required>
                        </div>
                        <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div id="menu2" class="container tab-pane"><br>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (isset($_REQUEST['error'])) {
                        echo '<div class="alert alert-danger">' . $_REQUEST['error'] . '</div>';
                    }

                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input name="current_password" type="password" class="form-control" placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input name="new_password" type="password" class="form-control" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <input type="submit" name="change_password" class="btn btn-primary" value="Update Password">
                    </form>
                </div>
            </div>
        </div>
        <div id="menu3" class="container tab-pane"><br>
            <div class="col-12">
                Feedback
            </div>
        </div>
        <div id="menu4" class="container tab-pane"><br>
            <div class="col-12">
                About
            </div>
        </div>
    </div>
</div>
<?php
include('./header_footer/footer.php');
?>