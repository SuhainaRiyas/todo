<?php

include('config.php');
session_start();

if($_POST['action'] == 'register'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $cpass = $_POST['cpass'];
    $verifypass = password_verify($cpass, $hashpass);
    $data = "select * from users where email='$email'";
    $res = mysqli_query($connect,$data);
    $row = mysqli_num_rows($res);
 if($row>0){
     echo "Email Id already exist";
 }
 else{
    if($verifypass==true){

    $value = "insert into users(name,email,password) values('$name','$email','$hashpass')";
    $result = mysqli_query($connect,$value);
    $id = mysqli_insert_id($connect);
    $_SESSION['name']= $name;
    $_SESSION['id'] = $id;
    echo 'success';
    }
    else{
        echo "Password does not match";
    }
}
}



if($_POST['action'] == 'login'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = "select * from users where email = '".$email."'";
    
	$result = mysqli_query($connect,$stmt);
    $rows = mysqli_num_rows($result);

    if($rows>0){
        $resultLogin = mysqli_fetch_assoc($result);
        $verify = password_verify($password, $resultLogin['password']);
        if($verify==true){
            $_SESSION['id'] = $resultLogin['id'];
            $_SESSION['name']=$resultLogin['name'];
            echo 'success';
        }else{
            echo "Incorrect Password";
        }

    }
    else{
        echo "Email or password is incorrect";
    }
}

if($_POST['action'] == 'passwordChange'){
    $email = $_POST['email'];
    $password =$_POST['password'];
    $stmt = "select * from users where email = '".$email."'";
    
	$result = mysqli_query($connect,$stmt);
    $rows = mysqli_num_rows($result);
    if($rows>0){
        $hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $cpass = $_POST['cpass'];
        $verifypass = password_verify($cpass, $hashpass);
        if($verifypass==true){

            $stmt = "UPDATE users SET password = '$hashpass' where email = '".$email."'";
        
            $result = mysqli_query($connect,$stmt);
            if($result){
                echo 'success';
            }
            else{
                echo "Unable to update password";
            }
            
        }
        else{
            echo "Password does not match";
        }
    }else{
        echo "Incorrect Email";
    }
}



?>