<?php
 $host = '127.0.0.1';
 $db   = 'netland';
 $user = 'root';
 $pass = '';
 $charset = 'utf8mb4';
 
 $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
 $options = [
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES   => false,
    ];
 try {
        $pdo = new PDO($dsn, $user, $pass, $options);
 } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }
    $getal = $_GET["id"];
    $stmt = $pdo->prepare('SELECT * FROM series WHERE id = :id');
    $stmt->execute(array(':id' => $getal));
 while ($row = $stmt->fetch()) {
        ?>
        <table>
            <a href="index.php">terug</a>
            <tr><th>awards?</th> <td><?= $row['has_won_awards']?></td> </tr>
            <tr><th>seasons</th> <td><?= $row['seasons']?></td> </tr>
            <tr><th>country</th> <td><?= $row['country']?></td> </tr>
            <tr><th>language</th> <td><?= $row['language']?></td> </tr>
    <tr>
        <h1><?= $row['title']?> - <?= $row['rating']?></h1>
    </tr>


</table>
<div><p><?= $row['description']?></p></div>
     <?php
 }
    ?>