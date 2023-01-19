<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
	header('location:login.php');
}
$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from menu_category where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
	}else{
		header('location:menu_category.php');
		die();
	}
}

if(isset($_POST['update_menu_category'])){
	$id= $_GET['id'];
	$name=mysqli_real_escape_string($conn, $_POST['update_name']);
	$desc= mysqli_real_escape_string($conn, $_POST['update_desc']);

	$sql = "UPDATE `menu_category` SET `name`='$name',`description`='$desc' WHERE id=$id";
	$run = mysqli_query($conn, $sql);
	?>
	<script>
		window.location.href='menu_category.php';
	</script>
	<?php
}


if (isset($_POST['add_menu_category'])) {
	$name=mysqli_real_escape_string($conn, $_POST['add_name']);
	$desc= mysqli_real_escape_string($conn, $_POST['add_desc']);
	
		$sql = "INSERT into menu_category (name, description, status) VALUES('$name','$desc',1)";
		$run = mysqli_query($conn, $sql);
		
		?>
		<script>
			window.location.href='menu_category.php';
		</script>
		<?php	
}

?>

<main id="main" class="main">

	<?php
	if (isset($_GET['id']) && $_GET['id']!='') {
		?>
		<div class="pagetitle">
			<h1>Edit Menu Category</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="menu_category.php">All Menu Category</a></li>
					<li class="breadcrumb-item active">Edit Menu Category</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Menu Category Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="form-group">
										<label for="name" class=" form-control-label">Menu Name</label>
										<input type="text" name="update_name" placeholder="Enter name" class="form-control" required value="<?php echo $row['name']?>">
									</div>
									<div class="form-group">
										<label for="desc" class=" form-control-label">Description</label>
										<input type="text" name="update_desc" placeholder="Enter Description" class="form-control" required value="<?php echo $row['description']?>">
									</div>
									<button id="payment-button" name="update_menu_category" type="submit" class="btn mt-3 btn-info btn-block">
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
			<h1>Add Menu Category</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="booking.php">All Menu Category</a></li>
					<li class="breadcrumb-item active">Add Menu Category</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="content pb-0">
			<div class="animated fadeIn">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header"><strong>Menu Category Form</strong></div>
							<form method="post" enctype="multipart/form-data">
								<div class="card-body card-block">
									<div class="form-group">
										<label for="name" class=" form-control-label">Name</label>
										<input type="text" name="add_name" placeholder="Enter Name" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="desc" class=" form-control-label">Description</label>
										<input type="text" name="add_desc" placeholder="Enter Description" class="form-control" required>
									</div>
									<button id="payment-button" name="add_menu_category" type="submit" class="btn mt-3 btn-info btn-block">
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