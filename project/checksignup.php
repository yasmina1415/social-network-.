
<?php	


//session_start();
include"connection.php";

//filter inputs came from main page
$fnsignup =filter_input(INPUT_POST , 'fname');
$lnsignup =filter_input(INPUT_POST , 'lname');
$nnsignup = filter_input(INPUT_POST , 'nname');
$passwordsignup1 = filter_input(INPUT_POST , 'password');
$passwordsignup=md5($passwordsignup1);
$emailsignup =filter_input(INPUT_POST , 'email');
$biosignup =filter_input(INPUT_POST , 'bio');
//$bdsignup =filter_input(INPUT_POST , 'db');
$bdsignup= $_POST['bd'];
$gendersignup =filter_input(INPUT_POST , 'gender');
$picsignup =filter_input(INPUT_POST , 'pic');
$phone1signup =filter_input(INPUT_POST , 'ph1');
$phone2signup =filter_input(INPUT_POST , 'ph2list');
$hometownsignup =filter_input(INPUT_POST , 'town');
$statussignup =filter_input(INPUT_POST , 'status');


//after filteration 
if(!empty($fnsignup)){
	if(!empty($passwordsignup)){
		if(!empty($emailsignup)){
           if(!empty($gendersignup)){
           	 





//check attributes of the database
			
			if (isset($_POST['signup'])) {
					$usernamesignup = $_POST['nname'];
					$emailsignup = $_POST['email'];
					$passwordsignup = md5($_POST['password']);
					$query = "SELECT * FROM user WHERE  email = '$emailsignup'"; 
        //check if the name is not exist
			if(mysqli_num_rows(mysqli_query($conn,$query)) > 0){	

					echo 'the account is already exist';
												//login 
					}

        else {  $sql="INSERT INTO user (first_name,last_name,nick_name , password , email ,phonenum1 ,phonenum2, status,gender,birthdate,pic,bio,hometown) values('$fnsignup ', '$lnsignup' ,'$nnsignup' ,'$passwordsignup' ,'$emailsignup' ,'$phone1signup' , '$phone2signup','$statussignup ','$gendersignup' ,'$bdsignup ', '$picsignup' ,'$biosignup ','$hometownsignup' )";

				if($conn->query($sql)){ 
	//make session

	session_start();


$_SESSION['username']=$nnsignup;
$_SESSION['email']=$emailsigmup;
$_SESSION['password']=$passwordsignup;
$_SESSION['fname']=$fnsignup;
$_SESSION['lname']=$lnsignup;
$_SESSION['status']=$statussignup;
$_SESSION['bio']=$biosignup;
$_SESSION['pic']=$picsignup;
$_SESSION['phone']=$phone1signup;
$_SESSION['hometown']=$hometownsignup;
$_SESSION['bd']=$bdsignup;
$_SESSION['gender']=$gendersignup;
$_SESSION['img_status']= 1;
				
	header("location:upload.php");
						}
		else{echo"Error:" . $sql . "<br>" . $conn->error;}
					}
						}

		


$query4= " SELECT user_id
FROM user
WHERE nick_name = '$nnsignup'"; 


$result4 =mysqli_query($conn,$query4);

while($row4= mysqli_fetch_assoc($result4))	
{$_SESSION['userid']=$row4['user_id'];
}


echo $row4['user_id'];


}else{echo 'gender should not be empty';die();}
}else{echo 'email should not be empty';die();}
}else{echo 'password should not be empty';die();}
}else{echo 'username should not be empty';die();}







