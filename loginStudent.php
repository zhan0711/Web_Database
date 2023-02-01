<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the login feature for student of Assignment 02.
-->
<?php
    header("Content-type:text/html;charset=UTF-8");
    require_once('db_connection.php');
    $db = db_connect();

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];

    if (checkEmpty($firstName, $lastName, $password)) {
        if (checkUser($firstName, $lastName, $password)) {
            header("location: 3_1_studentPage.php");
        }
    }

    function checkEmpty($firstName, $lastName, $password){
        if ($firstName == null || $lastName == null || $password == null) {
            echo '<html> <head> <Script Language="JavaScript"> alert("Name or Password is empty");</Script> </head> </html> ' .
                "<meta http-equiv=\"refresh\" content=\"0;url=2_1_studentLoginPage.php\"> ";
        } else {
            return true;
        }
    }

    function checkUser($firstName, $lastName, $password){
        global $db;
        $query = "select studentID from student where firstName='{$firstName}' and lastName='{$lastName}' and password='{$password}';";
        $result_set = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result_set);

        if ($result) {
            session_start();
            $_SESSION['userid'] = $result['studentID'];
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;

            header("Location:3_1_studentPage.php");
        } else {
            echo '<html> <head> <Script Language="JavaScript"> alert("Invalid username or password. Please try again. If you do not have an account, please sign up.");
                </Script> </head> </html> ' . "<meta http-equiv=\"refresh\" content=\"0;url=2_1_studentLoginPage.php\"> ";
        }
    }

?>

