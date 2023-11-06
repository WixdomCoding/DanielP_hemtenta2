<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello!</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="./funktioner/add_product.php">Lägg till produkt</a></li>
            <li><a href="./funktioner/view_products.php">Se alla produkter</a></li>
            <li><a href="./funktioner/update_product.php">Ändra pris/bild på produkt</a></li>
            <li><a href="./funktioner/remove_product.php">Ta bort produkt</a></li>
        </ul>
    </nav>

    <?php 

    // Använder include för att kunna ha SQL databas skapandet i en annan fil
    include 'C:\xampp\htdocs\TE4\tenta2\funktioner\MySQL_Creation.php';

    // Hej hej
    echo "hola"
    ?>
</body>
</html>