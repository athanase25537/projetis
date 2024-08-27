<?php
require '../src/controllers/auth.php';
if(!empty($_GET)){
    if($_GET['action'] == 'login'){
        if(!empty($_POST)){
            require '../src/controllers/login.php';
            login($_POST['username'], $_POST['password']);
        }else{
            require '../src/templates/login.php';
        }
    } else if($_GET['action'] == 'client'){
        require '../src/templates/home.php';
    } else if($_GET['action'] == 'evaluation'){
        require_once '../src/controllers/feedback.php';
        $employees = getEmployees();
        $employee_scores = getScores();
        require '../src/templates/feedback.php';
    } else if($_GET['action'] == 'insert'){
        require_once '../src/controllers/feedback.php';

        if(!empty($_POST)){
            $score = (int)$_POST['feedback'];
            insertFeedback($_POST['employee_id'], $_POST['client'], $_POST['feedback'], $score);
        } else {
            echo 'ici';
        }
    } else if($_GET['action'] == 'cmd') {
        require_once '../src/controllers/cmd.php';
        insertCmd($_POST);
    }
}else if(isConnect()) {
    require_once '../src/controllers/feedback.php';
    $employees = getEmployees();
    $employee_scores = getScores();
    $employee_euler_scores = eulerApplication($employee_scores);
    $colors = getColors($employee_euler_scores);
    $backgroundColors = $colors[0];
    $borderColors = $colors[1];
    require_once '../src/templates/admin.php';
} else {
    require '../src/templates/login.php';
}