<?php
include('top.php');

include('sidebar.php'); 
if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}

$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($conn,$_GET['type']);
  if($type=='status'){
    $operation=get_safe_value($conn,$_GET['operation']);
    $id=get_safe_value($conn,$_GET['id']);
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update booking_list set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=get_safe_value($conn,$_GET['id']);
    $delete_img="delete from booking_list_img where booking_list_id=$id";
    mysqli_query($conn,$delete_img);
    $delete_sql="delete from booking_list where id=$id";
    mysqli_query($conn,$delete_sql);    
  }
}

$sql="select * from booking_list order by id asc";
$res=mysqli_query($conn,$sql);

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>All Booking List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Booking List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="content pb-0">
  <div class="orders">
     <div class="row">
      <div class="col-xl-12">
       <div class="card">
        <div class="card-body">
           <h4 class="box-title mt-3">Booking List</h4>
           <p class="box-link"><a href="manage_booking.php">Add Booking List</a> </p>
        </div>
        <div class="card-body--">
           <div class="table-stats order-table ov-h">
            <table class="table ">
             <thead>
              <tr>
                 <th class="serial">#</th>
                 <th>ID</th>
                 <th>Title</th>
                 <th>Image</th>
                 <th>Short Description</th>
                 <th>Action</th>
              </tr>
             </thead>
             <tbody>
              <?php 
              $i=1;
              while($row=mysqli_fetch_assoc($res)){?>
              <tr>
                 <td class="serial"><?php echo $i?></td>
                 <td><?php echo $row['id']?></td>
                 <td><?php echo $row['title']?></td>
                 <td>
                  <?php 
                 $post_images = getBookingImages($conn, $row['id']);
                  ?>                    
                  <img src="images/uploads/<?php echo $post_images['image'] ?>" class="d-block w-100" style="height:100px"></td>
                 <td><?php echo $row['short_desc']?></td>
                 <td>
                <?php
                if($row['status']==1){
                  echo "<span class='badge bg-success'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                }else{
                  echo "<span class='badge bg-primary'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                }
                echo "<span class='badge bg-warning'><a href='manage_booking.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                ?>
                <span class='badge bg-danger'><a href="?type=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this Booking List?');">Delete</a></span>
                 </td>
              </tr>
              <?php 
              $i++;
              } 
            ?>
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