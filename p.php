<?php


$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE role = 'student' AND class BETWEEN 1 AND 10 ORDER BY class ASC, roll ASC";
$result = mysqli_query($conn, $sql);

$studentsByClass = [];
while ($row = mysqli_fetch_assoc($result)) {
    $studentsByClass[$row['class']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Dashboard - Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #section1::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: -1;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            position: relative;
            z-index: 1;
        }
        #section1 a{
            background-color:#A7016B ;
        }
    </style>
</head>


<body>
    <div class="container mt-5" id="section1">
        <h2 class="text-center mb-4">All Student Records (Classes 1 to 10)</h2>
        <a href="principal_desk.php" class="btn btn-secondary mb-4">Back to Desk</a>
        <?php foreach ($studentsByClass as $class => $students): ?>
            <h3 class="mt-4">Class: <?php echo htmlspecialchars($class); ?></h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll Number</th>
                        <th>Username</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['roll']); ?></td>
                            <td><?php echo htmlspecialchars($student['username']); ?></td>
                            <td><?php echo htmlspecialchars($student['class']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</body>
</html>
