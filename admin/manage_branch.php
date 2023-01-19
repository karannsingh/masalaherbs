<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
	header('location:login.php');
}

$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

$branch='';
$branch_add = '';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from branch where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$branch=$row['branch_name'];
		$branch_add=$row['address'];
	}else{
		header('location:branches.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$branch= get_safe_value($conn,$_POST['branch_name']);
	$branch_add = get_safe_value($conn, $_POST['branch_add']);
	$res=mysqli_query($conn,"select * from branch where branch_name='$branch'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){

			}else{
				$msg="Branch already exist";
			}
		}else{
			$msg="Branch already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($conn,"update branch set branch_name='$branch', address='$branch_add' where id='$id'");
		}else{
			mysqli_query($conn,"insert into branch(branch_name,address,status) values('$branch','$branch_add','1')");
		}
		header('location:branches.php');
		die();
	}
}

?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Add Branch</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="branches.php">All Branch</a></li>
				<li class="breadcrumb-item active">Add Branch</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<div class="content pb-0">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header"><strong>Branch Form</strong></div>
						<form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="branch" class=" form-control-label">Branch</label>
									<input type="text" name="branch_name" placeholder="Enter branch name" class="form-control" required value="<?php echo $branch?>">
								</div>
								<div class="form-group">
									<label for="branch_add" class=" form-control-label">Branch</label>
									<input type="text" name="branch_add" placeholder="Enter branch address" class="form-control" required value="<?php echo $branch_add?>">
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