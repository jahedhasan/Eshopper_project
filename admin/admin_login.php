<?php
session_start();
$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($link,"eshoper_project");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body style="background: gray">
    <div style="margin: auto;width: 400px;background: white;margin-top: 50px;">
    	<h1 style="padding:10px;background: blue;text-align: center;color: white ">LOG IN</h1>
    	<form action="" method="post" name="form1" style="text-align: center;">
    		<div style="padding:10px;">
    			<input type="text" name="username" required placeholder="Enter your email" style="padding: 10px;width: 300px;">
    		</div>
    		<div style="padding:10px;">
    			<input type="password" name="password" required placeholder="Enter your password" style="padding: 10px;width: 300px;">
    		</div>
    		<div style="padding: 10px;">
    			<input type="submit" name="submit1" value="Log in" style="padding: 10px;background: blue;color:white;width: 320px;">
    		</div>
    		
    	</form>
    </div>

    <?php
        if (isset($_POST['submit1'])) {
            $res = mysqli_query($link, "SELECT * FROM admin_login WHERE username='$_POST[username]' && password = '$_POST[password]'");
            $row= mysqli_fetch_array($res);
            while($row){

                $_SESSION['admin']= $row['username'];
                header('Location:add_product.php');
            }



        } else {
            
        }
        
    ?>


</body>
</html>