<?php


namespace App\classes;


class Login
{
    public function adminLoginCheck()
    {
        extract($_POST);
        $md5Password= md5($password);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM users WHERE email='$email' && password ='$md5Password'";
        if ($queryResult = mysqli_query($link, $sql)) {
            $user=mysqli_fetch_assoc($queryResult);
            if ($user){
                session_start();
                $_SESSION['id']    =$user ['id'];
                $_SESSION['name']  =$user['name'];

                header('Location:index.php');
            }else{
                header('Location:main.php');
            }
        }else{
            die('Query_Problem'.mysqli_error($link));
        }
    }
    public  function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:main.php');
    }
}