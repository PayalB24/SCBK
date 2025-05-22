<?php
session_start();


if (isset($_SESSION['roll'])) {
    header("Location: student_dashboard.php");
    exit();
}

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE roll = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $roll);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
        
            $_SESSION['roll'] = $row['roll'];
            $_SESSION['username'] = $row['username']; 
            $_SESSION['class'] = $row['class']; 
            $_SESSION['loggedin'] = true;
            
   
            header("Location: student_dashboard.php");
            exit();
        
        
        } else {
            echo '<script>alert("Login failed. Invalid password!"); window.location.href = "studentlogin.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Login failed. Invalid roll number!"); window.location.href = "studentlogin.php";</script>';
        exit();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    
      body {
          font-family: 'Arial', sans-serif;
          margin: 0;
          padding: 0;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          background-image: url('Schoolimage.jpg');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
      }

      .container {
          background-color: rgba(255, 255, 255, 0.7); 
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          max-width: 400px;
          margin-bottom: 50px;
          margin-top: 50px;
      }

      h1 {
          text-align: center;
          margin-bottom: 30px;
          color: #333;
          font-weight: 600;
      }

      .form-label {
          font-weight: bold; /* Bold labels */
          color: #555;
      }

      .form-control {
          background-color: #f9f9f9;
          border: 1px solid #ddd;
          padding: 10px;
          border-radius: 5px;
      }

      .form-control:focus {
          box-shadow: none;
          border-color: #6c63ff;
      }

      .btn-primary {
          background-color: #6c63ff;
          border: none;
          padding: 10px 20px;
          width: 100%;
          font-size: 16px;
          font-weight: 600;
          transition: background-color 0.3s ease;
      }

      .btn-primary:hover {
          background-color: #5952d9;
      }

      @media (max-width: 768px) {
          .container {
              padding: 20px;
          }

          h1 {
              font-size: 24px;
          }
      }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form name="form" action="studentlogin.php" method="POST">
            <div class="mb-3">
                <label for="roll" class="form-label"> Roll Number or EMP Id:</label>
                <input type="text" id="roll" name="roll" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" id="btn" class="btn btn-primary" name="submit">Login</button>
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
