<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admission</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url(/Images/students.jpg);
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            display: flex;
            justify-content: center;
            padding: 0 2vw;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 5vh auto;
            padding: 5vh 5vw;
            background-color: #fff;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #A7016B;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 5vh;
        }

        .info-section p {
            font-size: 1rem;
            line-height: 1.6;
            color: black;
        }

        .info-section {
            margin-bottom: 20px;
        }

        .btn1,
        .btn2 {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #A7016B;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
        }

        .btn1:hover,
        .btn2:hover {
            background-color: #c70a82;
        }

        .info-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .info-column {
            flex: 1;
            min-width: 280px;
        }

        @media (max-width: 1024px) {
            .container {
                padding: 5vh 4vw;
            }

            h1 {
                font-size: 2rem;
            }

            .btn1,
            .btn2 {
                font-size: 1rem;
                padding: 10px;
            }
        }

        @media (max-width: 768px) {
            .container {
                margin: 5vh 3vw;
                padding: 4vh 3vw;
            }

            h1 {
                font-size: 1.8rem;
                margin-bottom: 4vh;
            }

            .btn1,
            .btn2 {
                font-size: 16px;
                padding: 8px;
            }

            .info-row {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.6rem;
                margin-bottom: 3vh;
            }

            .info-section p {
                font-size: 0.9rem;
            }

            .btn1,
            .btn2 {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
<header>
    <nav class="custom-navbar">
        <div class="custom-logo">
            <hr>
            <h1>SCBK</h1>
            <hr>
        </div>
        <ul class="custom-nav-li" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a href="about.php" class="dropbtn" onclick="toggleDropdown(event); applyMargin();">Our Journey</a>
              <ul class="dropdown-content" id="dropdownMenu">
                <li><a href="about.php#section1">Our History</a></li>
                <li><a href="about.php#section2">Achievements</a></li>
                <li><a href="about.php#section3">Vision & Mission</a></li>
                <li><a href="about.php#section4">Managing Trustee</a></li>
                <li><a href="about.php#section5">Principal's Message</a></li>
                <li><a href="about.php#section6">Calender</a></li>
                </ul>
            </li>
            <!-- <li id="std"><a href="studentteacher.php">Students</a></li>
            <li id="teach"><a href="studentteacher.php">Teachers</a></li> -->
            <li class="dropdown">
              <a href="about.php" class="dropbtn" onclick="toggleDropdown(event); applyMargin();">Dashboard</a>
              <ul class="dropdown-content" id="dropdownMenu">
                <li><a href="studentlogin.php">Student</a></li>
                <li><a href="teacherlogin.php">Teacher</a></li>
                <li><a href="plogin.php">Principal</a></li>
                </ul>
            </li>
            <li id="admic"><a href="admissions.php">Admissions</a></li>
            <li><a href="signup.php">Sign up</a></li>
        </ul>
        <div class="custom-burger" id="custom" onclick="toggleNav()">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>

    <main>
        <div class="container">
            <h1>Welcome to Our School Admissions</h1>

            <div class="info-row">
                <div class="info-column">
                    <div class="info-section">
                        <h2>Admission Information</h2>
                        <p>We are excited to welcome new students to our school! Please read the information below to
                            understand our admission process and what documents are required.</p>
                        <p>Admissions are open for classes from 1st to 10th grade. We are committed to providing the
                            best education and fostering the growth and development of your child.</p>
                        <br>
                        <h2>प्रवेश माहिती</h2>
                        <p>आम्हाला आनंद आहे की आपण आमच्या शाळेत नवीन विद्यार्थ्यांचे स्वागत करू इच्छितो! कृपया खालील
                            माहिती वाचा, ज्याद्वारे आपल्याला आमच्या प्रवेश प्रक्रियेबद्दल आणि कोणते कागदपत्रे आवश्यक आहेत
                            हे समजेल.</p>
                        <p>प्रवेश 1ली ते 10वी पर्यंतच्या वर्गांसाठी खुले आहेत. आम्ही आपले मुल/मुलीचे सर्वोत्तम शिक्षण
                            आणि त्याच्या/तिच्या सर्वांगीण विकासाची वचनबद्धता देतो.</p>

                    </div>
                </div>
                <div class="info-column">
                    <div class="info-section">
                        <h2>Required Documents</h2>
                        <p>Before starting the admission process, please ensure you have the following documents ready:
                        </p>
                        <ul>
                            <li>Birth Certificate of the student</li>
                            <li>Previous school report card</li>
                            <li>Aadhaar card or any other ID proof</li>
                            <li>Passport-size photographs</li>
                        </ul>
                        <br>
                        <br>
                        <h2>आवश्यक कागदपत्रे</h2>
                        <p>प्रवेश प्रक्रियेला सुरुवात करण्यापूर्वी, कृपया खात्री करा की आपल्याकडे खालील दस्तऐवज तयार
                            आहेत:</p>
                        <ul>
                            <li>विद्यार्थ्याचा जन्म प्रमाणपत्र</li>
                            <li>गेल्या शाळेचा अहवाल पत्रक</li>
                            <li>आधार कार्ड किंवा कोणतेही अन्य ओळखपत्र</li>
                            <li>पासपोर्ट-आकाराच्या छायाचित्रे</li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2>Next Steps</h2>
                <p>Click the button below to fill out the admission form. It should take around 10 minutes to complete.(खालील बटणावर क्लिक करा आणि प्रवेश फॉर्म भरा. हे पूर्ण करण्यात सुमारे १० मिनिटे लागतील.)</p>
            </div>

            <a href="admission-form.php" class="btn1">Fill Admission Form</a>
        </div>
    </main>

    <footer id="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <hr>
                <h1>SCBK</h1>
                <hr>
            </div>
            <div class="footer-info">
                <p>&copy; 2024 Shri Changdev Barku Pa. Kolpe Madhyamic Vidyalay. All Rights Reserved.</p>
                <p>Contact us: <a href="mailto:info@yourschool.com">scbk@gmail.com</a></p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="footer-social">
                <a href="#"><img src="/Images/facebook-icon.png" alt="Facebook"></a>
                <a href="#"><img src="/Images/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </footer>
    <script src="app.js"></script>
</body>

</html>