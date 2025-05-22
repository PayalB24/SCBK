<?php
session_start();

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the student details from the session


$name = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$class = isset($_SESSION['class']) ? $_SESSION['class'] : "";
$roll = isset($_SESSION['roll']) ? $_SESSION['roll'] : "";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
// $conn = new mysqli($servername, $username, $password, $dbname);

// var_dump($_SESSION); // To see all session variables

// if (isset($_SESSION['username']) && isset($_SESSION['class'])) {
//     $name = $_SESSION['username'];
//     $class = $_SESSION['class'];
// } else {
//     echo "Session variables are not set.";
//     exit();
// }


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


        
    if ($page === 'profile') {
        // Handle profile update
        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $roll = intval($_SESSION['roll']);

            $query = "UPDATE users1 SET username='$name', email='$email' WHERE roll=$roll"; // Adjust for your fields
            if (!mysqli_query($conn, $query)) {
                $errorMessage = "Error updating profile: " . mysqli_error($conn);
            }
        } else {
            $errorMessage = "Name and email cannot be empty.";
        }
    }

    $teacherName = isset($_SESSION['teacher_name']) ? $_SESSION['teacher_name'] : 'Teacher';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - SCBK</title>
    <link rel="stylesheet" href="styles.css">
    

<?php


$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the student details from the session
$name = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$class = isset($_SESSION['class']) ? $_SESSION['class'] : "";
$roll = isset($_SESSION['roll']) ? $_SESSION['roll'] : "";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - SCBK</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    color: #333;
}

.dashboard-container {
    display: flex;
    min-height: 100vh;
    position: relative;
}

.sidebar {
    width: 20%;
    background-color: #333;
    color: #fff;
    padding: 20px;
    position: fixed;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: auto;
    top: 0;
    left: 0;
    bottom: 0;
    display: flex;
    z-index: 10; 
}

.sidebar h2 {
    margin-bottom: 20px;
    font-size: 1.5rem;
}

.sidebar a {
    color: #fff;
    text-decoration: none;
    padding: 12px;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #940159;
    transition: background-color 0.3s ease;
}

.sidebar a:hover {
    background-color: #550133;
}

.main-content {
    margin-left: 20%; 
    padding: 40px;
    width: 100%;
    background-color: #fafafa;
    min-height: 100vh;
    overflow: auto;
    z-index: 1; 
    position: relative;
}

.welcome-message, .section {
    text-align: center;
    margin-bottom: 30px;
}

.welcome-message h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 10px;
}

.welcome-message p, .section h3 {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 15px;
}

.section h3 {
    font-size: 1.8rem;
    color: #940159;
}

.card {
    padding: 25px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
    margin-bottom: 20px;
}

.info {
    background-color: #f5f5f5; 
    border: 1px solid #ddd;
    padding: 20px;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    font-family: Arial, sans-serif;
    margin: 20px auto;
}


.info h3 {
    font-size: 1.5em;
    color: #333;
    border-bottom: 2px solid #550133;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

.info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info li {
    font-size: 1em;
    padding: 10px 0;
    color: #666;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #eaeaea;
}

.info li span {
    font-weight: bold;
    color: #333;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.card form {
    display: flex;
    flex-direction: column;
}

.card form label {
    font-weight: bold;
    margin-bottom: 8px;
}

.card form select,
.card form input[type="text"],
.card form button {
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}
input[type="date"]{
    height: 5vh;
    margin-bottom: 3vh;
}

label{
    text-align: left;
}

.card form button {
    background-color: #940159;
    color: #fff;
    cursor: pointer;
    border: none;
}

.card form button:hover {
    background-color: #550133;
}

.error-message {
    color: red;
    font-weight: bold;
    margin-top: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 1rem;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
}

td {
    background-color: #fff;
}

@media (max-width: 768px) {
    .dashboard-container {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        position: relative;
        z-index: 10; 
    }

    .main-content {
        margin-left: 0; 
        width: 100%;
        padding: 20px;
    }
}
.welcome{
    text-align: center;
}
.welcome h2{
    margin: 5vh auto;
}
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2><span>Welcome</span> <?php echo htmlspecialchars($name); ?></h2>
        <a href="index.php">Back to Home</a>
        <a href="student_dashboard.php?page=home">Home</a>
        <a href="student_assignment.php">View Assignments</a>
        <a href="student_dashboard.php?page=attendance">View Attendance</a>
        <a href="student_dashboard.php?page=profile">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <?php if ($page === 'home') { ?>
            <div class="welcome">
                <h2>Welcome to your Student Dashboard, <?php echo htmlspecialchars($name); ?>!</h2>
                <p>Access your assignments, attendance records, and more.</p>
            </div>

        <?php } elseif ($page === 'assignments') { ?>
            <div class="section">
                <h3>Your Assignments</h3>
                <p>Here you will find the assignments uploaded for your class.</p>
            </div>

        <?php } elseif ($page === 'attendance') { ?>
            <div class="section">
                <h3>Attendance Records</h3>
                <p>View your attendance history below.</p>
            </div>

        <?php } elseif ($page === 'profile') { ?>
            <div class="section">
                <h3>Your Profile</h3>
                <div class="info">
                    <h3>Personal Details</h3>
                    <ul>
                        <li><span>Name:</span> <?php echo htmlspecialchars($name); ?></li>
                        <li><span>Class:</span> <?php echo htmlspecialchars($class); ?></li>
                        <li><span>Roll Number:</span> <?php echo htmlspecialchars($roll); ?></li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
