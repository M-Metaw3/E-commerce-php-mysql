<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '' ,'finishing');
mysqli_set_charset($db, 'utf8');
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    if (empty($errors)) {
      $query = "INSERT INTO Connect_us (name, email, phone,subject,message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
      mysqli_query($db, $query);
      echo "<SCRIPT> alert('سوف نتواصل معك في اقرب وقت')</SCRIPT>";
    }
  }


  if (isset($_POST['login'])) {
    # code...
    $name =  $_POST['name'];
    $password =$_POST['password'];
    if (count($errors) == 0) {
      $query = "SELECT * FROM admin WHERE name='$name' AND password='$password'";
      $results = mysqli_query($db, $query);
  
      if (mysqli_num_rows($results) == 1) {
        header('location:home.html');
  
      }else{
        array_push($errors, " Incorrect username or password");
      }
  }
  }

  
?>