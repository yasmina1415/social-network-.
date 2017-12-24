
<!DOCTYPE html>
<html>
<head>
	<title>friends</title>
	<style type="text/css">
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

include("connection.php");

$id = $_SESSION['userid'];

$query="SELECT friend.first_name , friend.user_id
FROM user as friend 
JOIN friend_ship ON friend.user_id= friend_ship.friend_id 
JOIN user as user on user.user_id = friend_ship.user_id
 WHERE user.user_id = '$id' AND friend_ship.request_status='1' ";



$result =mysqli_query($conn,$query);

//$row = mysqli_fetch_assoc($result); 



while($row = mysqli_fetch_array($result)){
    
    echo '<a href="getprofile.php?id=';
    echo $row['user_id'];
    echo '">';
    echo  $row['first_name'];
    echo "</a>";
    echo "</br>";

 //here the bonus
    echo '<div><form  action="friends.php" method="post">
<button    name="deletefriend" >Delete</button>

</form></div>';

if(isset($_POST['deletefriend'])){

$fr_id=$row['user_id'];
 $sql = "DELETE FROM friend_ship WHERE friend_id = '$fr_id' AND user_id= '$id'";
  

if ($conn->query($sql) === TRUE) {
    
}

 $sql1 = "DELETE FROM friend_ship WHERE friend_id = '$id' AND user_id= '$fr_id'";
  

if ($conn->query($sql1) === TRUE) {
    //echo "New record created successfully";


//if(mysqli_query($conn, $sql){
//echo "deleted!";
}


}
//end of the bonus

        }







        echo '<p>
<form action= "logout.php" method="post">
<button    name="logout" >logout</button>
</form></p>';