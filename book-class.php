<?php
include('./header_footer/header.php');
if (!empty($_POST)) {

    try {
		
		
		$_POST['user_id'] = $_SESSION['id']  ;
        $columns = implode(", ", array_keys($_POST));
        $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
        $values  = implode("', '", $escaped_values);
        $query = "INSERT INTO class_booking ( " . $columns . ")
        VALUES ('" . $values . "')";
        $con = mysqli_query($db, $query);
        if($con){
            $message = 'Class Registration Completed !';
           // $location = 'manage-items.php?status=true&message='.$message;
		   $location = 'book-class.php?status=true&message='.$message;
        }else{
            $message = 'Something Went Wrong !';
            //$location = 'manage-items.php?status=false&message='.$message;
			$location = 'book-class.php?status=false&message='.$message;
        }
        
        header("Location: $location");
    }
    //catch exception
    catch (Exception $e) {
        $message  = $e->getMessage();
        //$location = 'manage-items.php?status=false&message='.$message;
		$location = 'book-class.php?status=false&message='.$message;
        header("Location: $location");
    }
}
$query = "select * from cources where status=1 and start_date>curdate()";
$categories = $db->query($query);
?>
<div class="container p-5">
		<div class="row">
			<div class="col-sm-12 col-md-2 col-lg-3"></div>
			<div class="col-sm-12 col-md-8 col-lg-6 border">
				<div class="row p-2">
					<div class="col-12 text-center">
					   <h5>Register</h5>
					</div>
					<form class="col-12" action="" method="post" enctype="multipart/form-data" onsubmit="return checkFN();">
						<div class="col-12">
							<div class="form-group">
								<label for="">Select Cource</label>
								<select name="class_id" id="" class="form-control" aria-placeholder="Category" required>
								 <option value="">Select Cource</option>
								 <?php 
								 	while ($obj = $categories->fetch_object()) {
										echo '<option value="'.$obj->class_id.'">'.$obj->cource.' -- Duration - ('.$obj->start_date.'-'.$obj->end_date.')</option>';
									}
								 ?>
							 </select>
							</div>
						</div>
<!-- 						
						<div class="col-12" style="display: ;">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="">Price</label>
										<input type="text" name="user_id" class="form-control" placeholder="Price" value="<?php isset($_SESSION['id']) ?>" required>
									</div>
								</div>
								
							</div>
						</div> -->
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
	var is_valid = true
	$('#name').keyup(function(){
		$.ajax({
            url:'ajax_dup_check.php',
            type:'post',
            data:{type:"ITEM",val:$('#name').val()},
            dataType:'json',
            success:function(res){
              if(res.valid){
                $("#name").addClass("is-invalid").focus();
                $("#passwordHelp").css("display","block");
                is_valid = false
				console.log(1111)
              }
              else{
                $("#name").removeClass("is-invalid");
                $("#passwordHelp").css("display","none");
                is_valid = true
              }
            },
			error:function(error){
				console.log(11111)
			}
          });
	});
	function checkFN(){
		return is_valid
	}
</script>