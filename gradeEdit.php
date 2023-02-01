<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the grade management for teacher page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="teacher manage grade">
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $courseID = $_GET['courseID'];
                    $studentID = $_GET['studentID'];
                    $grade = $_POST['grade'];
                    //update the table with new information
                    $sql = "UPDATE grade set grade = '$grade' where courseID='$courseID' AND studentID ='$studentID'";
                    try {
                        $result = mysqli_query($db, $sql);
                        $statusMessage = "Successfully edited the grade.";
                    } catch (Exception $e) {
                        $statusMessage = "Failed to enroll the course.";
                    }
                    //redirect to show page
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_4_grades.php"> Back to grade page</a>
                <div class="pageEdit">
                    <h1>Grade edit Page</h1>
                    <p><?php echo $statusMessage ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>