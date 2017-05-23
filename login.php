<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = new mysqli('localhost:3306/chatbox', 'root', '');
	$conn->select_db('chatbox');

	$result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
	if($result->num_rows){
		$res = mysqli_fetch_array($result);

		$_SESSION['username'] = $res['username'];
		echo "<center>";
		echo "You are now logged in. Click <a href='index.php'>here</a> to start chatting.";
		echo "</center>";
	}
	else {
		echo "<center>";
		echo "Username or password wrong. Please go back and enter the correct login information.<br>";
		echo "You may register a new account by clicking <a href='register.php'>here</a>";
		echo "</center>";
	}
?>