
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <div>
    <form method="POST" action="login.php" id="login-form">
        <label for="Email">Email:</label>
        <input type="text" name="Email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <button id="register-button">Register</button>
    </div>
    <?php if (isset($login_error)) { echo "<p>$login_error</p>"; } 
    ?>
   
    <script>
        // JavaScript for handling the form submission and redirection
        document.addEventListener("DOMContentLoaded", function () {
            var loginForm = document.getElementById("login-form");
            var registerButton = document.getElementById("register-button");

            loginForm.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent the default form submission

                
                window.location.href ="dashboard.php"; // Replace with the actual URL of the next page
            });

            // Add an event listener to the Register button for redirection
            registerButton.addEventListener("click", function () {
                window.location.href = "register.php"; // Replace with the actual URL of the registration page
            });
        });

    </script>
     
</body>
</html>