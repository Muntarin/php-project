<?php


namespace App\classes;


class Student
{
    public function saveStudentInfo(){
        extract($_POST);

        $link = mysqli_connect('localhost','root','','student');
        $sql = "INSERT INTO students (name ,email, mobile) VALUES ('$name','$email','$mobile')";
        if( mysqli_query($link,$sql)){
            return  "Successfully Done";
        }else{
            die("Query Problem".musqli_error($link));
        }
    }

    public  function getAllStudentInfo(){
        $link = mysqli_connect('localhost','root','','student');
        $sql = "SELECT * FROM students";
        if ($queryResult=mysqli_query($link,$sql)){
            return $queryResult;
        }else{
            die("Query Problem".musqli_error($link));
        }

    }
    public function getStudentInfoById($id){
        $link = mysqli_connect('localhost','root','','student');
        $sql = "SELECT * FROM students WHERE id = '$id'";
        if($queryResult=mysqli_query($link,$sql)){
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function updateStudentInfo(){
        extract($_POST);

        $link = mysqli_connect('localhost','root','','student');
        $sql = "UPDATE students SET name = '$name',email='$email',mobile='$mobile' WHERE id ='$id'";
        if( mysqli_query($link,$sql)){
           header('location:view-student.php');
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function deleteStudentInfo($id){
        $link = mysqli_connect('localhost','root','','student');
        $sql = "DELETE FROM students WHERE id= '$id'";
        if( mysqli_query($link,$sql)){
            header('location:view-student.php');
        }else{
            die("Query Problem".mysqli_error($link));
        }

    }
    public function searchStudentInfo(){
        extract($_POST);
        $link = mysqli_connect('localhost','root','','student');
        $sql = "SELECT * FROM students WHERE name = '$search_text'";
        if($queryResult=mysqli_query($link,$sql)){
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error($link));
        }

    }
}





















