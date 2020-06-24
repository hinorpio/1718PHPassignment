<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Assignment_ManagerInterface</title>
        <link rel="stylesheet" href="stylewh1.css" type="text/css" />
        <ul>
            <li><a href="warehousehome.php">Home</a></li>
            <li><a href="warehousepage1.php">List Delivery Orders</a></li>
            <li><a href="warehousepage2.php">Update Received Date</a></li>
            <li><a href="warehousepage3.php">Modify Stock Amount</a></li>
            <li><a href="warehousepage4.php">Add/Delete Stock Records</a></li>
            <li style="float:right"><a class="active" href="LoginpageWarehouse.php">Logout account</a></li>
            <li style="float:right"><a class="active" href="#">Login as Warehouse Staff</a></li>
        </ul>

        <style>
            #grad {
                height: 100%;
                background: blue;
                background: linear-gradient(to bottom right, #87CEFA 0%, #ff99ff 100%);
            }
        </style>

    </head>
    <body>
    <div id="grad"></div>
    
    <?php

        require_once('conn.php');

        $sql = "SELECT * From orders WHERE ReceivedDate IS NULL AND DeliveryDate IS NOT NULL";
        $result = $conn->query($sql);

        echo '<form method="POST" action="updatereceivedate.php">';
        echo'<table class="middle">
        <tr><td colspan="10"><h4><center>Update Receive Date</center></h4></td></tr>
        <tr>
            <th>OrderId</th>
            <th>RestaurantId</th>
            <th>SupplierStockId</th>
            <th>ManagerId</th>
            <th>warehouseStaffId</th>
            <th>Amount</th>
            <th>Approved</th>
            <th>PurchaseDate</th>
            <th>DeliveryDate</th>
            <th>Confirm</th>
        </tr>';

        $i = 1;

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Orderid = $row['OrderId'];
            $RestaurantId = $row['RestaurantId'];
            $SupplierStockId = $row['SupplierStockId'];
            $ManagerId = $row['ManagerId'];
            $WarehouseStaffId = $row['WarehouseStaffId'];
            $Amount = $row['Amount'];
            $Approved = $row['Approved'];
            $PurchaseDate = $row['PurchaseDate']; 
            $DeliveryDate = $row['DeliveryDate'];            
               
        ?>

        <tr>
        <td><?php echo $Orderid; ?></td>
        <td><?php echo $RestaurantId; ?></td>
        <td><?php echo $SupplierStockId; ?></td>
        <td><?php echo $ManagerId; ?></td>
        <td><?php echo $WarehouseStaffId; ?></td>
        <td><?php echo $Amount; ?></td>
        <td><?php echo $Approved; ?></td>
        <td><?php echo $PurchaseDate; ?></td>
        <td><?php echo $DeliveryDate; ?></td>
        <td>
            <a href="warehousepage2.php?update=<?php echo $Orderid; ?>" onclick="return confirm('Are you sure?');">Confirm</a>    
        </td>

        </form>

        <?php
        
        }

        if(isset($_GET['update'])){
        $updateid = $_GET['update'];

        $sql = "UPDATE orders SET ReceivedDate = CURDATE() WHERE orders.OrderId = $updateid";
        $result = $conn->query($sql);

        header("location: warehousepage2.php");

        }

        ?>
        
   </body>
</html>    