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

        <script>
            function setValue(wsid){
                document.getElementById('WarehouseStockId').value = wsid;
                document.form[0].submit();
            }
        </script>
    </head>
    <body>
    <div id="grad"></div>
    
  
<?php
        require_once('conn.php');

        $sql = 
        "SELECT warehousestock.WarehouseStockId, warehousestock.Amount, stock.Name AS name 
        From warehousestock 
        INNER JOIN stock
        ON warehousestock.StockId = stock.StockId ";

        $result = $conn->query($sql);
        echo"<form method='POST' action='updatewarestockamount.php'>";
        echo"<table class='middle'>";
        echo "<tr><td colspan='10'><h4><center>Stock Amount</center></h4></td></tr>";
        echo"<tr>           
            <th>WarehouseStockId</th>
            <th>Amount</th>
            <th>Stock Name</th>          
            <th>Update</th>
        </tr>";
        while($row = $result->fetch_assoc()){
            echo"<tr>
            <td>" . $row["WarehouseStockId"] . "</td>
            <td>" . $row["Amount"] . "</td>
            <td>" . $row["name"] . "</td>
            <td><input type='submit' onclick='setValue($row[WarehouseStockId])' value='Update'></td>
            </tr>";
        }
        echo"</table>NEW AMOUNT: <input type='hidden' name='WarehouseStockId' id='WarehouseStockId' value=''>";
        echo"<input type='TextBox' name='newAmount'></form>";

        
 ?>      
 
   </body>
</html>    