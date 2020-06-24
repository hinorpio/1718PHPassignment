<?php


    $conn = mysqli_connect("localhost", "root", "", "projectdb") ;  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  
            }
                extract($_POST);
                $sql = "UPDATE warehousestock SET Amount = '$newAmount' WHERE warehousestock.WarehouseStockId = '$WarehouseStockId'";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if(mysqli_affected_rows($conn) > 0)
                    header("location:warehousepage3.php");
                else
                    echo "Update unsuccessfully";
                
        
                



?>