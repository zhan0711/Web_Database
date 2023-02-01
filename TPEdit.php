<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher profile edit page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="teacher Profile Edit">
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
                require_once('db_connection.php');
                $db = db_connect();
                if (!isset($_GET['id'])) { //check if we get the id
                    header("Location:  index.php");
                }
                $id = $_GET['id'];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    //update the table with new information
                    $sql = "UPDATE teacher set firstName = '$firstName', lastName = '$lastName',phone='$phone',email= '$email',
                        password='$password' where teacherID ='$id'";
                    $result = mysqli_query($db, $sql);
                    //redirect to show page
                    header("Location: TPshow.php?id=  '$id'");
                }
                // display the employee information
                else {
                    $sql = "SELECT * FROM teacher WHERE teacherID = '$id' ";
                    $result_set = mysqli_query($db, $sql);
                    $result = mysqli_fetch_assoc($result_set);
                }
            ?>
            <div class="SPcontent">
                <a class="back-link" href="4_1_teacherPage.php"> Back to teacher profile page</a>
                <div class="pageEdit">
                    <h1>Edit My Profile</h1>
                    <form action="<?php echo 'TPEdit.php?id=' . $id; ?>" method="post">
                        <dl class="PE">
                            <dt>First Name</dt>
                            <dd><input type="text" name="firstName" value="<?php echo $result['firstName']; ?>" /></dd>
                        </dl>
                        <dl class="PE">
                            <dt>Last Name</dt>
                            <dd><input type="text" name="lastName" value="<?php echo $result['lastName']; ?>" /></dd>
                        </dl>
                        <dl class="PE">
                            <dt>Phone</dt>
                            <dd><input type="text" name="phone" value="<?php echo $result['phone']; ?>" /></dd>
                        </dl>
                        <dl class="PE">
                            <dt>Email</dt>
                            <dd><input type="text" name="email" value="<?php echo $result['email']; ?>" /></dd>
                        </dl>
                        <dl class="PE">
                            <dt>Password</dt>
                            <dd><input type="text" name="password" value="<?php echo $result['password']; ?>" /></dd>
                        </dl>
                        <input type="submit" value="Edit My Profile" id="operations" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>