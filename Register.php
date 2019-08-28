<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{
            width: 350px; 
            padding: 20px;
             
        }

   
    </style>
</head>
<?php
$firstname=$middlename=$lastname=$mobile=$username = $password =$Email= "";
include_Once("dbconnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
   
        $firstname=$_POST["firstname"];
        $middlename=$_POST["middlename"];
        $lastname=$_POST["lastname"];
        $mobile=$_POST["mobile"];
        $username=$_POST["Email"];
        $Email=$_POST["Email"];
        $password = $_POST["password"];
       
        $sql = "INSERT INTO Register (Firstname, Middlename, Lastname, Email, Mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
           
            mysqli_stmt_bind_param($stmt, "ssssss", $param_firstname,$param_middlename, $param_lastname, $param_mobile, $param_username, $param_password);
            
            $param_firstname= $firstname;
            $param_middlename=$middlename;
            $param_lastname = $lastname;
            $param_mobile = $mobile;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
           
    if(mysqli_stmt_execute($stmt)){
                
   $stmt1 = $db->prepare("INSERT INTO Login(Email, Password)  VALUES(?, ?)");
   $stmt1->bind_param("ss", $Email, $password);
   $stmt1->execute();
   $result1 = $stmt1->affected_rows;
   $stmt1 -> close();
   if($result1 > 0)
    {
                header("location: index.php");


    } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
       
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($db);
}
?>
<body>
    <div id="main">
	   <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" required>
                
            </div>
            <div class="form-group">
                <label>Middlename</label>
                <input type="text" name="middlename" class="form-control"  >
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" required>
                
            </div>
             <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" maxlength="10" onkeypress="validate(event)">
                <script type="text/javascript">
                 function validate(evt) {
                   var theEvent = evt || window.event;

  
                    if (theEvent.type === 'paste') {
                      key = event.clipboardData.getData('text/plain');
                      } else {
  
                       var key = theEvent.keyCode || theEvent.which;
                         key = String.fromCharCode(key);
                             }
                         var regex = /[0-9]/;
                          if( !regex.test(key) ) {
                            theEvent.returnValue = false;
                             if(theEvent.preventDefault) theEvent.preventDefault();
                                }
                           }
            </script>
            </div> 
            <div class="form-group">
                <label>Email</label>
                <input type="Email" name="Email" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="password" onkeyup='check();' required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" onkeyup='check();' class="form-control" required>
                <script type="text/javascript">
                    var check = function() {
                       if (document.getElementById('password').value ==
                        document.getElementById('confirm_password').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'matching';
                          } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'not matching';
                         }
                        }
                </script>
                <span id='message'></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>
</div>

</body>
</html>