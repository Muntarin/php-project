<?php

session_start();
if ($_SESSION['id']==null){
    header('Location:main.php');
}

require_once './Student.php';
use App\classes\Student;

require_once './Login.php';
use App\classes\Login;


$student = new Student();
$queryResult = $student->getStudentInfoById($_GET['id']);
$data = mysqli_fetch_assoc($queryResult);
 if(isset($_POST['btn'])){
     $student->updateStudentInfo();
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
            <th>Name</th>
            <td>
                <input type="text" value="<?php echo $data['name'] ;?>" name="name"/>
                <input type="hidden" value="<?php echo $data['id'] ;?>" name="id"/>
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="text" value="<?php echo $data['email'] ;?>" name="email"/></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" value="<?php echo $data['mobile'] ;?>" name="mobile"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Update"/></td>
        </tr>
    </table>
</form>

