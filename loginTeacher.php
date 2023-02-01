<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the PHP page for teacher login of Assignment 02.
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
            header("location: 4_1_teacherPage.php");
        }
    }

    function checkEmpty($firstName, $lastName, $password){
        if ($firstName == null || $lastName == null || $password == null) {
            echo '<html> <head> <Script Language="JavaScript"> alert("Name or Password is empty");</Script> </head> </html> ' .
                "<meta http-equiv=\"refresh\" content=\"0;url=2_2_teacherLoginPage.php\"> ";
        } else {
            return true;
        }
    }

    function checkUser($firstName, $lastName, $password){
        global $db;
        $query = "SELECT * FROM teacher WHERE firstName='{$firstName}' and lastName='{$lastName}' and password='{$password}';";
        $result_set = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result_set);

        if ($result) {
            session_start();
            $_SESSION['userid'] = $result['teacherID'];
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;

            header("Location:4_1_teacherPage.php");
        } else {
            echo '<html> <head> <Script Language="JavaScript"> alert("Invalid username or password. Please try again. If you do not have an account, please sign up.");
                </Script> </head> </html> ' . "<meta http-equiv=\"refresh\" content=\"0;url=2_2_teacherLoginPage.php\"> ";
        }
    }

?>

