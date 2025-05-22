
<?php
session_start();

$host = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db";
$conn = mysqli_connect($host, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $username = $_SESSION['username']; // Assuming the user is logged in and their username is stored in the session
    $current_password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo '<script>
            alert("New passwords do not match!");
            window.location.href = "pass.php";
            </script>';
        exit();
    }

    // Fetch the current password from the database
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verify current password
        if (password_verify($current_password, $row['password'])) {
            // Hash the new password
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password in the database
            $update_sql = "UPDATE users SET password = '$new_password_hashed' WHERE username = '$username'";
            if (mysqli_query($conn, $update_sql)) {
                echo '<script>
                    alert("Password changed successfully.");
                    window.location.href = "student1.php"; // Redirect to a dashboard or login page
                    </script>';
            } else {
                echo '<script>
                    alert("Password change failed. Please try again.");
                    window.location.href = "teacher1.php";
                    </script>';
            }
        } else {
            echo '<script>
                alert("Current password is incorrect.");
                window.location.href = "teacherlogin.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("User not found.");
            window.location.href = "studentlogin.php";
            </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #6c63ff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #5555d1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Change Password</h1>
        <form id="changePasswordForm" action="pass.php" method="POST" onsubmit="return validatePasswords();">
            <div class="form-group">
                <label class="form-label" for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn-primary">Change Password</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
