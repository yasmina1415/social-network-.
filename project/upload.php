<?php


session_start();
include('connection.php');


//image

echo'
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
<button type="submit" name ="submit">UPLOAD</button>
    </form>';


echo'<form action="profile.php"> 
 <input type="submit" name="skip" value="skip"></input>
 </form>
';




//********************
//validate image 2
//******************//
if (isset($_POST['submit'])){
  $file = $_FILES['image'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];


$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png','pdf');

if(in_array($fileActualExt , $allowed)){
  if($fileError === 0){
    if($fileSize < 1000000){
      $fileNameNew = uniqid('').".".$fileActualExt;
      $_SESSION['fileNameNew']=$fileNameNew;
      $fileDestination = 'uploads/'.$fileNameNew;
      move_uploaded_file($fileTmpName , $fileDestination);
            $_SESSION['img_status']= 0;
$queryimagestatusupdate =("UPDATE user SET img_status='0' WHERE user_id = '$id'");
    $resultimgstatusupdate = mysqli_query($conn ,$queryimagestatusupdate );
          $_SESSION['img_status']= 0;
      header("Location: profile.php?uploadsuccess");
      }else{
        echo"Your file is too big!";

      }
      }else{
        
        echo"There was an error uploading your file!";
      }
}else{
  
  echo "You cannot upload files of this type!";
 }
}


  



