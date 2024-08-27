<?php
require_once '../src/model/Login.php';

function login($username, $password){
    $userToLog = new Login();
    $userToLog->connection = new connectToDb();
    
    if($userToLog->canConnect($username, $password)){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }else {
        header('Location:index.php?action=login&status=failed');
    }
}