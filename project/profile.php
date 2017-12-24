
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
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
.flex-container {
  display: flex;
  flex-direction: row;
}
</style>
</head>
<body>



</body>
</html>



<?php


 session_start();
 include "connection.php";

$nname = $_SESSION['username'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$bd = $_SESSION['bd'];
$bio = $_SESSION['bio'];
$status = $_SESSION['status'];
$pw=$_SESSION['password'];
$pic = $_SESSION['pic'];
$email=$_SESSION['email'];
$hometown = $_SESSION['hometown'];
$gender = $_SESSION['gender'];
$phone = $_SESSION['phone'];


echo '<h1 style=" margin= 10px">';
if (empty($nname)) {

    echo $fname;
     echo " ";
	echo $lname;
}


else {echo $nname;}

//**************************************//
$id = $_SESSION['userid'] ;


    //Get image data from database
    $sqlimg = ("SELECT pic , img_status , gender FROM user WHERE user_id = '$id'");
    $resultimg = mysqli_query($conn , $sqlimg);
    while($rowimg = mysqli_fetch_assoc($resultimg)){
      echo"<div>";  
    if($rowimg['img_status']==0){
        $fileNameNew=$_SESSION['fileNameNew'];

                echo "<img style='width:150px; height:auto;' src='uploads/".$fileNameNew."'>";

    }else{
        
if($rowimg['gender']=="female"){  echo "<img style='width:150px; height:auto;'  src='uploads/profiledefaultf.jpg'>";  }
else{    echo "<img style='width:150px; height:auto;' src='uploads/profiledefaultm.jpg'>";  }

    }
    
         echo"</div>";  
}
        // $imgData = $result->fetch_assoc();
        // //Render image
        // header("Content-type: image/jpg"); 
        // echo $imgData['pic']; 
    


$_SESSION['pic'] = $resultimg;
//***************************************************//

echo '</h1>';

echo '
<div class="flex-container" > 
<div><form  action= "friends.php" method="post">
<button    name="friends" >friends</button>

</form>
</div>
<div>
<form  action= "friendreq.php" method="post">
<button    name="req" >requests</button>
</form>
</div>
<div>
<form  action= "home.php" method="post">
<button    name="home" >Home</button>

</form> </div>


</div>';



//echo $_SESSION['fname'];
//echo $nname;
echo '<div style="line-height:2;">';

echo '<div style=" border: 2px solid #4267b2; border-width: 2px;
 width: 300px;
     border-radius: 5px;
    padding: 25px;
    margin: 25px;">';

    echo $fname;
     echo " ";
	echo $lname;
	echo '</br>';
echo $bio;
echo '</br>';
echo $status;
echo '</br>';
echo 'from: ';
echo $hometown;
echo '</br>';
echo $gender;
echo '</br>';
echo $bd;
echo "</div>";
echo "</div>";





//post
echo '
<form action="validatpost.php" name="post" method="post"  >
<h5>how is your day </h5>
<p><textarea rows="4" cols="50" name="caption"  method="post"  ></textarea></p>
<p ><button  style="border-radius: 8px; background-color: #e7e7e7; color: black;"  name="img" >insert image</button>
<p>Privacy:</br>
					<input type="radio" name="privacy" value=public>public</input>
    				<input type="radio" name="privacy" value=private>private</input>
    				<button style="border-radius: 50%; background-color: #e7e7e7; color: black;" type="submit" name="save" value="save">save</button></p>
</form>
';












$id = $_SESSION['userid'];

$query="SELECT *
FROM post 
JOIN user ON poster_id= user_id 
WHERE  user_id = '$id' ORDER BY ptime DESC";



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

//JOIN friend_ship ON friend_ship.friend_id= friend.user_id 

	// $query2="SELECT *
	// FROM post 
	// JOIN user AS friend ON post.poster_id= friend.user_id 

	// WHERE  user_id = '$id'";



	// $result2 =mysqli_query($conn,$query2);


	// while($row2= mysqli_fetch_assoc($result2)){
	//     echo  $row2['first_name']  ;
	//     echo  $row2['last_name']  ;
	//     echo  $row2['img']  ;
	//     echo "</br>";
	//     echo "</br>"; 
	//     echo  $row2['caption']  ;
	//     echo "</br>";
	//     echo  $row2['ptime']  ;
	//     echo "</br>";
	//     echo "</br>";
	//         }







echo '<form  action= "home.php" method="post">
<button    name="home" >Home</button>

</form>';


    echo '<p>
<form action= "logout.php" method="post">
<button    name="logout" >logout</button>
</form></p>';
