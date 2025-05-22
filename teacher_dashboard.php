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

$name = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$class = isset($_SESSION['class']) ? $_SESSION['class'] : "";
$roll = isset($_SESSION['roll']) ? $_SESSION['roll'] : "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$teacherName = isset($_SESSION['teacher_name']) ? $_SESSION['teacher_name'] : 'Teacher';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($page === 'attendance') {
        if (isset($_POST['attendance']) && is_array($_POST['attendance'])) {
            foreach ($_POST['attendance'] as $studentId => $status) {
                $status = mysqli_real_escape_string($conn, $status);
                $studentId = intval($studentId);
                $attendanceDate = date('Y-m-d');
                $queryCheck = "SELECT * FROM attendance WHERE student_id=$studentId AND date='$attendanceDate'";
                $resultCheck = mysqli_query($conn, $queryCheck);

                if (!$resultCheck) {
                    die("Query failed: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($resultCheck) > 0) {
                    $queryUpdate = "UPDATE attendance SET status='$status' WHERE student_id=$studentId AND date='$attendanceDate'";
                    if (!mysqli_query($conn, $queryUpdate)) {
                        die("Error updating attendance: " . mysqli_error($conn));
                    }
                } else {
                    $queryInsert = "INSERT INTO attendance (student_id, date, status) VALUES ($studentId, '$attendanceDate', '$status')";
                    if (!mysqli_query($conn, $queryInsert)) {
                        die("Error marking attendance: " . mysqli_error($conn));
                    }
                }
            }
            $errorMessage = "Attendance has been recorded successfully.";
        } else {
            $errorMessage = "No attendance data provided.";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($page === 'assignments') {
            $className = trim($_POST['class']);
            $assignmentName = trim($_POST['assignment_name']);
            if (empty($className)) {
                die("Error: Class name is empty.");
            }
            if (empty($assignmentName)) {
                die("Error: Assignment name is empty.");
            }

            $stmt = $conn->prepare("INSERT INTO assignments (class, assignment_name, start_date, end_date) VALUES (?, ?, NOW(), NOW() + INTERVAL 7 DAY)");

            $stmt->bind_param("ss", $className, $assignmentName);
            if ($stmt->execute()) {
                echo "Assignment added successfully.";
            } else {
                echo "Error adding assignment: " . $stmt->error;
            }
            $stmt->close();
        }
    }
} elseif ($page === 'profile') {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $roll = intval($_SESSION['roll']);

        $query = "UPDATE users SET username='$name', email='$email' WHERE roll=$roll"; // Adjust for your fields
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

        .welcome-message,
        .section {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-message h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-message p,
        .section h3 {
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

        input[type="date"] {
            height: 5vh;
            margin-bottom: 3vh;
        }

        label {
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

        table,
        th,
        td {
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

        .welcome {
            text-align: center;
        }

        .welcome h2 {
            margin: 5vh auto;
        }

        [type="submit"] {
            margin-top: 5vh;
        }

        h2 {
            margin-bottom: 5vh;
        }
    </style>

</head>

<body>

    <div class="dashboard-container">
        <div class="sidebar">
            <h2><span>Welcome</span> <?php echo $name; ?></h2>
            <a href="index.php">
                Back to Home
            </a>
            <a href="teacher_dashboard.php?page=home">Home</a>
            <a href="teacher_dashboard.php?page=view_students">View Students</a>
            <a href="teacher_dashboard.php?page=attendance">Mark Attendance</a>
            <a href="teacher_assignments.php">Assignments</a>
            <a href="teacher_dashboard.php?page=profile">Profile</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="main-content">
            <?php if ($page === 'home') { ?>
                <div class="welcome">
                    <h2><span>Welocome</span> "<?php echo $name; ?>" to Teacher Dashboard</h2>
                    <h3>Here you can Manage student's record, Mark their attendance as well as upload the assignments</h3>
                </div>

            <?php } elseif ($page === 'view_students') { ?>
                <di class="section">
                    <h3>View Students</h3>
                    <h2><span>Here you can see your </span> "<?php echo $class; ?>"th class data</h2>
                    <?php
                    if (isset($_SESSION['class'])) {
                        $teacherClass = $_SESSION['class'];
                        $result = mysqli_query($conn, "SELECT * FROM users WHERE class='$teacherClass' AND role='student'");
                        if (mysqli_num_rows($result) > 0) { ?>
                            <table>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>Roll</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                                        <td><?php echo htmlspecialchars($row['roll']); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                    <?php } else {
                            echo "<p>No students found for the selected class.</p>";
                        }
                    } else {
                        echo "<p>You are not authorized to view this page. Please log in.</p>";
                    }
                    ?>


                <?php } elseif ($page === 'attendance') { ?>

                    <?php
                    if (isset($_SESSION['class'])) {
                        $teacherClass = $_SESSION['class'];
                        $result = mysqli_query($conn, "SELECT * FROM users WHERE class='$teacherClass' AND role='student'");
                        if (mysqli_num_rows($result) > 0) { ?>
                            <div class="section">
                                <h3>Mark Attendance</h3>
                                <h2>of Class <?php echo $class; ?></h2>
                                <div class="card">
                                    <form method="POST" action="teacher_dashboard.php?page=attendance">
                                        <table>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Username</th>
                                                <th>Attendance Status</th>
                                            </tr>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                                                    <td>
                                                        <input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Present" required> Present
                                                        <input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Absent" required> Absent
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <button type="submit">Submit Attendance</button>
                                    </form>
                                </div>
                        <?php } else {
                            echo "<p>No students found for your class.</p>";
                        }
                    } else {
                        echo "<p>You are not authorized to view this page. Please log in.</p>";
                    }
                        ?>

                            </div>
        </div>

    <?php } elseif ($page === 'assignments') { ?>
        <div class="section">
            <h3>Assignments</h3>
            <div class="card">
                <form method="POST" action="teacher_dashboard.php?page=assignments">
                    <label for="class">Class:</label>
                    <input type="text" name="class" id="class" required>

                    <label for="assignment_name">Assignment Name:</label>
                    <input type="text" name="assignment_name" id="assignment_name" required>

                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" required>

                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" required>

                    <button type="submit">Add Assignment</button>
                </form>

                <?php if (!empty($errorMessage)) { ?>
                    <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
                <?php } ?>

                <h4>Current Assignments</h4>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Assignment Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    <?php


                    $sql = "SELECT id, class, assignment_name, start_date, end_date FROM assignments";
                    $result = $conn->query($sql);
                    if ($result === false) {
                        echo "SQL error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . htmlspecialchars($row['id']) . "</td>
                                    <td>" . htmlspecialchars($row['class']) . "</td>
                                    <td>" . htmlspecialchars($row['assignment_name']) . "</td>
                                    <td>" . htmlspecialchars($row['start_date']) . "</td>
                                    <td>" . htmlspecialchars($row['end_date']) . "</td>
                                  </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No assignments available.</td></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>



    <?php } elseif ($page === 'profile') { ?>
        <div class="section">
            <h3>Your Profile</h3>
            <div class="info">
                <h3>Personal Details</h3>
                <ul>
                    <li><span>Name:</span> <?php echo $name; ?></li>
                    <li><span>Class:</span> <?php echo $class; ?></li>
                    <li><span>Employee Id:</span> <?php echo $roll; ?></li>
                </ul>
            </div>

        </div>

    <?php }  ?>

    </div>
    </div>

</body>

</html>