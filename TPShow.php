<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher profile edit result page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="teacher profile edit result">
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
        <div class="item2SHP">
            <?php
                session_start();
                require_once('db_connection.php');
                $db = db_connect();
                $name = $_SESSION['firstName'];
                $id = $_SESSION['userid'];
                $sql = "SELECT * FROM teacher WHERE teacherID= '$id' ";
                $result_set = mysqli_query($db, $sql);
                $result = mysqli_fetch_assoc($result_set);
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_1_teacherPage.php">Back to teacher profile page</a>
                <div class="pageEdit">
                    <h1>Information Updated</h1>
                    <table class="attributes">
                        <tr class="PEafter">
                            <td class="PEAtd">Teacher First Name</td>
                            <td><?php echo $result['firstName']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Teacher Last Name</td>
                            <td><?php echo $result['lastName']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Teacher Phone Number</td>
                            <td><?php echo $result['phone']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Teacher Email</td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Teacher Password</td>
                            <td><?php echo $result['password']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>