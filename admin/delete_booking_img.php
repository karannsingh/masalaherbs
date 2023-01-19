<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}

if ((isset($_GET['img_id']) && $_GET['img_id']!='') && (isset($_GET['id']) && $_GET['id']!='') ) {
  $img_id=get_safe_value($conn,$_GET['img_id']);
  $id=get_safe_value($conn,$_GET['id']);
  $sql = "DELETE from booking_list_img where id='$img_id'";
  if(mysqli_query($conn, $sql)){
    ?>
    <script>
      alert('Image Deleted Successfully!');
      window.location.href='manage_booking.php?id=<?php echo $id?>';
    </script>
    <?php
  }else{
    ?>
    <script>
      alert('Image Not Deleted!');
      window.location.href='manage_booking.php?id=<?php echo $id?>';
    </script>
    <?php
  }
}
?>