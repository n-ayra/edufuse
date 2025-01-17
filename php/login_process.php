<?php
session_start();
require_once "../php/connection.php";

if (isset($_POST['Login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            $role = $row['role'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;

                if ($role === 'Teacher') {
                    header('Location: ../pages/homepageTeacher.php');
                    exit();
                } elseif ($role === 'Student') {
                    header('Location: ../pages/homepageStudent.php');
                    exit();
                } else {
                    echo "<script>
                        alert('Role not recognized.');
                        window.location.href = '../pages/login.php';
                    </script>";
                    exit();
                }
            } else {
                echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = '../pages/login.php';
                </script>";
                exit();
            }
        } else {
            echo "<script>
                alert('Invalid username or password.');
                window.location.href = '../pages/login.php';
            </script>";
            exit();
        }
        $stmt->close();
    } else {
        echo "<script>
            alert('Please fill in all fields.');
            window.location.href = '../pages/login.php';
        </script>";
        exit();
    }
}
$conn->close();
?>
