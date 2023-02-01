<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date: , 2022
    Section: CST 8285 section 302 Assignment 02
    This is the home page of Assignment 02.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="role page">
    <!-- The styles used in this page -->
    <link rel="stylesheet" href="style.css">
    <script src="system.js"></script>
</head>

<body>
    <main class=picbg>
        <h2 id="roleWelcome">Welcome to the school system.</h2>
        <!-- <p id="roleP">Please select your </p> -->
        <div id="button">
            <div>
                <button class="roleButton btn" onclick="studentRoleSelect()">student login</button>
            </div>
            <div>
                <button class="roleButton btn" onclick="teacherRoleSelect()">teacher login</button>
            </div>
        </div>
    </main>
</body>

</html>