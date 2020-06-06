<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $key = $_POST['key'];

    require_once 'connect.php';

    $sql = "UPDATE ticket SET active = '0' WHERE `key` ='$key'";

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