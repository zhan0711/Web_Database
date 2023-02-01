<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student home page after login of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="student center">
    <!-- The styles used in this page -->
    <link rel="stylesheet" href="style.css">
    <script src="system.js"></script>
</head>

<body onload="time()" class="bgc">
    <header class="sysHead">
        <div class="headContainer">
            <div class="item1">
                <h1><span>ottawa</span>school</h1>
            </div>
            <div class="item2">
                <button class="btn" id="exit" onclick="exitButton()">exit</button>
                <span id="time"></span>
            </div>
        </div>
    </header>

    <div class="gridC">
        <div class="item1HP">
            <ul class="userMenu">
                <li><a href="3_1_studentPage.php" class="current">student center</a></li>
                <li><a href="3_2_accountInfo.php">my profile</a></li>
                <li><a href="3_3_course.php">courses</a></li>
                <li><a href="3_4_grades.php">my grades</a></li>
            </ul>
        </div>
        <div class="item2HP">
            <div class="studentHP">
                <?php
                session_start();
                $name = $_SESSION['firstName'];
                ?>
                <p id="headInfo"><?php echo "$name, " ?>Welcome to the course information management system.</p>
                <ul>
                    <li class="studentInstruction">This is the Student Center. Please review the function below.</li>
                    <li class="studentInstruction">My Profile: <span class="sl">Student personal information.</span></li>
                    <li class="studentInstruction">My Courses: <span class="sl">Course information.</span></li>
                    <li class="studentInstruction">My Grades: <span class="sl">Student grades.</span></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>