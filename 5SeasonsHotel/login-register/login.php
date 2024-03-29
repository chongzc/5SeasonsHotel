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

    if ($password == $hashed_password) {
    // Password is correct, so start a new session
    session_start();
    
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;

    // Call JavaScript function to set login status
    echo '<script>setLoginStatus();</script>';

    // Redirect user to booking page
    header("location: /5SeasonsHotel/bookNow/index.php");
    exit();
} else {
    // Password is not valid, display a generic error message
    $password_err = "Invalid password.";
}
}

if ($password == $hashed_password) {
    // Password is correct, so start a new session
    session_start();
    
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;

    // Call JavaScript function to set login status
    echo '<script>setLoginStatus();</script>';

    // Redirect user to booking page
    header("location: /5SeasonsHotel/bookNow/index.php");
    exit();
} else {
    // Password is not valid, display a generic error message
    $password_err = "Invalid password.";
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
    <title>5 Seasons Hotel | Login Form</title>
</head>
<body>
<div class="navigationMenu">
    <div>
        <img class="logo" src="\5SeasonsHotel\includes\includesImages\navigationMenuImages\logo.png" alt="logo">
    </div>
    <div class="menuItems">
        <nav>
            <ul>
                <li><a href="/5SeasonsHotel/">Home</a></li>
                <li><a href="/5SeasonsHotel/Gallery/index.php">Gallery</a></li>
                <li><a href="/5SeasonsHotel/contactUs/index.php">Contact Us</a></li>
                <li><a href="#" onclick="checkLoginStatus('/5SeasonsHotel/bookNow/index.php')">Book Now</a></li>
                <li class="profileLink">
                    <?php 
                        session_start();
                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            echo '<a href="#" onclick="confirmLogout()">';
                        } else {
                            echo '<a href="/5SeasonsHotel/login-register/login.php">';
                        }
                    ?>
                    <img src="\5SeasonsHotel\includes\includesImages\navigationMenuImages\profile-user.png" alt="Profile" width="40" style="height: 40px">
                </a>
                </li>
            </ul>
        </nav>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
    </button>
</div>

<div class="sidebar" onclick="toggleMenu()">
    <nav>
        <ul>
            <li><a href="/5SeasonsHotel/">HOME</a></li>
            <li><a href="/5SeasonsHotel/Gallery/index.php">GALLERY</a></li>
            <li><a href="/5SeasonsHotel/contactUs/index.php">CONTACT USs</a></li>
            <li><a href="#" onclick="checkLoginStatus('/5SeasonsHotel/bookNow/index.php')">BOOK NOW</a></li>
            <li>
                <?php 
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo '<a href="#" onclick="confirmLogout()">';
                    } else {
                        echo '<a href="/5SeasonsHotel/login-register/login.php">';
                    }
                ?>
                Login
            </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    // Reset login status to false on page load
    localStorage.setItem('loggedIn', 'false');

    function toggleMenu() {
        var sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show');
    }

    function checkLoginStatus(destination) {
        var loggedIn = localStorage.getItem('loggedIn');
        if (loggedIn === 'true') {
            window.location.href = destination;
        } else {
            window.location.href = '/5SeasonsHotel/login-register/login.php';
        }
    }

    function confirmLogout() {
        var logout = confirm('Do you want to log out?');
        if (logout) {
            localStorage.setItem('loggedIn', 'false'); // Set login status to false
            window.location.href = '/5SeasonsHotel/logout.php'; // Redirect to logout page
        }
    }
</script>
</body>
</html>
