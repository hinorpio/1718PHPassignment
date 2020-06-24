<?php
    include_once('warehousepage1.php');

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect("Localhost", "root", "", "projectdb") ;  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  
            }

    if( isset($_GET['update']) )
    {
        $OrderId = $_GET['update'];
        $sql = "UPDATE orders SET ReceivedDate = $_POST['receivedate'] WHERE orders.OrderId = $Orderid";
        $result = mysql_query($sql) or die("Failed".mysql_error());
        echo "<meta http-equiv='refresh' content='0; url=warehousepage2.php'>"; 
    }



?>