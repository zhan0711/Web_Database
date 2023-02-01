<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student profile edit confirmation page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="student profile edit">
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
            <?php
                //conect to the datbase
                require_once('db_connection.php');
                $db = db_connect();
                //access URL parameter
                $id = $_GET['id'];
                //prepare your query
                $sql = "SELECT * FROM student WHERE studentID= '$id' ";
                $result_set = mysqli_query($db, $sql);
                $result = mysqli_fetch_assoc($result_set);
            ?>
            <div class="SPcontent">
                <a class="back-link" href="3_2_accountInfo.php">Back to student profile page</a>
                <div class="pageEdit">
                    <h1>Information Updated</h1>
                    <table class="attributes">
                        <tr class="PEafter">
                            <td class="PEAtd">Student First Name</td>
                            <td><?php echo $result['firstName']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Last Name</td>
                            <td><?php echo $result['lastName']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Phone Number</td>
                            <td><?php echo $result['phone']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Email</td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Address</td>
                            <td><?php echo $result['address']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student PostalZip</td>
                            <td><?php echo $result['postalZip']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Country</td>
                            <td><?php echo $result['country']; ?></td>
                        </tr>
                        <tr class="PEafter">
                            <td class="PEAtd">Student Password</td>
                            <td><?php echo $result['password']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>