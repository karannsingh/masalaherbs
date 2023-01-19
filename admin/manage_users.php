<?php
include('top.php');

include('sidebar.php'); 
if (!isset($_SESSION['ADMIN_LOGIN'])) {
	header('location:login.php');
}

$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$user_name=$row['name'];
	}else{
		header('location:users.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id=get_safe_value($conn,$_GET['id']);
	$user_type=get_safe_value($conn,$_POST['user_type']);	
	$res=mysqli_query($conn,"select * from users where user_type='$user_type' and id=$id");
	$check=mysqli_num_rows($res);
	if($check>0){
		$msg="User Type already set";
	}else{
		
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($conn,"update users set user_type='$user_type' where id='$id'");
		}
		header('location:users.php');
		die();
	}
}

?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Edit User</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="users.php">All Users</a></li>
				<li class="breadcrumb-item active">Edit User Details</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<div class="content pb-0">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header"><strong>User Form</strong></div>
						<form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">User ID :</label>
									<label><?php echo $row['id'] ;?></label>									
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">User Name :</label>
									<label><?php echo $row['name'] ;?></label>									
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">User Email :</label>
									<label><?php echo $row['email'] ;?></label>									
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">User Mobile :</label>
									<label><?php echo $row['mobile'] ;?></label>									
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Date Time :</label>
									<label><?php echo $row['added_on'] ;?></label>									
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">User Type :</label>
									<select class="form-control" name="user_type">
										<?php 
										if ($row['user_type']=='Client') {
											?>
												<option>Client</option>	
											<option>Trainer</option>									
											<?php
										}else{
											?>
											<option>Trainer</option>
											<option>Client</option>																														
											<?php
										}
										?>																				    
									</select>								
								</div>
								<button id="payment-button" name="submit" type="submit" class="btn mt-3 btn-info btn-block">
									<span id="payment-button-amount">Submit</span>
								</button>
								<div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>   

</main><!-- End #main -->
<?php
include('footer.php');
?>