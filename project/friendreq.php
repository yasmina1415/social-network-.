<!DOCTYPE html>
<html>
<head>
	<title>friends</title>
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

include("connection.php");

$id = $_SESSION['userid'];

$query="SELECT friend.first_name  , friend.user_id
FROM user as friend 
JOIN friend_ship ON friend.user_id= friend_ship.friend_id 
JOIN user as user on user.user_id = friend_ship.user_id
 WHERE user.user_id = '$id' AND friend_ship.request_status='0' ";



$result =mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){
    
    echo '<a href="getprofile.php?id=';
    echo $row['user_id'];
    echo '">';
    echo  $row['first_name'];
    echo "</a>";
$friend_id=$row['user_id'];
        echo '<p>
<form action= "request.php" method="post" name="request">
 <input type="hidden" name="friendid" value=';

echo $friend_id ;
echo '
 >
<button    name="accept" >accept</button>
<button    name="delete" >delete</button>
</form></p>';
    echo "</br>";

 
        }


        echo '<p>
<form action= "logout.php" method="post">
<button    name="logout" >logout</button>
</form></p>';