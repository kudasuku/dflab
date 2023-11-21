<html>
<head>
<title>DE FIGURE LAB ADMIN REGISTER</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin.css">
    <title>Register form</title>
</head>
<body>
		<?php
		//call file to connect to server dflab
		include ("header.php");
		?>
		
		<?php
		//this query inserts a record in dflab table
		//has form been submited
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$error = array (); //initialize an error array
		
		//check for adminPassword
		if(empty ($_POST ['adminPassword']))
		{
			$error [] = 'YOU FORGOT TO ENTER PASSWORD';
		}
		else
		{
			$p = mysqli_real_escape_string($connect,trim($_POST ['adminPassword']));
		}
		
		//check adminName
		if(empty ($_POST ['adminName']))
		{
			$error [] = 'YOU FORGOT TO ENTER NAME';
		}
		else
		{
			$n = mysqli_real_escape_string($connect,trim($_POST ['adminName']));
		}
		
		//check adminPhoneNo
		if(empty ($_POST ['adminPhoneNo']))
		{
			$error [] = 'YOU FORGOT TO ENTER PHONE NO';
		}
		else
		{
			$ph = mysqli_real_escape_string($connect,trim($_POST ['adminPhoneNo']));
		}
		
		//check adminEmail
		if(empty ($_POST ['adminEmail']))
		{
			$error [] = 'YOU FORGOT TO ENTER EMAIL';
		}
		else
		{
			$e = mysqli_real_escape_string($connect, trim ($_POST ['adminEmail']));
		}

		//register the admin in database
		//make the query
		$q = "INSERT INTO admin (adminID, adminPassword, adminName, adminPhoneNo, adminEmail) 
		VALUES ('','$p', '$n', '$ph', '$e')";
		$result = @mysqli_query ($connect, $q);//run the query
		if ($result)//if it runs
		{
			echo'
            <body>
            <div>
            <h1> THANKS CLICK HERE TO ENTER ADMIN PAGE </h1>
            </div>
            </body>';
			exit();
		}
		else //if it didnt run message
		{
			echo'<h1> SYSTEM ERROR </h1>';
			
			//debugging message
			echo '<p>'.mysqli_error($connect).'<br><br>QUERY : '.$q. '</p>';
		} //end of the (result)
		mysqli_close($connect); //close dataabase connection aborted
		exit();
	}
	?>

    <form action ="adminRegister.php" method="post">
    <div class="background">
        <style>
            body 
			{
              background-image: url('background.png');
            }
            </style>
        
    </div>
    

    <div class="text-center">

        <div class="container-xl" id="elemento">
            <br>
            <a href="http://localhost/dflab/admin/adminLogin.php">already have account ?</a>
            <h3 id="header">DF LAB ADMIN REGISTER</h3>
            <input type="password" id="inputp" name="adminPassword" placeholder="Admin Password" size="15" maxlength="60" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
                UPPERCASE, LOWERCASE LETTER AND 8 OR MORE CHARACTERS"
                required value="<?php if(isset($POST['adminPassword'])) echo $POST ['adminPassword'];?>">

            <input type="text" id="inputp" name="adminName" placeholder="Admin Username" size="30" maxlength="50"
                required value="<?php if(isset($POST['adminName'])) echo $POST ['adminName'];?>">

            <input type="text" id="inputp" name="adminPhoneNo" placeholder="Enter Admin Phone No" pattern="[0-9]{3}-[0-9]{7}" size="15" maxlength="20"
                required value="<?php if(isset($POST['adminPhoneNo'])) echo $POST ['adminPhoneNo'];?>">

            <input type="text" id="inputp" name="adminEmail" placeholder="Enter Admin Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"size="30" maxlength="50"
                required value="<?php if(isset($POST['adminEmail'])) echo $POST ['adminEmail'];?>">
            <br>
            <div>
                <button type = "submit">REGISTER</button>
                <button type = "reset">CLEAR ALL</button>   
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