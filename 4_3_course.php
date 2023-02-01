<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the course management page for teacher of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="course management">
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
            <ul class="search">
                <li>
                    <div class="search-box">
                        <form action="courseTCH.php" method="POST">
                            <label for="search-box">search course </label>
                            <input type="text" name="courseName" id="search-box" placeholder="Search by course title...">
                            <input type="submit" class="ss" value="Search">
                        </form>
                    </div>
                </li>
                <li>
                    <div class="drop-down">
                        <button onclick="toggleFilterByLevel()" class="ss">filter by level</button>
                        <select id="filter-by-level" size="3" multiple>
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
                            <a href="#" onclick="sortByLevel()">Ascending</a>
                            <a href="#" onclick="sortByLevel()">Descending</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <input type="button" class="ss" value="Add a course" onclick="location.href= '4_5_addCourse.php'" />
                <?php
                    session_start();
                    $teacherID = $_SESSION['userid'];
                    //connect with the database
                    require_once('db_connection.php');
                    $db = db_connect(); //my connection
                    $sql = "SELECT * FROM course"; //query string
                    //execute the query
                    $result_set = mysqli_query($db, $sql);
                    // $results = mysqli_fetch_assoc($result_set);
                    // $_SESSION['courseID'] = $results['courseID'];
                ?>
                <table class="SCCL" id="coursestable">
                    <tr>
                        <th>ID</th>
                        <th>Level</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </tr>
                    <!-- Process the results -->
                    <?php while ($results = mysqli_fetch_assoc($result_set)) { ?>
                        <tr>
                            <td class="courseList"><?php echo $results['courseID']; ?></td>
                            <td class="courseList"><?php echo $results['level']; ?></td>
                            <td class="courseList"><?php echo $results['courseName']; ?></td>
                            <!-- send the id as parameter -->
                            <!-- <td class="courseList"><a class="action" href="<?php echo "courseSelect.php?courseID=" . $results['courseID'] . "&studentID=" . $studentID; ?>">Select</a></td> -->
                            <td class="courseList"><button onclick="del(<?php echo $results['courseID'] ?>)">Delete</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function del(courseID) {
            if (confirm("Delete this course?") == true) {
                window.location.href = 'courseDel.php?courseID=' + courseID;
            }
        }
        function sortByLevel() {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("coursestable");
            switching = true;
            dir = "Ascending";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[1];
                    y = rows[i + 1].getElementsByTagName("TD")[1];
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
                        switchcount ++;
                    } else {
                    if (switchcount == 0 && dir == "Ascending") {
                        dir = "Descending";
                        switching = true;
                    }
                }
            }
        }
    </script>
</body>

</html>