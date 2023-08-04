<?php
include('db.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM room_category WHERE id = $id";
    if (mysqli_query($con, $deleteQuery)) {
      echo "1"; // Return 1 if the delete action is successful
    } else {
      echo "0"; // Return 0 if the delete action fails
    }
  }
?>