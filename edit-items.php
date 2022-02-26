<?php
include('./header_footer/header.php');
if(isset($_GET['update'])){
    $query = "select * from item_details where item_id=" . $_GET['update'] . "";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) === 1) {
            $item = mysqli_fetch_assoc($result);
        }
    // $delete = $db->query("UPDATE category SET status=false where category_id=".$_GET['update']);
    // $message = 'Category has been deleted successfully !';
    // $location = 'manage-category.php?status=true&message='.$message;
    // header("Location: $location");
$item_id = $_GET['update'];
}
if (!empty($_POST)) {

    try {
		
		//$imgData = file_get_contents($_FILES['image']['tmp_name']);
		//$_POST['image'] = $imgData  ;
        // $columns = implode(", ", array_keys($_POST));
        // $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
        // $values  = implode("', '", $escaped_values);
        // $query = "INSERT INTO item_details ( " . $columns . ")
        $query = "UPDATE item_details SET category_id= '".$_POST['category_id']."',name= '".$_POST['name']."',price= '".$_POST['price']."' where item_id='".$item_id."'";
        $con = mysqli_query($db, $query);
        if($con){
            $message = 'Item has been updated successfully !';
            $location = 'manage-items.php?status=true&message='.$message;
        }else{
            $message = 'Something Went Wrong !';
            $location = 'manage-items.php?status=false&message='.$message;
        }
        
        header("Location: $location");
    }
    //catch exception
    catch (Exception $e) {
        $message  = $e->getMessage();
        $location = 'manage-items.php?status=false&message='.$message;
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
					   <h5>Edit Products</h5>
					</div>
					<form class="col-12" action="" method="post" enctype="multipart/form-data" onsubmit="return checkFN();">
						<div class="col-12">
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
						</div>
						<!-- <div class="col-12">
						 <div class="form-group">
							 <label for="">Select Image</label>
							 <input type="file" name="image" class="form-control" required accept="image/*">
						 </div> -->
							
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Product Name</label>
								<input type="text" name="name" class="form-control" placeholder="Product name" id="aname" required value="<?= $item['name'] ?>">
								<small id="passwordHelp" class="text-danger" style="display: none;">
									Item Already Exists.
								  </small> 
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Product Description</label>
								<input type="text" name="description" class="form-control" placeholder="Product Description" required value="<?= $item['description'] ?>">
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="">Price</label>
										<input type="number" name="price" class="form-control" placeholder="Price" required value="<?= $item['price'] ?>">
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
		return true
	}
</script>