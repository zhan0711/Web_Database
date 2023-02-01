<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student course enrollment page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="student course enroll">
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
            <!-- get the student and course infromation, insert a record in grade table-->
            <?php
                require_once('db_connection.php');
                $db = db_connect();
                $courseID = $_GET['courseID'];
                $studentID = $_GET['studentID'];
                $requestMethod = $_SERVER['REQUEST_METHOD'];
                //echo "courseID = $courseID,  studentID = $studentID, REQUEST_METHOD = $requestMethod";
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $sql = "INSERT INTO grade (courseID, studentID) VALUES ('$courseID','$studentID')";
                    try {
                        $result = mysqli_query($db, $sql);
                        $statusMessage = "Successfully enrolled the course: ";
                    } catch (Exception $e) {
                        $statusMessage = "Failed to enroll the course: ";
                        if (strpos($e->getMessage(), "Duplicate") !== false) {
                            // $statusMessage = $statusMessage . "(the course has already been enrolled)";
                            $statusMessage .= "(the course has already been enrolled)";
                        }
                    }
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="3_3_course.php">&laquo; Back to Course List</a>
                <div class="pageEdit">
                    <h1>Course Selete Page</h1>
                    <!-- <p>Successfully enrolled the course:.</p> -->
                    <p><?php echo $statusMessage ?></p>
                    <p class="item">
                        <?php
                            $sql = "SELECT courseName FROM course WHERE courseID='$courseID'";
                            $result = mysqli_query($db, $sql);
                            $results = mysqli_fetch_assoc($result);
                            echo $results['courseName'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>