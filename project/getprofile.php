
<!--
check if not friend 
<p>
<form action= "addfriend.php" method="post">
<button    name="addfriend" > add friend</button>

</form></p>
 -->
 <!DOCTYPE html>
<html>
<head>
	<title>user profile</title>
	<style type="text/css">
	body{



padding-left: 30px;
}
	form {
	    width: 40%;
}

input[type=text], input[type=password],input[type=email] {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
   
}
		button {
    background-color: #4267b2;
    color: white;
    padding: 10px 10px;
    margin: 8px 10px;
    border: none;
    cursor: pointer;
    border-radius: 12px;
    width: 100px
 
   
}


h2{text-align: left;}

button:hover {
    opacity: 0.8;
}


	</style>
</head>
<body>

</body>
</html>

<?php





 session_start();
 include "connection.php";
$id = $_GET['id'];


		$query2 = "SELECT * FROM user WHERE user_id = '$id'";
		$result2 =mysqli_query($conn,$query2);

$row1 = mysqli_fetch_assoc($result2); 




$nname = $row1['nick_name'];
$fname = $row1['first_name'];
$lname = $row1['last_name'];
$bd = $row1['birthdate'];
$bio = $row1['bio'];
$status = $row1['status'];
//$pw=$_SESSION['password'];
$pic = $row1['pic'];
$email=$row1['email'];
$hometown = $row1['hometown'];
$gender = $row1['gender'];
$phone = $row1['phonenum1'];



$user_id = $_SESSION['userid'];

//query for if friend
function isfriend(){

	$id = $_GET['id'];

	 include "connection.php";

	$user_id = $_SESSION['userid'];

$query1="SELECT friend_id
FROM friend_ship
WHERE user_id = '$user_id' AND request_status = '1';
";
$result1 =mysqli_query($conn,$query1);

while($row1= mysqli_fetch_assoc($result1) )
{
	if($row1['friend_id'] == $id)
	return 1;	
}return 0;
}


echo '<h1 style=" margin= 10px">';
if (empty($nname)) {

    echo $fname;
     echo " ";
	echo $lname;
}


else {echo $nname;}


echo '</h1>';
echo '
<div class="flex-container" > ';

echo '<div><form  action= "home.php" method="post">
<button    name="home" >Home</button>

</form></div>';

if(isfriend()=='0'){

echo '<div></form></p>

<form action= "getprofile.php?id=';

echo $id;

echo '"
 method="post">
<button    name="addfriend" > add friend</button>

</form></div>';
echo "</div>";
}
echo '<div style="line-height:2;">';

echo '<div style=" border: 2px solid #4267b2; border-width: 2px;
 width: 300px;
     border-radius: 5px;
    padding: 25px;
    margin: 25px;">'; 

//echo $fname;
//echo $lname;

    echo $fname;
     echo " ";
	echo $lname;

echo '</br>';
if(isfriend()=='1'){

	echo $bio;
echo '</br>';
echo $bd; 
echo '</br>';
}

echo $status;
echo '</br>';
echo 'from: ';
echo $hometown;
echo '</br>';
echo $gender;
echo '</br>';
echo "</div>";
echo "</div>";
echo $pic;


if(isfriend()=='1')

{

$query="SELECT *
FROM post 
WHERE poster_id = '$id'ORDER BY ptime DESC ";



$result =mysqli_query($conn,$query);

//$row = mysqli_fetch_assoc($result); 


while($row = mysqli_fetch_assoc($result)){
	    echo  $row['first_name'] ;
	    echo  $row['last_name'] ;
	 echo '<div style=" width: 300px;
  
   border-radius: 5px;
   padding: 25px;
   margin: 25px; 
   border: 3px solid gray;
   border: 2px solid gray; border-width: 2px;">';

	    echo  $row['img']  ;
	    
	    echo "</br>"; 
	    echo  $row['caption']  ;
	    echo "</br>";
	    echo  $row['ptime']  ;
	    echo "</br>";
	    echo "</br>";
	      echo "</div>";
	        }
}


else {
/*	
echo '</form></p>
<p>
<form action= "getprofile.php?id=';

echo $id;

echo '"
 method="post">
<button    name="addfriend" > add friend</button>

</form></p>';*/
if(isset($_POST['addfriend'])){
	
	$sql = " INSERT INTO friend_ship (friend_id, user_id)
VALUES ('$id','$user_id' );  ";



$result4 =mysqli_query($conn,$sql);



//$result5 = $mysqli->query($sql, MYSQLI_USE_RESULT);

$sql1 = " INSERT INTO friend_ship (friend_id, user_id)
VALUES ('$user_id','$id' );  ";

$result5 =mysqli_query($conn,$sql1);



}

$query2="SELECT *
FROM post 
JOIN user ON poster_id= user_id 
WHERE  user_id = '$id' AND  post.privacy = '1' ORDER BY ptime DESC ";



$result2 =mysqli_query($conn,$query2);

//$row = mysqli_fetch_assoc($result); 


while($row2 = mysqli_fetch_assoc($result2)){
	 echo '<div style=" width: 300px;
  
   border-radius: 5px;
   padding: 25px;
   margin: 25px; 
   border: 3px solid gray;
   border: 2px solid gray; border-width: 2px;">';

	    echo  $row2['first_name']  ;
	    echo  $row2['last_name']  ;
	    echo  $row2['img']  ;
	    echo "</br>";
	    echo "</br>"; 
	    echo  $row2['caption']  ;
	    echo "</br>";
	    echo  $row2['ptime']  ;
	    echo "</br>";
	    echo "</br>";
	    echo "</div>";
	        }









}
//JOIN friend_ship ON friend_ship.friend_id= friend.user_id 

	// $query2="SELECT *
	// FROM post 
	// JOIN user AS friend ON post.poster_id= friend.user_id 
	

	// WHERE  user.user_id = '$id'";



	// $result2 =mysqli_query($conn,$query2);



	// while($row2= mysqli_fetch_assoc($result2)){
	//     echo  $row2['first_name']  ;
	//         echo  $row2['last_name']  ;
	//         echo  $row2['img']  ;
	//     echo "</br>";
	//        echo "</br>"; 
	//     echo  $row2['caption']  ;
	//     echo "</br>";
	//     echo  $row2['ptime']  ;
	//     echo "</br>";
	//     echo "</br>";
	//         }





       echo '<p>
<form action= "logout.php" method="post">
<button    name="logout" >logout</button>
</form></p>';

