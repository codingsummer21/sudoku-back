<?php

/*
 * Checks if the solution provided by the client request is correct.
 * Return {result: <boolean>}
 */

header('Content-Type: application/json');

require_once '../../database.php';

$data = json_decode(file_get_contents('php://input'), true);
$user_solution = $data['solution'];
$id = $data['id'];

$result = $pdo->query("SELECT * FROM puzzles WHERE id=$id");
$sudoku = $result->fetch(PDO::FETCH_ASSOC);

$solution = $sudoku['solution'];

$answer['result'] = 'false';
if ($user_solution == $solution) {
    $answer['result'] = 'true';
}

echo json_encode($answer);