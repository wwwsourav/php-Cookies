<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>php new batch</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>User Login form</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter phone" name="password">
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>
<?php
include('dbcon.php');
if (isset($_POST['submit'])) {

		$email=$_POST['email'];		
		$password=$_POST['password'];

		$query="SELECT * FROM register where email='$email' and password='$password'";
		$sql=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($sql);
		if (is_array($row)) {
			//echo "<script> alert('login successfull')</script>";
			//header('location:show.php');
			$_SESSION['login']="login successfully";
			$_SESSION["id"]=$row['id'];
			$_SESSION["name"]=$row['name'];
			//print_r($_SESSION); exit();
			//echo $_SESSION["id"]; exit();
			
			header('location:show.php');
			
		}
		else{
			echo "<script> alert('login failed')</script>";
		}
	
	
}


?>
