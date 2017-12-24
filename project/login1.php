<?php


session_start();

?>





<!DOCTYPE html>
<html>
<head>
	<title>project1</title>
	  
	  <style>

	  body{
background:url(background.jpg);
text-align: center;

padding-right: 0px;
}
form {
	    width: 40%;

    border: 3px solid #f1f1f1;
   margin-top: 100px;
}

input[type=text], input[type=password],input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
   
}

button {
    background-color: #4267b2;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    
}

h2{text-align: left;}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
	padding: 8px;
  
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

</head>


<body>

	<?php
	
	
include ('connection.php');

if(isset($_SESSION['username'])){

echo'<form action="logout.php"  method="POST">
	

	<button type="submit" name="logout">Logout</button>
    </form>';


}
else{

?>

<form action="checklogin.php" method="post" style="display: inline-block;">
	<div class="container">
	<h1>login here!</h1>
<label><b><h2> email</h2></b></label>

<input type="email" placeholder="Enter email" name="email" required></input>

	<label><b><h2>Password</h2></b> </label>
	
	 <input type="password" placeholder="Enter Password" name="password" required></input>

 <button type="submit" name="login" value="login">Login</button>
 </br>
 </br>
<span <label>
<b> OR </b></label>
<a href="signup.php"> Signup </a>
</span>
	</div>
	
</form> 



<?php

}
	?>

</body>
</html>