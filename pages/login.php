

<!-- Using Icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- HTML -->
<?php include '../include/headergen.html'; ?>

<!-- Override CSS -->
<link rel="stylesheet" href="../css/login_reg.css">
</head>

<body>
    <header>
        <h2 class="logo">EduFuse</h2>
    </header>

    
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box Login">
            <h2>Login</h2>
            
            <!-- Form -->
            <form action="../database/login_dtb.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" id="username" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class = "icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" name="Login" class="btn">Login</button>
            </form>

                <!-- Bottom part -->
                <div class="login-register">
                    <p>Don't have an account?<a href='../pages/register.php' class="register-link"> Register</a><p>
                </div>
                
        </div>
    </div>
</body>
</html>
