<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lägg till produkt</title>
</head>
<body>
    <h1>Lägg till produkt</h1>

    <?php
    // Anslutningsuppgifter till databasen
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $database = "crud_app"; 

    // Kontrollera om en POST-förfrågan har skickats (när användaren har tryckt på "Lägg till produkt" knappen)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Skapa en anslutning till databasen
        $conn = new mysqli($servername, $username, $password, $database);

        // Kontrollera om anslutningen fungerar, annars visa felmeddelande
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hämta produktnamn, pris och URL till bilden
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        // Skapa en SQL fråga för att lägga till en ny produkt i databasen
        $sql = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";

        // Förberedd fråga för att undvika SQL injektioner
        $stmt = $conn->prepare($sql);

        // Koppla de förberedda värdena till SQL frågan
        $stmt->bind_param("sds", $product_name, $product_price, $product_image);

        // Utför SQL frågan och kontrollera om det lyckades, annars visa felmeddelande
        if ($stmt->execute()) {
            echo "Produkten har lagts till framgångsrikt.";
        } else {
            echo "Det uppstod ett fel vid tilläggningen: " . $stmt->error;
        }

        // Stäng anslutningen till databasen
        $conn->close();
    }
?>


    <form method="post" action="">
        <label for="product_name">Produktnamn:</label>
        <input type="text" name="product_name" required>

        <label for="product_price">Pris:</label>
        <input type="number" name="product_price" required min="0" max="10000">

        <label for="product_image">Bild-URL:</label>
        <input type="text" name="product_image" required>

        <button type="submit">Lägg till produkt</button>
    </form><br>

    <a href="../index.php">Tillbaka till startsidan</a>
</body>
</html>
