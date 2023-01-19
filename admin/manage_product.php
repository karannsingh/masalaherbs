<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
	header('location:login.php');
}
$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from menu_product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['update_product'])){
	$id= $_GET['id'];
	$category_id=mysqli_real_escape_string($conn, $_POST['update_category_id']);
	$name=mysqli_real_escape_string($conn, $_POST['update_name']);
	$price=mysqli_real_escape_string($conn, $_POST['update_price']);
	$mrp=mysqli_real_escape_string($conn, $_POST['update_mrp']);
	$short_desc= $_POST['update_desc'];
	$image_name = $_FILES['update_image']['name'];
	$img_tmp = $_FILES['update_image']['tmp_name'];
	
	$sql = "UPDATE `menu_product` SET `category_id`='$category_id', `name`='$name', `price`='$price', `mrp`='$mrp', `short_desc`='$short_desc' WHERE id=$id";
	$run = mysqli_query($conn, $sql);
	/*Image Insert*/

	foreach ($image_name as $index => $img) {
		if (move_uploaded_file($img_tmp[$index], "images/uploads/$img")) {
			$sql_img = "update menu_product SET image='$img' where id=$id";
			$run = mysqli_query($conn, $sql_img);
		}
	}
	?>
	<script>
		window.location.href='product.php';
	</script>
	<?php
}


if (isset($_POST['add_product'])) {
	$category_id=mysqli_real_escape_string($conn, $_POST['add_category_id']);
	$name=mysqli_real_escape_string($conn, $_POST['add_name']);
	$price=mysqli_real_escape_string($conn, $_POST['add_price']);
	$mrp=mysqli_real_escape_string($conn, $_POST['add_mrp']);
	$short_desc= $_POST['add_desc'];
	$image_name = $_FILES['add_image']['name'];
	$img_tmp = $_FILES['add_image']['tmp_name'];
	
	$sql = "INSERT into menu_product (category_id, name, price, mrp, short_desc, status) VALUES('$category_id', '$name', '$price', '$mrp', '$short_desc', 1)";
	$run = mysqli_query($conn, $sql);

	$last_post_id = mysqli_insert_id($conn);

	foreach ($image_name as $index => $img) {
		if (move_uploaded_file($img_tmp[$index], "images/uploads/$img")) {
			$sql_img = "update menu_product SET image='$img' where id=$last_post_id";
			$run = mysqli_query($conn, $sql_img);
		}
	}

	?>
	<script>
		window.location.href='product.php';
	</script>
	<?php	
}

?>

<main id="main" class="main">

	<?php
	if (isset($_GET['id']) && $_GET['id']!='') {
		?>
		<div class="pagetitle">
			<h1>Edit Menu Product</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="product.php">All Menu Product</a></li>
					<li class="breadcrumb-item active">Edit Menu Product</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Menu Product Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="title" class=" form-control-label">Menu Category</label>
												<select class="form-control" name="update_category_id" id="category_id" required>
													<option disabled>Select Menu Category</option>
													<?php
													$res=mysqli_query($conn,"select id,name from menu_category order by name asc");
													while($cat=mysqli_fetch_assoc($res)){
														if($cat['id']==$id){
															echo "<option selected value=".$cat['id'].">".$cat['name']."</option>";
														}else{
															echo "<option value=".$cat['id'].">".$cat['name']."</option>";
														}

													}
													?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="name" class=" form-control-label">Product Name</label>
												<input type="text" name="update_name" placeholder="Enter Product Name" class="form-control" value="<?php echo $row['name'] ?>" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="price" class=" form-control-label">Product Price</label>
												<input type="text" name="update_price" placeholder="Enter Price" class="form-control" value="<?php echo $row['price'] ?>" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="mrp" class=" form-control-label">Product MRP</label>
												<input type="text" name="update_mrp" placeholder="Enter MRP" class="form-control" value="<?php echo $row['mrp'] ?>" required>
											</div>
										</div>
									</div>
									
									<div class="row">
										<?php 	
										if (empty($row['image'])) {
											?>
											<div class="form-group mt-3 col-lg-6 col-md-6 col-6">
												<label>Upload Images (Max 1):</label>
												<input type="file" class="form-control" name="update_image[]" accept="image/*" required>
											</div>
											<?php	
										}else{
											?>
											<div class="form-group mt-3 col-lg-6 col-md-6 col-6">
												<label>Uploaded Images:</label>
												<div class="row">                    

													<?php 

													?>
													<div class="col-lg-4 col-sm-6 col-12 text-center">         
														<img src="images/uploads/<?php echo $row['image'] ?>" class="d-block w-100" style="height:100px">
														<a href="delete_product_img.php?id=<?php echo $id ?>" class="btn btn-danger mt-2 mb-2" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
													</div>
												</div>
											</div>
											<?php
										}
										?>																				
									</div>
									<div class="form-group">
										<label for="shortdesc" class=" form-control-label">Short Description</label>
										<textarea name="update_desc" placeholder="Enter product short description" class="form-control" required><?php echo $row['short_desc']; ?></textarea>
									</div>									
									<button id="payment-button" name="update_product" type="submit" class="btn mt-3 btn-info btn-block">
										<span id="payment-button-amount">Submit</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}else{
		?>
		<div class="pagetitle">
			<h1>Add Menu Product</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="product.php">All Menu Product</a></li>
					<li class="breadcrumb-item active">Add Menu Product</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Menu Product Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="title" class=" form-control-label">Menu Category</label>
												<select class="form-control" name="add_category_id" id="category_id" required>
													<option disabled>Select Menu Category</option>
													<?php
													$res=mysqli_query($conn,"select id,name from menu_category order by name asc");
													while($row=mysqli_fetch_assoc($res)){
														if($row['id']==$id){
															echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
														}else{
															echo "<option value=".$row['id'].">".$row['name']."</option>";
														}

													}
													?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="name" class=" form-control-label">Product Name</label>
												<input type="text" name="add_name" placeholder="Enter Product Name" class="form-control" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="price" class=" form-control-label">Product Price</label>
												<input type="text" name="add_price" placeholder="Enter Price" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label for="mrp" class=" form-control-label">Product MRP</label>
												<input type="text" name="add_mrp" placeholder="Enter MRP" class="form-control" required>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label>Upload Images (Max 1):</label>
										<input type="file" class="form-control" name="add_image[]" accept="image/*" required>
									</div>
									<div class="form-group">
										<label for="shortdesc" class=" form-control-label">Short Description</label>
										<textarea name="add_desc" placeholder="Enter product short description" class="form-control" required></textarea>
									</div>
									<button id="payment-button" name="add_product" type="submit" class="btn mt-3 btn-info btn-block">
										<span id="payment-button-amount">Submit</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>   

</main><!-- End #main -->
<?php
include('footer.php');
?>