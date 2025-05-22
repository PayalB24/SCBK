<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCBK</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    @keyframes slide {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-100%);
      }
    }

    .logos {
      overflow: hidden;
      padding: 10px 0;
      white-space: nowrap;
      position: relative;
    }

    .logos:before,
    .logos:after {
      position: absolute;
      top: 0;
      width: 250px;
      height: 100%;
      content: "";
      z-index: 2;
    }

    .logos:before {
      left: 0;
    }

    .logos:after {
      right: 0;
    }

    .logos:hover .logos-slide {
      animation-play-state: paused;
    }

    .logos-slide {
      display: inline-block;
      animation: 35s slide infinite linear;
    }

    .logos-slide img {
      height: 40vh;
      margin: 0 20px;
    }

    .container11 {
      padding-left: 8%;
      padding-right: 8%;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
      background-color: rgba(255, 255, 255, 0.525);
    }


    h1 {
      font-size: 2.3rem;
      margin: 5vh auto;
      color: #A7016B;
      text-align: center;
    }

    #section5 p {

      line-height: 1.5;
      max-width: 1000px;
      color: #333;
    }


    .container11 img {
      width: 100%;
      max-width: 400px;
      border-radius: 4px;
      box-shadow: 0 0 4px 4px grey;
      max-height: 100vh;
      display: block;
      margin: 0 auto 20px;
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
        <li><a href="p.php">Student Directory</a></li>

        <li><a href="logout.php">Logout</a></li>
        <li><a href="index.php">Go to home</a></li>

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

        <div class="custom-burger" id="custom" onclick="toggleNav()">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
    </nav>
  </header>

  <div class="container11">
    <h1>Principle's Message...</h1>

    <img src="principle.jpg" alt="principle" id="img1">
    <p>
      <b>PRINCIPAL'S DESK</b>

      <br>

    </p>
    <div class="principal-message">
      <p>
        I am honored to welcome you to Barku Kolpe Vidyalaya, where our commitment is to provide quality education to every child in our village and surrounding communities. As a rural school with a vision for progress, our mission is not only to impart knowledge but also to shape well-rounded individuals rooted in strong moral values and life skills.
      </p>

      <p>
        Our school is dedicated to cultivating an atmosphere of learning, curiosity, and respect. We believe that education is a journey that shapes both the mind and character of each student. Through a blend of academics, sports, and cultural activities, we aim to foster personal growth and responsibility in our students.
      </p>

      <p>
        Our teachers are deeply committed to each student’s success. They work tirelessly to make learning engaging and relevant. We also encourage our students to take part in co-curricular and extracurricular activities, from sports and art to cultural programs, nurturing their interests and broadening their perspectives.
      </p>

      <p>
        Additionally, we emphasize the importance of family involvement in education. We believe that when families and schools work together, students benefit greatly. Through regular meetings, events, and communication, we ensure that parents are informed and involved in their children’s education journey.
      </p>

      <p>
        With the collective efforts of our faculty, staff, and supportive community, we are building a foundation for lifelong learning and preparing our students for a bright future. Thank you for your support and trust in our school. I look forward to a successful and inspiring year for each of our students at Barku Kolpe Vidyalaya.
      </p>

      <p>
        Regards,<br>
        Mr.S.M.Bhosale<br>
        Principal



      </p>


    </div>


  </div>

</body>

</html>