<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
	header('location:login.php');
}
$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from booking_list where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
	}else{
		header('location:booking.php');
		die();
	}
}

if(isset($_POST['update_booking'])){
	$id= $_GET['id'];
	$title=mysqli_real_escape_string($conn, $_POST['title']);
	$short_desc= $_POST['shortdesc'];

$post_images = getBookingImages($conn, $row['id']);
if (empty($post_images)) {
	$image_name = $_FILES['add_image']['name'];
	$img_tmp = $_FILES['add_image']['tmp_name'];
	if(count($image_name)>1){
		?>
		<script>
			alert("Please select only 1 images!");
			window.location.href='manage_booking.php?id=<?php echo $id?>';
		</script>
		<?php
	}
}
		$sql = "UPDATE `booking_list` SET `title`='$title',`short_desc`='$short_desc' WHERE id=$id";
		$run = mysqli_query($conn, $sql);
		/*Image Insert*/

		foreach ($image_name as $index => $img) {
			if (move_uploaded_file($img_tmp[$index], "images/uploads/$img")) {
				$sql_img = "INSERT into booking_list_img (booking_list_id, image) VALUES($id,'$img')";
				$run = mysqli_query($conn, $sql_img);
			}
		}
		?>
		<script>
			window.location.href='booking.php';
		</script>
		<?php
}


if (isset($_POST['add'])) {
	$title=mysqli_real_escape_string($conn, $_POST['add_title']);
	$short_desc= $_POST['add_desc'];
	$image_name = $_FILES['booking_image']['name'];
	$img_tmp = $_FILES['booking_image']['tmp_name'];
	
	if(count($image_name)>1){
		?>
		<script>
			alert("Please select only 1 images!");
			window.location.href='manage_booking.php';
		</script>
		<?php
	}else{
		$sql = "INSERT into booking_list (title, short_desc, status) VALUES('$title','$short_desc',1)";
		$run = mysqli_query($conn, $sql);
		/*Image Insert*/
		$last_post_id = mysqli_insert_id($conn);

		foreach ($image_name as $index => $img) {
			if (move_uploaded_file($img_tmp[$index], "images/uploads/$img")) {
				$sql_img = "INSERT into booking_list_img (booking_list_id, image) VALUES($last_post_id,'$img')";
				$run = mysqli_query($conn, $sql_img);
			}
		}
		?>
		<script>
			window.location.href='booking.php';
		</script>
		<?php
	}	
}

/*if(isset($_POST['add'])){
	$title=get_safe_value($conn,$_POST['add_title']);
	$short_desc=get_safe_value($conn,$_POST['short_desc']);
	$image_name = $_FILES['post_image']['name'];
	$img_tmp = $_FILES['post_image']['tmp_name'];

	if(count($image_name)>3){
		?>
		<script>
			alert("Please select only 3 images!");
			window.location.href='manage_booking.php?id=<?php echo $post_id ?>';
		</script>
		<?php
	}else{
		$res=mysqli_query($conn,"select * from booking_list where titile='$title'");
		$check=mysqli_num_rows($res);
		if($check>0){
			if(isset($_GET['id']) && $_GET['id']!=''){
				$getData=mysqli_fetch_assoc($res);
				if($id==$getData['id']){

				}else{
					$msg="Title already exist";
				}
			}else{
				$msg="Title already exist";
			}
		}

		if($msg==''){
			if(isset($_GET['id']) && $_GET['id']!=''){
				mysqli_query($conn,"update booking_list set title='$title',`short_desc`='$short_desc',`status`=1  where id='$id'");
			}else{
				mysqli_query($conn,"insert into post_category(category_name,status) values('$categories','1')");
			}
			header('location:categories.php');
			die();
		}
	}
}*/

?>

<main id="main" class="main">

	<?php
	if (isset($_GET['id']) && $_GET['id']!='') {
		?>
		<div class="pagetitle">
			<h1>Edit Booking List</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="booking.php">All Booking List</a></li>
					<li class="breadcrumb-item active">Edit Booking List</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Booking List Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="form-group">
										<label for="categories" class=" form-control-label">Title</label>
										<input type="text" name="title" placeholder="Enter title" class="form-control" required value="<?php echo $row['title']?>">
									</div>
									<div class="row">
										<?php 				
										$post_images = getBookingImages($conn, $row['id']);						
										if (empty($post_images)) {
											?>
											<div class="form-group mt-3 col-lg-6 col-md-6 col-6">
												<label>Upload Images (Max 1):</label>
												<input type="file" class="form-control" name="add_image[]" accept="image/*" required>
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
													<img src="images/uploads/<?php echo $post_images['image'] ?>" class="d-block w-100" style="height:100px">
													<a href="delete_booking_img.php?img_id=<?php echo $post_images['id'] ?>&id=<?php echo $id ?>" class="btn btn-danger mt-2 mb-2" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
												</div>
											</div>
										</div>
											<?php
										}
										?>																				
									</div>
									<div class="form-group">
										<label for="categories" class=" form-control-label">Short Description</label>
										<input type="text" name="shortdesc" placeholder="Enter Short Description" class="form-control" required value="<?php echo $row['short_desc']?>">
									</div>
									<button id="payment-button" name="update_booking" type="submit" class="btn mt-3 btn-info btn-block">
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
			<h1>Add Booking List</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="booking.php">All Booking List</a></li>
					<li class="breadcrumb-item active">Add Booking List</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Booking List Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="form-group">
										<label for="title" class=" form-control-label">Title</label>
										<input type="text" name="add_title" placeholder="Enter title" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Upload Images (Max 1):</label>
										<input type="file" class="form-control" name="booking_image[]" accept="image/*" required>
									</div>
									<div class="form-group">
										<label for="shortdesc" class=" form-control-label">Short Description</label>
										<input type="text" name="add_desc" placeholder="Enter Short Description" class="form-control" required>
									</div>
									<button id="payment-button" name="add" type="submit" class="btn mt-3 btn-info btn-block">
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