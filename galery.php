<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie obrázků</title>
    <link href="galery.css" rel="stylesheet"> 
    <link href="lightbox.css" rel="stylesheet"> <!-- Odkaz na Lightbox CSS -->
</head>
<body>
<header>
    <H1 class="Name">TSGallery</H1>
    <hr/>
    <nav class="Menu">
            <ul class="Menu">
                <li><a href="index.php">UserBook</a></li>
                <li><a href="#about">Gallery</a></li>
                <li><a href="upload.php">MultiUpload</a></li>
            </ul>
    </nav>
</header>

<h1>Galerie obrázků</h1>
<div class="gallery">
    <?php
    $dir = 'obrazky/'; // Složka s obrázky
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Povolené typy souborů
    $files = scandir($dir);

    foreach ($files as $file) {
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            echo '<a href="' . $dir . $file . '" data-lightbox="gallery">';  // Atribut pro Lightbox
            echo '<img src="' . $dir . $file . '" alt="Obrázek" style="width:200px; height:auto;">';
            echo '</a>';
        }
    }
    ?>

    <?php
    $directory = "uploads/";
    $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

    foreach($images as $image) {
        echo '<a href="' . $image . '" data-lightbox="gallery">';  // Přidání Lightbox atributu
        echo '<img src="' . $image . '" style="width:200px; height:auto;" />';
        echo '</a>';
    }
    ?>
</div>

<script src="lightbox.js"></script> <!-- Odkaz na Lightbox JS -->
</body>
</html>
