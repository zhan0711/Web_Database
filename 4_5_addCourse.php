
<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the add course confirmation page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="course add">
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
            <div class="studentHT">
                <h3 class="proh">Please input the course information.</h3>
            </div>
            <form action="courseCreate.php" method="post">
                <div class="signUpTableContainer">
                    <div class="textfield1">
                        <label for="courseLevel" class="listTitle">level</label>
                        <input type="text" name="courseLevel" id="courseLevel"></br>
                    </div>
                    <div class="textfield1">
                        <label for="courseName" class="listTitle">course name</label>
                        <input type="text" name="courseName" id="courseName"></br>
                    </div>
                    <div class="operations">
                        <button type="submit">add the course</button>
                    </div>
                    <div class="operations">
                        <button type="reset">reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>