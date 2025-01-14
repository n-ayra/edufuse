<!DOCTYPE HTML>
<html>
<body>
<?php
session_start();
require_once "../php/connection.php";

if (isset($_POST['Login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Prepared statement to check user
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            $role = $row['role'];

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;

                // Redirect based on role
                if ($role === 'Teacher') {
                    header('Location: ../pages/homepageTeacher.php');
                    exit();
                } elseif ($role === 'Student') {
                    header('Location: ../pages/homepageStudent.php');
                    exit();
                } else {
                    $_SESSION['message'] = "Role not recognized.";
                    header('Location: ../pages/login.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = "Invalid username or password.";
                header('Location: ../pages/login.php');
                exit();
            }
        } else {
            $_SESSION['message'] = "Invalid username or password.";
            header('Location: ../pages/login.php');
            exit();
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Please fill in all fields.";
        header('Location: ../pages/login.php');
        exit();
    }
}
$conn->close();
?>
</body>
</html>
