<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'my_database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Admin Signup
if (isset($_POST['signup'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Basic Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if email already exists
        $check_email = $conn->prepare("SELECT id FROM admins WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->store_result();

        if ($check_email->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            if ($stmt->execute()) {
                $success = "Signup successful. Please login.";
            } else {
                $error = "Signup failed. Try again.";
            }
        }
    }
}

// Admin Login
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, name, password FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_name'] = $name;

                // Remember Me
                if (isset($_POST['remember'])) {
                    setcookie('admin_email', $email, time() + (86400 * 30), "/");
                }

                header("Location: admin_dashboard.php");
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login/Signup</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        form { display: flex; flex-direction: column; }
        input[type="text"], input[type="email"], input[type="password"] {
            padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;
        }
        button { background-color: #007BFF; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; text-align: center; }
        .success { color: green; text-align: center; }
        .toggle { text-align: center; margin-top: 10px; cursor: pointer; color: blue; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2 id="form-title">Admin Login</h2>

        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>

        <!-- Login Form -->
        <form method="POST" id="login-form">
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($_COOKIE['admin_email']) ? $_COOKIE['admin_email'] : ''; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <label><input type="checkbox" name="remember"> Remember Me</label>
            <button type="submit" name="login">Login</button>
        </form>

        <!-- Signup Form -->
        <form method="POST" id="signup-form" style="display:none;">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" name="signup">Signup</button>
        </form>

        <p class="toggle" onclick="toggleForm()">Don't have an account? Signup here</p>
    </div>

    <script>
        function toggleForm() {
            var loginForm = document.getElementById('login-form');
            var signupForm = document.getElementById('signup-form');
            var formTitle = document.getElementById('form-title');
            var toggleText = document.querySelector('.toggle');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
                formTitle.innerText = 'Admin Login';
                toggleText.innerText = "Don't have an account? Signup here";
            } else {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
                formTitle.innerText = 'Admin Signup';
                toggleText.innerText = "Already have an account? Login here";
            }
        }
    </script>
</body>
</html>
