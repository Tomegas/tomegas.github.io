<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = trim($_POST['comment']);
    if (!empty($comment)) {
        $filename = 'nazor.txt';
        file_put_contents($filename, $comment . ';', FILE_APPEND);
        header('Location: index.php');
        exit();
    }
}
?>
</body>
</html>