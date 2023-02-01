<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher home page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="teacher home">
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
            <div class="studentHP">
                <?php
                    session_start();
                    $name = $_SESSION['firstName'];
                ?>
                <p id="headInfo"><?php echo "$name, " ?>Welcome to the course information management system.</p>
            </div>

            <div class="teacherInfo">
                <?php
                    $name = $_SESSION['firstName'];
                    $id = $_SESSION['userid'];
                ?>
                <?php
                    require_once('db_connection.php');
                    $db = db_connect();
                    $sql = "SELECT * FROM teacher where teacherID = $id";
                    $result_set = mysqli_query($db, $sql);
                ?>
                <div class="studentHT">
                    <h3 class="proh">Personal Profile</h3>
                </div>
                <div>
                    <table class="studentList">
                        <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                            <tr class="studentInfo">
                                <td class="tableHH">First Name</td>
                                <td class="tablePI"><?php echo $result['firstName']; ?></td>
                                <td><a class="actoion" href="<?php echo "TPEdit.php?id=" . $id; ?>">Edit</a></td>
                            </tr>
                            <tr class="studentInfo">
                                <td class="tableHH">Last Name</td>
                                <td class="tablePI"><?php echo $result['lastName']; ?></td>
                                <td><a class="actoion" href="<?php echo "TPEdit.php?id=" . $id; ?>">Edit</a></td>
                            </tr>
                            <tr class="studentInfo">
                                <td class="tableHH">Phone Number</td>
                                <td class="tablePI"><?php echo $result['phone']; ?></td>
                                <td><a class="actoion" href="<?php echo "TPEdit.php?id=" . $id; ?>">Edit</a></td>
                            </tr>
                            <tr class="studentInfo">
                                <td class="tableHH">Email</td>
                                <td class="tablePI"><?php echo $result['email']; ?></td>
                                <td><a class="actoion" href="<?php echo "TPEdit.php?id=" . $id; ?>">Edit</a></td>
                            </tr>

                            <tr class="studentInfo">
                                <td class="tableHH">Password</td>
                                <td class="tablePI"><?php echo $result['password']; ?></td>
                                <td><a class="actoion" href="<?php echo "TPEdit.php?id=" . $id; ?>">Edit</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>