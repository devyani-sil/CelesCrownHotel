<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require('db.php');
    $name = $_POST['name'];
    $contact = $_POST['contact_no'];
    $checkin_date = $_POST['date_in'];
    $checkin_time = $_POST['date_in_time'];
 
    echo $sql = "INSERT INTO checked (name, contact_no, date_in) 
            VALUES ('$name', '$contact', '$checkin_date $checkin_time')";

    if ($con->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
