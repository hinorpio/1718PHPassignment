<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Assignment_ManagerInterface2</title>
        <link rel="stylesheet" href="stylewh1.css" type="text/css" />
        <ul>
        <li><a href="http://127.0.0.1/phpAssignment/managerhome.php">Home</a></li>
            <li><a href="http://127.0.0.1/phpAssignment/managerpage1.php">Approve Pending Orders</a></li>
            <li><a href="http://127.0.0.1/phpAssignment/managerpage2.php">Delete Pending Orders</a></li>
            <li><a href="http://127.0.0.1/phpAssignment/managerpage3.php">List All Orders</a></li>
            <li><a href="http://127.0.0.1/phpAssignment/managerpage4.php">Add Items to Stock List</a></li>
            <li style="float:right"><a class="active" href="LoginpageManager.php">Logout account</a></li>
            <li style="float:right"><a class="active" href="#">Login as Manager</a></li>
        </ul>

        <style>
            #grad {
                height: 100%;
                background: red;
                background: linear-gradient(to bottom right, #87CEFA 0%, #99ffff 100%);
            }
        </style>

    </head>
    <body>
     <div id="grad"></div>
       

        <?php

            require_once('conn.php');
            
            $sql = "SELECT orders.OrderId, suppliers.Name AS Name1, stock.Name, orders.Amount, orders.PurchaseDate, orders.DeliveryDate, orders.ReceivedDate 
                From orders 
                INNER JOIN supplierstock 
                ON orders.SupplierStockId = supplierstock.SupplierStockId
                INNER JOIN suppliers
                ON suppliers.SupplierId = supplierstock.SupplierId 
                INNER JOIN stock 
                ON orders.SupplierStockId= stock.StockId
                WHERE orders.DeliveryDate IS NULL AND orders.ReceivedDate IS NULL";
           $result = $conn->query($sql);


            echo'<table class="middle">
            <tr><td colspan="6"><h4><center>Delete-able Order List</center></h4></td></tr>
            <tr>
            <th>OrderId</th>
            <th>Supplier Name</th>
            <th>Stock Name</th>
            <th>Order Amount</th>
            <th>Order Purchase Date</th>       
            <th>Action</th>
            </tr>';

            $i = 1;

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $Orderid = $row['OrderId'];
                $SupplierName = $row['Name1'];
                $StockName = $row['Name'];
                $Amount = $row['Amount'];
                $PurchaseDate = $row['PurchaseDate'];
        ?>

            <tr>
            <td><?php echo $Orderid; ?></td>
            <td><?php echo $SupplierName; ?></td>
            <td><?php echo $StockName; ?></td>
            <td><?php echo $Amount; ?></td>
            <td><?php echo $PurchaseDate; ?></td>
            <td>
                <a href="managerpage2.php?delete=<?php echo $Orderid; ?>" onclick="return confirm('Are you sure?');">Delete</a>    
            </td>

            <?php

            $i++;
            }

            if(isset($_GET['delete'])){
            $delete_id = $_GET['delete'];

            $sql = "DELETE FROM orders WHERE OrderId = '$delete_id'";
            $result = $conn->query($sql);

            header("location: managerpage2.php");

            }

            ?>
           
    </body>
</html>    