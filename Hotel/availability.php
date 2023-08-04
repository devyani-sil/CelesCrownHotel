<?php
require('db.php');

if (isset($_POST['roomtype'])) {
    $selectedRoomType = $_POST['roomtype'];

   $dd="select * from room_category where roomtype='$selectedRoomType'";
   $dd2=mysqli_query($con,$dd);

   $dd3=mysqli_fetch_array($dd2);

   $roomid=$dd3["id"];

   $ff="select * from room_no where category_id='$roomid' and status='0'";
   $ff2=mysqli_query($con,$ff);

   $count=mysqli_num_rows($ff2);

   echo"$count";
   


}
?>
