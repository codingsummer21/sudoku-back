<?php
header('Content-Type: application/json');

require_once '../../database.php';

$value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);
$row = filter_var($_POST['row'], FILTER_SANITIZE_STRING);
$col = filter_var($_POST['col'], FILTER_SANITIZE_STRING);
$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);


$result = $pdo->query("SELECT * FROM puzzles WHERE id=$id");
$sudoku = $result->fetch(PDO::FETCH_ASSOC);


$solution = $sudoku['solution'];

$correct = substr($solution, ($row-1)*9+($col-1), 1);

$answer['result'] = 'wrong';
if($correct == $value) {
    $answer['result'] = 'correct';
}

echo json_encode($answer);