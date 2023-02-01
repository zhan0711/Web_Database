<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the for teacher to search course of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="teacher course management">
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
                $courseName = $_POST['courseName'];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (strlen($courseName) > 0) {
                        $sql = "SELECT * FROM course WHERE courseName='$courseName'";
                        $result_set = mysqli_query($db, $sql);
                    } else {
                        echo '<html> <head> <Script Language="JavaScript"> alert("Please input valid course name.");</Script> </head> </html> ' .
                            "<meta http-equiv=\"refresh\" content=\"0;url=4_3_course.php\"> ";
                    }
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_3_course.php">&laquo; Back to Course List</a>
            </div>
            <div class="studentHT">
                <h3 class="proh">Course Information</h3>
            </div>
            <div>
                <table class="studentList">
                    <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                        <tr class="studentInfo">
                            <td class="tableHH">Course ID</td>
                            <td class="tablePI"><?php echo $result['courseID']; ?></td>
                        </tr>
                        <tr class="studentInfo">
                            <td class="tableHH">Level</td>
                            <td class="tablePI"><?php echo $result['level']; ?></td>
                        </tr>
                        <tr class="studentInfo">
                            <td class="tableHH">Course Name</td>
                            <td class="tablePI"><?php echo $result['courseName']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>