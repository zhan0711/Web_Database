<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date: Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student login page of Assignment 02.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content=" student log in">
    <!-- The styles used in this page -->
    <link rel="stylesheet" href="style.css">
    <script src="system.js"></script>
</head>

<body onload="time()">
    <main class=picbg>
        <header>
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
        <form name="studentFirst" action="loginStudent.php" method="post" onsubmit="checkForm()">
            <div class="container">
                <div class="contextItem1">
                    <p>Welcome to the course information management system!</p>
                    <p>This is the <span>student</span> login page.</p>
                </div>
                <div class="contextItem2">
                    <div class="header">login</div>
                    <div class="formLogIn">
                        <input type="text" name="firstName" placeholder="First Name">
                        <input type="text" name="lastName" placeholder="Last Name">
                        <input type="password" name="password" placeholder="Password">
                        <input class="btnLogin" type="submit" value="login">
                    </div>
                    <div class="msg">
                        Don't have account?
                        <a href="2_1_1_studentSignUp.php">sign up</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>

</html>