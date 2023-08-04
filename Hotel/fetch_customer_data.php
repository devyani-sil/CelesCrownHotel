<?php
require('db.php');

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
    $query = "SELECT c.*, r.room, rc.roomtype
              FROM checked c
              INNER JOIN room_no r ON c.roomid = r.id
              INNER JOIN room_category rc ON r.category_id = rc.id
              WHERE r.id = '$room_id'";

    $result = $con->query($query);

    // Check for query execution error
    if (!$result) {
        echo "Query Error: " . $con->error . "<br>";
        echo "SQL Query: " . $query . "<br>";
        exit;
    }

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
        exit;
    } else {
        echo "No customer data found for the given room ID.";
        exit;
    }
    
}
?>
