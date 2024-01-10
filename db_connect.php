<?php 
    //connect to db
    $conn = mysqli_connect('localhost','mario','test1234','pizza_store');
    //check connection
    if(!$conn){
        echo 'Connection error: '. mysqli_connect_error();
    }
?>