<?php


    $conn = mysqli_connect("localhost", "root", "", "projectdb") ;  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  
            }
            extract($_POST);
            $sql = "INSERT INTO stock ( ManagerId, Name)
                    VALUES ('$ManagerId', '$ItemName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if(mysqli_affected_rows($conn) > 0)
                    header("location:managerpage4.php");
                else
                    echo "Update unsuccessfully";
                
        
                



?>