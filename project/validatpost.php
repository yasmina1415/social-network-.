
<?php

 if(isset($_POST['save'])){ 


 session_start();
 include "connection.php";
$id = $_SESSION['userid'];

 
// Escape user inputs for security
$caption = mysqli_real_escape_string($conn, $_REQUEST['caption']);

 
// attempt insert query execution
$sql = "INSERT INTO post (caption, poster_id) VALUES ('$caption', '$id')";
if(mysqli_query($conn, $sql)){
    echo "Posted ! .";
    	header('REFRESH:1;URL=profile.php');

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    	header('REFRESH:1;URL=home.php');
}


 }
 else  {
 	echo " <h1> Sorry, this page isn't available. </h1> 
 	<h3>

The link you followed may be broken, or the page may have been removed. Go back to login page. </h3>";

 	header('REFRESH:3;URL=login1.php');}
