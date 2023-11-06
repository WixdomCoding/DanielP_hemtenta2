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

// Hanterar borttagning av produkt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];

    // Kontrollerar om produkten med det angivna ID:et existerar
    $check_sql = "SELECT id FROM products WHERE id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $product_id);
    $check_stmt->execute();

    // Lagrar resultatet från kontrollen
    $check_stmt->store_result();

    // Om produkten med angivet ID existerar
    if ($check_stmt->num_rows > 0) {
        // Produkten existerar, så den kan tas bort
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);

        // Utför borttagningen och meddelar om det lyckades eller ej
        if ($stmt->execute()) {
            echo "Produkten har tagits bort!";
        } else {
            echo "Det uppstod ett fel vid borttagningen: " . $stmt->error;
        }
    } else {
        // Produkten finns inte i databasen
        echo "Produkten finns inte i databasen.";
    }

    // Stänger förberedda uttalanden
    $check_stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ta bort Produkt</title>
</head>
<body>
    <h1>Ta bort Produkt</h1>
    
    <form method="post" action="">
        Produkt ID: <input type="text" name="product_id">
        <input type="submit" value="Ta bort" required>
    </form><br>

    <a href="../index.php">Tillbaka till startsidan</a>
</body>
</html>

<?php
// Stäng anslutningen till databasen
$conn->close();
?>
