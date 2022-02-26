<?php
include('./header_footer/header.php');
if (!empty($_POST)) {

    try {
        $columns = implode(", ", array_keys($_POST));
        $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
        $values  = implode("', '", $escaped_values);
        $query = "INSERT INTO cources ( " . $columns . ")
        VALUES ('" . $values . "')";
        $con = mysqli_query($db, $query);
        if($con){
            $message = 'Courses has been added successfully !';
            $location = 'manage-class.php?status=true&message='.$message;
        }else{
            $message = 'Something Went Wrong !';
            $location = 'manage-class.php?status=false&message='.$message;
        }
        
        header("Location: $location");
    }
    //catch exception
    catch (Exception $e) {
        $message  = $e->getMessage();
        $location = 'manage-class.php?status=false&message='.$message;
        header("Location: $location");
    }
}
$query = "select * from category where status=1";
$categories = $db->query($query);
?>
<div class="container p-5">
		<div class="row">
			<div class="col-sm-12 col-md-2 col-lg-3"></div>
			<div class="col-sm-12 col-md-8 col-lg-6 border">
				<div class="row p-2">
					<div class="col-12 text-center">
					   <h5>Add Courses</h5>
					</div>
					<form class="col-12" action="" method="post" enctype="multipart/form-data" onsubmit="return checkFN();">
						<!-- <div class="col-12">
							<div class="form-group">
								<label for="">Category</label>
								<select name="category_id" id="" class="form-control" aria-placeholder="Category" required>
								 <option value="">Select Category</option>
								 <?php 
								 	while ($obj = $categories->fetch_object()) {
										echo '<option value="'.$obj->category_id.'">'.$obj->category.'</option>';
									}
								 ?>
							 </select>
							</div>
						</div> -->
						<div class="col-12">
						 <div class="form-group">
							 <label for="">Description</label>
							 <textarea name="description" class="form-control" rows="4"></textarea>
						 </div>
                         <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" rows="4"></textarea>
                        </div>
                        				
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Course Name</label>
								<input type="text" name="cource" class="form-control" placeholder="cource name" required>
							</div>
						</div>
                        <div class="col-12">
							<div class="form-group">
								<label for="">Amount</label>
								<input type="number" min="0" name="amount" class="form-control" required>
							</div>
						</div>
                        <div class="col-12">
							<div class="form-group">
								<label for="">Total Slots</label>
								<input type="number" min="0" name="slots" class="form-control" placeholder="Total Slots" required>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="">Start Date</label>
										<input type="date" name="start_date" id="arrival" class="form-control" required>
									</div>
								</div>
                                <div class="col-6">
									<div class="form-group">
										<label for="">End Date</label>
										<input type="date" name="end_date" id="departure" class="form-control"  required>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-12 text-center">
							<input type="submit" value="Save" class="btn btn-primary">
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
	$('#arrival').attr('min', maxDate);
	$('#departure').attr('min', maxDate);

	$('#arrival').change(function(){
		if($('#arrival').val()){
			var dtToday = new Date($('#arrival').val());
    
		var month = dtToday.getMonth() + 1;
		var day = dtToday.getDate();
		var year = dtToday.getFullYear();
		if(month < 10)
			month = '0' + month.toString();
		if(day < 10)
			day = '0' + day.toString();
		var maxDate = year + '-' + month + '-' + day;
		$('#departure').attr('min', maxDate);
		}
		

		if($('#arrival').val()&&$('#departure').val()){
			calF()
		}
	});
	$('#departure').change(function(){
		if($('#arrival').val()&&$('#departure').val()){
			calF()
		}
	});
	var is_valid = true
	// function dupCheck(){
	// 	return is_valid
	// }
	function calF(){
		var dt1 = new Date($('#arrival').val())
		var dt2 = new Date($('#departure').val())
		var Difference_In_Time = dt2.getTime() - dt1.getTime();	
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1;
		$('#tot').html((Difference_In_Days*500).toFixed(2))
		$('#price').val((Difference_In_Days*500))
	}
	function checkFN(){
		return is_valid
	}
</script>