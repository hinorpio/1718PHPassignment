<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Assignment_ManagerInterface3</title>
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
                ON orders.SupplierStockId= stock.StockId";

                $result = $conn->query($sql);

                echo '<form method="post" action=".php">';
                echo'<table class="middle">
                     <tr><td colspan="7""><h4><center>Order List</center></h4></td></tr>
                     <tr>
                     <th>OrderId</th>
                     <th>Supplier Name</th>
                     <th>Stock Name</th>
                     <th>Order Amount</th>
                     <th>Order Purchase Date</th>
                     <th>Order Delivery Date</th>
                     <th>Order Received Date</th>
                     </tr>';

                if($result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr>
                        <td>". $row["OrderId"] ."</td>
                        <td>". $row["Name1"] ."</td>
                        <td>". $row["Name"] ."</td>
                        <td>". $row["Amount"] ."</td>   
                        <td>". $row["PurchaseDate"] ."</td>
                        <td>". $row["DeliveryDate"] ."</td>
                        <td>". $row["ReceivedDate"] ."</td></tr>";
                    }
                    echo '</table> <input type="hidden" name="OrderId" id="OrderId" value="" /></form>';
                }
                else{
                    echo "0 result";
                }

                $conn-> close() ;

        ?>
                 
           </table>
   </body>
</html>   

