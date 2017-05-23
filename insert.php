<?php 
	session_start();
	$uname = $_SESSION['username'];
	$msg = $_REQUEST['msg'];

	$conn = new mysqli('localhost:3306/chatbox', 'root', '');
	$conn->select_db('chatbox');

	$conn->query("INSERT INTO logs (username, msg) VALUES ('$uname', '$msg')");

	$result1 = $conn->query("SELECT * FROM logs ORDER by id ASC");

	while($extract = mysqli_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}

?>