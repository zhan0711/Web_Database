<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the grade page of teacher for Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="grade management">
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
        <!--add the search function-->
        <div class="item1HP">
            <ul class="userMenu">
                <li><a href="4_1_teacherPage.php" class="current">teacher center</a></li>
                <li><a href="4_2_studentsList.php">student information</a></li>
                <li><a href="4_3_course.php">courses</a></li>
                <li><a href="4_4_grades.php">grades</a></li>
            </ul>
        </div>
        <div class="item2HP">
            <ul class="search">
                <li>
                    <div class="drop-down">
                        <button onclick="toggleFilterByLevel()" class="ss">filter by level</button>
                        <select id="filter-by-level" size="4" multiple>
                            <div id="filterbylevel">
                                <option class="clickable" onclick="filterFunction(0)">All</option>
                                <option class="clickable" onclick="filterFunction(1)">01</option>
                                <option class="clickable" onclick="filterFunction(2)">02</option>
                                <option class="clickable" onclick="filterFunction(3)">03</option>
                            </div>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="sort">
                        <button class="sortbtn">sort | level</button>
                        <div class="sort-content">
                            <a href="#" onclick="sortByLevel1()">Ascending</a>
                            <a href="#" onclick="sortByLevel1()">Descending</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <?php
                    //connect with the database
                    require_once('db_connection.php');
                    $db = db_connect(); //my connection
                    $sql = "SELECT course.courseID, student.studentID, course.level, course.courseName, grade.grade,student.firstName, student.lastName FROM grade LEFT JOIN course on grade.courseID = course.courseID LEFT JOIN student on grade.studentID = student.studentID;"; //query string
                    //execute the query
                    $result_set = mysqli_query($db, $sql);
                ?>
                <table class="SCCL" id="coursestable">
                    <tr>
                        <th>Level</th>
                        <th>Course Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Grade</th>
                        <th></th>
                    </tr>
                    <!-- Process the results -->
                    <?php while ($results = mysqli_fetch_assoc($result_set)) { ?>
                        <tr>
                            <td class="courseList"><?php echo $results['level']; ?></td>
                            <td class="courseList"><?php echo $results['courseName']; ?></td>
                            <td class="courseList"><?php echo $results['firstName']; ?></td>
                            <td class="courseList"><?php echo $results['lastName']; ?></td>
                            <td class="courseList"><?php echo $results['grade']; ?></td>
                            <td class="courseList"><button onclick="editID(<?php echo $results['courseID'] . ", " . $results['studentID']; ?>)">Edit</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function editID(courseID, studentID) {
            if (confirm("Edit this Grade?") == true) {
                window.location.href = '4_6_editGrade.php?courseID=' + courseID + '&studentID=' + studentID;
            }
        }

        function sortByLevel1() {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("coursestable");
            switching = true;
            dir = "Ascending";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    if (dir == "Ascending") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "Descending") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "Ascending") {
                        dir = "Descending";
                        switching = true;
                    }
                }
            }
        }
        function toggleFilterByLevel() {
            document.getElementById("filterbylevel").classList.toggle("show");
        }
        function filterFunction(n) {
            var table, tr, td, i, txtValue;
            table = document.getElementById("coursestable");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue == n || n == 0) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            toggleFilterByLevel();
        }
    </script>
</body>

</html>