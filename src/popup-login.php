<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Signup Box</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Login/Signup Box */
    .auth-box {
  position: fixed;
  top: 80px;
  right: 20px; /* Move the box to the right side */
  width: 150px;
  padding: 20px;
  background-color:rgb(244, 244, 244);
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

    .auth-box h3 {
      margin: 0 0 10px;
      font-size: 18px;
      color: #333;
      text-align: center;
    }

    .auth-box button {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      background-color:#88d200;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .auth-box button:hover {
      background-color: #45a049;
    }

    .auth-box a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body>
  <!-- Login/Signup Box -->
  <div class="auth-box">
    <h3>Welcome!</h3>
    <button><a href="login.php">Login</a></button>
    <button><a href="signup.php">Sign Up</a></button>
  </div>
</body>
</html>
