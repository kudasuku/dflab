<html>
<head>
<title>SIGN IN DF LAB</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="styleuser.css">
    <title>DF LAB SIGN IN</title>
</head>
<body>
		<?php
		//call file to connect to server eLeave
		include ("header.php");
		?>

<?php
        //this section processes submission from the login form
        //check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD']== 'POST')
        {
            //validate the adminID
            if(!empty($_POST['userName']))
            {
                $n = mysqli_real_escape_string($connect, $_POST['userName']);
            }
            else
            {
                $id=FALSE;
                echo '<p class = "error">You forgot to enter your ID.</p>';
            }
            //validate the adminPassword
            if (!empty($_POST['userPassword']))
            {
                $p = mysqli_real_escape_string($connect, $_POST['userPassword']);
            }
            else
            {
                $p = FALSE;
                echo '<p class = "error">You forgot to enter your password.</p>';
            }
            //if no problems
            if ($n && $p)
            {
                //retrieve the adminID , adminPassword , adminName , adminPhoneNo , adminEmail ,userID, leaveID 
                $q = "SELECT userID , userPassword , userName , userPhoneNo , userEmail FROM user WHERE (userName = '$n' AND userPassword = '$p')";

                //run the query and assign in to variable result
                $result = mysqli_query ($connect, $q);

                //count the number of rows that match the adminID/adminPassword combination
                //if one database row (record) matches the input;
                if (@mysqli_num_rows($result) == 1)
                {
                    //start the session, fetch the record and insert the three values in an array
                    session_start();
                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    header('Location:figure.html');
                    // cancel the rest of the script
                    exit();
                    
                    mysqli_free_result ($result);
                    mysqli_close ($connect);
                    //no match was made
                }
                else
                {
                   echo '<p class = "error">Username and adminPassword entered do not match our records </p>';
                }
                //if there was a problems
            }
            else
            {
               // echo '<p class ="error">Please try again.</p>';
            }
            mysqli_close($connect);
        }//end of submit conditional

        ?>

    <form action ="userLogin.php" method="post">
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
            <a href="http://localhost/dflab/user/userRegister.php">new user? create your account</a>
            <h3 id="header">SIGN IN DF LAB </h3>

            <input type="password" id="inputp" name="userPassword" placeholder="Enter your Password" size="15" maxlength="60" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
            title="MUST CONTAIN AT LEAST ONE NUMBER , ONE UPPERCASE, LOWERCASE LETTER AND 8 OR MORE CHARACTERS"
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
            
            <input type="text"  id="inputp" name="userName" placeholder="Enter your username" size="30" maxlength="50"
                required value="<?php if(isset($POST['userName'])) echo $POST ['userName'];?>">

            <div>
                <button type = "submit" name="Signin" >LOGIN</button>
                <button type = "reset">CLEAR ALL</button>  
                <div class="extra">
					<a href="#">Forgot Password?</a>
				</div> 
            </div>  
        </div>
    </div>
    </form>
    <script src="myscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>