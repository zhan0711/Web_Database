<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the course creation page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="course creation">
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
                <li><a href="3_3_course.php">my courses</a></li>
                <li><a href="3_4_grades.php">my grades</a></li>
            </ul>
        </div>
        <div class="item2HP">
            <div class="studentHT">
                <h3 class="proh">Add course:</h3>
            </div>
            <div>
                <?php
                    require_once('db_connection.php');
                    $db = db_connect();
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $courseLevel = $_POST['courseLevel'];
                        $courseName = $_POST['courseName'];
                        echo "courseLevel = $courseLevel,  courseName = $courseName";
                    // validation if the infromtion post is empty
                    if (strlen($courseLevel) < 0) {
                        exit('Invalid level input.<a href="javascript:history.back(-1);">return</a>');
                    }
                    if (strlen($courseName) < 0) {
                        exit('Invalid course Name.<a href="javascript:history.back(-1);">return</a>');
                    }

                        $sql = "INSERT INTO course (level, courseName) VALUES ('$courseLevel', '$courseName')";
                        try {
                            $result = mysqli_query($db, $sql);
                            $statusMessage = "Successfully created the course: ";
                        } catch (Exception $e) {
                            $statusMessage = "Failed to create the course: ";
                        }
                        //redirect to show page
                        $id = mysqli_insert_id($db); //the mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT)
                        //redirect to show page with generated id as a parameter
                        echo '<html> <head> <Script Language="JavaScript"> alert("Course added.");</Script> </head> </html> ' . "<meta http-equiv=\"refresh\" content=\"0;url=4_3_course.php\"> ";
                    } else {
                        header("Location: courseCreate.php");
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>