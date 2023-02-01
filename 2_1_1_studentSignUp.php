<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date: Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student register page of Assignment 02.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="student sign up">
    <!-- The styles used in this page -->
    <link rel="stylesheet" href="style.css">
    <script src="studentJC.js" defer></script>
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
            <h3 id="signUpHead">new student registration</h3>
            <form name="RegForm" onsubmit="return validate()" action="registerStudent.php" method="post">
                <div class="signUpTableContainer">
                    <div class="textfield">
                        <label for="fn" class="listTitle">first name</label>
                        <input type="text" name="firstName" id="fn"></br>
                    </div>
                    <div class="textfield">
                        <label for="ln" class="listTitle">last name</label>
                        <input type="text" name="lastName" id="ln"></br>
                    </div>
                    <div class="textfield">
                        <label for="pn" class="listTitle">phone number</label>
                        <input type="text" name="phone" id="pn"></br>
                    </div>
                    <div class="textfield">
                        <label for="em" class="listTitle">email</label>
                        <input type="text" name="email" id="em"></br>
                    </div>
                    <div class="textfield">
                        <label for="ad" class="listTitle">address</label>
                        <input type="text" name="address" id="ad"></br>
                    </div>
                    <div class="textfield">
                        <label for="pz" class="listTitle">postalZip</label>
                        <input type="text" name="postalZip" id="pz"></br>
                    </div>
                    <div class="textfield">
                        <label for="ct" class="listTitle">country</label>
                        <input type="text" name="country" id="ct"></br>
                    </div>
                    <div class="textfield">
                        <label for="pw" class="listTitle">password</label>
                        <input type="password" name="password" id="pw"></br>
                    </div>
                    <div class="textfield">
                        <label for="repw" class="listTitle">re-type password</label>
                        <input type="password" name="password2" id="repw"></br>
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