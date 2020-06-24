<?php
    include_once('managerpage1.php');

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect("Localhost", "root", "", "projectdb") ;  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  
            }

    if( isset($_GET['approve']) )
    {
        $OrderId = $_GET['approve'];
        $sql = "UPDATE 'orders' SET 'Approved'='0' WHERE 'OrderId' = '$OrderId'";
        $result = mysql_query($sql) or die("Failed".mysql_error());
        echo "<meta http-equiv='refresh' content='0; url=maagerpage1.php'>"; 
    }



?>