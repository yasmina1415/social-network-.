
<?php

 //if(isset($_POST['request'])){ 

session_start();

include("connection.php");

$id = $_SESSION['userid'];

$friendid = $_POST['friendid'];



if(isset(($_POST['accept']))){


$query="UPDATE friend_ship SET request_status = '1' WHERE friend_id = '$friendid' AND user_id = '$id' ";

if ($conn->query($query) === TRUE) {
    //echo "New record created successfully";


//if(mysqli_query($conn, $sql){
//echo "added!";
}


$query6="UPDATE friend_ship SET request_status = '1' WHERE friend_id = '$id' AND user_id = '$friendid' ";

if ($conn->query($query6) === TRUE) {
    //echo "New record created successfully";


//if(mysqli_query($conn, $sql){
//echo "added!";
//header('REFRESH:1;URL=friendreq.php');
header('Location: friendreq.php');
}

}
if(isset(($_POST['delete']))){

 $sql = "DELETE FROM friend_ship WHERE friend_id = '$friendid' AND user_id= '$id'";
  

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";


//if(mysqli_query($conn, $sql){
//echo "deleted!";
}
//header('REFRESH:1;URL=friendreq.php');



 $sql5 = "DELETE FROM friend_ship WHERE friend_id = '$id' AND user_id= '$friendid'";
  

if ($conn->query($sql5) === TRUE) {
   // echo "New record created successfully";


//if(mysqli_query($conn, $sql){
//echo "deleted!";
//header('REFRESH:1;URL=friendreq.php');
header('Location: friendreq.php');

}
 }

