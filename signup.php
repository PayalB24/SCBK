<?php 
session_start(); 
if (isset($_SESSION['username'])) { 
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
    $username = mysqli_real_escape_string($conn, $_POST['user']); 
    $roll = mysqli_real_escape_string($conn, $_POST['roll']); 
    $class = mysqli_real_escape_string($conn, $_POST['class']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']); 
    $role = mysqli_real_escape_string($conn, $_POST['role']); 
 
    if ($password !== $confirm_password) { 
        echo '<script>
            alert("Passwords do not match!"); 
            window.location.href = "signup.php"; 
            </script>'; 
        exit(); 
    } 

    if ($role === 'Student' && (!is_numeric($class) || $class < 1 || $class > 10)) {
        echo '<script>
            alert("Please enter a valid class between 1 and 10."); 
            window.location.href = "signup.php"; 
            </script>';
        exit();
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND roll='$roll' AND class='$class'"; 
    $result = mysqli_query($conn, $sql); 
    $count_user_roll_class = mysqli_num_rows($result); 
    $sql = "SELECT * FROM users WHERE roll='$roll' AND class='$class'"; 
    $result = mysqli_query($conn, $sql); 
    $count_roll_class = mysqli_num_rows($result); 

    if ($count_user_roll_class == 0 && ($role === 'Teacher' || $count_roll_class == 0)) { 
        $hash = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO users (username, roll, class, password, role) VALUES ('$username', '$roll', '$class', '$hash', '$role')"; 
        $result = mysqli_query($conn, $sql); 
        if ($result) { 
            if ($role === 'Student') { 
                header("Location: student_dashboard.php"); 
            } else if ($role === 'Teacher') { 
                header("Location: teacher_dashboard.php"); 
            
            } else if ($role === 'Principal') { 
                header("Location: Principal_desk.php"); 
            } 
            exit(); 
        } else { 
            echo '<script> 
                alert("Registration failed. Please try again."); 
                window.location.href = "signup.php"; 
                </script>'; 
        } 
    } else { 
        if ($count_user_roll_class > 0) { 
            echo '<script> 
                alert("Username with this roll number and class already exists!"); 
                window.location.href = "signup.php"; 
                </script>'; 
        } 
        if ($count_roll_class > 0 && $role === 'Student') { 
            echo '<script> 
                alert("Roll number already exists in this class!"); 
                window.location.href = "signup.php"; 
                </script>'; 
        } 
    } 
} 
?> 
<!doctype html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Signup Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css"> 
    <style> 
        body { 
            font-family: 'Arial', sans-serif; 
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
            max-width: 500px; 
            margin-bottom: 60px; 
            margin-top: 60px; 
        } 

        h1 { 
            text-align: center; 
            margin-bottom: 5px; 
            color: #333; 
            font-weight: 600; 
        } 

        .form-label { 
            font-weight: bold; 
            color: #555; 
        } 

        .form-control, .form-select { 
            background-color: #f9f9f9; 
            border: 1px solid #ddd; 
            padding: 10px; 
            border-radius: 5px; 
        } 

        .form-control:focus, .form-select:focus { 
            box-shadow: none; 
            border-color: #6c63ff; 
        } 

        .btn-primary { 
            background-color: #6c63ff; 
            border: none; 
            padding: 10px 20px; 
            width: 50%; 
            font-size: 16px; 
            font-weight: 600; 
            transition: background-color 0.3s ease; 
            margin-left: 95px; 
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
        <h1>Sign Up</h1> 
        <form action="signup.php" method="POST" onsubmit="return validateClass()"> 
            <div class="mb-3"> 
                <label for="user" class="form-label">Enter Username:</label> 
                <input type="text" id="user" name="user" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label for="roll" class="form-label">Enter Roll Number or Emp ID:</label> 
                <input type="number" id="roll" name="roll" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label for="class" class="form-label">Enter Class (Not required for Teacher):</label> 
                <input type="number" id="class" name="class" class="form-control" min="1" max="10"> 
            </div> 
            <div class="mb-3"> 
                <label for="password" class="form-label">Create Password:</label> 
                <input type="password" id="password" name="password" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label for="confirm_password" class="form-label">Confirm Password:</label> 
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
                <label for="role" class="form-label">Select Role:</label> 
                <select id="role" name="role" class="form-select" required> 
                    <option value="">--Select Role--</option> 
                    <option value="Student">Student</option> 
                    <option value="Teacher">Teacher</option> 
                    <option value="Principal">Principal</option> 
                    
                </select> 
            </div> 
            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> 
        </form> 
    </div> 

    <script> 
        function validateClass() { 
            const role = document.getElementById("role").value; 
            const classField = document.getElementById("class").value; 
            if (role === "Student" && (classField < 1 || classField > 10)) { 
                alert("Please enter a valid class between 1 and 10 for students."); 
                return false; 
            } 
            return true; 
        } 
    </script> 
</body> 
</html> 
