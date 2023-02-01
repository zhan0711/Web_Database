<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date: Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher register page of Assignment 02.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content=" teacher sign up">
    <!-- The styles used in this page -->
    <link rel="stylesheet" href="style.css">
    <script src="teacherJC.js" defer></script>
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
        <div class="container">
            <h3 id="signUpHead">new teacher registration</h3>
            <form name="RegForm" onsubmit="return validateTeacher()" action="registerTeacher.php" method="post">
                <div class="signUpTableContainer">
                    <div class="textfield1">
                        <label for="fn" class="listTitle">first name</label>
                        <input type="text" name="firstName" id="fn1"></br>
                    </div>
                    <div class="textfield1">
                        <label for="ln" class="listTitle">last name</label>
                        <input type="text" name="lastName" id="ln1"></br>
                    </div>
                    <div class="textfield1">
                        <label for="pn" class="listTitle">phone number</label>
                        <input type="text" name="phone" id="pn1"></br>
                    </div>
                    <div class="textfield1">
                        <label for="em" class="listTitle">email</label>
                        <input type="text" name="email" id="em1"></br>
                    </div>
                    <div class="textfield1">
                        <label for="pw" class="listTitle">password</label>
                        <input type="password" name="password" id="pw1"></br>
                    </div>
                    <div class="textfield1">
                        <label for="repw" class="listTitle">re-type password</label>
                        <input type="password" name="password2" id="repw1"></br>
                    </div>
                    <div class="operations">
                        <button type="submit"> sign-up</button>
                    </div>
                    <div class="operations">
                        <button type="reset">reset</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>