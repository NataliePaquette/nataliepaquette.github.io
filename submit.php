<?php
// Collect POST data (add validation as needed)
$lesson  = $_POST['lesson'] ?? '';
$type    = $_POST['type']   ?? '';
$total   = $_POST['total']  ?? '';
$correct = $_POST['correct']?? '';
$incorrect = $_POST['incorrect'] ?? '';
$timeTaken = $_POST['time']   ?? '';
$note    = $_POST['note']    ?? '';

// Prepare a timestamp
$timestamp = date('Y-m-d H:i:s');  // e.g. "2025-07-16 22:15:00"

// Build a CSV line: Timestamp,Lesson,Type,Total,Correct,Incorrect,Time,Note
// Escape any commas/newlines in $note if needed (or use fputcsv, see note below)
$line = $timestamp . ",$lesson,$type,$total,$correct,$incorrect,$timeTaken,$note\n";

// Append the line to data file
$file = 'data.txt';
$handle = fopen($file, 'a');
fwrite($handle, $line);
fclose($handle);

// Confirm to user
echo "Data saved. <a href=\"index.php\">View Summary</a>";
?>
