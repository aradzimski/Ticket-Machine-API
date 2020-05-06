<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $event_id = $_POST['event_id'];
    $user_id = $_POST['user_id'];
    $key = $_POST['key'];
    $createdOn = date("Y-m-d H:i:s");

    require_once 'connect.php';

    $sql = "INSERT INTO ticket (`event_id`, `user_id`, `key`, `createdOn`) VALUES ('$event_id', '$user_id', '$key', '$createdOn')";

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>