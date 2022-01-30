<?php
include('./header_footer/header.php');
if (!empty($_POST)) {

    try {
		
		$imgData = file_get_contents($_FILES['image']['tmp_name']);
		$_POST['image'] = $imgData  ;
        $columns = implode(", ", array_keys($_POST));
        $escaped_values = array_map(array($db, 'real_escape_string'), array_values($_POST));
        $values  = implode("', '", $escaped_values);
        $query = "INSERT INTO item_details ( " . $columns . ")
        VALUES ('" . $values . "')";
        $con = mysqli_query($db, $query);
        if($con){
            $message = 'Item has been added successfully !';
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
					   <h5>Add Products</h5>
					</div>
					<form class="col-12" action="" method="post" enctype="multipart/form-data">
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
						<div class="col-12">
						 <div class="form-group">
							 <label for="">Select Image</label>
							 <input type="file" name="image" class="form-control" required accept="image/*">
						 </div>
							
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Product Name</label>
								<input type="text" name="name" class="form-control" placeholder="Product name" required>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Product Description</label>
								<input type="text" name="description" class="form-control" placeholder="Product Description" required>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="">Price</label>
										<input type="text" name="price" class="form-control" placeholder="Price" required>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="">Quantity</label>
										<input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
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