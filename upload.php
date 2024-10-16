<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSGaleri</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        /* Styl pro formulář */
        form {
            background-color: #f4f4f9;
            padding: 20px;
            max-width: 400px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        form input[type="file"] {
            margin-bottom: 15px;
            font-size: 16px;
            color: black;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: blue;
        }

        h2 {
            text-align: center;
            color: black;
        }

        /* Styl pro stránku */
        body {
            background-color: rgb(21, 169, 214);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .napis{
            color: black;
        }
    </style>
<body>
    <header>
    <H1 class="Name">TSGallery</H1>
    <hr/>
    <nav class="Menu">
            <ul class="Menu">
                <li><a href="#home">UserBook</a></li>
                <li><a href="galery.php">Gallery</a></li>
                <li><a href="#services">MultiUpload</a></li>
            </ul>
    </nav>

    </header>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <h2 class="napis">Vyber obrázek:</h2>
    <input type="file" name="image" id="image">
    <input type="submit" value="Nahrát obrázek" name="submit">
</form>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kontrola, zda je soubor opravdu obrázek
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Soubor ". basename( $_FILES["image"]["name"]). " byl úspěšně nahrán.";
        } else {
            echo "Při nahrávání souboru došlo k chybě.";
        }
    } else {
        echo "Nahraný soubor není obrázek.";
    }
}
?>

</body>
</html>