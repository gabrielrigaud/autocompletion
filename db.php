<?php
$host = 'localhost';
$dbname = 'autocompletion';
$user = 'root';
$pass = 'root'; // MAMP user by default
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "<b>Erreur de connexion à la BDD. As-tu bien importé le script SQL et allumé MySQL ?</b><br>";
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
