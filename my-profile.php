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
<?php
include('./header_footer/footer.php');
?>