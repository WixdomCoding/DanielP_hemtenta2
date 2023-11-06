<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database creation</title>
</head>
<body>

<?php
    // Alla riktiga kommentarer är indenterade ett extra steg, de som inte är det är kod som användes innan jag kommenterade allting
    // Test variabel för att se om min include fungerade
// $tester = "Test functional";

    // Anslutningsuppgifter till databasen
// Ändra dessa uppgifter efter dina egna anslutningsuppgifter om det behövs
// $servername = "localhost"; 
// $username = "root";
// $password = "";

    // Skapa en anslutning till databasen
// $conn = new mysqli($servername, $username, $password);

    // Kontrollera om anslutningen fungerar, annars visa felmeddelande
// Om anslutningen misslyckas, visa ett felmeddelande
// if ($conn->connect_error) {
//     die("Anslutningen misslyckades: " . $conn->connect_error);
// }

    // Skapa en databas med namnet "crud_app" om den inte redan finns
// $createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS crud_app";
// if ($conn->query($createDatabaseSQL) === TRUE) {
//     echo "Databasen 'crud_app' skapades framgångsrikt<br>";
// } else {
//     echo "Fel vid skapande av databas: " . $conn->error . "<br>";
// }

    // Välj databasen "crud_app" för användning
// $conn->select_db("crud_app");

    // Skapa en tabell med namnet "products" om den inte redan finns
// $createTableSQL = "CREATE TABLE IF NOT EXISTS products (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     description TEXT,
//     price DECIMAL(10, 2) NOT NULL,
//     image VARCHAR(255)
// )";

    // Om tabellen 'products' skapas utan problem, visa ett meddelande
// if ($conn->query($createTableSQL) === TRUE) {
//     echo "Tabellen 'products' skapades framgångsrikt<br>";
// } else {
//     Visa ett felmeddelande om skapandet av tabellen misslyckades
//     echo "Fel vid skapande av tabell: " . $conn->error . "<br>";
// }

    // Stäng anslutningen till databasen
// $conn->close();
?>


</body>
</html>