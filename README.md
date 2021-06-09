# Sudoku Server

A PHP application which uses a MySQL database to
store sudoku puzzles and their solutions. Puzzles are retrieved from a Kaggle
CSV data file. The application randomly selects a puzzle
and provides it via its API. Then it responds to request
for user number selection as correct or wrong.

## Populating the database
Data retrieved from Kaggle "1 million sudoku games"
https://www.kaggle.com/bryanpark/sudoku.

The ```sudoku.sql``` file contains the SQL statements to create
the required table.

The ```populate.php``` script reads the CSV file (csv not
under git control, must be downloaded from Kaggle) and 
insert the data into the database.
