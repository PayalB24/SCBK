<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="stylesheet" href="about1.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    height: 100%;
    width: 100%;
    font-family: 'Times New Roman', Times, serif;
}

body {
    margin: 0;
}

header {
    width: 100%;
}


.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #A7016B;
    min-width: 200px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content li {
    display: block;
    text-align: left;
}

.dropdown-content a {
    color: white;
    padding: 12px 7px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #C25590;

}

.dropdown.active .dropdown-content {
    display: block;
}

.navbar, .custom-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #A7016B;
            color: #FFFFFF;
            padding: 15px 0;
            text-align: center;
            font-size: 18px;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .custom-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }

        .custom-logo h1 {
            color: white;
            font-size: 24px;
            margin: 0;
        }

        .custom-nav-li {
            list-style: none;
            display: flex;
            margin-left: auto;
        }

        .custom-nav-li li {
            margin: 0 20px;
        }

        .custom-nav-li li a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        .custom-nav-li a:hover {
            font-size: 21px;
        }

        /* Dropdown styling */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #A7016B;
            min-width: 230px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content li {
            display: block;
            text-align: left;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 7px;
            text-decoration: none;
            display: block;
        }

        .dropdown.active .dropdown-content {
            display: block;
        }

        /* Burger menu styling */
        .custom-burger {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .custom-burger div {
            width: 25px;
            height: 3px;
            background-color: white;
            transition: all 0.3s ease;
        }
main {
    padding: 45px;
    font-family: 'Times New Roman', Times, serif;
}


.row {
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 4px;
    box-shadow: 0 0 4px 4px grey;
    margin-left: 25%;
    margin-right: 25%;
    padding: 10%;

}


#footer {
    background-color: #A7016B;
    color: white;
    margin-top: 8vh;
    padding: 20px 0;
    text-align: center;
    width: 100%;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.5);
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px;
    flex-wrap: wrap;
}

.footer-logo h1 {
    font-size: 20px;
    color: white;
    margin: 1vh 2vw;
}

.footer-info {
    font-size: 14px;
}

.footer-info p {
    margin: 5px 0;
}

.footer-info a {
    color: white;
    text-decoration: none;
}

.footer-social {
    display: flex;
    gap: 15px;
}

.footer-social a img {
    width: 24px;
    height: 24px;
    filter: brightness(0) invert(1);
    transition: transform 0.3s ease;
}

.footer-social a img:hover {
    transform: scale(1.2);
}

@media screen and (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer-social {
        margin-top: 15px;
    }
}

@media screen and (max-width: 768px) {
    .custom-nav-li {
        display: none;
    }

    .custom-burger {
        display: flex;
    }

    .custom-nav-li.active {
        display: flex;
        position: fixed;
        top: 0;
        right: 0;
        height: 100vh;
        width: 250px;
        background-color: rgba(167, 1, 107, 1);
        flex-direction: column;
        align-items: center;
        transform: translateX(0%);
        transition: transform 0.3s ease-in;
        z-index: 1000;
    }

    .custom-burger div {
        background-color: white;
        opacity: 1;
    }


    .custom-nav-li li {
        margin: 17px 0;
    }
}

#section1 {
    position: relative;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    text-align: center;
}

#section1::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url(Schoolimage.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.3;
    z-index: -1;
}


.about {
    padding-left: 8%;
    padding-right: 8%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    background-color: rgba(255, 255, 255, 0.525);
}

#section1 h2 {
    color: #b5217e;
}

#section1 h1 {
    font-size: 2.3rem;
    margin: 5vh auto;
    color: #b5217e;
}

#section1 p {

    line-height: 1.5;
    max-width: 1000px;
    color: #333;
}


/*Section2 starts*/



.achievement-container{
    padding-top: 2%;
    padding-bottom: 2%;
    padding-left: 8%;
    padding-right: 8%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    background-color: rgba(255, 255, 255, 0.525);
}
.achievements-section {
    padding: 40px 20px;
    text-align: center;
    background-color: #fff;
}

.achievements-section h1 {
    font-size: 2.3rem;
    margin: 5vh auto;
    color: #b5217e;
}

.achievement-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.achievement {
    background-color: #e9e9e9;
    border-radius: 8px;
    width: 250px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    text-align: center;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s forwards;
}

.achievement:nth-child(1) { animation-delay: 0.5s; }
.achievement:nth-child(2) { animation-delay: 1s; }
.achievement:nth-child(3) { animation-delay: 1.5s; }
.achievement:nth-child(4) { animation-delay: 2.0s; }
.achievement:nth-child(5) { animation-delay: 2.5s; }
.achievement:nth-child(6) { animation-delay: 3.0s; }

.achievement img {
    width: 100%;
    height: 30vh;
    display: block;
}
.achievement-info .achievement-group,
.achievement-info .achievement-school {
    font-size: 0.9em;
    color:black;
    margin: 5px 0;
}

.achievement-info {
    padding: 15px;
}

.achievement-info h3 {
    font-size: 1.2em;
  
    color:black;
    margin: 0 0 10px;
}

.achievement-info p {
    font-size: 0.9em;
    color:black;
    margin: 0;
}


@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


#section3 {
    position: relative;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    text-align: center;
}

#section3::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url(Schoolimage.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.3;
    z-index: -1;
}

#section3 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
}

.contain1,
.contain {
    width: 80%;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.525);

    margin-bottom: 20px;
}

#head,
#head1 {
    font-size: 2em;
    text-align: center;

    color: #A7016B;
}

.contain1,
.contain p {
    font-size: 1.1em;
    text-align: justify;
    line-height: 1.6;
    color: #555;
}




.container1 {
    padding-left: 8%;
    padding-right: 8%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    background-color: rgba(255, 255, 255, 0.525);
}

#section4 h1 {
    font-size: 2.3rem;
    margin: 5vh auto;
    color: #A7016B;
    text-align: center;
}

#section4 p {

    line-height: 1.5;
    max-width: 1000px;
    color: #333;
}

#section4 h5 {

    color: #A7016B;
}

.container11 {
    padding-left: 8%;
    padding-right: 8%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    background-color: rgba(255, 255, 255, 0.525);
}


#section5 h1 {
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

.read-more-btn {
    background-color: white;
    border: 2px solid black;
}

.read-more-btn:hover {

    background-color: #A7016B;

}

.read-more-btn1 {
    background-color: white;
    border: 2px solid black;
}

.read-more-btn1:hover {

    background-color: #A7016B;

}

#section6
{
    padding-top: 4%;
    padding-bottom: 2%;
    padding-left: 35%;
    padding-right: 35%;
    border-radius: 10px;
    box-shadow: 0 4px 8px black;
    margin-top: 3%;
    margin-bottom: 2%;
        
}

#section6 h1
{
    font-size: 2.3rem;
    margin: 5vh auto;
    color: #A7016B;
    text-align: center;
}

#calendar-header 
{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #A7016B;
    color: rgb(25, 2, 2);
    padding: 10px;
     
    
}
    


#calendar-days
 {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    padding: 10px;
}

#calendar-days div
 {
    padding: 10px;
    text-align: center;
    border: 1px solid black;
    cursor: pointer;
    background-color: #e9e9e9;
}

#calendar-days div:hover 
{
    background-color:#A7016B;
}

.current-date 
{
    background-color:#A7016B ;
    color: #A7016B;
}

#event-details
 {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    max-width: 400px;
    margin: 20px auto;
    border-radius: 10px;
    background-color: #f9f9f9;
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

        <section id="section1" class="history">
            <div class="about">
                <h1>Our History</h1>
        
                <h2>Changdev Barku Patil Kople School</h2>
                <p> A Legacy of Excellence
                    Founded in 1975, Changdev Barku Patil Kople School began as a small initiative by the visionary
                    leader, Shri Changdev Barku Patil, a respected farmer and educator from Kolpewadi village. His dream
                    was to provide quality education to the children of rural communities, ensuring that even the most
                    underprivileged could access learning and knowledge.
                    Early Years: In the early days, the school operated out of a humble two-room setup, with only a
                    handful of students and a few dedicated teachers. Despite limited resources, the commitment to
                    education was unwavering. Shri Changdev believed in the transformative power of knowledge and aimed
                    to blend traditional values with modern learning methods.

                    Growth and Expansion: By the 1980s, the school had gained popularity for its holistic approach to
                    education. Parents from neighboring villages began sending their children to the school, drawn by
                    its reputation for nurturing both academic and moral values. Over time, with support from the local
                    community and government, the school expanded to include more classrooms, a science lab, and a
                    library.

                    In 1995, the school introduced its first computer lab, making it one of the first rural schools in
                    the region to embrace technology. This forward-thinking approach positioned it as a leader in rural
                    education.

                    Educational Philosophy: The school's motto, "ज्ञानं शक्तिः" (Knowledge is Power), reflects its
                    belief in the potential of education to uplift individuals and society. The curriculum focuses not
                    only on academic excellence but also on character development, leadership, and community service.

                    Shri Changdev often said, "Education is the greatest gift we can give to our children, for it
                    empowers them to shape their future and the future of our nation."

                    Achievements: Over the decades, the school has produced numerous successful alumni, including
                    engineers, doctors, teachers, and entrepreneurs. Many of these former students continue to give back
                    to the school, contributing to its growth and development.

                    In 2010, the school received the prestigious "Best Rural School Award" from the Maharashtra State
                    Government, recognizing its outstanding contribution to rural education.

                    Present Day: Today, Changdev Barku Patil Kople School stands as a beacon of learning in Kolpewadi.
                    It offers education from kindergarten to higher secondary level, with a strong focus on both
                    academic subjects and extracurricular activities such as sports, arts, and environmental awareness
                    programs.

                    The school continues to honor the legacy of its founder by providing quality education to all,
                    ensuring that every child, regardless of their background, has the opportunity to thrive.

                </p>

            </div>
        </section>

        <section class="achievements-section" id="section2">
            <h1>Our Achievements</h1>
            <div class="achievement-container">
                <div class="achievement">
                    <img src="sport.jpeg" alt="Sports Championship">
                    <div class="achievement-info">
                        <h3>Sports Championship</h3>
                        <p class="achievement-date">Date: April 20, 2024</p>
                        <p class="achievement-location">Location: Kolpewadi Sports Ground</p>
                        <p class="achievement-category">Category: Track and Field</p>
                        <p class="achievement-group">Group Name: Kolpe Warriors</p>
                        <p class="achievement-school">School: Barku Kolpe School</p>
                        <p class="achievement-description">Kolpe Warriors from Barku Kolpe School emerged as champions in the sports competition held at Kolpewadi Sports Ground, excelling in various track and field events.</p>
                    </div>
                </div>
                <div class="achievement">
                    <div class="achievement">
                        <img src="download.jpeg" alt="School Play" width="70%">
                        <div class="achievement-info">
                            <h3>School Play Competition Winner</h3>
                            <p class="achievement-date">Date: April 10, 2024</p>
                            <p class="achievement-location">Location: Kopargaon School Auditorium</p>
                            <p class="achievement-category">Category: Drama</p>
                            <p class="achievement-group">Group Name: Stars of Kolpe</p>
                            <p class="achievement-school">School: Barku Kolpe School</p>
                            <p class="achievement-description">Stars of Kolpe, a talented team from Barku Kolpe School, won first place in the school play competition held at the Kopargaon School Auditorium. Their outstanding performance captivated the judges and audience alike.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="achievement">
                    <img src="img sing.jpeg" alt="Singing Competition in Nashik">
                    <div class="achievement-info">
                        <h3>Singing Competition Victory</h3>
                        <p class="achievement-date">Date: January 12, 2024</p>
                        <p class="achievement-location">Location: Nashik Cultural Center</p>
                        <p class="achievement-category">Category: Solo Singing</p>
                        <p class="achievement-group">Group Name: Melody Makers</p>
                        <p class="achievement-school">School: Barku Kolpe School</p>
                        <p class="achievement-description">The Melody Makers, representing Barku Kolpe School, won first place in the solo singing competition at Nashik Cultural Center. Their soulful rendition impressed both judges and the audience.</p>
                    </div>
                </div>
                <div class="achievement">
                        <img src="drawing.jpeg" alt="Drawing Competition in Niphad">
                <div class="achievement-info">
                    <h3>Drawing Competition Champion</h3>
                    <p class="achievement-date">Date: February 18, 2024</p>
                    <p class="achievement-location">Location: Niphad Art Gallery</p>
                    <p class="achievement-category">Category: Visual Arts</p>
                    <p class="achievement-group">Group Name: Creative Minds</p>
                    <p class="achievement-school">School: Barku Kolpe School</p>
                    <p class="achievement-description">Creative Minds from Barku Kolpe School won first prize at the drawing competition held in Niphad, with artwork that showcased creativity and skill in capturing nature’s beauty.</p>
                </div>
                </div>
                <div class="achievement">
                    <img src="dance.jpg" alt="Science Fair">
                    <div class="achievement-info">
                         <h3>Dance Competition Victory</h3>
                    <p class="achievement-date">Date: August 18, 2024</p>
                    <p class="achievement-location">Location: Kolpewadi Temple</p>
                    <p class="achievement-category">Category: Traditional Dance</p>
                    <p class="achievement-group">Group Name: The Kolpe Stars</p>
                    <p class="achievement-school">School: Barku Kolpe School</p>
                    <p class="achievement-description">The Kolpe Stars, representing Barku Kolpe School, won first place in the traditional dance competition held at Kolpewadi Temple. Their performance received high praise from the audience and judges for its cultural authenticity and vibrant energy.</p>
                </div>
                </div>
                <div class="achievement">
                    <img src="spoke.jpeg" alt="Science Fair">
                    <div class="achievement-info">
                        <h3>Elocution Competition Winner</h3>
                        <p class="achievement-date">Date: March 5, 2024</p>
                        <p class="achievement-location">Location: Kopargaon Town Hall</p>
                        <p class="achievement-category">Category: Public Speaking</p>
                        <p class="achievement-group">Group Name: Voice of Kolpe</p>
                        <p class="achievement-school">School: Barku Kolpe School</p>
                        <p class="achievement-description">Voice of Kolpe, a team from Barku Kolpe School, won first place in the elocution competition at Kopargaon Town Hall. Their powerful speech captivated the audience.</p>
                    </div>
                </div>
                <div class="achievement">
                    <img src="student'sachievements.jpg" alt="Annual Cultural Event">
                    <div class="achievement-info">
                        <h3>Annual Cultural Event</h3>
                        <p class="achievement-date">Date: June 5, 2024</p>
                        <p class="achievement-location">Location: School Auditorium</p>
                        <p class="achievement-category">Category: Performing Arts</p>
                        <p class="achievement-description">Our students performed a series of traditional dances,
                            earning recognition for creativity and talent in our annual cultural event.</p>
                    </div>
                </div>
              
            </div>
        </section>


        
        
        

        <section id="section3" class="vision&amp;mission">
            <div class="contain1">
                <h1 id="head">Vision</h1>
                <p>To empower students with holistic education that nurtures academic excellence, ethical values,
                    and leadership skills, fostering well-rounded individuals who contribute positively to society
                    and become global citizens. Changdev Barku Patil Kople School aims to bridge the gap between
                    rural and urban education by providing state-of-the-art learning opportunities to every child,
                    regardless of their background.</p>
            </div>
            
            <br><br>

            <div class="contain">
                <h1 id="head1">Mision</h1>
                <p>Quality Education for All:Provide high-quality, accessible education that equips students with
                    the knowledge, skills, and values necessary for success in life.
                  </p><p>Moral and Ethical Development:Instill strong moral values, a sense of responsibility, and
                    respect for diversity, ensuring students become compassionate and responsible individuals.</p>  
                  <p>Holistic Growth:Foster physical, emotional, and intellectual growth through a balanced
                    curriculum that integrates academics, sports, arts, and life skills.
</p>  
                <p></p>
            </div>
            

        </section>

        <section id="section4" class="managing-trustee">

            <div class="container1">
                <h1>Managing Trustee</h1>
                <img src="Founder.png" alt="principle" id="img1" style="width: 20%;border-radius: 4px; box-shadow: 0 0 4px 4px grey; max-height: 100vh; margin-left: 40%; ">
                  
                    
                <h4 style="text-align: center; color:    #A7016B;;">Shri.Changdev Barku Patil Kople</h4>
                
                <br> 
            
                 
               
                <p>
                    Managing Trustee, Changdev Barku Patil Kople School

                    Changdev Barku Patil Kople, the esteemed founder and managing trustee of Changdev Barku Patil
                    Kople School, is a visionary leader with deep roots in the village of Kolpewadi. Born into a
                    farming family, he grew up witnessing the challenges faced by rural communities, particularly
                    the lack of access to quality education. Determined to bring change, he dedicated his life to
                    the upliftment of his village through education.

                    Early Life and Inspiration:
                    Born in the late 1940s, Changdev Barku Patil Kople was raised in a humble household that valued
                    hard work and community service. Despite limited educational resources, he excelled in his
                    studies and was always eager to learn. His love for knowledge and strong belief in its
                    transformative power shaped his dream of building a school that would offer educational
                    opportunities to children in rural areas like Kolpewadi.

                    Founding of the School:
                    In 1975, with the support of the local community, Changdev Barku Patil Kople laid the foundation
                    of Changdev Barku Patil Kople School. His vision was to create a place where children could
                    receive a well-rounded education, including both traditional wisdom and modern academic
                    learning. Starting with just a few rooms and a handful of students, the school has grown under
                    his leadership into a renowned institution that serves hundreds of students from nearby
                    villages.
                    <span class="hidden-content">
                        Philosophy and Leadership:
                        As the managing trustee, Changdev Barku Patil Kople plays an active role in overseeing the
                        operations and development of the school. He believes in the importance of holistic
                        education
                        that goes beyond textbooks. His emphasis is on building character, fostering creativity, and
                        instilling a strong sense of community and moral values in the students.

                        Under his guidance, the school has adopted modern educational practices while maintaining a
                        focus on rural development and cultural heritage. His leadership style is based on
                        transparency,
                        dedication, and a deep sense of responsibility toward his community.

                        Legacy and Contributions:
                        Over the years, Changdev Barku Patil Kople has been widely recognized for his contributions
                        to
                        education and rural development. He is not only seen as a leader but also as a mentor and
                        guide
                        to many. Through his efforts, the school has produced successful professionals in various
                        fields, many of whom continue to support the institution and its mission.

                        His lifelong commitment to education has left an indelible mark on Kolpewadi and neighboring
                        villages. He continues to inspire future generations with his belief that "Education is the
                        most
                        powerful tool for change."

                        Vision for the Future:
                        Changdev Barku Patil Kople remains focused on expanding the school's reach, ensuring that it
                        remains a center of excellence in education. His vision includes upgrading infrastructure,
                        incorporating more technological advancements in teaching, and expanding programs that
                        provide
                        vocational training and skill development for the students.
                </span></p>
                
                <button class="read-more-btn">Read More</button>
            </div>
            
        </section>


        <section id="section5" class="message">


            <div class="container11">
                <h1>Principle's Message...</h1>

                <img src="principle.jpg" alt="principle" id="img1">
                <p>
                    <b>PRINCIPAL'S DESK</b>

                    <br>

                    </p><div class="principal-message">
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


        </div></section>
        <section id="section6">
           
            <div id="calendar">
                <h1>Live Calendar</h1>
                <div id="calendar-header">
                    <button id="prev" onclick="changeMonth(-1)">❮</button>
                    <h3 id="month-year">November 2024</h3>
                    <button id="next" onclick="changeMonth(1)">❯</button>
                </div>
                <div id="calendar-days"><div></div><div></div><div></div><div></div><div></div><div data-date="2024-11-01">1</div><div data-date="2024-11-02">2</div><div data-date="2024-11-03">3</div><div data-date="2024-11-04">4</div><div data-date="2024-11-05">5</div><div data-date="2024-11-06">6</div><div data-date="2024-11-07">7</div><div data-date="2024-11-08" class="current-date">8</div><div data-date="2024-11-09">9</div><div data-date="2024-11-10">10</div><div data-date="2024-11-11">11</div><div data-date="2024-11-12">12</div><div data-date="2024-11-13">13</div><div data-date="2024-11-14">14</div><div data-date="2024-11-15">15</div><div data-date="2024-11-16">16</div><div data-date="2024-11-17">17</div><div data-date="2024-11-18">18</div><div data-date="2024-11-19">19</div><div data-date="2024-11-20">20</div><div data-date="2024-11-21">21</div><div data-date="2024-11-22">22</div><div data-date="2024-11-23">23</div><div data-date="2024-11-24">24</div><div data-date="2024-11-25">25</div><div data-date="2024-11-26">26</div><div data-date="2024-11-27">27</div><div data-date="2024-11-28">28</div><div data-date="2024-11-29">29</div><div data-date="2024-11-30">30</div></div>
            </div>
            <div id="event-details">
                <h4>Events</h4>
                <ul id="event-list"></ul>
            </div>
        </section>

    </main>
    <footer id="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <hr>
                <h1>SCBK</h1>
                <hr>
            </div>
            <div class="footer-info">
                <p>© 2024 Shri Changdev Barku Pa. Kolpe Madhyamic Vidyalay. All Rights Reserved.</p>
                <p>Contact us: <a href="mailto:info@yourschool.com">scbk@gmail.com</a></p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="footer-social">
                <a href="#"><img src="/facebook-icon.png" alt="Facebook"></a>
                <a href="#"><img src="/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
    <script>
        let currentDate = new Date();
        const events = {
            '2024-10-30': ['No Event'],
            '2024-10-31': ['Halloween Party'],
            '2024-11-01': ['Diwali'],
            '2024-11-03': ['Bhai duj'],
            '2024-11-14': ['Childrens Day'],
            '2024-11-11': ['School Open'],
            '2024-12-25': ['Christmas'],
            '2025-01-01': ['New Year\'s Day'],
            '2025-01-14': ['Makar Sankranti'],
            '2025-01-26': ['Republic Day'],
            '2025-02-19': ['Ch.Shivjayanti'],
            '2025-01-14': ['Jijamata Jayanti'],
            '2025-03-14': ['Mahashivratri'],
            '2025-03-16': ['Unit Test Starts'],
            '2025-03-23': ['Unit Test Ends'],
            '2025-04-14': ['Dr.B.R.Ambendkar'],
            '2025-04-16': ['Exam Starts'],
            '2025-04-28': ['Exam Ends'],
            '2025-05-01': ['Maharashtra Day'],
            '2025-05-02': ['Summer Vacation'],
            '2025-06-15': ['School Open'],
            
            // Add more events as needed
        };

        function renderCalendar() {
            const monthYear = document.getElementById("month-year");
            const calendarDays = document.getElementById("calendar-days");
            const month = currentDate.getMonth();
            const year = currentDate.getFullYear();

            monthYear.innerText = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;
            calendarDays.innerHTML = '';

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();
            const today = new Date().getDate();
            const thisMonth = new Date().getMonth();
            const thisYear = new Date().getFullYear();

            // Fill the first week
            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement("div");
                calendarDays.appendChild(emptyDiv);
            }

            // Fill the days of the month
            for (let day = 1; day <= lastDate; day++) {
                const dayDiv = document.createElement("div");
                dayDiv.innerText = day;

                // Format the date as YYYY-MM-DD for `events` lookup
                const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                dayDiv.dataset.date = formattedDate;
                dayDiv.onclick = () => showEvents(formattedDate); // Use formatted date

                // Highlight the current date
                if (day === today && month === thisMonth && year === thisYear) {
                    dayDiv.classList.add('current-date');
                }
                calendarDays.appendChild(dayDiv);
            }
        }

        function showEvents(date) {
            const eventList = document.getElementById("event-list");
            eventList.innerHTML = '';

            const eventArray = events[date] || [];
            if (eventArray.length > 0) {
                eventArray.forEach(event => {
                    const listItem = document.createElement("li");
                    listItem.innerText = event;
                    eventList.appendChild(listItem);
                });
            } else {
                const noEventItem = document.createElement("li");
                noEventItem.innerText = 'No events for this day.';
                eventList.appendChild(noEventItem);
            }
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            renderCalendar();
        }

        // Initial render
        renderCalendar();

    </script>
    <script>document.querySelector('.read-more-btn').addEventListener('click', function () {
            const hiddenContent = document.querySelector('.hidden-content');
            if (hiddenContent.style.display === 'none' || hiddenContent.style.display === '') {
                hiddenContent.style.display = 'block';
                this.textContent = 'Read Less';
            } else {
                hiddenContent.style.display = 'none';
                this.textContent = 'Read More';
            }
        });
    </script>
    <script>document.querySelector('.read-more-btn1').addEventListener('click', function () {
            const hiddenContent = document.querySelector('.hidden-content1');
            if (hiddenContent.style.display === 'none' || hiddenContent.style.display === '') {
                hiddenContent.style.display = 'block';
                this.textContent = 'Read Less';
            } else {
                hiddenContent.style.display = 'none';
                this.textContent = 'Read More';
            }
        });
    </script>


</body></html>