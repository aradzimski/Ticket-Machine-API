<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "DELETE FROM EVENT WHERE id = '$id' AND NOT EXISTS(SELECT ticket.id FROM ticket WHERE ticket.event_id = '$id')";
    

    if ( mysqli_query($conn, $sql) and mysqli_affected_rows($conn) === 1) {
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