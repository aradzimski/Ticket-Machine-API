<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $user_id = $_POST['user_id'];

require_once 'connect.php';

$sql = "SELECT t.id, t.event_id, t.user_id, t.key, t.createdOn, e.name 
FROM `ticket` AS t 
LEFT JOIN `event` AS e 
ON (t.event_id = e.id) 
WHERE `user_id`='$user_id' AND `active`='1'";

    $response = mysqli_query($conn, $sql);
    $result['read'] = array();

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
            $result['read'][] = $row;
        }
        
        $result["success"] = "1";
        $result["message"] = "Success";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
?>