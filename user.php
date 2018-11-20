<?php
	require_once('db.php');
	
	$id = $_REQUEST['id'];
	
	$user = array();
	if ($id == '') {
		$user['u_id'] = '';
		$user['u_first_name'] = '';
		$user['u_last_name'] = '';
		$user['u_email'] = '';
	} else {
		$q = sprintf("SELECT * FROM users WHERE u_id = %s", $id);
		$res = mysqli_query($link, $q) or die(mysqli_error($link));
		
		if (mysqli_num_rows($res) > 0) {
			$user = mysqli_fetch_assoc($res);
		}
	}
?>

<html>
	<head>
		<title>User: <?php print $user['u_last_name'] . 
		', ' . $user['u_first_name']; ?></title>
	</head>
	
	<body>
		<form action="user_mod.php" method="POST">
			<label for="fname">First Name:</label>
			<input type="text" name="fname" id="fname" value="<?php print $user['u_first_name']; ?>"> <br />
			
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" id="lname" value="<?php print $user['u_last_name']; ?>"> <br />
			
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="<?php print $user['u_email']; ?>"> <br />
			
			<input type="hidden" name="id" id="id" value="<?php print $id; ?>" />
			
			<input type="submit" value="Save" />
		</form>	
	</body>
</html>