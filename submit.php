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
    if (isset($_POST['comment']) && !empty(trim($_POST['comment']))) {
        $comment = trim($_POST['comment']);
        $filename = 'nazor.txt';
        if (file_exists($filename) && is_writable($filename)) {
            file_put_contents($filename, $comment . ';', FILE_APPEND);
            header('Location: index.php');
            exit();
        }
    }
}
?>

</body>
</html>