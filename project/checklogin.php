<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title></title>
</head>
<body>

</body>
</html>


<?php

include ('connection.php');






 if (isset($_POST['login'])) {


$emaillogin=$_POST['email'];
$passwordlogin=md5($_POST['password']);



//error handler
//check if input is empty
if(empty($emaillogin)||empty($passwordlogin)){
	echo"empty email or password";
header('REFRESH:2;URL=login1.php');
	exit();

}else{


	$query = "SELECT email,password FROM user WHERE email = '$emaillogin' and password= '$passwordlogin' ";
	$result =mysqli_query($conn,$query);
	$resultcheck=mysqli_num_rows($result);

	if($resultcheck<1){ 
			
echo' wrong email or password !';
	header('REFRESH:2;URL=login1.php');
	exit();} else{

		session_start();
      


		$query2 = "SELECT * FROM user WHERE email = '$emaillogin'";
		$result2 =mysqli_query($conn,$query2);

$row = mysqli_fetch_assoc($result2); 




//login the user here
$_SESSION['userid']=$row['user_id'];
$_SESSION['username']=$row['nick_name'];
$_SESSION['email']=$row['email'];
$_SESSION['password']=$row['password'];
$_SESSION['fname']=$row['first_name'];
$_SESSION['lname']=$row['last_name'];
$_SESSION['status']=$row['status'];
$_SESSION['bio']=$row['bio'];
$_SESSION['pic']=$row['pic'];
$_SESSION['phone']=$row['phone1'];
$_SESSION['hometown']=$row['hometown'];
$_SESSION['bd']=$row['birthdate'];
$_SESSION['gender']=$row['gender'];

echo '<h1>welcome!</h1>'. $_SESSION['username'];
 
 header("Location: profile.php");
	exit();

	
}


}}

//else{

//	echo'retry';
//	header('REFRESH:2;URL=login1.php');
//	exit();
//}

	















