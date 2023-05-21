<?php
// Start session
session_start();
if($_SESSION){
    echo '<script>window.location.replace("http://localhost/100/index.php")</script>';
     exit;
  }
// Database connection details
$db_host = "localhost";
$db_user = 'root';
$db_pass = "";
$db_name = 'finishing';

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration or login form submitted
// Registration form submitted
if (isset($_POST['register'])) {
    // Get user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Validate phone number
    $phone_regex = "/^[0-9]{11}$/";
    if (!preg_match($phone_regex, $phone)) {
        // Display an error message
        $message = "Please enter a valid phone number!";
        $alert_class = "alert-danger";
    } else {
        // Check if email exists in the database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Display an error message
            $message = "Email already exists!";
            $alert_class = "alert-danger";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $query = "INSERT INTO users (name, email, phone, password, address) VALUES ('$name', '$email', '$phone', '$hashed_password', '$address')";
            mysqli_query($conn, $query);

            // Display a success message
            $message = "Registration successful!";
            $alert_class = "alert-success";
       

        }
    }

} else if (isset($_POST['login'])) {
    // Get user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Retrieve user data from the database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        // Check if the user exists and the password is correct
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['email'] = $user['email'];


                // Redirect to dashboard
        echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
              
                exit();
            } else {
                // Display an error message
                $message = "Invalid email or password!";
                $alert_class = "alert-danger";
            }
        } else {
            // Display an error message
            $message = "Invalid email or password!";
            $alert_class = "alert-danger";
        }
    } else {
        // Display an error message
        $message = "Please fill in all fields!";
        $alert_class = "alert-danger";
    }
}

// Logout function
function logout() {
    // Unset session variables
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);

    // Destroy session
    session_destroy();

    // Redirect to login page
    header('Location: index.php');
    exit();
}
?>
<?php if (!empty($message)): ?>
    <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" id="register-link">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="login-link">Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="register-form">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </form>
                        </div>
                        <div id="login-form" style="display: none;">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                                   <li class="nav-item">
                 
                </li>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Show the registration form by default
            $('#register-form').show();
            $('#login-form').hide();

            // Show or hide the forms based on which link or button was clicked
            $('#register-link').click(function() {
                $('#register-form').show();
                $('#login-form').hide();
            });
            $('#login-link').click(function() {
                $('#register-form').hide();
                $('#login-form').show();
            });
        });
    </script>

</body>
</html>