
<?php

session_start();
include("connection.php");



?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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

<form  name="formSearch" method="post" action="home.php">
	
	<input type="text" placeholder="search .. " name="search" 	/>
	<input type="submit" name="go"  value="Search">


</form>

</body>
</html>





<?php

$id = $_SESSION['userid'];


if(isset($_POST['go'])){
	$target= $_POST['search'];
	

$query3="SELECT first_name , user_id FROM user WHERE (first_name LIKE '%$target%' OR last_name LIKE '$target' OR email LIKE '$target' OR hometown LIKE '%$target%' )";


$result3 =mysqli_query($conn,$query3);

while($row5 = mysqli_fetch_array($result3)){
    
    echo '<a href="getprofile.php?id=';
    echo $row5['user_id'];
    echo '">';
    echo  $row5['first_name'];
    echo "</a>";
    echo "</br>";

 
        }



$query4="SELECT * FROM post WHERE (poster_id = $id AND caption LIKE '%$target%') ORDER BY ptime DESC";



$result4 =mysqli_query($conn,$query4);


while($row6 = mysqli_fetch_assoc($result4)){

 echo '<div style=" width: 300px;
  
   border-radius: 5px;
   padding: 25px;
   margin: 25px; 
   border: 3px solid gray;
   border: 2px solid gray; border-width: 2px;">';
  
        echo  $row6['img']  ;
    echo "</br>";
       echo "</br>"; 
    echo  $row6['caption']  ;
    echo "</br>";
    echo  $row6['ptime']  ;
    echo "</br>";
    echo "</br>";
    echo "</div>";
        }

}

//}


//$row = mysqli_fetch_assoc($result); 




//post
echo '
<form action="validatpost.php" name="post" method="post"  >
<h5>how is your day </h5>
<p><textarea rows="4" cols="50" name="caption"  method="post"  ></textarea></p>
<p><button    name="img" >insert image</button>
<input type="submit" name="save" value="save"></input></p>
</form>
';



$query=" SELECT *
FROM post 
JOIN user ON poster_id= user_id 
WHERE user_id = '$id' ORDER BY ptime DESC";




$result =mysqli_query($conn,$query);

//$row = mysqli_fetch_assoc($result); 


while($row = mysqli_fetch_assoc($result)){

     echo '<div style=" width: 300px;
  
   border-radius: 5px;
   padding: 25px;
   margin: 25px; 
   border: 3px solid gray;
   border: 2px solid gray; border-width: 2px;">';

    echo  $row['first_name']  ;
        echo  $row['last_name']  ;
        echo  $row['img']  ;
    echo "</br>";
       echo "</br>"; 
    echo  $row['caption']  ;
    echo "</br>";
    echo  $row['ptime']  ;
    echo "</br>";
    echo "</br>";
       echo "</div>";
        }




	$query2="SELECT *
	FROM post 
	JOIN user AS friend ON post.poster_id= friend.user_id 
	JOIN friend_ship ON friend_ship.friend_id= friend.user_id 

	WHERE  friend_ship.user_id = '$id' AND friend_ship.request_status='1' ORDER BY ptime DESC";



	$result2 =mysqli_query($conn,$query2);



	while($row2= mysqli_fetch_assoc($result2)){

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
echo '<p>
<form action= "logout.php" method="post">
<button    name="logout" >logout</button>
</form></p>';











// //*******************************//
// function isfriend(){

// 	$id = '2';

// 	 include "connection.php";

// 	$user_id = $_SESSION['userid'];

// $query1="SELECT friend_id
// FROM friend_ship
// WHERE user_id = '$user_id' AND request_status = '1';
// ";
// $result1 =mysqli_query($conn,$query1);

// while($row1= mysqli_fetch_assoc($result1) )
// {
// 	if($row1['friend_id'] == $id)
// 	return 1;	
// }return 0;
// }


// echo   isfriend()  ;