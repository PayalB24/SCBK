<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: studentlogin.php");
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

$name = $_SESSION['username'];
$class = $_SESSION['class'];
$roll = $_SESSION['roll'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
        }

        .sidebar {
            width: 17%;
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

        h2 {
            text-align: center;
        }

        .main-content {
            margin-left: 20%;
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            margin-top: 50px;
            overflow: hidden;
            z-index: 5;
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

        .section h3 {
            font-size: 1.8rem;
            color: #940159;
            margin-bottom: 15px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            padding: 20px;
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            padding: 25px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1rem;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px 15px;
        }

        th {
            background-color: #940159;
            color: #fff;
            font-weight: bold;
        }

        td {
            color: #333;
        }

        td a {
            color: #940159;
            font-weight: bold;
            text-decoration: none;
        }

        td a:hover {
            color: #550133;
        }

        .no-data {
            color: #888;
            font-style: italic;
            padding: 20px 0;
            text-align: center;
        }

        @media (max-width: 1000px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }

            .card-container {
                grid-template-columns: 1fr;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2><span>Welcome</span> <?php echo htmlspecialchars($name); ?></h2>
        <a href="index.php">Back to Home</a>
        <a href="student_dashboard.php?page=home">Home</a>
        <a href="student_assignment.php">View Assignments</a>
        <a href="student_dashboard.php?page=attendance">View Attendance</a>
        <a href="student_dashboard.php?page=profile">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <main class="main-content">
        <section class="dashboard-section">
            <h2 class="welcome">Student Dashboard</h2>
            <div class="card-container">
                <div class="card">
                    <h3>Assignments</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Assignment Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT assignment_name, start_date, end_date, file_path FROM assignments WHERE class = '$class'";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($row['assignment_name']) . "</td>
                                            <td>" . htmlspecialchars($row['start_date']) . "</td>
                                            <td>" . htmlspecialchars($row['end_date']) . "</td>
                                            <td><a href='" . htmlspecialchars($row['file_path']) . "' download>Download</a></td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='no-data'>No assignments available for your class.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

</body>

</html>

</html>