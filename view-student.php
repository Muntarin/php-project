<?php

session_start();
if ($_SESSION['id']==null){
    header('Location:main.php');
}

require_once './Student.php';
use App\classes\Student;

require_once './Login.php';
use App\classes\Login;


$student =new Student();
$queryResult=$student->getAllStudentInfo();

if(isset($_GET['status'])){
    $student->deleteStudentInfo($_GET['id']);
}

if (isset($_POST['btn'])){
    $queryResult=$student->searchStudentInfo();
}
if (isset($_GET['logout'])){
    $login= new Login();
    $login->logout();
}

?>
<hr/>
    <a href="index.php">Add Student</a> ||
    <a href="view-student.php">View Student</a> ||
    <a href="?logout=true">Logout</a>
<hr/>
<form action="" method="POST">
    <table>
        <tr>
            <th>Enter your search item</th>
            <td><input type="text" name="search_text"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Search"/></td>
        </tr>
    </table>
</form>
<hr/>

<table border="1" width="500" >
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
    <?php
    if ($student=mysqli_fetch_assoc($queryResult)){
        while ($student=mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['mobile']; ?></td>
        <td>
            <a href="edit-student.php?id=<?php echo $student['id']; ?>">Edit</a>
            <a href="?status=delete&id=<?php echo $student['id']; ?> " onclick="return confirm('Are you sure to delete it?')">Delete</a>
        </td>
    </tr>
    <?php } } else{
        echo "<h1>No Data Found</h1>";
    } ?>
</table>
