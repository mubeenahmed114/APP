<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
     body{ 
        font: 14px sans-serif; 
     }
     .wrapper{ 
       align-items:center;
       width: 350px; 
       padding: 20px; 

     }
    </style>
    <script type="text/javascript">
    	function validateform(){ 
       var ID=document.myform.Email.value; 
       var Password=document.myform.pass.value;

    		if(ID==""||ID==null){
    			alert("Email Field Can't Be Empty");
    			return false;
    		}
    		if(Password==""||Password==null){
    			alert("Password Field Can't Be Empty");
    			return false;
    		}

    	}
    </script>
</head>
<body>
	<?php
       Include_Once("dbconnect.php");
       if($_SERVER['REQUEST_METHOD'] == "POST"){
         $Email = $_POST['Email'];
         $pass =$_POST['pass'];
          $sql = "SELECT Email, Password FROM Login WHERE Email = '$Email' and  Password= '$pass'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count1 = mysqli_num_rows($result);
          if($count1 >= 1){
               header("location: welcome.php");

          }


       }

	?>
<div class="wrapper">
<h2>Login</h2>
<form name="myform" action="" method="POST" onsubmit="return validateform()">
	<div class="form-group">
	   <label>Email ID/Username</label>
	   <input type="Email" name="Email" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="Password" name="pass" class="form-control" required>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="login">
	</div>
	<p>Don't have an account? <a href="register.php">Register</a></p>
</form>
</body>
</html>