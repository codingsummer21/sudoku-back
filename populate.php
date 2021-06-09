<?php
// WARNING: This will take some time to complete

require_once 'database.php';

// Check if data already in database
$result = $pdo->query("SELECT COUNT(*) as total FROM puzzles");
$row = $result->fetch(PDO::FETCH_ASSOC);
if($row['total'] > 0) {
    echo 'Database already populated with rows: ' . $row['total'];
    die();
}
$counter = 0;
$sudoku_file = fopen('sudoku.csv', 'r');

if($sudoku_file) {
    $line = fgets($sudoku_file); // skip the first line with headers
    $statement = $pdo->prepare("INSERT INTO puzzles (puzzle, solution) VALUES(?, ?)");
    while(!feof($sudoku_file)) {
        $line = fgets($sudoku_file);
        $tokens = explode(",", $line);
        $statement->execute([$tokens[0], $tokens[1]]);
        $counter++;
    }
    fclose($sudoku_file);
}
echo "Database populated with $counter rows";
