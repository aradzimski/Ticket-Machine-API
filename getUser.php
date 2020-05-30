<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];

require_once 'connect.php';

$sql = "SELECT * FROM user WHERE email='$email' ";

    $response = mysqli_query($conn, $sql);
    $result['user'] = array();

    if (!$result)
    {
        $result["success"] = "0";
        $result["message"] = "Error!" 
        . mysqli_connect_error() 
        . "<br />" 
        . mysqli_error() 
        . "<br />" 
        . var_dump($response);

        echo json_encode($result);
        mysqli_close($conn);
    }
    else {
        while($row = $response->fetch_assoc())
        {
            $result['user'][] = $row;
        }
        
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
?>