<?php
$conn = new mysqli("localhost", "username", "password", "db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $fatherName = $_POST['fatherName'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $cast = $_POST['cast'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $admissionYear = $_POST['admissionYear'] ?? '';
    $admissionClass = $_POST['admissionClass'] ?? '';
    $lastClass = $_POST['lastClass'] ?? '';
    $motherName = $_POST['motherName'] ?? '';

    $sql = "INSERT INTO student_admission 
            (Name, `Father Name`, Surname, Gender, DOB, Cast, `Phone No.`, Address, `Admission Year`, `Admission Class`, `Last Class`, `Mother Name`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("SQL preparation failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssssssisssss", $name, $fatherName, $surname, $gender, $dob, $cast, $phone, $address, $admissionYear, $admissionClass, $lastClass, $motherName);

    if ($stmt->execute()) {
        echo "Record inserted successfully.";

        $formData = [
            'Name' => $name,
            'Father Name' => $fatherName,
            'Surname' => $surname,
            'Gender' => $gender,
            'DOB' => $dob,
            'Cast' => $cast,
            'Phone No.' => $phone,
            'Address' => $address,
            'Admission Year' => $admissionYear,
            'Admission Class' => $admissionClass,
            'Last Class' => $lastClass,
            'Mother Name' => $motherName,
        ];

        echo json_encode(['status' => 'success', 'data' => $formData]);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => htmlspecialchars($stmt->error)]);
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admission Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-section {
            display: none;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-section.active {
            display: block;
        }

        h4 {
            margin-bottom: 20px;
        }

        [name="gender"] {
            margin-left: 10px;
        }

        [for="male"],
        [for="female"],
        [for="other"] {
            margin-left: 25px;
        }

        .btn,
        .btn-next,
        .btn-submit {
            background-color: #A7016B;
            color: white;
        }

        .btn-previous {
            background-color: #E0E0E0;
            color: black;
        }

        .header {
            background-color: #A7016B;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header .title {
            flex-grow: 1;
            text-align: center;
        }

        .header h1,
        .header h4 {
            margin: 0;
        }

        .header .btn {
            background-color: #8B0054;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        .header .btn:hover {
            background-color: #FF00B0;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="index.php">
            <button class="btn">Home</button>
        </a>
        <div class="title">
            <h2>Student Admission Form</h2>
            <h5>Please fill out the following information.</h5>
        </div>
    </header>
    <div class="container mt-5">
        <form id="admissionForm" action="" method="POST" enctype="multipart/form-data">
            <div class="form-section active" id="studentDetails">
                <h4>1. Student Details (विद्यार्थी माहिती)</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="firstName">First Name (नाव)</label>
                        <input type="text" class="form-control" id="firstName" name="name" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="middleName">Middle Name (वडिलांचे नाव)</label>
                        <input type="text" class="form-control" id="middleName" name="fatherName">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lastName">आडनाव</label>
                        <input type="text" class="form-control" id="lastName" name="surname" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Gender (लिंग)</label>
                    <div class="form-row">
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required="">
                            <label class="form-check-label" for="male">Male (पुरुष)</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required="">
                            <label class="form-check-label" for="female">Female (स्त्री)</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">Other (इतर)</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth (जन्मतारीख)</label>
                        <input type="date" class="form-control" id="dob" name="dob" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cast">Caste Category (कास्ट श्रेणी)</label>
                        <input type="text" class="form-control" id="cast" name="cast" required="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number (फोन नंबर)</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Current Address (वर्तमान पत्ता)</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-next" onclick="showSection('parentsDetails')">Next...</button>
                </div>
            </div>

            <div class="form-section" id="parentsDetails">
                <h4>2. Parent's Details (पालकांची माहिती)</h4>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="motherName">Mother's Name (आईचे नाव)</label>
                        <input type="text" class="form-control" id="motherName" name="motherName" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="admissionYear">Admission Year (प्रवेश वर्ष)</label>
                        <input type="text" class="form-control" id="admissionYear" name="admissionYear" required="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="admissionClass">Admission Class (प्रवेश वर्ग)</label>
                        <input type="text" class="form-control" id="admissionClass" name="admissionClass" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastClass">Last Class (शेवटचा वर्ग)</label>
                        <input type="text" class="form-control" id="lastClass" name="lastClass" required="">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-previous" onclick="showSection('studentDetails')">Previous</button>
                    <button type="button" class="btn btn-next" onclick="showSection('submission')">Next...</button>
                </div>
            </div>

            <div class="form-section" id="submission">
                <h4>3. Submission</h4>
                <p>Please review your information before submitting.</p>
                <button type="button" class="btn btn-previous" onclick="showSection('parentsDetails')">Previous</button>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.form-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</body>

</html>
