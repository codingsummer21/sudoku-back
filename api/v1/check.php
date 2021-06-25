<?php
header('Content-Type: application/json');

require_once '../../database.php';

$data = json_decode(file_get_contents('php://input'), true);
$value = $data['value'];
$row = $data['row'];
$col = $data['col'];
$id = $data['id'];


$result = $pdo->query("SELECT * FROM puzzles WHERE id=$id");
$sudoku = $result->fetch(PDO::FETCH_ASSOC);


$solution = $sudoku['solution'];

$correct = substr($solution, ($row-1)*9+($col-1), 1);

$answer['result'] = 'wrong';
if($correct == $value) {
    $answer['result'] = 'correct';
}

echo json_encode($answer);