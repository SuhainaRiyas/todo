<?php
include '../config.php';

if($_POST['action'] == 'add'){
    $taskname = mysqli_real_escape_string($connect,$_POST['taskname']);
    $user = $_POST['user'];
    if($taskname!=''){
        $query = "INSERT into task(task_name,user) values ('$taskname','$user')";
        $result = mysqli_query($connect,$query);
        if($result){
            echo 'success';
        }
        else{
            echo 'Failed to insert';
        }
    }else{
        echo 'Taskname is empty';
    }
 }
 
 if($_POST['action'] == 'complete'){
    $taskid = $_POST['taskid'];
    $user = $_POST['user'];
    if($taskid!=''){
        $query = "UPDATE task SET is_completed='yes',updated_at=NOW() where id = $taskid AND user = '$user'";
        $result = mysqli_query($connect,$query);
        if($result){
            echo 'success';
        }
        else{
            echo 'Unable to mark as completed';
        }
    }else{
        echo 'Task id is empty';
    }
 }
    
 if($_POST['action'] == 'incomplete'){
    $taskid = $_POST['taskid'];
    $user = $_POST['user'];
    if($taskid!=''){
        $query = "UPDATE task SET is_completed='no',updated_at=NOW()  where id = $taskid AND user = '$user'";
        $result = mysqli_query($connect,$query);
        if($result){
            echo 'success';
        }
        else{
            echo 'Unable to mark as not completed';
        }
    }else{
        echo 'Task id is empty';
    }
 }
 
 if($_POST['action'] == 'delete'){
    $taskid = $_POST['taskid'];
    $user = $_POST['user'];
    if($taskid!=''){
        $query = "DELETE FROM task where id = $taskid AND user = '$user'";
        $result = mysqli_query($connect,$query);
        if($result){
            echo 'success';
        }
        else{
            echo 'Unable to delete the task';
        }
    }else{
        echo 'Task id is empty';
    }
 }


?>