<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the grade editing page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="grade edit">
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
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    // display the employee information
                    $courseID = $_GET['courseID'];
                    $studentID = $_GET['studentID'];
                    $sql = "SELECT course.courseID, student.studentID, course.level, course.courseName, grade.grade,student.firstName, student.lastName FROM grade LEFT JOIN course on grade.courseID = course.courseID LEFT JOIN student on grade.studentID = student.studentID WHERE course.courseID = $courseID AND student.studentID = $studentID;"; //query string ";
                    $result_set = mysqli_query($db, $sql);
                    $result = mysqli_fetch_assoc($result_set);
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_4_grades.php"> Back to grade page</a>
                <div class="pageEdit">
                    <h1>Edit The Grade</h1>
                    <form action=<?php echo "\"gradeEdit.php?courseID=$courseID&studentID=$studentID\""; ?> method="post">
                        <dl class="PE">
                            <dt>Level</dt>
                            <dd>
                                <p name="level"> <?php echo $result['level']; ?></p>
                            </dd>
                        </dl>
                        <dl class="PE">
                            <dt>Course Name</dt>
                            <dd>
                                <p name="courseName"> <?php echo $result['courseName']; ?></p>
                            </dd>
                        </dl>
                        <dl class="PE">
                            <dt>First Name</dt>
                            <dd>
                                <p name="firstName"> <?php echo $result['firstName']; ?></p>
                            </dd>
                        </dl>
                        <dl class="PE">
                            <dt>Last Name</dt>
                            <dd>
                                <p name="lastName"> <?php echo $result['lastName']; ?></p>
                            </dd>
                        </dl>
                        <dl class="PE">
                            <dt>Grade</dt>
                            <dd><input type="text" name="grade" value="<?php echo $result['grade']; ?>" /></dd>
                        </dl>
                        <input type="submit" value="Edit Grade" id="operations" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>