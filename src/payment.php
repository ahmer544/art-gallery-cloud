<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .payment-section {
            padding: 40px;
            text-align: center;
        }

        .payment-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            text-align: left;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #333;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color:#88d200;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: green;
        }
    </style>
</head>
<body>
<div class="payment-section">
  <h2>Virtual Payment</h2>
  <p>Enter your payment details to apply.</p>
  
  <form method="POST" action="payment-process.php">
    <!-- Membership Type Selection -->

    <!-- Payment Information -->
    <h3>Payment Information</h3>
    <label for="account-number">Account Number:</label>
    <input type="text" id="account-number" name="account_number" required placeholder="Enter your account number">

    <label for="account-name">Account Holder Name:</label>
    <input type="text" id="account-name" name="account_name" required placeholder="Enter account holder name">


    <label for="cvv">CVV:</label>
    <input type="password" id="cvv" name="cvv" required placeholder="Enter CVV (3 digits)">
    
    <!-- Submit Button -->
    <button type="submit">Pay Now</button>
  </form>
</div>

</body>
</html>
