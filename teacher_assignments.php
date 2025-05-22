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

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST['class'];
    $assignment_name = $_POST['assignment_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . basename($_FILES["assignment_file"]["name"]);

    if (move_uploaded_file($_FILES["assignment_file"]["tmp_name"], $target_file)) {
        $teacher_roll = $_SESSION['roll'];
        $sql = "INSERT INTO assignments (class, assignment_name, start_date, end_date, file_path, teacher_roll) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $class, $assignment_name, $start_date, $end_date, $target_file, $teacher_roll);
        if ($stmt->execute()) {
            $message = "Assignment uploaded successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $message = "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Upload Assignment</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #940159;
            color: white;
        }

        header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 16%;
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
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .sidebar a {
            text-decoration: none;
            padding: 12px;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #940159;
            color: white;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #550133;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
            background-color: #fafafa;
            min-height: 100vh;
            width: calc(100% - 260px);
        }

        section {
            margin-bottom: 40px;
        }

        section h2, section h3 {
            font-size: 1.8rem;
            color: #940159;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
            margin-bottom: 8px;
            width: 100%;
            text-align: left;
            font-size: 1rem;
        }

        form input,
        form select,
        form button {
            padding: 12px;
            font-size: 1rem;
            margin-bottom: 15px;
            width: 100%;
            max-width: 500px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form input[type="file"] {
            padding: 10px;
            font-size: 1rem;
        }

        form button {
            background-color: #940159;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #550133;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        .success-message {
            color: green;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            background-color: white;
        }

        table a {
            color: #940159;
            text-decoration: none;
            font-weight: bold;
        }

        table a:hover {
            color: #550133;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            form {
                width: 90%;
            }

            form input,
            form select,
            form button {
                width: 100%;
                max-width: 100%;
            }

            table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Teacher Dashboard</h2>
        <a href="index.php">Back to Home</a>
        <a href="teacher_dashboard.php?page=home">Home</a>
        <a href="teacher_dashboard.php?page=view_students">View Students</a>
        <a href="teacher_dashboard.php?page=attendance">Mark Attendance</a>
        <a href="teacher_assignments.php">Assignments</a>
        <a href="teacher_dashboard.php?page=profile">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
        <section>
            <h2>Upload Assignment</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="class">Class:</label>
                <input type="text" name="class" id="class" required>

                <label for="assignment_name">Assignment Name:</label>
                <input type="text" name="assignment_name" id="assignment_name" required>

                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" required>

                <label for="assignment_file">Upload File:</label>
                <input type="file" name="assignment_file" id="assignment_file" required>

                <button type="submit">Upload Assignment</button>
            </form>
        </section>
        <section>
            <h3>Current Assignments</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Assignment Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM assignments WHERE teacher_roll = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $_SESSION['roll']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>" . $row['assignment_name'] . "</td>";
                        echo "<td>" . $row['start_date'] . "</td>";
                        echo "<td>" . $row['end_date'] . "</td>";
                        echo "<td><a href='" . $row['file_path'] . "' target='_blank'>View File</a></td>";
                        echo "<td><a href='delete_assignment.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }

                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</div>

</body>
</html>
