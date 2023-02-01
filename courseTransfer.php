<?php
require_once('db_connection.php');
$db = db_connect();

if (!isset($_GET['id'])) { //check if we get the id
  header("Location:  index.php");
}
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //access the employee information
  $level = $_POST['level'];
  $courseName = $_POST['courseName'];
  //update the table with new information
  $sql = "UPDATE course set name = '$name' , address= '$address' , salary= '$salary' where id = '$id' ";
  $result = mysqli_query($db, $sql);
  //redirect to show page
  header("Location: show.php?id=  $id");
}
// display the employee information
else {
  $sql = "SELECT * FROM employees WHERE id= '$id' ";

  $result_set = mysqli_query($db, $sql);

  $result = mysqli_fetch_assoc($result_set);
}

?>

<?php include 'headerEm.php' ?>;

<div id="content">

  <a class="back-link" href="index.php"> Back to List</a>

  <div class="page edit">
    <h1>Edit Employee</h1>

    <form form action="<?php echo 'edit.php?id=' . $result['id']; ?>" method="post">
      <dl>
        <dt> ID</dt>
        <dd><input type="text" name="id" value="<?php echo $result['id']; ?>" /></dd>
        </dd>
      </dl>
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?php echo $result['name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><input type="text" name="address" value="<?php echo $result['address']; ?>" /></dd>

        </dd>
      </dl>
      <dl>
        <dt>Salary</dt>

        <dd><input type="text" name="salary" value="<?php echo $result['salary']; ?>" /></dd>

        </dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Employee" />
      </div>
    </form>

  </div>

</div>

<?php include 'footerEm.php'; ?>