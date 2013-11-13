<?php

$names  = array('父', '母', '弟');
$emails = array('father@example.com', 'mother@example.com', 'brother@example.com');
$ages   = array(60, 51, 29);

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=dhu;charset=utf8', 'root', '');
    $stmt = $pdo->prepare('INSERT INTO users (name, email, age) values(:NAME, :EMAIL, :AGE)');

    for ($i = 0; $i < 3; $i++) {
        $stmt->bindValue(':NAME',   $names[$i]);
        $stmt->bindValue(':EMAIL',  $emails[$i]);
        $stmt->bindValue(':AGE',    $ages[$i]);
        $stmt->execute();
    }
} catch (PDOException $e) {
    var_dump($e->getMessage());
}

$pdo = null;