

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
            <h2>Register</h2>
            <form action="../database/register_dtb.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class = "icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Register</button>
                </form>

                <div class="register-login">
                    <p>Already have an account?<a href='../pages/login.php' class="register-link"> Login</a><p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
