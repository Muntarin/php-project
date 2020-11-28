<?php

session_start();
if ($_SESSION['id']==null){
    header('Location:main.php');
}

require_once './Student.php';
use App\classes\Student;

require_once './Login.php';
use App\classes\Login;

$message = '';
if (isset($_POST['btn'])){

    $student= new Student();
    $message= $student->saveStudentInfo();
}
if (isset($_GET['logout'])){
    $login= new Login();
    $login->logout();
}


?>
<hr/>
<a href="index.php">Add Student</a> ||
<a href="view-student.php">View Student</a> ||
<a href="?logout=true">Logout</a> ||
<a href=""><?php echo $_SESSION['name']; ?></a>
<hr/>

<h2> <?php echo $message  ?></h2>
<form action="" method="POST">
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name"/></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email"/></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" name="mobile"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"/></td>
        </tr>
    </table>
</form>
