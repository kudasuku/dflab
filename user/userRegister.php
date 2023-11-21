<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="styleuser.css">
    <title>DF LAB REGISTER</title>
</head>
<header>
	<a href="C:\xampp\htdocs\dflab\homepage.html" class="logo"><img src="img/logo1.png"></a>
</header>
<?php
		//call file to connect to server eLeave
		include ("header.php");
		?>
		
		<?php
		//this query inserts a record in eLeave table
		//has form been submited
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$error = array (); //initialize an error array
		
		//check for ussrPassword
		if(empty ($_POST ['userPassword']))
		{
			$error [] = 'YOU FORGOT TO ENTER PASSWORD';
		}
		else
		{
			$p=mysqli_real_escape_string($connect,trim($_POST['userPassword']));
		}
		
		//check userName
		if(empty ($_POST ['userName']))
		{
			$error [] = 'YOU FORGOT TO ENTER NAME';
		}
		else
		{
			$n = mysqli_real_escape_string($connect,trim($_POST ['userName']));
		}
		
		//check userPhoneNo
		if(empty ($_POST ['userPhoneNo']))
		{
			$error [] = 'YOU FORGOT TO ENTER PHONE NO';
		}
		else
		{
			$ph = mysqli_real_escape_string($connect,trim($_POST ['userPhoneNo']));
		}
		
		//check userEmail
		if(empty ($_POST ['userEmail']))
		{
			$error [] = 'YOU FORGOT TO ENTER EMAIL';
		}
		else
		{
			$e = mysqli_real_escape_string($connect, trim ($_POST ['userEmail']));
		}
		//register the user in database
		//make the query
		$q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail) 
		VALUES ('','$p', '$n', '$ph', '$e')";
		$result = @mysqli_query ($connect, $q);//run the query
		if ($result)//if it runs
		{
			echo'<h1>THANK YOU FOR BECOME DFLAB MEMBERSHIP CLICK</h1> <a href="http://localhost/dflab/user/userLogin.php">here</a> <h1> TO LOGIN AGAIN </h1>';
			exit();
		}
		else //if it didnt run message
		{
			echo'<h1> SYSTEM ERROR :( </h1>';
			
			//debugging message
			echo '<p>'.mysqli_error($connect).'<br><br>QUERY : '.$q. '</p>';
		} //end of the (result)
		mysqli_close($connect); //close dataabase connection aborted
		exit();
	}
	
	?>
	<body>
	<section>
	<form action ="userRegister.php" method="post">
    <div class="background">
        <style>
            body {
              background-image: url('background.png');
            }
            </style>
        
    </div>
    <div class="text-center">

        <div class="container-xl" id="elemento">
            <br>
			<a href="http://localhost/dflab/user/userLogin.php">already have account? sign in</a>
            <h3 id="header">DF LAB USER REGISTER</h3>

            <input type="password" id="inputp" placeholder="create your password" name="userPassword" size="15" maxlength="60" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
                UPPERCASE, LOWERCASE LETTER AMD 8 OR MORE CHARACTERS"
                required value="<?php if(isset($POST['userPassword'])) echo $POST ['userPassword'];?>">
			<br>
			<!-- An element to toggle between password visibility -->
			<input type="checkbox" onclick="myFunction()"> Show Password</input>
			<script>
			function myFunction() {
  			var x = document.getElementById("inputp");
 			 if (x.type === "password")
			{
    		x.type = "text";
  			}
			else 
			{
    		x.type = "password";
  			}
			}
			</script>
			
            <input type="text" id="inputp" placeholder="create your username" name="userName" size="30" maxlength="50"required
                value="<?php if(isset($POST['userName'])) echo $POST ['userName'];?>">

            <input type="text" id="inputp" placeholder="enter your phone num"  name="userPhoneNo" size="30" maxlength="50"required
                value="<?php if(isset($POST['userPhoneNo'])) echo $POST ['userPhoneNo'];?>">

            <input type="text" id="inputp" placeholder="enter your email" name="userEmail" size="30" maxlength="50"required
                value="<?php if(isset($POST['userEmail'])) echo $POST ['userEmail'];?>">

				<div>
                <button type = "submit" name="Signin" >REGISTER</button>
                <button type = "reset">CLEAR ALL</button>   
				<div class="extra">
					<a href="#">Forgot Password?</a>
				</div>
            </div>  
        </div>
    </div>
    <script src="myscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	</form>
	</section>
</body>
</html>