<?php
include('./header_footer/header.php');
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query = "select * from users where email ='" . $email . "' and  password ='" . $password . "'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['name'] = $row['name'];

            $_SESSION['id'] = $row['u_id'];
            $_SESSION['is_admin'] = $row['is_admin'];
            if($row['is_admin']==1){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: index.php");
            }
            
            exit();
        } else {
            header("Location: login.php?error=Incorrect Email or password");
            exit();
        }
    }else{
        header("Location: login.php?error=Incorrect Email or password");
        exit();
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card mt-5">
                <div class="card-header bg-white">
                    Login
                </div>
                <div class="card-body">
                    <?php 
                         if (isset($_REQUEST['error'])) {
                            echo '<div class="alert alert-danger">' .$_REQUEST['error'] . '</div>';
                        }
                        
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include('./header_footer/footer.php');
?>