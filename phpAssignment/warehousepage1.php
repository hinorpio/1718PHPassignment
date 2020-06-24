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

        $sql = "SELECT orders.OrderId, suppliers.Name AS Name1, stock.Name, orders.Amount, orders.PurchaseDate, orders.DeliveryDate, orders.ReceivedDate 
            From orders 
            INNER JOIN supplierstock 
            ON orders.SupplierStockId = supplierstock.SupplierStockId
            INNER JOIN suppliers
            ON suppliers.SupplierId = supplierstock.SupplierId 
            INNER JOIN stock 
            ON orders.SupplierStockId= stock.StockId";
        $result = $conn->query($sql);

        echo '<form method="post" action="approve.php">';
        echo'<table class="middle">
        <tr><td colspan="9"><h4><center>All Delivery Orders</center></h4></td></tr>
        <tr>
        <th>OrderId</th>
        <th>Supplier Name</th>
        <th>Stock Name</th>
        <th>Order Amount</th>
        <th>Order Purchase Date</th>
        <th>Order Delivery Date</th>
        <th>Order Received Date</th>        
        </tr>';

        $i = 1;
        $yes = 'yes';
        $no = 'no';

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            $Orderid = $row['OrderId'];
                $SupplierName = $row['Name1'];
                $StockName = $row['Name'];
                $Amount = $row['Amount'];
                $PurchaseDate = $row['PurchaseDate'];
                $DeliveryDate = $row['DeliveryDate'];
                $ReceivedDate = $row['ReceivedDate'];   

        ?>

        <tr>
        <td><?php echo $Orderid; ?></td>
        <td><?php echo $SupplierName; ?></td>
        <td><?php echo $StockName; ?></td>
        <td><?php echo $Amount; ?></td>
        <td><?php echo $PurchaseDate; ?></td>
        <td><?php echo $DeliveryDate; ?></td>
        <td><?php echo $ReceivedDate; ?></td> 

        <?php

        
        }


        ?>
   </body>
</html>    