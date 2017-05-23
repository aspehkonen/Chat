<?php
	session_start();
	if(!isset($_SESSION['username'])){
?>
	<form name="form2" action="login.php" method="post">
	<table border="1" align="center">
	<tr>
		<td>Username: </td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password: </td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Login"></td>
	</tr>
	<tr>
		<td colspan="2"><a href="register.php">Register here to get an account</a></td>
	</tr>
	</table>
<?php
	exit;
	}
?>
<html>
<head>
	<title>Chat Box</title>
	<link rel="stylesheet" type="text/css" href="chat.css"/>
	<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
	<script>
		$("#s").keypress(function(e) {
		    if(e.which == 13) {
		        alert('You pressed enter!');
		    	$("#sendBtn").click();
		    }
		});
		function submitChat(){
			if(form1.msg.value == '' ){
				alert('Enter your message!');
				return;
				}
			var msg = form1.msg.value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET','insert.php?msg='+msg, true);
			xmlhttp.send();
			$("#sendArea").val('');
		}
		$(document).ready(function(e){
			$.ajaxSetup({cache:false});
			setInterval(function(){$('#chatlogs').load('logs.php');}, 2000);
		});
	</script>
</head>
<body>
	<form name="form1">
	<table border="1" align="center">
		<tr>
			<td colspan="2">Your chat name: <b><?php echo $_SESSION["username"]; ?></b>    <a href="logout.php" class="button" id="sendBtn">Logout</a></td>
		</tr>
		<tr>
			<td>Your Message:</td>
			<td><textarea name="msg" styles="width:200px; height: 70px" id="sendArea"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><a href="#" onclick="submitChat()" class="button">Send</a></td>
		</tr>
		<tr>
			<td colspan="2"><a href="logout.php" class="button" id="sendBtn">Logout</a></td>
		</tr>
	</table>
	<div id="chatlogs" style="width:100%; text-align:center">
		LOADING CHATLOGS PLEASE WAIT... 
	</div>
	</form>
</body>