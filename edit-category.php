
<?php
include('./header_footer/header.php');
if(isset($_GET['update'])){
    $query = "select * from category where category_id=" . $_GET['update'] . "";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) === 1) {
            $category = mysqli_fetch_assoc($result);
        }
	$cat_id = $_GET['update'];
}
if (!empty($_POST)) {

	try {
		// $columns = implode(", ", array_keys($_POST));
		// $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
		// $values  = implode("', '", $escaped_values);
		$query = "UPDATE category SET category= '".$_POST['category']."' where category_id='".$cat_id."'";
		$con = mysqli_query($db, $query);
		if ($con) {
			$message = 'Category Updated Successfully !';
			$location = 'manage-category.php?status=true&message=' . $message;
		} else {
			$message = 'Something went wrong!';
			$location = 'manage-category.php?status=false&message=' . $message;
		}

		header("Location: $location");
	}
	//catch exception
	catch (Exception $e) {
		$message  = $e->getMessage();
		$location = 'manage-category.php?status=false&message=' . $message;
		header("Location: $location");
	}
}

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
		<div class="col-sm-12 col-md-2 col-lg-3"></div>
		<div class="col-sm-12 col-md-8 col-lg-6 border m-5">
			<div class="row p-2">
				<div class="col-12 text-center">
					<h5>Edit Category</h5>
				</div>
				<form class="col-12" action="" method="post">
	
					<div class="col-12">
						<div class="form-group">
							<label for="">Category Name:</label>
							<input type="text" class="form-control" name="category" placeholder="Category" value="<?= $category['category'] ?>" required>
						</div>
					</div>
					<div class="col-12 text-center">
						<input type="submit" value="Update Category" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include('./header_footer/footer.php');
?>

