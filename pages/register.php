<?php
// Start session to manage step data
session_start();

// Include the database connection
require_once '../database/connection.php';

// Determine the step
$step = 1;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['role'])) {
		// Step 1: Role selection
		$_SESSION['role'] = $_POST['role'];
		$step = 2;
	} elseif (isset($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password'])) {
		// Step 2: User details
		$role = $_SESSION['role'] ?? '';
		$username = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		global $conn; 

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $conn->prepare("INSERT INTO users (role, username, name, email, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $role, $username, $name, $email, $hashed_password);

		if ($stmt->execute()) {
            echo "<script>
                alert('Registration successful! You will be redirected to the login page.');
                window.location.href = '../pages/login.php';
            </script>";
        } else {
            echo "<script>
                alert('Error: " . $stmt->error . "');
            </script>";
        }
		$stmt->close();

		// Clear session data
		session_destroy();
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<!-- Using Icons -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="../css/login_reg.css">
</head>
<body>
	<header>
		<h2 class="logo">EduFuse</h2>
	</header>

	<div class="wrapper">
		<span class="icon-close"><ion-icon name="close"></ion-icon></span>

		<div class="form-box Login">
			<h2>Register</h2>

			<!-- Step 1: Role Selection -->
			<?php if ($step === 1): ?>
			<form method="POST">
				<div class="input-box select-box">
					<select name="role" required>
						<option value="" disabled selected>Select Role</option>
						<option value="Student">Student</option>
						<option value="Teacher">Teacher</option>
					</select>
				</div>
				<button type="submit" class="btn">Next</button>
			</form>
			<?php endif; ?>

			<!-- Step 2: User Details -->
			<?php if ($step === 2): ?>
			<form method="POST">
				<div class="input-box">
					<span class="icon"><ion-icon name="person-outline"></ion-icon></span>
					<input type="text" name="username" required>
					<label>Username</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="person-outline"></ion-icon></span>
					<input type="text" name="name" required>
					<label>Name</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="mail"></ion-icon></span>
					<input type="email" name="email" required>
					<label>Email</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				<button type="submit" class="btn" name="Register">Register</button>
			</form>
			<?php endif; ?>

			<div class="register-login">
				<p>Already have an account? <a href="../pages/login.php" class="register-link">Login</a></p>
			</div>
		</div>
	</div>
</body>
</html>
