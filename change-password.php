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
            header('Location:change-password.php?status=true&message='.$message);
        } else {
            $message = "Current Password is not correct";
            header('Location:change-password.php?status=false&message='.$message);
        }
    }else{
        $message = "New password and Confirm password dosen't match";
        header('Location:change-password.php?status=false&message='.$message);
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
                <div id="menu2" class="container tab-pane"><br>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (isset($_REQUEST['error'])) {
                        echo '<div class="alert alert-danger">' . $_REQUEST['error'] . '</div>';
                    }

                    ?>
                    <form action="" method="POST" onsubmit="return fcheck();">
                        <div class="form-group">
                            <input name="current_password"  type="password" class="form-control" placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input name="new_password" id="pass" type="password" class="form-control" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input name="confirm_password"  type="password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <input type="submit" name="change_password" class="btn btn-primary" value="Update Password">
                    </form>
                </div>
            </div>
        </div>
                </div>
            </div>
</div>
<script>
    function fcheck(){
        if($("#pass").val().length<5){
            alert('Password contains at least 5 characters');
            return false
        }
        return true
    }
</script>
<?php
include('./header_footer/footer.php');
?>
