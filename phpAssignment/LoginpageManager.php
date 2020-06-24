<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Assignment_Login</title>
        <link rel="stylesheet" href="styleLoginManager.css" type="text/css" />

    </head>
    <body class="bg">
        <div class="loginpage">
        <img src="FoodWord.jpg" class="avatar"><br /><br />
            <h1>Manager</h1>
            <h1>Login Here</h1>

                <?php
                 $myForm = <<<EOD
	             <form method="post" action="$_SERVER[PHP_SELF]">
                 <p>StaffID</p>
                 <input type="text" name="userID" placeholder="Enter your StaffID">
                 <p>Password</p>
                 <input type="password" name="password" placeholder="Enter your Password"><br /><br />
                 <input type="submit" value="Submit"><br /><br />
                 <a href="#">Lost your password?</a><br>
                 <a href="#">Create new account?</a><br>
                 <a href="indexpage.php">Go back to index page</a><br>
            </form>  
EOD;
                echo $myForm;
                $check = FALSE;
                extract($_POST);
                if (isset($_POST['userID'])) {
                    $hostnane = "127.0.0.1";
                    $username = "root";
                    $pwd = "";
                    $db = "projectdb";
                    $conn = mysqli_connect($hostnane, $username, $pwd, $db) or die(mysqli_connect_error());                 
                    $sql = "SELECT * FROM managers WHERE ManagerId ='$userID' AND Password = '$password'";                   
                    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if (mysqli_num_rows($rs) > 0) {
                        echo 'OK';
                        header("Location: managerhome.php");
                    }else{
                        echo 'No';
                    }
                }
                ?>               
         

    </body>
</html>    