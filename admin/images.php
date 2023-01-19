<?php
include('top.php');

include('sidebar.php'); 
if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}

$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($conn,$_GET['type']);

  if($type=='delete'){
    $id=get_safe_value($conn,$_GET['id']);
    $delete_sql="delete from post_images where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$sql="select * from post_images order by id asc";
$res=mysqli_query($conn,$sql);

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>All Comments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Comments</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="content pb-0">
  <div class="orders">
     <div class="row">
      <div class="col-xl-12">
       <div class="card">
        <div class="card-body">
           <h4 class="box-title mt-3">Comments</h4>
        </div>
        <div class="card-body--">
           <div class="table-stats order-table ov-h">
            <table class="table ">
             <thead>
              <tr>
                 <th class="serial">#</th>
                 <th>ID</th>
                 <th>Image</th>
                 <th>Post ID</th>
                 <th>Post Title</th>
                 <th>Action</th>
                 <th></th>
              </tr>
             </thead>
             <tbody>
              <?php 
              $i=1;
              while($row=mysqli_fetch_assoc($res)){?>
              <tr>
                 <td class="serial"><?php echo $i?></td>
                 <td><?php echo $row['id']?></td>
                 <td>
                  <img src="../images/<?php echo $row['image'] ?>" class="d-block w-60" style="height:70px"></td>                 
                 <td><?php echo $row['post_id']?></td>
                 <td><?php 
                 $result = getPostTitle($conn, $row['post_id']);
                 echo $result;
                  ?></td>
                 <td>
                  <span class='badge bg-danger'><a href="?type=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a></span>
                 </td>
              </tr>
              <?php 
              $i++;
            } ?>
             </tbody>
            </table>
           </div>
        </div>
       </div>
      </div>
     </div>
  </div>
</div>

</main><!-- End #main -->
<?php
include('footer.php');
?>