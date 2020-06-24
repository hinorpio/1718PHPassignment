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

        $sql = "SELECT * From WarehouseStock";
        $result = $conn->query($sql);
        echo"<form method='POST' action='deletewarestockamount.php'>";
        echo"<table class='middle'>";
        echo "<tr><td colspan='10'><h4><center>Stock Record</center></h4></td></tr>";
        echo"<tr>           
            <th>WarehouseStockId</th>
            <th>WarehouseStaffId</th>
            <th>StockId</th>
            <th>Amount</th>          
            <th>Delete</th>
        </tr>";
        while($row = $result->fetch_assoc()){
            echo"<tr><td>" . $row["WarehouseStockId"] . "</td><td>" . $row["WarehouseStaffId"] . "</td><td>" . $row["StockId"] . "</td><td>" . $row["Amount"] . "</td>
            <td><input type='submit' onclick='setValue($row[WarehouseStockId])' value='Delete'></td></tr>";
        }
        echo"</table><input type='hidden' name='WarehouseStockId' id='WarehouseStockId' value=''>";
        echo"</form>";
        
 ?>   

        <form method='POST' action='addwarestockamount.php'>            
            WarehouseStaffId: <input type = "text" name="WarehouseStaffId" /> <br />
            StockId: <input type = "text" name="StockId" /> <br />
            Amount: <input type = "text" name="Amount" /> <br />
            <input type = "Submit" name="Add" />
        </form>  
        
        

    </body>
</html>    