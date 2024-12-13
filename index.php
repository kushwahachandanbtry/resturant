<?php
/**
 * This page is used for login
 *
 * @package food-ordeing-system
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Ordering System</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login-main">
		<div class="login">
			<div class="user">
		<img src="images/userl.png" alt="">
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?> ?>" method="POST">
			<div class="input-session">
				<input type="email" name="email" id="" placeholder="Enter your Email"></br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="submit" name="save" value="LOGIN as Admin"><br>
				<input type="submit" name="save-employee" value="LOGIN as Employee">
			</div>
		</form>

		<?php
		if (isset($_POST['save-employee'])) {
			include "admin/config.php";
			$username = $_POST['email'];
			$password = $_POST['password'];
			// Assuming you have a database table named 'employee' with columns 'email' and 'password'
		
			// Prepare the SQL query using prepared statements to prevent SQL injection
			$sql = "SELECT * FROM employee WHERE email = ? AND password = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "ss", $username, $password);
			mysqli_stmt_execute($stmt);
		
			// Fetch the result
			$result = mysqli_stmt_get_result($stmt);
		
			if ($row = mysqli_fetch_assoc($result)) {
				// Email and password match, login successful
				session_start();
				$_SESSION['email'] = $row['email']; // Store user's email in a session variable
				$_SESSION['password'] = $row['password']; // Store user's password in a session variable
		
				header('Location: http://localhost/resturant/admin/dashboard.php');
				exit();
			} else {
				// Email and password do not match
				echo "<p style='color: red;'>Invalid email or password</p>";
			}
		
			mysqli_stmt_close($stmt);
		}
		if ( isset( $_POST['save'] ) ) {
			$username = $_POST['email'];
			$password = $_POST['password'];
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			if ( $username == 'resturant@gmail.com' && $password == '1234' ) {
				header( 'Location: http://localhost/resturant/admin/dashboard.php' );
			} else {
				echo '<p style="color: red;">Username and Password does not match</p>';
			}
		}

		
		?>
				</div>
		<div class="line2">
		</div>
		<div class="line3">
		</div>
		</div>
	</div>
</body>
</html>
