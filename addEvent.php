<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $dateofstart = $_POST['dateofstart'];
    $dateofend = $_POST['dateofend'];

    require_once 'connect.php';

    $sql = "INSERT INTO event (name, description, price, dateofstart, dateofend) VALUES ('$name', '$description', '$price', '$dateofstart', '$dateofend')";

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