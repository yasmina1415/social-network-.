

<?php


echo'
<form action="checksignup.php" method="post">
	<h1>signup here!</h1>
	<p>first name:</br><input type="text" name="fname"></input></p>
	<p>last name:</br><input type="text" name="lname"></input></p>
	<p>nick name:</br><input type="text" name="nname"></input></p>
	<p>email:</br><input type="email" name="email"></input></p>
	<p>password:</br><input type="password" name="password"></input></p>
    <p>bio:</br><textarea rows="4" cols="50" name="bio"  method="post"  ></textarea></p>
    <p>birthdate:</br><input type="date" name="bd"></input></p>
    <p>gender:</br>
					<input type="radio" name="gender" value=male>male</input>
    				<input type="radio" name="gender" value=female>female</input></p>


    <p>status:</br>
					<input type="radio" name="status" value=single>single</input>
    				<input type="radio" name="status" value=married>married</input>
    				<input type="radio" name="status" value=in a relatinship>in a relatinship</input>
    				<input type="radio" name="status" value=complicated>complicated</input></p>			
    <p>home town:</br><input type="text" name="town"></input></p>        
    <p>phonenumber:</br><input type="number" name="ph1"></input></p>
    <p>another phone number:</br><input type="number" name="ph2list"></input></p>
	<input type="submit" name="signup" value="signup"></input>
    </form>';
