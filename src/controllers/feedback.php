<?php
require_once '../src/connectToDb/ConnectToDb.php';

function getEmployees() {
    $connection = new connectToDb();
    $query = 'SELECT id, name FROM employees';
    $stmt = $connection->connectToDb()->prepare($query);
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $employees;
}

function getScores() {
    $connection = new connectToDb();
    $query = 'SELECT name, feedback FROM employees';
    $stmt = $connection->connectToDb()->prepare($query);
    $stmt->execute();
    $employee_scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $employee_scores;
}

function method_euler($feedbacks, $h) {
    $results = [];
    $y = 0; // Qualification initiale, peut être ajustée si nécessaire

    foreach ($feedbacks as $feedback) {
        $y = $y + $h * $feedback; // y(n+1) = y(n) + h*f(t, y)
        $results[] = $y;
    }
    return $results;
}

function eulerApplication($employee_scores) {
    // Application de la méthode d'Euler
    $h = 1; // Pas de temps ou d'itération, ajustable selon vos besoins
    $employee_euler_scores = [];

    foreach ($employee_scores as $score) {
        $feedbacks = array_fill(0, abs($score['feedback']), ($score['feedback'] > 0) ? 1 : -1);
        $euler_results = method_euler($feedbacks, $h);     
        $employee_euler_scores[] = [
            'name' => $score['name'],
            'score' => end($euler_results) // On prend la dernière valeur de l'évolution
        ];
    }
    
    return $employee_euler_scores;
}

function insertFeedback($employee_id, $client, $feedback, $score) {
    $connection = new connectToDb();
    $query = 'INSERT INTO qualification (employee_id, client, feedback) VALUES (:employee_id, :client, :feedback)';
    $stmt = $connection->connectToDb()->prepare($query);
    $stmt->execute([
        ':employee_id' => $employee_id,
        ':client' => $client,
        ':feedback' => $feedback,
    ]);
    
    $query = 'UPDATE employees SET feedback = feedback + :score WHERE id = :employee_id';
    $stmt = $connection->connectToDb()->prepare($query);
    $stmt->execute([
        ':score' => $score,
        ':employee_id' => $employee_id,
    ]);

    header('Location: index.php?action=client');
}

function getColors($employee_euler_scores) {
    foreach ($employee_euler_scores as $score) {
        if ($score['score'] < 0) {
            $backgroundColors[] = "'rgba(250, 5, 55, 0.5)'"; 
            $borderColors[] = "'rgba(240, 4, 10, 1)'"; 
        } else {
            $backgroundColors[] = "'rgba(54, 162, 235, 0.2)'"; 
            $borderColors[] = "'rgba(54, 162, 235, 1)'"; 
        }
    }

    return [$backgroundColors, $borderColors];
}
