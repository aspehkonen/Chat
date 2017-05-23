<?php
	if(isset($_POST['submit'])){
		$conn = new mysqli('localhost:3306/chatbox', 'root', '');
		$conn->select_db('chatbox');

		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$pword2 = $_POST['password2'];

		if($pword != $pword2){
			echo "Passwords don't match!<br>";
		} else {
			$checkexist = $conn->query("SELECT username FROM users WHERE username='$uname'");
			if(mysqli_num_rows($checkexist)){
				echo "<center>";
				echo "Username already in use, please select different username.<br>";
				echo "</center>";
			} else {
				$conn->query("INSERT INTO users (username, password) VALUES ('$uname', '$pword')");
				echo "<center>";
				echo "Registered succesfully! Click <a href='index.php'>here</a> to start chatting.";
				echo "</center>";
			}
		}
	}
?>

<html>
<head>
	<title></title>
</head>
<body>
	<form name="form1" method="post" action="register.php">
	<table align="center" border="1" width="40%">
		<tr>
			<td>Enter your username: </td><td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Enter your password: </td><td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Repeat your password: </td><td><input type="password" name="password2"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Register"></td>
		</tr>
	</table>
	</form>
</body>
</html>