<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="log in">
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
            <?php /*Added by Dai*/
                session_start();
                $name = $_SESSION['firstName'];
                // $id=$_SESSION['studentID'];
                $id = $_SESSION['userid'];
            ?>
            <?php
                require_once('db_connection.php');
                $db = db_connect();
                $courseName = $_POST['courseName'];
                $sql = "SELECT courseID FROM course WHERE courseName='$courseName'"; //query string
                //execute the query
                $result_set = mysqli_query($db, $sql);
                $result = mysqli_fetch_assoc($result_set);
                $courseID = is_null($result) ? '' : $result['courseID'];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (strlen($courseName) > 0 & $courseID>0 ) {
                        $sql = "SELECT grade.courseID, course.level, course.courseName, grade.grade FROM grade INNER JOIN course on grade.courseID = course.courseID WHERE course.courseID=$courseID AND grade.studentID = $id;";
                        //execute the query
                        $result_set = mysqli_query($db, $sql);
                    } else {
                        echo '<html> <head> <Script Language="JavaScript"> alert("Please input valid course name.");</Script> </head> </html> ' .
                            "<meta http-equiv=\"refresh\" content=\"0;url=3_4_grades.php\"> ";
                    }
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="3_4_grades.php">&laquo; Back to Grade List</a>
            </div>
            <div class="studentHT">
                <h3 class="proh">Grade Details</h3>
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
                        <tr class="studentInfo">
                            <td class="tableHH">Grade</td>
                            <td class="tablePI"><?php echo $result['grade']; ?></td>
                        </tr>
                    <?php } ?>
                </table>


            </div>
        </div>
</body>

</html>