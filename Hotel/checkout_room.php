<?php
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
}

require('db.php');

if (isset($_POST['room_id'])) {
    $room_id = $_POST['room_id'];

    $update_query = "UPDATE room_no SET status = 0 WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param('i', $room_id);

    $response = array();

    if ($stmt->execute()) {
       
        $response['success'] = true;
    } else {
        
        $response['success'] = false;
    }
    echo json_encode($response);
}
?>
