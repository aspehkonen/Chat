<?php
	$conn = new mysqli('localhost:3306/chatbox', 'root', '');
	$conn->select_db('chatbox');
	
	$result1 = $conn->query("SELECT * FROM logs ORDER by id ASC");
	
	while($extract = mysqli_fetch_array($result1)){
		echo "<span class='uName'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}
?>