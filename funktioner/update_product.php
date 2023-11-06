<?php
// Anslutningsuppgifter till databasen
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_app";

// Skapa en anslutning till databasen
$conn = new mysqli($servername, $username, $password, $database);

// Kontrollera om anslutningen fungerar, annars visa felmeddelande
if ($conn->connect_error) {
    die("Anslutningen misslyckades: " . $conn->connect_error);
}

// Hanterar uppdateringer av produktinformation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $new_price = $_POST['new_price'];
    $new_image = $_POST['new_image'];

    // Skapa SQL frågan för att uppdatera produktinformation
    $sql = "UPDATE products SET ";
    $types = "";
    $params = array();

    // Kontrollera om nytt pris har angetts
    if (!empty($new_price)) {
        $sql .= "price = ?, ";
        $types .= "d"; // 'd' indikerar en double (pris)
        $params[] = &$new_price; // Lägg till nytt pris i parametrarna
    }

    // Kontrollera om ny bild-URL har angetts
    if (!empty($new_image)) {
        $sql .= "image = ?, ";
        $types .= "s"; // 's' indikerar en string (bild-URL)
        $params[] = &$new_image; // Lägg till ny bild-URL i parametrarna
    }

    // Ta bort eventuell extra komma och mellanslag i SQL-frågan
    $sql = rtrim($sql, ', ') . " WHERE id = ?";
    $types .= "i"; // 'i' indikerar ett heltal (ID)
    $params[] = &$product_id; // Lägg till produkt-ID i parametrarna

    // Förbered och bind parametrar till SQL frågan
    $stmt = $conn->prepare($sql);

    $bind_params = array_merge(array($types), $params);
    call_user_func_array(array($stmt, 'bind_param'), $bind_params);

    // Utför uppdateringen och meddelar om det lyckades eller inte
    if ($stmt->execute()) {
        echo "Produktuppgifterna har uppdaterats!";
    } else {
        echo "Det uppstod ett fel vid uppdateringen: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ändra Pris/Bild på Produkt</title>
</head>
<body>
    <h1>Ändra Pris/Bild på Produkt</h1>
    
    <form method="post" action="#">
        <label for="product_id">Produkt ID:</label>
        <input type="text" name="product_id" required>

        <label for="product_id">Nytt Pris:</label>
        <input type="text" name="new_price">

        <label for="product_id">Ny Bild-URL:</label>
        <input type="text" name="new_image">

        <input type="submit" value="Uppdatera">
    </form><br>

    <a href="../index.php">Tillbaka till startsidan</a>
</body>
</html>

<?php
// Stäng anslutningen till databasen
$conn->close();
?>
