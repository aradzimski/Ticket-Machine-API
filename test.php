<?php

require_once 'connect.php';

echo "API TicketMachine zostało poprawnie zainstalowane na serwerze" . "<br /><br />";

$sql = "SELECT * FROM user WHERE id='1' ";

    $response = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        echo "Dane testowego użytkownika pobranego z bazy:"."<br />";
        echo "id: " . $row['id'] . "<br />";
        echo "name: " . $row['name'] . "<br />";
        echo "lastname: " . $row['last_name'] . "<br />";
        echo "email: " . $row['email'] . "<br />";
        echo "password: " . $row['password'] . "<br />";

    }
    else {
        echo "Błąd połączenia z bazą danych." . "<br /><br />";
        echo "Dodatkowe dane:" . "<br />"; 
        echo mysqli_connect_error();
        echo "<br />";
        echo mysqli_error();
        echo "<br />";
        var_dump($response);
    }
?>