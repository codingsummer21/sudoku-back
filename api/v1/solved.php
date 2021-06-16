<?php

header('Content-Type: application/json');

require_once '../../database.php';

$data = json_decode(file_get_contents('php://input'), true);
$user_solution = filter_var($_POST['solution'], FILTER_SANITIZE_STRING);
$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

echo json_encode($data);
die();


$result = $pdo->query("SELECT * FROM puzzles WHERE id=$id");
$sudoku = $result->fetch(PDO::FETCH_ASSOC);

$solution = $sudoku['solution'];

$answer['result'] = 'false';
if ($user_solution == $solution) {
    $answer['result'] = 'true';
}

echo json_encode($answer);