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

// SQL-fråga för att hämta alla produkter från databasen
$sql = "SELECT * FROM products";

// Utför SQL-frågan och lagra resultatet
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista för Produkter</title>
</head>
<body>
    <h1>Lista för Produkter</h1>
    
    <?php
    // Kollar om det finns produkter i resultatet
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Skriver ut produktnamn, pris och bild
            echo "<h2>Produktnamn: " . $row['name'] . "</h2>";
            echo "Pris: " . $row['price'] . "<br>";
            echo "<img src='" . $row['image'] . "' alt='Produktbild' width='200' height='200'><br>";
            echo "<hr>";
        }
    } else {
        echo "Inga produkter hittades.";
    }


    // Stänger resultatet (frigör minne)
    $result->close();
    ?>

    <a href="../index.php">Tillbaka till startsidan</a>
</body>
</html>

<?php
// Stäng anslutningen till databasen
$conn->close();
?>
