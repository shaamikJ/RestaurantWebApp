
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
	<meta charset="utf-8">
	<title>Restaurant Management</title>
</head>

<body>
	<div class="login-box">
		<h1>Login</h1>
		<form name="loginform" method="post" action="index_check.php" onsubmit="return validate();">
			<div class="text-box">
				<i class="fa fa-user"></i>
				<input type="text" placeholder="Username" name="username" value="" autocomplete="off" id="username">
			</div>
			<div class="text-box">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="Password" name="password" value="" autocomplete="off" id="password">
				<span class="eye" onclick="myFunction()">
					<i id="hide1" class="fa fa-eye"></i>
					<i id="hide2" class="fa fa-eye-slash"></i>
				</span>
			</div>
			<button class="btn" type="submit" name="login">Login</button>
		</form>
	</div>
	<script>
		function myFunction() {
			var x = document.getElementById("password");
			var y = document.getElementById("hide1");
			var z = document.getElementById("hide2");

			if (x.type === 'password') {
				x.type = "text";
				y.style.display = "block";
				z.style.display = "none";
			} else {
				x.type = "password";
				y.style.display = "none";
				z.style.display = "block";
			}
		}
		function validate(){
			
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			if(username===""){
			alert("Enter username");
			return false;
			}
			else if(password===""){
			alert("Enter password");
			return false;
			}
			else{
			return true;
			}
		}
		
	</script>
</body>

</html>