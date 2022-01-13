<?php
include('./header_footer/header.php');
if (!empty($_POST)) {

    try {
        $columns = implode(", ", array_keys($_POST));
        $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
        $values  = implode("', '", $escaped_values);
        $query = "INSERT INTO users ( " . $columns . ")
        VALUES ('" . $values . "')";
        $con = mysqli_query($db, $query);
        if($con){
            $message = 'You have successfully Registered Your Account !';
            $location = 'register.php?status=true&message='.$message;
        }else{
            $message = 'The email is already existed !';
            $location = 'register.php?status=false&message='.$message;
        }
        
        header("Location: $location");
    }
    //catch exception
    catch (Exception $e) {
        $message  = $e->getMessage();
        $location = 'register.php?status=false&message='.$message;
        header("Location: $location");
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-5">
                <div class="card-header bg-white">
                    Register
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'true') {
                        echo '<div class="alert alert-success">' . $_REQUEST['message'] . '</div>';
                    }

                    if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'false') {
                        echo '<div class="alert alert-danger">' .$_REQUEST['message'] . '</div>';
                    }
                    
                    ?>
                    <form action="register.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="phone" type="phone" class="form-control" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="house" type="text" class="form-control" placeholder="house" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="street" type="text" class="form-control" placeholder="Street" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="post" type="text" class="form-control" placeholder="Post" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="pin" type="text" class="form-control" placeholder="PIN" required>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary">Register</button>
                            </div>
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