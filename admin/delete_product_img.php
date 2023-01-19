<?php
include('top.php');

include('sidebar.php');
if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}

$img= "";

if (isset($_GET['id']) && $_GET['id']!='') {  
  $id=get_safe_value($conn,$_GET['id']);
  $sql = "UPDATE `menu_product` SET `image`='$img' WHERE id=$id";
  if(mysqli_query($conn, $sql)){
    ?>
    <script>
      alert('Image Deleted Successfully!');
      window.location.href='manage_product.php?id=<?php echo $id?>';
    </script>
    <?php
  }else{
    ?>
    <script>
      alert('Image Not Deleted!');
      window.location.href='manage_product.php?id=<?php echo $id?>';
    </script>
    <?php
  }
}
?>