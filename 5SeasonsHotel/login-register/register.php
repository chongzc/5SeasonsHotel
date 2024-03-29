<?php
// Include the database connection file
include 'db_connection.php';

// Define variables and initialize with empty values
$nameLastname = $username = $email = $password = "";
$nameLastname_err = $username_err = $email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name and lastname
    if (empty(trim($_POST["nameLastname"]))) {
        $nameLastname_err = "Please enter your name and lastname.";
    } else {
        $nameLastname = trim($_POST["nameLastname"]);
    }
    
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Check if username is already taken
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting into database
    if (empty($nameLastname_err) && empty($username_err) && empty($email_err) && empty($password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (nameLastname, username, email, password) VALUES (?, ?, ?, ?)";
         
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_nameLastname, $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_nameLastname = $nameLastname;
            $param_username = $username;
            $param_email = $email;
            $param_password = $password; // Store plain password
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Registration successful, redirect to login page with success message
                header("location: login.php?registration=success");
                exit();
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
    <title>5 Seasons Hotel | Registration</title>
</head>
<body>
<div class="login">
    <div class="login__content">
        <div class="login__img">
            <img src="img-login.svg" alt="">
        </div>
        <div class="login__forms">
            <!-- Registration Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login__create" id="login-up">
                <h1 class="login__title">Create Account</h1>
                <div class="login__box <?php echo (!empty($nameLastname_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-regular fa-user login__icon"></i>
                    <input type="text" name="nameLastname" placeholder="Name & Lastname" class="login__input" value="<?php echo $nameLastname; ?>" required>
                    <label for="nameLastname"></label>
                    <span class="help-block"><?php echo $nameLastname_err; ?></span>
                </div>
                <div class="login__box <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-solid fa-at login__icon"></i>
                    <input type="text" name="username" placeholder="Username" class="login__input" value="<?php echo $username; ?>" required>
                    <label for="username"></label>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="login__box <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-regular fa-envelope login__icon"></i>
                    <input type="text" name="email" placeholder="E-mail" class="login__input" value="<?php echo $email; ?>" required>
                    <label for="email"></label>
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="login__box <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <i class="fa-solid fa-lock login__icon"></i>
                    <input type="password" name="password" placeholder="Password" class="login__input" value="<?php echo $password; ?>" required>
                    <label for="password"></label>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <button type="submit" class="login__button">Sign Up</button>
                <div>
                    <span class="login__account">Already have an Account ?</span>
                    <a href="login.php" class="login__signin" id="sign-in">Sign In</a>
                </div>
                <div class="login__social">
                    <a href="#" class="login__social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="login__social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="login__social-icon"><i class="fa-brands fa-google"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===== MAIN JS =====-->
<script src="main.js"></script>
</body>
</html>
