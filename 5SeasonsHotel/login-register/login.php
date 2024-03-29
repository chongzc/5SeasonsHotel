<?php
// Include the database connection file
include 'db_connection.php';

// Initialize variables
$usernameOrEmail = $password = "";
$usernameOrEmail_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username or email is empty
    if (empty(trim($_POST["usernameOrEmail"]))) {
        $usernameOrEmail_err = "Please enter username or email.";
    } else {
        $usernameOrEmail = trim($_POST["usernameOrEmail"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($usernameOrEmail_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, email, password FROM users WHERE username = ? OR email = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_usernameOrEmail, $param_usernameOrEmail);
            
            // Set parameters
            $param_usernameOrEmail = $usernameOrEmail;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                
                // Check if username or email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password == $hashed_password) {
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            
                            // Redirect user to booking page
                            header("location: /5SeasonsHotel/bookNow/index.php");
                            exit();
                        } else {
                            // Password is not valid, display a generic error message
                            $password_err = "Invalid password.";
                        }
                    }
                } else {
                    // Username or email doesn't exist, display a generic error message
                    $usernameOrEmail_err = "Invalid username or email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">
    <!-- ===== Font Awesome Icons ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Book Store Login Form</title>
</head>
<body>
<div class="login">
    <div class="login__content">
        <div class="login__img">
            <img src="img-login.svg" alt="">
        </div>
        <div class="login__forms">
            <!-- Login Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login__registre" id="login-in">
                <h1 class="login__title">Sign In</h1>
                <div class="login__box <?php echo (!empty($usernameOrEmail_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-regular fa-user login__icon"></i>
                    <input type="text" name="usernameOrEmail" placeholder="Username Or Email" class="login__input" value="<?php echo $usernameOrEmail; ?>">
                    <label for="usernameOrEmail"></label>
                    <span class="help-block"><?php echo $usernameOrEmail_err; ?></span>
                </div>
                <div class="login__box <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-solid fa-lock login__icon"></i>
                    <input type="password" name="password" placeholder="Password" class="login__input">
                    <label for="password"></label>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <button type="submit" class="login__button">Sign In</button>
                <div>
                    <span class="login__account">Don't have an Account ?</span>
                    <a href="register.php" class="login__signup" id="sign-up">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===== MAIN JS =====-->
<script src="main.js"></script>
</body>
</html>
