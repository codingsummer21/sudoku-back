<?php
header('Content-Type: application/json');

require_once '../../database.php';

$index = rand(1, 1000000);

$result = $pdo->query("SELECT id, puzzle, times_selected, times_solved 
                                FROM puzzles WHERE id=$index");
$row = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode($row);
