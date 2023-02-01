<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher registration page of Assignment 02.
-->

<?php
    require_once('db_connection.php');
    $db = db_connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //make sure we submit the data
        $firstName = $_POST['firstName']; // access the form data
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!preg_match('/^[\w\x80-\xff]{3,15}$/', $firstName)) {
            exit('Invalid first name.<a href="javascript:history.back(-1);">return</a>');
        }
        if (!preg_match('/^[\w\x80-\xff]{3,15}$/', $lastName)) {
            exit('Invalid last name.<a href="javascript:history.back(-1);">return</a>');
        }
        if (strlen($phone) < 10) {
            exit('Invalid phone number.<a href="javascript:history.back(-1);">return</a>');
        }
        if (!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*\.)+[a-zA-Z]*)$/u', $email)) {
            exit('Invalid email.<a href="javascript:history.back(-1);">return</a>');
        }

        //prepare your query string
        $sql = "INSERT INTO teacher (firstName,lastName,phone,email,password) VALUES ('$firstName','$lastName','$phone','$email','$password')";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false

        $id = mysqli_insert_id($db); //the mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT)
        //redirect to show page with generated id as a parameter
        echo '<html> <head> <Script Language="JavaScript"> alert("Teacher account registration success. Please log in.");</Script> </head> </html> ' .
            "<meta http-equiv=\"refresh\" content=\"0;url=2_2_teacherLoginPage.php\"> ";;
        } else {
              header("Location: index.php");
        }
?>