<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Assignment_ManagerInterface</title>
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

        <script>
            function setValue(wsid){
                document.getElementById('StockId').value = wsid;
                document.form[0].submit();
            }
        </script>

    </head>
    <body>
    <div id="grad"></div>

  <?php
        require_once('conn.php');

        $sql = "SELECT * From stock";
        $result = $conn->query($sql);
        echo"<form method='POST' action='showstock.php'>";
        echo"<table class='middle'>";
        echo "<tr><td colspan='3'><h4><center>Stock List</center></h4></td></tr>";
        echo"<tr>           
            <th>StockId</th>
            <th>ManagerId</th>
            <th>ItemName</th>
        </tr>";
        while($row = $result->fetch_assoc()){
            echo"<tr>
                <td>" . $row["StockId"] . "</td>
                <td>" . $row["ManagerId"] . "</td>
                <td>" . $row["Name"] . "</td>
                </tr>";
        }
        echo"</table><input type='hidden' name='StockId' id='StockId' value=''>";
        echo"</form>";
        
 ?>   

        <form method='POST' action='addstock.php'>
            
            ManagerId:<input type = "text" name="ManagerId" /> <br />
            ItemName: <input type = "text" name="ItemName" /> <br />
            <input type = "Submit" name="Add" />
        </form>  
        
        

    </body>
</html>    