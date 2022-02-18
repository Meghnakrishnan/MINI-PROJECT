<?php
include('./header_footer/header.php');
if (!empty($_POST)) {
	try {
		$columns = implode(", ", array_keys($_POST));
		$escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
		$values  = implode("', '", $escaped_values);
		$query = "INSERT INTO offers ( " . $columns . ")
        VALUES ('" . $values . "')";
		$con = mysqli_query($db, $query);
		if ($con) {
			$message = 'Offer Added Successfully !';
			$location = 'add-offers.php?status=true&message=' . $message;
		} else {
			$message = 'Something went wrong!';
			$location = 'add-offers.php?status=false&message=' . $message;
		}

		header("Location: $location");
	}
	//catch exception
	catch (Exception $e) {
		$message  = $e->getMessage();
		$location = 'add-offerss.php?status=false&message=' . $message;
		header("Location: $location");
	}
}
$query = "select * from item_details where status=1";
$orders = $db->query($query);
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
					<h5>Add Offers</h5>
				</div>
				<form class="col-12" action="" method="post">
                <div class="col-12">
							<div class="form-group">
								<label for="">Category</label>
								<select name="item_id" id="" class="form-control" aria-placeholder="Items" required>
								 <option value="">Select Item</option>
								 <?php 
								 	while ($obj = $orders->fetch_object()) {
										echo '<option value="'.$obj->item_id.'">'.$obj->name.'</option>';
									}
								 ?>
							 </select>
							</div>
						</div>

					<div class="col-12">
						<div class="form-group">
							<label for="">Description:</label>
                            <textarea class="form-control" name="description" placeholder="Description" required rows="5"></textarea>
						</div>
                        <div class="form-group">
							<label for="">Offer Percentage:</label>
                            <input class="form-control" name="percentage" placeholder="Add Offer Percentage" required type="number">
						</div>
                        <div class="form-group">
							<label for="">Offer Expiry Date:</label>
                            <input class="form-control" name="expiry_date" id="txtDate"  required type="date">
						</div>
                        
					</div>
					<div class="col-12 text-center">
						<input type="submit" value="Save Offer" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php
include('./header_footer/footer.php');
?>
<script>
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    var maxDate = dtToday.toISOString().substr(0, 10);

    $('#txtDate').attr('min', maxDate);
</script>