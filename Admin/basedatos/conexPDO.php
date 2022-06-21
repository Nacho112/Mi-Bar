<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=restaurante', 'root', '');
    echo 'conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
