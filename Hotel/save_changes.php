<?php
include('db.php'); 

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];

  $updateQuery = "UPDATE room_category SET roomtype = '$name', price = $price WHERE id = $id";
  if (mysqli_query($con, $updateQuery)) {
    echo "1"; // Return 1 if the update is successful
  } else {
    echo "0"; // Return 0 if the update fails
  }
}
?>
