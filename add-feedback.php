<?php
include('./header_footer/header.php');
if (!empty($_POST)) {
	try {
		$columns = implode(", ", array_keys($_POST));
		$escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
		$values  = implode("', '", $escaped_values);
		$query = "INSERT INTO user_feedback ( " . $columns . ")
        VALUES ('" . $values . "')";
		$con = mysqli_query($db, $query);
		if ($con) {
			$message = 'Feedback Added Successfully !';
			$location = 'my-orders.php?status=true&message=' . $message;
		} else {
			$message = 'Something went wrong!';
			$location = 'my-orders.php?status=false&message=' . $message;
		}

		header("Location: $location");
	}
	//catch exception
	catch (Exception $e) {
		$message  = $e->getMessage();
		$location = 'my-orders.php?status=false&message=' . $message;
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
		<div class="col-sm-12 col-md-8 col-lg-6 border">
			<div class="row p-2">
				<div class="col-12 text-center">
					<h5>Add Feedback</h5>
				</div>
				<form class="col-12" action="" method="post">

					<div class="col-12">
						<div class="form-group">
							<label for="">FeedBack:</label>
                            <textarea class="form-control" name="feedback" placeholder="Feedback" required rows="5"></textarea>
						</div>
                        <div class="form-group" style="display: none;">
							<label for="">order_id:</label>
                            <textarea class="form-control" name="order_id" placeholder="Feedback" required rows="10"><?=$_GET['feedback']?></textarea>
						</div>
					</div>
					<div class="col-12 text-center">
						<input type="submit" value="Save FeedBack" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php
include('./header_footer/footer.php');
?>