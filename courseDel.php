<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the course delete page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="course delete">
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
                <li><a href="4_1_teacherPage.php" class="current">teacher center</a></li>
                <li><a href="4_2_studentsList.php">student information</a></li>
                <li><a href="4_3_course.php">courses</a></li>
                <li><a href="4_4_grades.php">grades</a></li>
            </ul>
        </div>
        <div class="item2HP">
            <?php
                require_once('db_connection.php');
                $db = db_connect();
                $courseID = $_GET['courseID'];
                $requestMethod = $_SERVER['REQUEST_METHOD'];
                //echo "courseID = $courseID,  studentID = $studentID, REQUEST_METHOD = $requestMethod";
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $sql1 = "DELETE FROM grade WHERE courseID = $courseID";
                    $result1 = mysqli_query($db, $sql1);
                    $sql = "DELETE FROM course WHERE (courseID='$courseID')";
                    $result = mysqli_query($db, $sql);
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_3_course.php">&laquo; Back to Course List</a>
                <div class="pageEdit">
                    <h1>Course Delete Page</h1>
                    <p>Successfully delete the course:.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>