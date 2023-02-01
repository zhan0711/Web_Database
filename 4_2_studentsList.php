<!--
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the student information list page of Assignment 02.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Information Management System</title>
    <meta charset="UTF-8">
    <meta name="author" content="Yuan Zhang, Xiaoting Zheng, Xiangwu Dai">
    <meta name="description" content="create a set of web pages for student management.">
    <meta name="keywords" content="student information">
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
                        <form action="studentTSCH.php" method="post">
                            <label for="search-box">search student </label>
                            <input type="text" name="sLastName" id="search-box1" placeholder="Search by student last name...">
                            <input type="submit" class="ss" value="Search" onclick="searchByName()">
                        </form>
                    </div>
                </li>
                <li>
                    <div class="sort">
                        <button class="sortbtn">sort | Last Name</button>
                        <div class="sort-content">
                            <a href="#" onclick="sortByName()">Ascending</a>
                            <a href="#" onclick="sortByName()">Descending</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <?php
                    session_start();
                    $studentID = $_SESSION['userid'];
                    //connect with the database
                    require_once('db_connection.php');
                    $db = db_connect(); //my connection
                    $sql = "SELECT * FROM student"; //query string
                    //execute the query
                    $result_set = mysqli_query($db, $sql);
                ?>
                <div class="studentHT">
                    <h3 class="proh">Student Information</h3>
                </div>
                <div class="studentInfoList">
                    <table id="studenttable">
                        <tr class="studentInfoList">
                            <th class="tableHHT">First Name</th>
                            <th class="tableHHT">Last Name</th>
                            <th class="tableHHT">Phone Number</th>
                            <th class="tableHHT">Email</th>
                            <th class="tableHHT">Address</th>
                            <th class="tableHHT">Postal Code</th>
                            <th class="tableHHT">Country</th>
                        </tr>
                        <?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
                            <tr class="studentInfoList">
                                <td class="tablePIT"><?php echo $result['firstName']; ?></td>
                                <td class="tablePIT"><?php echo $result['lastName']; ?></td>
                                <td class="tablePIT"><?php echo $result['phone']; ?></td>
                                <td class="tablePIT"><?php echo $result['email']; ?></td>
                                <td class="tablePIT"><?php echo $result['address']; ?></td>
                                <td class="tablePIT"><?php echo $result['postalZip']; ?></td>
                                <td class="tablePIT"><?php echo $result['country']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sortByName() {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("studenttable");
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
                    switchcount++;
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