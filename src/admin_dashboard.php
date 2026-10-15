<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic reset */
        body, h1, h2 {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
            color: #333;
        }

        /* Overall container styling */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
        }

        /* Section container */
        .section {
            background-color: #fff;
            margin: 15px 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .section:hover {
            transform: translateY(-5px);
        }

        /* Section Title */
        .section h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Link and Arrow styling */
        .arrow-link {
            font-size: 20px;
            color: #007BFF;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .arrow-link:hover {
            color: #0056b3;
        }

        .arrow-link span {
            font-size: 18px;
        }

        /* Button Styling */
        .section button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .section button:hover {
            background-color: #0056b3;
        }

        /* General layout and spacing */
        .container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #444;
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Main Heading -->
        <h1>Admin Dashboard</h1>

        <!-- Manage Users Section -->
        <div class="section" id="users">
            <div>
                <h2>Manage Users</h2>
                <p><a href="users_page.php" class="arrow-link"><span>Go to Users Management</span>→</a></p>
            </div>
            <button onclick="window.location.href='users_page.php'">Manage Users</button>
        </div>

        <div class="section" id="users">
            <div>
                <h2>User Status</h2>
                <p><a href="user-status.php" class="arrow-link"><span>Go to Users Status</span>→</a></p>
            </div>
            <button onclick="window.location.href='user-status.php'">User Status</button>
        </div>

        <!-- Manage Gallery Section -->
        <div class="section" id="gallery">
            <div>
                <h2>Manage Auctions</h2>
                <p><a href="admin-auction.php" class="arrow-link"><span>Go to Auctions Management</span>→</a></p>
            </div>
            <button onclick="window.location.href='admin-auction.php'">Manage Auctions</button>
        </div>

        <!-- Manage Memberships Section -->
        <div class="section" id="memberships">
            <div>
                <h2>Manage Memberships</h2>
                <p><a href="admin-membership.php" class="arrow-link"><span>Go to Memberships Management</span>→</a></p>
            </div>
            <button onclick="window.location.href='admin-membership.php'">Manage Memberships</button>
        </div>

           <!-- Manage Messages Section -->
           <div class="section" id="messages">
            <div>
                <h2>Manage Messages</h2>
                <p><a href="admin-messages.php" class="arrow-link"><span>Go to Messages Management</span>→</a></p>
            </div>
            <button onclick="window.location.href='admin-messages.php'">Manage Messages</button>
        </div>

        <!-- Manage Queries Section -->
        <div class="section" id="queries">
            <div>
                <h2>Manage Queries</h2>
                <p><a href="admin-query.php" class="arrow-link"><span>Go to Queries Management</span>→</a></p>
            </div>
            <button onclick="window.location.href='admin-query.php'">Manage Queries</button>
        </div>

    </div>

</body>
</html>
