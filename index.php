<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];

    $file = fopen("responses.csv", "a");
    fputcsv($file, [$question1, $question2]);
    fclose($file);

    echo json_encode(["message" => "Response recorded!"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Survey</title>
</head>
<body>
    <h1>Anonymous Survey</h1>
    <form action="index.php" method="post">
        <label for="question1">Question 1:</label>
        <input type="text" id="question1" name="question1"><br><br>
        <label for="question2">Question 2:</label>
       ="text" id="question2" name="question2"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
